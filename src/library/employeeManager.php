<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


function getAllEmployees() {
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));
    return json_encode($employeesJSON);
}

function addEmployee(array $newEmployee)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));

    $employeeObj = new stdClass();
    $employeeObj->id = getNextIdentifier($employeesJSON);
    $employeeObj->name = $newEmployee["name"];
    $employeeObj->email = $newEmployee["email"];
    $employeeObj->age = $newEmployee["age"];
    $employeeObj->streetAddress = $newEmployee["streetAddress"];
    $employeeObj->city = $newEmployee["city"];
    $employeeObj->state = $newEmployee["state"];
    $employeeObj->postalCode = $newEmployee["postalCode"];
    $employeeObj->phoneNumber = $newEmployee["phoneNumber"];

    $employeesJSON[]=$employeeObj;
    $employeesJSON = sortEmployeesById($employeesJSON);
    file_put_contents("../../resources/employees.json", json_encode($employeesJSON));

    return "Created employee: ".$newEmployee["name"];
}


function deleteEmployee(string $id)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));
    foreach ($employeesJSON as $key => $employee) {
        if ($id == $employee->id) {
            $name = $employee->name;
            array_splice($employeesJSON,$key,1);
            file_put_contents("../../resources/employees.json", json_encode($employeesJSON));
            return "Deleted employee: ". $name;
        }
    }
}


function updateEmployee(array $updateEmployee)
{

}


function getEmployee(string $id)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));
    foreach ($employeesJSON as $employee) {
        if ($employee->id == $id) {
            return json_encode($employee);
        }
    }
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
    $counter = 0;
    foreach ($employeesCollection as $key => $employee) {
        if($counter ==count($employeesCollection) - 1){
            return $employee->id+1;
        }
        if($employee->id+1 != $employeesCollection[$key+1]->id){
            return $employee->id+1;
        }
    $counter= $counter+1;
    }
}

function sortEmployeesById($employeesJSON) {
    function cmp($a, $b) {
        return strcmp($a->id, $b->id);
    }

    usort($employeesJSON, "cmp");
    return $employeesJSON;
}
