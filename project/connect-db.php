<?php

/** F22, PHP (on GCP, local XAMPP, or CS server) connect to MySQL (on CS server) **/
$username = 'username';
$password = 'password';
$host = 'mysql01.cs.virginia.edu';
$dbname = 'dbname';
$dsn = "mysql:host=$host;dbname=$dbname";


/** connect to the database **/
try
{
//  $db = new PDO("mysql:host=$hostname;dbname=db-demo", $username, $password);
   $db = new PDO($dsn, $username, $password);

   // dispaly a message to let us know that we are connected to the database
   echo "<script>console.log('You are connected to the database --- host=$host');</script>";
   // echo "<script>console.log('database=$db');</script>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message
   $error_message = $e->getMessage();
   echo "<script>console.log('An error occurred while connecting to the database: $error_message' );</script>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<script>console.log('An error occurred: $error_message' );</script>";
}