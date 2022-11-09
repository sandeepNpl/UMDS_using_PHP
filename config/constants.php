<?php

// Start the session 
session_start();
  //Create constants to store non Repeating values
  define('SITEURL','http://localhost/first-project/');
  define('LOCALHOST','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','medicine_system');
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD)or die (mysqli_error());
$db_select =mysqli_select_db($conn,DB_NAME);
?>