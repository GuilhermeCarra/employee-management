$(document).ready(function(){

    // LOGIN VALIDATION
    $("#loginBtn").click(function(){
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            url: "src/library/loginController.php",
            type: "post",
            data: {"email":email, "password":password, "login":true},
            statusCode: {
                201: function () {
                    location.href = "src/dashboard.php";
                },
                401: function () {
                    $("html").append('<span>Invalid credentials</span>');
                }
            }
        });
    });

    if ($("#jsGrid").length) appendJsGrid();

    function appendJsGrid() {

        $.ajax({
            type: "GET",
            url: "library/employeeController.php"
        }).done(function(employees) {
            employees = JSON.parse(employees);
            $("#jsGrid").jsGrid({
                width: "100%",
                height: "400px",

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
                                alert(response);
                            }
                        });
                    },
                    deleteItem: function(item) {
                        $.ajax({
                            type: "DELETE",
                            url: "library/employeeController.php",
                            data: {"id":item.id},
                            success: function(response) {
                                alert(response);
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
                    { name: "email", title: "Email", type: "text", width: 150 },
                    { name: "age", title: "Age", type: "number", width: 30 },
                    { name: "streetAddress", title: "Street Address", type: "text", width: 70 },
                    { name: "city", title: "City", type: "text", width: 100},
                    { name: "state", title: "State", type: "text", validate: "required" },
                    { name: "postalCode", title: "Postal Code", type: "number", validate: "required" },
                    { name: "phoneNumber", title: "Phone Number", type: "number", validate: "required" },
                    { type: "control", editButton: false }
                ]
            });
        });
    }

    // employee.php -- UPDATE EMPLOYEE
    if ($("#employeePUT").length) {
        const urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get('id');
        $.ajax({
            type: "GET",
            url: "library/employeeController.php",
            data: {"id":id},
            success: function(employee) {
                employee = JSON.parse(employee);
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
            }
        });

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
            $.ajax({
                type: "PUT",
                url: "library/employeeController.php",
                data: {"updateEmployee":item},
                success: function(response) {
                    alert(response);
                }
            });
        });
    }

    // employee.php -- CREATE EMPLOYEE
    if ($("#employeePOST").length) {
        // Getting avatars
        $.ajax({
            type: "GET",
            url: "library/avatarsApi.php",
            success: function(response) {
                let avatars = JSON.parse(response);
                for(let i = 0; i < avatars.length; i++) {
                    $("#employeeAvatar").append('<div class="img-container"><img class="thumbnail" src="'+avatars[i]+'" /></div>');
                }
            }
        });

        $('#employeePOST').click(function(){
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
            $.ajax({
                type: "POST",
                url: "library/employeeController.php",
                data: {"newEmployee":item},
                success: function(response) {
                    alert(response);
                }
            });
        });
    }

});
