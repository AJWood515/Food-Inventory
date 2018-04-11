
<!Doctype html>

<?php
include "PHP_FoodPantryDatabase_Connection.php";

try {
    $query = "Select * from ingredients";
    /*
     * in the recipe query 'amount' is the cookie recipe version of quantity
     * I changed the column name to more easily use the search statement in php
     */
    $recipeQuery = "Select ingredientName,  amount , quantity , unit, caloriesPerUnit
                    from cookieRecipe cr, ingredients i
                    where cr.ingredientName = i.name
                    ;";
    $calorieQuery = "Select ingredientName,  amount , quantity , unit, caloriesPerUnit
                    from cookieRecipe cr, ingredients i
                    where cr.ingredientName = i.name
                    ;";
    $calPerCup;
    $totalCalories = 0;
    
    ?>
<?php
    echo "This section of php will compare a recipe table to the ingredients table to see if the recipe can be made.<br>
if it cant be made, it tells you what ingredients you need.<br><br>
In this case, a cookie recipe that we have enough ingredients for.<br><br>
if we didnt have all the ingredients it would tell you how much of each ingredient you need<br><br>";
    /* this should compare the recipe table to the ingredients list table */
    if ($stmt = $con->prepare($recipeQuery)) {
        $stmt->execute();
        $stmt->bind_result($ingredientName, $amount, $quantity, $unit, $caloriesPerUnit);
        
        while ($stmt->fetch()) {
            $needMoreInventory = $quantity - $amount; // to see in it would drop inventory below 0
            $belowZero = 0;
            if ($needMoreInventory < 0) {
                $belowZero --;
                
                // this is some hamfisted math to turn negative numbers positive
                $needMoreInventory = $needMoreInventory - $needMoreInventory - $needMoreInventory;
                
                echo  "You need " . $needMoreInventory . " more " . $unit . " of " . $ingredientName . " " . "<br>";
            } else {
                //Adding each items calories to the totalcalories variable
                $totalCalories = $totalCalories + ($amount * $caloriesPerUnit);
            }
        }
        $stmt->close();
    }
    if ($belowZero < 0) {
        echo "You need to purchase the listed ingredients before you can make this recipe<br>";
    } else {
        echo "You can make this recipe<br>";
        echo "There are a total of " . $totalCalories . " calories in this recipe.<br>";
    }
    ?>



<?php
    /* This loop lists out how many calories are in each ingredient in the provided ingredient table */
    
    /* I hope to be able to compare this table called calorieTable to a recipe and calculate total calories */
    echo "------------------------------------------------------------------";
    echo "<br> This section of PHP goes into the ingredients list <br> Then tells you 
how many calories are in each Item. <br> it will also tell you how many calories there are per cup. <br> <br>";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($name, $quantity, $caloriesPerUnit, $quantityOfUnitsPerCup, $unit, $ingredientType);
        while ($stmt->fetch()) {
          
            
            $calPerCup = $caloriesPerUnit * $quantityOfUnitsPerCup;
            
            echo  $quantity . " " . $unit . " of " . $name . " has about " . $caloriesPerUnit . " calories " . "<br>" ;
            echo  "There are approximately " . $calPerCup . " Calories per cup of " . $name . " " . "<br>" . "<br>" ;
        }
        $stmt->close();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

