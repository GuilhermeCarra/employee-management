<?php
require('employeeManager.php');

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        echo getAllEmployees();
        break;

    case "POST":
        echo addEmployee($_POST["newEmployee"]);
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo deleteEmployee($_DELETE['id']);
        break;
}
?>