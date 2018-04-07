<!Doctype html>

<?php
include "PHP_FoodPantryDatabase_Connection.php";

try{
$query = "Select * from vegetables";
//$result = $con->query($stmt);

?>
<table border='1'>
	<tr>
		<td>ID</td>
		<td>Vegetable</td>
		<td>Stock</td>

<?php

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($veggieID, $veggieName,$veggieStock);
    while ($stmt->fetch()) {
      echo "<tr>";
        echo "<td>".$veggieID."</td>";
        echo "<td>".$veggieName."</td>";
        echo "<td>".$veggieStock."</td>";
      echo "</tr>";
    }
    $stmt->close();
}
/*
  while($result = $stmt-> fetchall()) {
    echo "<tr>";
      echo "<td>".$result['veggieID']."</td>";
      echo "<td>".$result['name']."</td>";
      echo "<td>".$result['Stock']."</td>";
    echo "</tr>";
  }
*/
}
catch (PDOException $e){
  echo "Error: ". $e->getMessage();
}
$conn = null;
?>


<!--

$query = "Select * from vegetables";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
    }
    $stmt->close();
}
*/
-->
</html>
