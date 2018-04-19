
<!Doctype html>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16">
<title>Calorie Counter</title>
</head>
<body>
<div id = "container">
<header>
<h1>Calorie Counter</h1>
<div class="header">
</div>

<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="inventory.php">Inventory</a></li>
  <li><a class="active">Calorie Counter</a></li>

  <li><a href="calendar.html">Calendar</a></li>
  <li><a href="contactUs.html">Contact Us</a></li>

</ul>

</header>
<aside>

<h2>Recipe of the week!</h2>
<p>Home made Hambugers</p>
<img src="images/prepIcon.png" alt="Prep Logo" class="center">

<p>Hello</p>

</aside>
<main>
<p>
<?php
include "PHP_FoodPantryDatabase_Connection.php";

try {
    $query = "Select * from ingredients";
    /*
     * in the recipe query 'amount' is the cookie recipe version of quantity
     * I changed the column name to more easily use the search statement in php
     */
    $recipeQuery = "Select ingredientName,  amount , quantity , unit, caloriesPerUnit, unitName
                    from testRecipe cr, ingredients i
                    where cr.ingredientName = i.name
                    ;";
    $calorieQuery = "Select ingredientName,  amount , quantity , unit, caloriesPerUnit, unitName
                    from breadRecipe cr, ingredients i
                    where cr.ingredientName = i.name
                    ;";
    $calPerCup;
    $totalCalories = 0;

    ?>

<?php


    /*
     * This function checks to see if the ingredients are the same unit type, if the recipe calls for 1 tsp of salt, but salt is stored as cups
     * this function will alter the measurement
     */
    function checkMeasurements($unitName, $unit, $quantityOfUnitsPerCup)
    {
        $adjuster = 1;
        if ($unitName == $unit) {


            $adjuster = 1;
            // there is no conversion needed
        } else if ($unitName == 'tablespoon(s)' && $unit == 'cup(s)') {


            $adjuster = 0.625;
            // if the recipe calls for 1 tablespoon but the ingredient is stored as cups this converts tablespoon to cups
            // one tablespoon is .625 cups
        } else if ($unitName == 'tablespoon(s)' && $unit == 'teaspoon(s)') {

            $adjuster = 3;
            // if the recipe calls for 1 tablespoon but the ingredient is stored as teaspoon this converts tablespoon to teaspoons
            // one tablespoon is 3 teaspoons
        } else if ($unitName == 'tablespoon(s)' && $unit == 'piece(s)') {

            $adjuster = ($quantityOfUnitsPerCup / 16);
        } else if ($unitName == 'cup(s)' && $unit == 'teaspoon(s)') {

            $adjuster = 48;
            // if the recipe calls for 1 cup but the ingredient is stored as teaspoon this converts cup to teaspoons
            // one tablespoon is 48 teaspoons
        } else if ($unitName == 'cup(s)' && $unit == 'tablespoon(s)') {

            $adjuster = 16;
            // if the recipe calls for 1 cup but the ingredient is stored as tablespoon this converts cup to tablespoons
            // one tablespoon is 16 teaspoons
        } else if ($unitName == 'cup(s)' && $unit == 'piece(s)') {

            $adjuster = $quantityOfUnitsPerCup;
            // if the recipe calls for 1 cup of carrots the adjuster will pull 2 carrots out of the inventory because
            // quantityOfItemPerCup is 2
        } else if ($unitName == 'teaspoon(s)' && $unit == 'cup(s)') {

            $adjuster = 0.02083;
            // if the recipe calls for 1 teaspoon but the ingredient is stored as cups this converts teaspoon to cups
            // one teaspoon is 0.02083 cups
        } else if ($unitName == 'teaspoon(s)' && $unit == 'tablespoon(s)') {

            $adjuster = 0.33;
            // if the recipe calls for 1 teaspoon but the ingredient is stored as tablespoons this converts teaspoon to tablespoons
            // one teaspoon is 0.33 tablespoons
        } else if ($unitName == 'teaspoon(s)' && $unit == 'piece(s)') {

            $adjuster = ($quantityOfUnitsPerCup / 48);
        } else if ($unitName == 'cup(s)' && $unit == 'pound(s)') {

            $adjuster = .3;
        } else {
            echo "beep boop something went wrong.<br>";
        }
        return $adjuster;
    }

    echo "This section of php will compare a recipe table to the ingredients table to see if the recipe can be made.<br>
if it cant be made, it tells you what ingredients you need.<br><br>
In this case, a cookie recipe that we have enough ingredients for.<br><br>
if we didnt have all the ingredients it would tell you how much of each ingredient you need<br><br>";
    /* this should compare the recipe table to the ingredients list table */
    $belowZero = 0;
    if ($stmt = $con->prepare($recipeQuery)) {
        $stmt->execute();
        $stmt->bind_result($ingredientName, $amount, $quantity, $unit, $caloriesPerUnit, $unitName);

        while ($stmt->fetch()) {

            echo $amount . "<br>";
            $adjuster = checkMeasurements($unitName, $unit, $quantityOfUnitsPerCup); // this function makes sure recipe and ingredients table use the same measurements
            $amount = $adjuster * $amount; // this statement will convert the recipe as needed to be compatible with the inventory table
            echo $amount . "<br>";

            $needMoreInventory = $quantity - $amount; // to see in it would drop inventory below 0
            //$belowZero = 0;
            if ($needMoreInventory < 0) {
                $belowZero --;

                // this is some hamfisted math to turn negative numbers positive
                $needMoreInventory = $needMoreInventory - $needMoreInventory - $needMoreInventory;

                echo "You need " . $needMoreInventory . " more " . $unit . " of " . $ingredientName . " " . "<br>";
            } else {
                // Adding each items calories to the totalcalories variable
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

            echo $quantity . " " . $unit . " of " . $name . " has about " . $caloriesPerUnit . " calories " . "<br>";
            echo "There are approximately " . $calPerCup . " Calories per cup of " . $name . " " . "<br>" . "<br>";
        }
        $stmt->close();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

</p>
</main>
<footer>
<p>This site was created for educational purposes only</p>
</footer>
</div><!-- end div container --->
</body>
</html>

