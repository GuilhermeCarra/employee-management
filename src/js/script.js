$(document).ready(function(){

    // index.php -- LOGIN VALIDATION
    $("#loginBtn").click(function(){
        let email = $("#email").val();
        let password = $("#password").val();
        $("#loginError").fadeOut("fast");

        $.ajax({
            url: "src/library/loginController.php",
            type: "post",
            data: {"email":email, "password":password, "login":true},
            statusCode: {
                201: function () {
                    location.href = "src/dashboard.php";
                },
                401: function () {
                    $("#loginError").text('Invalid credentials');
                    $("#loginError").slideDown();
                }
            }
        });
    });

    // dashboard.php -- CREATE THE EMPLOYEE JSGRID TABLE
    if ($("#jsGrid").length) appendJsGrid();

    function appendJsGrid() {

        $.ajax({
            type: "GET",
            url: "library/employeeController.php"
        }).done(function(employees) {
            employees = JSON.parse(employees);
            $("#jsGrid").jsGrid({
                width: "100%",
                height: "450px",

                inserting: true,
                editing: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 10,
                deleteConfirm: "Do you really want to delete client?",
                controller: {
                    insertItem: function(item) {
                        item.lastName = "";
                        item.gender = "";
                        $.ajax({
                            type: "POST",
                            url: "library/employeeController.php",
                            data: {"newEmployee":item},
                            success: function(response) {
                                let employee = JSON.parse(response);
                                $('#employeeAlert').text('Created Employee:'+employee.name);
                                $('#employeeAlert').slideDown();
                                setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
                            }
                        });
                    },
                    deleteItem: function(item) {
                        $.ajax({
                            type: "DELETE",
                            url: "library/employeeController.php",
                            data: {"id":item.id},
                            success: function(response) {
                                $('#employeeAlert').text(response);
                                $('#employeeAlert').slideDown();
                                setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
                            }
                        });
                    }
                },
                rowClick: function(item) {
                    location.href = "employee.php?id="+item.item.id;
                },

                data: employees,

                fields: [
                    { name: "name", title: "Name", type: "text", width: 150, validate: "required" },
                    { name: "email", title: "Email", type: "text", width: 150, validate: "required" },
                    { name: "age", title: "Age", type: "number", width: 50, align: "center", validate: "required" },
                    { name: "streetAddress", title: "Street Address", type: "text", width: 70, align: "center", validate: "required" },
                    { name: "city", title: "City", type: "text", width: 100, align: "center", validate: "required"},
                    { name: "state", title: "State", type: "text", width: 60, align: "center", validate: "required" },
                    { name: "postalCode", title: "Postal Code", type: "number", align: "center", validate: "required" },
                    { name: "phoneNumber", title: "Phone Number", type: "number", align: "center", validate: "required" },
                    { type: "control", editButton: false }
                ]
            });
        });
    }

    // employee.php -- UPDATE EMPLOYEE
    if ($("#employeePUT").length) {
        // Getting Employee ID on URL Parameters to request the Employee info to php
        const urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get('id');

        // Click event to select an avatar from the list
        $(".img-container").click(function(){
            $(".active-avatar").removeClass("active-avatar");
            $(this).addClass("active-avatar");
        });

        $.ajax({
            type: "GET",
            url: "library/employeeController.php",
            data: {"id":id},
            success: function(employee) {
                employee = JSON.parse(employee);
                // Filling inputs with the Employee information
                $("#name").val(employee.name);
                $("#lastName").val(employee.lastName);
                $("#age").val(employee.age);
                $("#email").val(employee.email);
                $("#city").val(employee.city);
                $("#streetAddress").val(employee.streetAddress);
                $("#state").val(employee.state);
                $("#postalCode").val(employee.postalCode);
                $("#phoneNumber").val(employee.phoneNumber);
                if(employee.gender == "woman") $("#gender").val("woman");

                // Verify if Employee have an avatar
                if(employee.hasOwnProperty('avatar')) {
                    // Print it if Employee has an avatar
                    $("#employeeAvatar").empty();
                    $("#employeeAvatar").addClass('justify-content-center');
                    $("#employeeAvatar").append(
                        $('<div class="img-container"><img class="thumbnail" src="'+employee.avatar+'"></div>').click(function(){removeEmployeeAvatar(id)})
                    );
                    // And set a click event to delete it and put a button to add another one
                    $(".img-container").click(function(){
                        $(".img-container").remove();
                    });
                }
            }
        });

        // Click event on button to save the new employee on JSON
        $('#employeePUT').click(function(){
            item = {
                    "id":id,
                    "name":$("#name").val(),
                    "lastName":$("#lastName").val(),
                    "email":$("#email").val(),
                    "gender":$("#gender").val(),
                    "city":$("#city").val(),
                    "streetAddress":$("#streetAddress").val(),
                    "state":$("#state").val(),
                    "age":$("#age").val(),
                    "postalCode":$("#postalCode").val(),
                    "phoneNumber":$("#phoneNumber").val(),
            }
            if ($(".active-avatar").length) item.avatar = $(".active-avatar img").attr("src");
            if (validateForm()) {
                $.ajax({
                    type: "PUT",
                    url: "library/employeeController.php",
                    data: {"updateEmployee":item},
                    success: function(response) {
                        $('#employeeAlert').text(response);
                        $('#employeeAlert').slideDown();
                        setTimeout(() => {
                            location.reload();
                        }, 2500);
                    }
                });
            }
        });
    }

    // employee.php -- CREATE EMPLOYEE FORM
    if ($("#employeePOST").length) {

        // Click event to select an avatar from the list
        $(".img-container").click(function(){
            $(".active-avatar").removeClass("active-avatar");
            $(this).addClass("active-avatar");
        });

        // Getting all inputs values to save the Employee
        $('#employeePOST').click(function(){
            var item = {
                "id":id,
                "name":$("#name").val(),
                "lastName":$("#lastName").val(),
                "email":$("#email").val(),
                "gender":$("#gender").val(),
                "city":$("#city").val(),
                "streetAddress":$("#streetAddress").val(),
                "state":$("#state").val(),
                "age":$("#age").val(),
                "postalCode":$("#postalCode").val(),
                "phoneNumber":$("#phoneNumber").val(),
            }
            if ($(".active-avatar").length) item.avatar = $(".active-avatar img").attr("src");
            // Ajax post with employee object to save it on JSON
            if (validateForm()) {
                $.ajax({
                    type: "POST",
                    url: "library/employeeController.php",
                    data: {"newEmployee":item},
                    success: function(response) {
                        let employee = JSON.parse(response);
                        $('#employeeAlert').text('Created Employee:'+employee.name+' '+employee.lastName+'! Redirecting to employee page...');
                        $('#employeeAlert').slideDown();
                        setTimeout(() => {
                            location.href = "employee.php?id="+employee.id;
                        }, 2500);
                    }
                });
            }
        });
    }

    function removeEmployeeAvatar(id) {
        $.ajax({
            type: "PUT",
            url: "library/employeeController.php",
            data: {"removeAvatar":id},
            success: function() {
                location.reload();
            }
        });
    }

});
