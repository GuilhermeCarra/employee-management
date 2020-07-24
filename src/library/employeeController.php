<?php
require('employeeManager.php');

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        echo getAllEmployees();
        break;
    case "POST":
        echo addEmployee();
        break;
    case "DELETE":
        echo deleteEmployee();
        break;
}
?>