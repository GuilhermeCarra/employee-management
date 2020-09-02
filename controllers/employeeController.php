<?php
require LIBS . 'classes/controller.php';
require MODELS . 'employeeManager.php';

class employeeController extends Controller {
   function __construct(){
      parent::__construct();
   }

   function getEmployeesCont() {

       $employees = getEmployees();

       if($employees) require_once VIEWS . "employees/dashboard.php";

       return $employees;

   }

   function getEmployeeCont($request){
      $employee = getEmployee($request["id"]);
      return $employee;
   }

   function addEmployeeAjax () {
       echo addEmployee($_POST['newEmployee']);
   }

   function deleteEmployeeAjax () {
       parse_str(file_get_contents("php://input"), $_DELETE);
       deleteEmployee($_DELETE['deleteId']);
   }

   function updateEmployeeCont ($request) {
      echo updateEmployee($request['id'], $request);
   }

   function addEditEmployee(){
      $getId = isset($_REQUEST["id"]);
      $employee = false;
      if($getId){
         $employee = getEmployeeCont($_REQUEST);
      }
      require_once VIEWS . "employees/employee.php";
   }
}
?>