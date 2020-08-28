<?php

include_once "config/constants.php";

session_start();

if (isset($_REQUEST["controller"])) {
    $controller = CONTROLLERS . $_REQUEST["controller"] . "Controller.php";

    if (file_exists($controller)) include_once $controller;
    else {
        $errorMsg = "The requested controller does not exist";
        include_once VIEWS . "error.php";
    }
} else {
    if (isset($_SESSION['name'])) {
        header("Location: index.php?controller=employee&action=getEmployees");
    } else {
        include_once VIEWS . "login.php";
    }
}
