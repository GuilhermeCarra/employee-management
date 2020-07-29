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

    // Making a new employee object to inset on JSON
    $employeeObj = new stdClass();
    $employeeObj->id = getNextIdentifier($employeesJSON);
    $employeeObj->name = $newEmployee["name"];
    $employeeObj->lastName = $newEmployee["lastName"];
    $employeeObj->email = $newEmployee["email"];
    $employeeObj->gender = $newEmployee["gender"];
    $employeeObj->age = intval($newEmployee["age"]);
    $employeeObj->streetAddress = $newEmployee["streetAddress"];
    $employeeObj->city = $newEmployee["city"];
    $employeeObj->state = $newEmployee["state"];
    $employeeObj->postalCode = $newEmployee["postalCode"];
    $employeeObj->phoneNumber = $newEmployee["phoneNumber"];
    if (isset($newEmployee["avatar"])) $employeeObj->avatar = $newEmployee["avatar"];

    // Inserting employee in JSON variable
    $employeesJSON[]=$employeeObj;

    // Sorting JSON array by Employee ID
    $employeesJSON = sortEmployeesById($employeesJSON);

    // Saving JSON with the new Employee on local file
    file_put_contents("../../resources/employees.json", json_encode($employeesJSON));

    // If it was created with employe.php redirect to employee page, if it's was created with jsGrid table returns the employee
    if (isset($_POST['POST'])) {
        header('Location: ../employee.php?employeeCreated&id='.$employeeObj->id);
    } else {
        return json_encode($employeeObj);
    }
}


function deleteEmployee(string $id)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));

    // Searching for the Employee by his ID
    foreach ($employeesJSON as $key => $employee) {
        if ($id == $employee->id) {

            // Saving Employee name to return it later
            $name = $employee->name." ".$employee->lastName;

            // Delete the employee from JSON array
            array_splice($employeesJSON,$key,1);

            // Saving updated JSON on local file
            file_put_contents("../../resources/employees.json", json_encode($employeesJSON));

            return "Deleted employee: ". $name."!";
        }
    }
}


function updateEmployee(array $updateEmployee)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));

    // Searching for the Employee by his ID and change his informations
    foreach ($employeesJSON as $employee) {
        if ($updateEmployee["id"] == $employee->id) {
            $employee->name = $updateEmployee["name"];
            $employee->lastName = $updateEmployee["lastName"];
            $employee->email = $updateEmployee["email"];
            $employee->gender = $updateEmployee["gender"];
            $employee->age = intval($updateEmployee["age"]);
            $employee->streetAddress = $updateEmployee["streetAddress"];
            $employee->city = $updateEmployee["city"];
            $employee->state = $updateEmployee["state"];
            $employee->postalCode = $updateEmployee["postalCode"];
            $employee->phoneNumber = $updateEmployee["phoneNumber"];
            if (isset($updateEmployee["avatar"])) $employee->avatar = $updateEmployee["avatar"];
        }
    }

    // Saving updated JSON on local file
    file_put_contents("../../resources/employees.json", json_encode($employeesJSON));

    header('Location: ../employee.php?employeeUpdated&id='.$updateEmployee["id"]);
}


function getEmployee(string $id)
{
    $employeesJSON = json_decode(file_get_contents("../resources/employees.json"));

    // Searching for the Employee by his ID and then return it
    foreach ($employeesJSON as $employee) {
        if ($employee->id == $id) {
            return json_encode($employee);
        }
    }
}


function removeAvatar($id)
{
    $employeesJSON = json_decode(file_get_contents("../../resources/employees.json"));

    // Searching for the Employee by his ID and then return it
    foreach ($employeesJSON as $employee) {
        if ($employee->id == $id) {
            unset($employee->avatar);
        }
    }

    file_put_contents("../../resources/employees.json", json_encode($employeesJSON));

    // Return imageGallery.php content to append on page and user choose new avatars
    return header('Location: ../imageGallery.php');
}


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
    $counter = 0;

    foreach ($employeesCollection as $key => $employee) {

        // If it's the last Employee and there's no gap between Employees IDs, then the new Employee receives the last Employee's ID added by one.
        if($counter ==count($employeesCollection) - 1){
            return $employee->id+1;
        }

        // If the ID number of the actual employee and the next one have difference greater than 1, the new Employee gets an ID of the actual Employee add by one.
        if($employee->id+1 != $employeesCollection[$key+1]->id){
            return $employee->id+1;
        }
    $counter = $counter+1;
    }
}

// Function to sort JSON file by Employee ID
function sortEmployeesById($employeesJSON) {
    function cmp($a, $b) {
        return strcmp($a->id, $b->id);
    }

    usort($employeesJSON, "cmp");
    return $employeesJSON;
}
