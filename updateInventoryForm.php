<?php
session_start();
include "PHP_FoodPantryDatabase_Connection.php";

$ingName = $_SESSION['IngredientID'];
$quantity = 0;
$calories = 0;
$cups = 0;
$units = "";
$ingType = "";
$IngredientID = $ingName;

$ingNameErrMsg="";
$quantityErrMsg="";
$caloriesErrMsg="";
$cupsErrMsg="";
$unitsErrMsg="";
$typeErrMsg="";
$message="";
$validForm =false;

function validName(){
	global $ingName, $ingNameErrMsg, $vaildForm;
	if($ingName == ""){
		$ingNameErrMsg = "Name can not be empty.";
		$validForm = false;
	}

}
  function validQuantityNumber(){
  	global $quantity, $quantityErrMsg, $vaildForm;
  	if($quantity == 0){
  		$quantityErrMsg = "Quantity cant be zero.";
  		$validForm = false;
  	}
    if($quantity == ""){
  		$quantityErrMsg = "Quantity cant be empty.";
  		$validForm = false;
  	}
  }
    function validCaloriesNumber(){
    	global $calories, $caloriesErrMsg, $vaildForm;
    	if($calories == 0){
    		$caloriesErrMsg = "Calories per cup cant be zero.";
    		$validForm = false;
    	}
      if($calories == ""){
    		$caloriesErrMsg = "Calories per cup cant be empty.";
    		$validForm = false;
    	}
    }
    function validCupsNumber(){
    	global $cups, $cupsErrMsg, $vaildForm;
    	if($cups == 0){
    		$cupsErrMsg = "Units per cup cant be zero.";
    		$validForm = false;
    	}
      if($cups == ""){
    		$cupsErrMsg = "Units per cup cant be empty.";
    		$validForm = false;
    	}
    }
    function validUnits(){
  	global $units, $unitsErrMsg, $validForm;
  	if ($units == "") {
  		$unitsErrMsg = "Please select one of the options.";
  		$validForm = false;
  	}
  }
  function validType(){
  	global $ingType, $typeErrMsg, $validForm;
  	if ($ingType == "default") {
  		$typeErrMsg = "Please select one of the options.";
  		$validForm = false;
  	}
  }

  if( isset($_POST['submit']) )
  {
  	$ingName = $_SESSION['IngredientID'];
  	$quantity = $_POST['quantity'];
    $calories = $_POST['calories'];
    $cups = $_POST['cups'];
    $units = $_POST['unit'];
  	$ingType = $_POST['ingType'];
  	$validForm = true;

    validQuantityNumber();
    validCaloriesNumber();
    validCupsNumber();
    validUnits();
    validType();

    if($validForm){
      $query = $con->prepare("UPDATE ingredients SET name = ?, quantity = ?,
         caloriesPerUnit = ?, quantityOfUnitsPerCup = ?, unit = ?, ingredientType = ? WHERE name = ?");
      $query->bind_param('sdddsss', $IngredientID, $quantity, $calories, $cups, $units, $ingType, $IngredientID);
      $query->execute();
      $inserted = $query->affected_rows;

      if ($inserted >0){
        $_SESSION['message'] = "You have successfully updated the ingredient";
        header('Location: inventory.php');
      }
      else {
        $message = "Something went wrong";
      }
    }
  }
  else {

    $IngredientID =$_GET['ingredientID'];
    $_SESSION['IngredientID'] = $IngredientID;

    $query = $con-> prepare("SELECT * FROM ingredients Where name = ?");
    $query-> bind_param('s',$IngredientID);
    $query->bind_result($name, $quan, $cals, $quanCup, $unit, $ingredients);
    $query->execute();
    //print_r($query);
    while($results = $query->fetch()){
      $ingName = $name;
      $quantity = $quan;
      $calories = $cals;
      $cups = $quanCup;
      $units = $unit;
      $ingType = $ingredients;
    }
  }
?>
 <!DOCTYPE html>

 <html>
 <head>
 <link rel="stylesheet" href="PREP.css" type="text/css" />
 <link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16"/>
 <title>Update</title>
 </head>
 <body>
 <div id = "container">
 <header>
 <h1>Update Ingredient</h1>




 <div class="header">
 </div>

 <ul>
   <li><a href="home.html">Home</a></li>
   <li><a href="inventory.php">Inventory</a></li>
   <li><a class="active">Insert Ingredient</a></li>
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
 <img src="images/PrepIcon.png" alt="Prep Logo" class="center" width = "60%" />
 </aside>

 <main>
 <p>
   <div id = "newIngredient">
 <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?recId=$IngredientID"; ?>">
   <h3>Update Ingredient</h3>
   <h3> <?php echo $message ?></h3>

   <table width="587" border="0">
     <tr>
       <td width="117">Ingredient Name:</td>
       <td width="246"><?php echo $IngredientID; ?></td>
       <td width="210" class="error"><?php echo "$ingNameErrMsg";?></td>
     </tr>
     <tr>
       <td width="117">Quantity:</td>
       <td width="246"><input type="text" name="quantity" id="quantity" size="40" value="<?php echo $quantity; ?>" /></td>
       <td width="210" class="error"><?php echo "$quantityErrMsg";?></td>
     </tr>
     <tr>
       <td width="117">Calories per Unit:</td>
       <td width="246"><input type="text" name="calories" id="calories" size="40" value="<?php echo $calories; ?>" /></td>
       <td width="210" class="error"><?php echo "$caloriesErrMsg";?></td>
     </tr>
     <tr>
       <td width="117">Quantity of Units per Cup:</td>
       <td width="246"><input type="text" name="cups" id="cups" size="40" value="<?php echo $cups; ?>" /></td>
       <td width="210" class="error"><?php echo "$cupsErrMsg";?></td>
     </tr>
     <tr>
     <td>Unit of Measure:</td>
     <td><p>
       <label>
         <input type="radio" name="unit" id="RadioGroup1_0" value = "pieces" <?php if ($units == 'piece(s)'){echo "checked";} ?>>
         piece(s)</label>
       <br>
       <label>
         <input type="radio" name="unit" id="RadioGroup1_1" value = "cups" <?php if ($units == 'cup(s)'){echo "checked";} ?>>
         cup(s)</label>
       <br>
       <label>
         <input type="radio" name="unit" id="RadioGroup1_2" value = "pounds" <?php if ($units == 'pound(s)'){echo "checked";} ?>>
         pound(s)</label>
       <label><br/>
         <input type="radio" name="unit" id="RadioGroup1_3" value = "teaspoons" <?php if ($units == 'teaspoon(s)'){echo "checked";} ?>>
         teaspoons(s)</label>
       <label><br/>
         <input type="radio" name="unit" id="RadioGroup1_4" value = "tablespoons" <?php if ($units == 'tablespoon(s)'){echo "checked";} ?>>
         tablespoons(s)</label>
       <label><br/>
         <input type="radio" name="unit" id="RadioGroup1_6" value = "packets" <?php if ($units == 'packet(s)'){echo "checked";} ?>>
         packet(s)</label>
       <br/>
     </p></td>
     <td class="error"><?php echo "$unitsErrMsg"; ?></td>
   </tr>
     <tr>
       <td>Ingredient Type: </td>
       <td><p>
           <select name = "ingType" value = <?php echo $ingType?>>
             <option value ="default">Please Choose a Type</option>
             <option value="vegetable" <?php if ($ingType == 'vegetable'){echo "selected";}?>>Vegetable</option>
             <option value="fruit" <?php if ($ingType == 'fruit'){echo "selected";}?>>Fruits</option>
             <option value="grain" <?php if ($ingType == 'grain'){echo "selected";}?>>Grain</option>
             <option value="liquid" <?php if ($ingType == 'liquid'){echo "selected";}?>>Liquid</option>
             <option value="dairy" <?php if ($ingType == 'dairy'){echo "selected";}?>>Dairy</option>
             <option value="protein" <?php if ($ingType == 'protein'){echo "selected";}?>>Protein</option>
             <option value="misc" <?php if ($ingType == 'misc'){echo "selected";}?>>Miscellaneous</option>
             <option value="spice" <?php if ($ingType == 'spice'){echo "selected";}?>>Sice</option>
             <option value="herb" <?php if ($ingType == 'herb'){echo "selected";}?>>Herbs</option>
           </select>
       </p></td>
       <td class="error"><?php echo "$typeErrMsg"; ?></td>
     </tr>
   </table>


 </p>
   <p>
     <input type="submit" name="submit" id="button" value="Update" />
     <input type="button" name="button2" id="button2" value="Go Back" onclick="history.back()" />
 		<br/>

   </p>
 </form>
 </div>
 </main>
 <footer>
 <p>This site was created for educational purposes only</p>
 </footer>

 </body>

 </html>
