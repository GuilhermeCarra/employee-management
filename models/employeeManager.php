<?php

require_once LIBS . 'classes/model.php';

class employeeModel extends Model {

   function __construct(){
         parent::__construct();
   }

   function addEmployee(array $newEmployee)  {
      require_once 'libs/database.php';

      $conn = connectDatabase();

      $stmt = $conn->prepare("INSERT INTO employees (name,email,age,city,phoneNumber,postalCode,state,streetAddress) VALUES ('" . $newEmployee['name'] . "', '" . $newEmployee['email'] . "', " . $newEmployee['age'] . ", '" . $newEmployee['city'] . "',  '" . $newEmployee['phoneNumber'] ."', " .  $newEmployee['postalCode'] .", '" . $newEmployee['state'] . "', '" . $newEmployee['streetAddress'] . "')");

      if ($stmt->execute()) {
         $stmt = $conn->prepare("SELECT * FROM employees WHERE name='". $newEmployee['name'] ."' AND email='" .$newEmployee['email'] ."' LIMIT 1 " );
         $stmt->execute();

         if($stmt->rowCount()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result);
         }
      } else {
         return 'Error: Could not create employee. Please, try again later.';
      }
   }

   function getEmployees() {
      require_once 'libs/database.php';
      $conn = connectDatabase();
      $stmt = $conn->prepare("SELECT * FROM employees");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      return json_encode($result);
   }

   function deleteEmployee(string $id) {
      require_once 'libs/database.php';

      $conn = connectDatabase();

      $stmt = $conn->prepare("DELETE FROM employees WHERE id=". $id);
      if($stmt->execute()){
         return 'Success deleting employee!';
      } else {
         return 'Error: Employee could not be deleted. Please, try again later.';
      };
   }

   function getEmployee(string $id) {
      require_once 'libs/database.php';

      $conn = connectDatabase();
      $stmt = $conn->prepare("SELECT * FROM employees WHERE id=". $id . " LIMIT 1");
      if ($stmt->execute() && $stmt->rowCount()) {
         $result = $stmt->fetch(PDO::FETCH_OBJ);
         return $result;
      };
   }

   function updateEmployee($id, $nEmployee){
      require_once 'libs/database.php';

      $conn = connectDatabase();

      if($id !== "") {
         $stmt = $conn->prepare("UPDATE employees SET name = '"
         . $nEmployee['name'] . "', lastName = '"
         . $nEmployee['lastName'] . "', age = "
         . $nEmployee['age'] . ", city='"
         . $nEmployee['city'] . "', email='"
         . $nEmployee['email'] . "', gender='"
         . $nEmployee['gender'] . "', phoneNumber='"
         . $nEmployee['phoneNumber'] . "', postalCode="
         . $nEmployee['postalCode'] . ", state='"
         . $nEmployee['state'] . "', streetAddress='"
         . $nEmployee['streetAddress'] . "', img='"
         . $nEmployee['img']
         ."' WHERE id=" . $id);

         $stmt->execute();
         return 'modified';
      } else {
         $stmt = $conn->prepare("INSERT INTO employees (name,lastName,age,city,email,gender,phoneNumber,postalCode,state,streetAddress,img) VALUES ('"
         . $nEmployee['name'] . "','"
         . $nEmployee['lastName'] . "',"
         . $nEmployee['age'] . ",'"
         . $nEmployee['city'] . "','"
         . $nEmployee['email'] . "','"
         . $nEmployee['gender'] . "','"
         . $nEmployee['phoneNumber'] . "',"
         . $nEmployee['postalCode'] . ",'"
         . $nEmployee['state'] . "','"
         . $nEmployee['streetAddress'] . "','"
         . $nEmployee['img'] ."')");

         if ($stmt->execute()) {
            $stmt = $conn->prepare("SELECT id FROM employees WHERE name='". $nEmployee['name'] ."' AND email='" .$nEmployee['email'] ."' LIMIT 1 " );
            $stmt->execute();

            if($stmt->rowCount()) {
               $result = $stmt->fetch();
               return $result['id'];
            }
         }
      }
   }

   function getNextIdentifier(array $employeesCollection): int {
   $nextId = $employeesCollection[count($employeesCollection)-1]->id + 1;
   return $nextId;
   }
}