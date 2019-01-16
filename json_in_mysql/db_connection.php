<?php
// 1. Create a database connection

 $dbhost = "localhost";
 $dbuser = "webuser";
 $dbpass = "yoshio12qw";
 $dbname = "practicasql";
 $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 // Test if connection succeeded
 if(mysqli_connect_errno()) {
   die("Database connection failed yoshio: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
   );
 }

/*
//epizy
 $dbhost = "sql213.epizy.com";
 $dbuser = "epiz_22962861";
 $dbpass = "plaFeiEHW";
 $dbname = "epiz_22962861_receiving";
 $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 // Test if connection succeeded
 if(mysqli_connect_errno()) {
   die("Database connection failed yoshio: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
   );
 }


 //siteground
  $dbhost = "localhost";
  $dbuser = "cocotfym_user";
  $dbpass = "fiorella123";
  $dbname = "cocotfym_db";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed yoshio: " .
         mysqli_connect_error() .
         " (" . mysqli_connect_errno() . ")"
    );
  }
 */
?>
