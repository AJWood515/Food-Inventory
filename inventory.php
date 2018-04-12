<!DOCTYPE html>
<html>
<?php
include "PHP_FoodPantryDatabase_Connection.php";


?>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16">
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
</ul>

</header>
<aside>
<p>Hello</p>
</aside>
<main>
<p>
  <table border='1'>
	   <tr>
		     <td>Name</td>
	       <td>Quantity</td>
         <td>Calories per Unit</td>
         <td>Quantity of Units per Cup</td>
         <td>Unit</td>
         <td>Ingredient</td>


  <?php
  //try{
    $query = "Select * from ingredients";


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
