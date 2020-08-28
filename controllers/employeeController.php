<?php

include_once MODELS . 'employeeManager.php';

if (isset($_REQUEST["action"])) {
    if (function_exists($_REQUEST["action"])) {
        call_user_func($_REQUEST["action"]);
    } else {
        $errorMsg = "The requested action does not exist";
        include_once VIEWS . "error.php";
    }
} else {
    header("Location: index.php?controller=employee&action=getEmployees");
}

function getEmployees()
{
    $employees = getAllEmployees();
    include_once VIEWS . "dashboard.php";
}

function editEmployee()
{
    include_once VIEWS . "employee.php";
}
