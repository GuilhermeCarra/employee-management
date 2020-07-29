$(document).ready(function () {

    // index.php -- LOGIN VALIDATION
    $("#loginBtn").click(function () {
        let email = $("#email").val();
        let password = $("#password").val();
        $("#loginError").fadeOut("fast");

        $.ajax({
            url: "src/library/loginController.php",
            type: "post",
            data: {
                "email": email,
                "password": password,
                "login": true
            },
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
        }).done(function (employees) {
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
                    insertItem: function (item) {
                        item.lastName = "";
                        item.gender = "";
                        return $.ajax({
                            type: "POST",
                            url: "library/employeeController.php",
                            dataFilter: function (response) {
                                return JSON.parse(response);
                            },
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
                            },
                            success: function(newEmployee) {
                                $('#employeeAlert').text('Created Employee: '+newEmployee.name);
                                $('#employeeAlert').slideDown();
                                setTimeout(() => { $('#employeeAlert').slideUp()}, 2500);
                            }
                        });
                    },
                    deleteItem: function (item) {
                        $.ajax({
                            type: "DELETE",
                            url: "library/employeeController.php",
                            data: {
                                "id": item.id
                            },
                            success: function (response) {
                                $('#employeeAlert').text(response);
                                $('#employeeAlert').slideDown();
                                setTimeout(() => {
                                    $('#employeeAlert').slideUp()
                                }, 2500);
                            }
                        });
                    }
                },
                rowClick: function (item) {
                    location.href = "employee.php?id=" + item.item.id;
                },

                data: employees,

                fields: [
                    {name: "name",title: "Name",type: "text",width: 150, validate: "required"},
                    {name: "email",title: "Email",type: "text",width: 150,validate: "required"},
                    {name: "age",title: "Age",type: "number",width: 50,align: "center",validate: "required"},
                    {name: "streetAddress",title: "Street Address",type: "text",width: 70,align: "center",validate: "required"},
                    {name: "city",title: "City",type: "text",width: 100,align: "center",validate: "required"},
                    {name: "state",title: "State",type: "text",width: 60,align: "center",validate: "required"},
                    {name: "postalCode",title: "Postal Code",type: "number",align: "center",validate: "required"},
                    {name: "phoneNumber",title: "Phone Number",type: "number",align: "center",validate: "required"},
                    {type: "control",editButton: false}
                ]
            });
        });
    }

    // employee.php -- UPDATE AVATAR
    if ($("#employeePage").length) {

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
        $(".img-container").click(function () {
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
            }
        });
    }

    // Replace img to loading gif and Remove Employee avatar using his ID on query string
    function removeEmployeeAvatar() {
        $('.thumbnail').attr('src','../assets/img/loading.gif');
        const urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get('id');
        $.ajax({
            type: "PUT",
            url: "library/employeeController.php",
            data: {"removeAvatar":id},
            success: function(avatars) {
                $('#imageGallery').empty();
                $('#imageGallery').append(avatars);
            }
        });
    }

    function validateForm() {
        $('.error').remove();
        let validate = true;

        const nameValue = $('#name').val().trim();
        const lastNameValue = $('#lastName').val().trim();
        const emailValue = $('#email').val().trim();
        const cityValue = $('#city').val().trim();
        const streetAddressValue = $('#streetAddress').val().trim();
        const stateValue = $('#state').val().trim();
        const ageValue = $('#age').val().trim();
        const postalCodeValue = $('#postalCode').val().trim();
        const phoneNumberValue = $('#phoneNumber').val().trim();


        if (nameValue === '') {
            $('#name').after('<small class="error">Name cannot be blank</small>');
            validate = false;
        }

        if (lastNameValue === '') {
            $('#lastName').after('<small class="error">Last Name cannot be blank</small>');
            validate = false;
        }

        if (cityValue === '') {
            $('#city').after('<small class="error">City cannot be blank</small>');
            validate = false;
        }

        if (streetAddressValue === '') {
            $('#streetAddress').after('<small class="error">Address cannot be blank</small>');
            validate = false;
        }

        if (stateValue === '') {
            $('#state').after('<small class="error">State cannot be blank</small>');
            validate = false;
        }

        if (ageValue === '') {
            $('#age').after('<small class="error">Age cannot be blank</small>');
            validate = false;
        }

        if (postalCodeValue === '') {
            $('#postalCode').after('<small class="error">Postal cannot be blank</small>');
            validate = false;
        }

        if (phoneNumberValue === '') {
            $('#phoneNumber').after('<small class="error">Phone cannot be blank</small>');
            validate = false;
        }

        if (emailValue === '') {
            $('#email').after('<small class="error">Email cannot be blank<br></small>');
            validate = false;
        } else if (!isEmail(emailValue)) {
            $('#email').after('<small class="error">Email is not valid<br></small>');
            validate = false;
        }

        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }

        return validate;

    }

    // Adding style to navbar link corresponding to the actual page
    if ($("#dashboardPage").length) $('.nav-li[href$="dashboard.php"]').removeClass('text-body').addClass('text-secondary');
    if ($("#employeePage").length) $('.nav-li[href$="employee.php"]').removeClass('text-body').addClass('text-secondary');
});