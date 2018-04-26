<?php
session_start();

$IngredientID = $_GET['ingredientID'];
include "PHP_FoodPantryDatabase_Connection.php";

$stmt = $con->prepare("DELETE FROM ingredients WHERE name = ? ");
$stmt -> bind_param('s', $IngredientID);
$stmt -> execute();
$deleted = $stmt->affected_rows;
 $_SESSION['message'] = "Row Deleted.";


$con = null;

header('Location: inventory.php');

?>
