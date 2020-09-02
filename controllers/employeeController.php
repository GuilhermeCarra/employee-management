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
      $url = explode('/', $_GET['url']);
      $getId = isset($url[2]);
      $employee = false;
      if($getId){
         $employee = getEmployee($url[2]);
      }
      require_once VIEWS . "employees/employee.php";
   }
}
?>