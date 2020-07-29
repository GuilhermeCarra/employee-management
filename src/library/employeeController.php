<?php
require('employeeManager.php');

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":

        // Getting one specific Employee
        if (isset($_GET['id'])) break;
        //Getting all Employees
        echo getAllEmployees();
        break;

    case "POST":

        // Updating Employee
        if (isset($_POST['PUT'])) {
            updateEmployee($_POST);
            break;
        }
        // Creating Employee
        echo addEmployee($_POST);
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        // Removing avatar from Employee
        if (isset($_PUT['removeAvatar'])){
            echo removeAvatar($_PUT['removeAvatar']);
            break;
        }

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo deleteEmployee($_DELETE['id']);
        break;
}

?>