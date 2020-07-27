<?php
require('employeeManager.php');

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        if (isset($_GET['id'])){
            echo getEmployee($_GET['id']);
            break;
        }
        echo getAllEmployees();
        break;

    case "POST":
        echo addEmployee($_POST["newEmployee"]);
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        echo updateEmployee($_PUT['updateEmployee']);
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo deleteEmployee($_DELETE['id']);
        break;
}
?>