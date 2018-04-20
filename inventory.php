
<!DOCTYPE html>
<!-- needs refactoring -->
<html>
<?php
include "PHP_FoodPantryDatabase_Connection.php";
?>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16">
<title>Inventory</title>
</head>
<body>
<div id = "container">
<header>
<h1>Your Inventory</h1>
<div class="header">
</div>

<ul>
  <li><a href="home.html">Home</a></li>
  <li><a class="active">Inventory</a></li>
  <li><a href="CanIMakeThis.php">Can I make this Recipe?</a></li>
  <li><a href="listCalories.php">Calorie Counter</a></li>
  <li><a href="calendar.html">Calendar</a></li>
  <li><a href="contactUs.html">Contact Us</a></li>
</ul>

</header>
<aside>
<h2>Recipe of the week!</h2>
<p>Home made Hambugers</p>
<img src="images/PrepIcon.png" alt="Prep Logo" class="center">
</aside>
<main>
<p>
  <h3>Vegetables</h3>
  <table border='1'>
	   <tr>
		     <td>Name</td>
	       <td>Quantity</td>
         <td>Calories per Unit</td>
         <td>Quantity of Units per Cup</td>
         <td>Unit</td>
         <td>Ingredient Type</td>


  <?php
  //try{
    $query = "Select * from ingredients Where ingredientType = 'vegetable'";
  if ($stmt = $con->prepare($query)) {
      $stmt->execute();
      $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
      while ($stmt->fetch()) {
        echo "<tr>";
          echo "<td>".$name."</td>";
          echo "<td>".$quantity."</td>";
          echo "<td>".$caloriesPerUnit."</td>";
          echo "<td>".$quantityOfUnitsPerCup."</td>";
          echo "<td>".$unit."</td>";
          echo "<td>".$ingredients."</td>";
        echo "</tr>";
      }
      $stmt->close();
  }
  /*catch (PDOException $e){
    echo "Error: ". $e->getMessage();
  }*/
  $conn = null;
  ?>
</table>
</p>
<p>
<h3>Fruits</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'fruit'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Grain</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'grain'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Liquid</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'liquid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Dairy</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'dairy'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Protein</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'protein'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Miscellaneous</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'misc'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Spice</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'spice'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
<p>
<h3>Herbs</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'herb'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;
?>
</table>
</p>
</main>
<footer>
<p>This site was created for educational purposes only</p>
</footer>
</div><!-- end div container --->
</body>
</html>

<!DOCTYPE html>
<!-- needs refactoring -->
<html>
<?php
include "PHP_FoodPantryDatabase_Connection.php";


?>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16">
<title>Inventory</title>
</head>
<body>
<div id = "container">
<header>
<h1>Your Inventory</h1>
<div class="header">
</div>

<ul>
  <li><a href="home.html">Home</a></li>
  <li><a class="active">Inventory</a></li>
  <li><a href="listCalories.php">Calorie Counter</a></li>
</ul>

</header>
<aside>
<p>Hello</p>
</aside>
<main>
<p>
  <h3>Vegetables</h3>
  <table border='1'>
	   <tr>
		     <td>Name</td>
	       <td>Quantity</td>
         <td>Calories per Unit</td>
         <td>Quantity of Units per Cup</td>
         <td>Unit</td>
         <td>Ingredient Type</td>


  <?php
  //try{
    $query = "Select * from ingredients Where ingredientType = 'vegetable'";


  if ($stmt = $con->prepare($query)) {
      $stmt->execute();
      $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
      while ($stmt->fetch()) {
        echo "<tr>";
          echo "<td>".$name."</td>";
          echo "<td>".$quantity."</td>";
          echo "<td>".$caloriesPerUnit."</td>";
          echo "<td>".$quantityOfUnitsPerCup."</td>";
          echo "<td>".$unit."</td>";
          echo "<td>".$ingredients."</td>";

        echo "</tr>";
      }
      $stmt->close();
  }
  /*catch (PDOException $e){
    echo "Error: ". $e->getMessage();
  }*/
  $conn = null;

  ?>
</table>
</p>
<p>
<h3>Fruits</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'fruit'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Grain</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'grain'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Liquid</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'liquid'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Dairy</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'dairy'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Protein</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'protein'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Miscellaneous</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'misc'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Spice</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'spice'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
<p>
<h3>Herbs</h3>
<table border='1'>
   <tr>
       <td>Name</td>
       <td>Quantity</td>
       <td>Calories per Unit</td>
       <td>Quantity of Units per Cup</td>
       <td>Unit</td>
       <td>Ingredient Type</td>


<?php
//try{
  $query = "Select * from ingredients Where ingredientType = 'herb'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";

      echo "</tr>";
    }
    $stmt->close();
}
/*catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}*/
$conn = null;

?>
</table>
</p>
</main>
<footer>
<p>This site was created for educational purposes only</p>
</footer>
</div><!-- end div container --->
</body>
</html>

