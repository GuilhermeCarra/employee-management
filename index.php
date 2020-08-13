<?php

include_once "config/constants.php";

session_start();

if (isset($_GET["controller"])) {
    $controller = CONTROLLERS . $_GET["controller"] . "Controller.php";

    if (file_exists($controller)) include_once $controller;
    else {
        $errorMsg = "The requested controller does not exist";
        include_once VIEWS . "error/error.php";
    }
} else {
    if (isset($_SESSION['name'])) {
        include_once VIEWS . "dashboard.php";
    } else {
        include_once VIEWS . "login.php";
    }
}
