<!DOCTYPE html>
<!-- needs refactoring -->
<html>
<?php
session_start();
// user function for update and delete
include "PHP_FoodPantryDatabase_Connection.php";
$user = $_SESSION['user'];
$message = $_SESSION['message'];

  function htmlTable(){
    global $user;
    echo"<table border='1'>
  	   <tr>
  		     <td>Name</td>
  	       <td>Quantity</td>
           <td>Calories per Unit</td>
           <td>Quantity of Units per Cup</td>
           <td>Unit</td>
           <td>Ingredient Type</td>";
           if($user){
             echo"
             <td>UPDATE</td>
		         <td>DELETE</td>";
           }

  }

  function ingredientTable(){
      global $user, $name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients;
      echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$caloriesPerUnit."</td>";
        echo "<td>".$quantityOfUnitsPerCup."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$ingredients."</td>";
        if($user){
          echo "<td><a href='updateInventoryForm.php?ingredientID=" . $name . "'>Update</a></td>";
          echo "<td><a href='deleteInventory.php?ingredientID=" . $name . "'>Delete</a></td>";
        }
        echo "</tr>";
    }

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
  <li><a href="Insert.php">Insert Ingredient</a></li>
  <li><a href="CanIMakeThis.php">Can I make this Recipe?</a></li>
  <li><a href="listCalories.php">Calorie Counter</a></li>
  <li><a href="calendar.html">Calendar</a></li>
  <li><a href="contactUs.html">Contact Us</a></li>
  <li><a href="signIn.php">Sign In</a></li>
  <li><a href="signUp.php">Sign Up</a></li>
</ul>

</header>
<aside>
<h2>Recipe of the week!</h2>
<p>Home made Hambugers</p>
<img src="images/PrepIcon.png" alt="Prep Logo" class="center" width = "60%"/>
</aside>
<main>
<p>
  <?php echo "<h2> $message </h2>" ?>
  <h3>Vegetables</h3>
  <?php
    htmlTable();
    $query = "Select * from ingredients Where ingredientType = 'vegetable'";
  if ($stmt = $con->prepare($query)) {
      $stmt->execute();
      $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
      while ($stmt->fetch()) {
        ingredientTable();
      }
      $stmt->close();
  }
  ?>
</table>
</p>
<p>
<h3>Fruits</h3>
<?php
  htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'fruit'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Grain</h3>
<?php
  htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'grain'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Liquid</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'liquid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Dairy</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'dairy'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Protein</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'protein'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Miscellaneous</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'misc'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Spice</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'spice'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
?>
</table>
</p>
<p>
<h3>Herbs</h3>
<?php
htmlTable();
  $query = "Select * from ingredients Where ingredientType = 'herb'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredients);
    while ($stmt->fetch()) {
      ingredientTable();
    }
    $stmt->close();
}
$con = null;
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
