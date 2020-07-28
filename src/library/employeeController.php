<?php
require('sessionHelper.php');
require('employeeManager.php');

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":

        // Getting one specific Employee
        if (isset($_GET['id'])){
            echo getEmployee($_GET['id']);
            break;
        }

        //Getting all Employees
        echo getAllEmployees();
        break;

    case "POST":
        echo addEmployee($_POST["newEmployee"]);
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        // Removing avatar from Employee
        if (isset($_PUT['removeAvatar'])){
            removeAvatar($_PUT['removeAvatar']);
            break;
        }

        // Updating Employee
        echo updateEmployee($_PUT['updateEmployee']);
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo deleteEmployee($_DELETE['id']);
        break;
}
?>