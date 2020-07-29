<?php
    require('loginManager.php');

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (validateLogin($email,$password) == "success") {
            http_response_code(201);
        } else {
            http_response_code(401);
        }
    }

    if(isset($_POST['logout'])) {
        logOut('../../');
    }

?>