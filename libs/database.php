<?php

require "config/ddbb.php";

function connectDatabase()
{
   $conn = new PDO("mysql:host=" . HOST . ";", USER, PASSWORD);

   // Query to use employeev4 database
   if ($conn && $conn->query("USE employeesv4")) {
      return $conn;
   } else
   // If there's no employeev4 database, execute init.sql query to create it
   if ($conn && !$conn->query("USE employeesv4")) {
      $query = file_get_contents("config/init.sql");
      $conn->exec($query);
      return $conn;
   }
}
