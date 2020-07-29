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
                            data: {
                                "name":item.name,
                                "lastName":item.lastName,
                                "email":item.email,
                                "gender":item.gender,
                                "city":item.city,
                                "streetAddress":item.streetAddress,
                                "state":item.state,
                                "age":item.age,
                                "postalCode":item.postalCode,
                                "phoneNumber":item.phoneNumber
                            }
                        });
                        $('#employeeAlert').text('Created Employee:'+item.name);
                        $('#employeeAlert').slideDown();
                        setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
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

    // employee.php -- UPDATE AVATAR
    if ($("#employeeAvatar").length) {

        // Verify with query string if a employee was created to show a message
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('employeeCreated')) {
            $('#employeeAlert').text('Employee Created Suscessfully');
            $('#employeeAlert').slideDown();
            setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
        }
        // Verify with query string if a employee was updated to show a message
        if (urlParams.has('employeeUpdated')) {
            $('#employeeAlert').text('Employee Updated Suscessfully');
            $('#employeeAlert').slideDown();
            setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
        }

        // Click event to Return Button
        $('#employeeReturnBtn').click(function(){
            event.preventDefault();
            location.href = "dashboard.php";
        });

        // Click event to select an avatar from the list
        $(".img-container").click(function(){
            $(".active-avatar").removeClass("active-avatar");
            $(this).addClass("active-avatar");
            let url = ($(".active-avatar img").attr("src"))
            $('#avatarInput').attr("value",url);
            $('#avatarInput').attr("name","avatar");
        });

        // Verify if Employee has an avatar
        if($("#employeeAvatar").children().length == 1) {
            // Center image if Employee has an avatar
            $("#employeeAvatar").addClass('justify-content-center');
            // And set a click event to delete it
            $(".img-container").click(removeEmployeeAvatar);
        }

        // Form validation
        $('#submitBtn').click(function(){
            event.preventDefault();
            if ( validateForm() ) {
                $('#hiddenSubmitBtn').click();
            } else {
                console.log("not ok")
            }
        });
    }

    // Replace img to loagind gif and Remove Employee avatar using his ID on query string
    function removeEmployeeAvatar() {
        $('.thumbnail').attr('src','img/loading.gif');
        const urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get('id');
        $.ajax({
            type: "PUT",
            url: "library/employeeController.php",
            data: {"removeAvatar":id},
            success: function() {
                location.href = "employee.php?id="+id;
            }
        });
    }

    const name = document.getElementById('name');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const gender = document.getElementById('gender');
    const city = document.getElementById('city');
    const streetAddress = document.getElementById('streetAddress');
    const state = document.getElementById('state');
    const age = document.getElementById('age');
    const postalCode = document.getElementById('postalCode');
    const phoneNumber = document.getElementById('phoneNumber');

    //form.addEventListener('')

    function validateForm() {
        return true;
    }


});
