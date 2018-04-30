<?php
session_start();
 include "PHP_FoodPantryDatabase_Connection.php";
$con=null;
session_destroy();

header("Location: inventory.php")

?>
