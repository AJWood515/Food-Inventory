<?php
include "PantryDatabaseInfo.php";

try {
  /* $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbName;", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/


   $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
   	or die ('Could not connect to the database server' . mysqli_connect_error());

   //$con->close();


   echo '<script> console.log("Connected successfully"); </script>';
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }
?>
