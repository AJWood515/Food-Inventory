<?php
// Starting session
session_start();

?>
<!Doctype html>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif"
	sizes="16x16">
<title>Calorie Counter</title>
</head>
<body>
	<div id="container">
		<header>
			<h1>Calorie Counter</h1>
			<div class="header"></div>

			<ul>
				<li><a href="home.html">Home</a></li>
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="Insert.php">Insert Ingredient</a></li>
				<li><a href="CanIMakeThis.php">Can I make this Recipe?</a></li>
				<li><a href="listCalories.php">Calorie Counter</a></li>
				<li><a href="calendar.html">Calendar</a></li>
				<li><a href="contactUs.html">Contact Us</a></li>
			</ul>

		</header>
		<aside>
			<h2>Recipe of the week!</h2>
			<p>Home made cookies!</p>
			<img src="images/PrepIcon.png" alt="Prep Logo" class="center"
				width="60%" />

			<p>Hello</p>
		</aside>
		<main>
		<form id="form2" name="form2" method="post" action="recipes.php">
			<h3>Choose A Recipe</h3>
			<table>
				<tr>
					<td>Fresh Green Salad Recipe:</td>
					<td><p>
						
						<ul>
							<li><a href="recipes.php">Cookie Recipe</a></li>
							<li><a href="breadRecipe.php">Bread Recipe</a></li>
							<li><a href="garlicChickenRecipe.php">Garlic Chicken</a></li>
							<li><a href="cakeRecipe.php">Cake</a></li>
							<li><a href="greenSaladRecipe.php">Green Salad</a></li>
						</ul>

						</form>
						<p>
    		
    <?php
    include "PHP_FoodPantryDatabase_Connection.php";
    
    try {
        
        $recipeQuery = "Select ingredientName,  amount , quantity , unit, caloriesPerUnit, unitName
                    from greenSaladRecipe cr, ingredients i
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
                
                $adjuster = 0.0625;
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
                
                $adjuster = 0.021;
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
        
        echo "Select a Recipe to see its caloric content.<br><br>";
        
        if ($stmt = $con->prepare($recipeQuery)) {
            $stmt->execute();
            $stmt->bind_result($ingredientName, $amount, $quantity, $unit, $caloriesPerUnit, $unitName);
            
            while ($stmt->fetch()) {
                
                $adjuster = checkMeasurements($unitName, $unit, $quantityOfUnitsPerCup); // this function makes sure recipe and ingredients table use the same measurements
                                                                                         // $amount = $adjuster * $amount; // this statement will convert the recipe as needed to be compatible with the inventory table
                $caloriesPerUnit = $adjuster * $caloriesPerUnit; // this statement will adjust the calories to match their measurement units
                
                $calories = $amount * $caloriesPerUnit;
                $formattedCalories = number_format($calories, 2);
                echo $amount . " " . $unitName . " of " . $ingredientName . "  " . $formattedCalories . " calories" . "<br>";
                
                $totalCalories = $totalCalories + ($amount * $caloriesPerUnit);
            }
            
            $stmt->close();
            $formattedTotalCalories = number_format($totalCalories, 2);
            echo "<br>" . "There are a total of " . $formattedTotalCalories . " calories in this recipe.<br>";
        }
        ?>



<?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>


		</p> </main> <footer>
							<p>This site was created for educational purposes only</p>
						</footer>
						</div> <!-- end div container --->

</body>
</html>