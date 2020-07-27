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

    appendJsGrid();
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

                data: employees,

                fields: [
                    { name: "name", title: "Name", type: "text", width: 150, validate: "required" },
                    { name: "email", title: "Email", type: "text", width: 150 },
                    { name: "age", title: "Age", name: "Age", type: "number", width: 200 },
                    { name: "streetAddress", title: "Street Address", type: "text", width: 40 },
                    { name: "city", title: "City", type: "text", width: 40},
                    { name: "state", title: "State", type: "text", validate: "required" },
                    { name: "postalCode", title: "Postal Code", type: "number", validate: "required" },
                    { name: "phoneNumber", title: "Phone Number", type: "number", validate: "required" },
                    { type: "control" }
                ]
            });
        });
    }
});
