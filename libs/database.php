<?php

require "config/ddbb.php";

function connectDatabase()
{
   $conn = new PDO("mysql:host=" . HOST . ";", USER, PASSWORD);

   if ($conn && $conn->query("USE employeesv3")) {
      return $conn;
   } else 
   if ($conn && !$conn->query("USE employeesv3")) {
      $query = file_get_contents("config/init.sql");
      $conn->exec($query);
      return $conn;
   } else {
   }
}
