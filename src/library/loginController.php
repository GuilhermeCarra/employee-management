<?php
    require('loginManager.php');

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo validateLogin($email,$password);
    }

    if(isset($_POST['logout'])) {
        logOut();
    }

?>