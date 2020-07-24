$(document).ready(function(){

    // LOGIN VALIDATION
    $("#loginBtn").click(function(){
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            url: "src/library/loginController.php",
            type: "post",
            data: {"email":email, "password":password, "login":true},
            success: function(login){
                if(login == '201') location.href = "src/dashboard.php";
                if(login == '401') $("html").append('<span>Invalid credentials</span>');
            }
        });
    });

    appendJsGrid();
    function appendJsGrid() {

        $.ajax({
            type: "GET",
            url: "library/employeeController.php"
        }).done(function(employees) {
            alert(employees);
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
                    { name: "Name", type: "text", width: 150, validate: "required" },
                    { name: "Email", type: "text", width: 50 },
                    { name: "Age", type: "number", width: 200 },
                    { name: "Street No", type: "text", width: 40 },
                    { name: "City", type: "text", width: 40},
                    { name: "State", type: "text", validate: "required" },
                    { name: "Postal Code", type: "number", validate: "required" },
                    { name: "Phone Number", type: "number", validate: "required" },

                    { type: "control" }
                ]
            });
        });
    }
});
