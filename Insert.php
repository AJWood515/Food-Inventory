
<?php
session_start();
$user = $_SESSION['user'];
if(!$user){
	header("Location: signIn.php");
}

include "PHP_FoodPantryDatabase_Connection.php";

$ingName = "";
$quantity = 0;
$calories = 0;
$cups = 0;
$units = "";
$ingType = "";

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
  elseif(!preg_match("/^[a-zA-Z]+$/", $ingName)){
    $ingNameErrMsg = "Name can not have any special characters or numbers.";
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
  		$radioErrMsg = "Please select one of the options.";
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
	$ingName = trim($_POST['ingName']);
	$quantity = $_POST['quantity'];
  $calories = $_POST['calories'];
  $cups = $_POST['cups'];
  $units = $_POST['unit'];
	$ingType = $_POST['ingType'];
	$validForm = true;

  validName();
  validQuantityNumber();
  validCaloriesNumber();
  validCupsNumber();
  validUnits();
  validType();

  if($validForm){
    $query = $con->prepare("INSERT INTO ingredients (name, quantity, caloriesPerUnit, quantityOfUnitsPerCup, unit, ingredientType)
    VALUES (?,?,?,?,?,?)");
    $query->bind_param('sdddss', $ingName, $quantity, $calories, $cups, $units, $ingType);
    $query->execute();
    $inserted = $query->affected_rows;

    if ($inserted >0){
      $message = "You have successfully inserted the ingredient";
    }
    else {
      $message = "Something went wrong";
    }
  }
}
?>
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16"/>
<title>Insert</title>
</head>
<body>
<div id = "container">
<header>
<h1>Insert Ingredient</h1>




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
<form id="form1" name="form1" method="post" action="Insert.php">
  <h3>New Ingredient</h3>
  <h3> <?php echo $message ?></h3>

  <table width="587" border="0">
    <tr>
      <td width="117">Ingredient Name:</td>
      <td width="246"><input type="text" name="ingName" id="ingName" size="40" value="<?php echo $ingName; ?>" /></td>
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
        <input type="radio" name="unit" id="RadioGroup1_0" value = "pieces" <?php if ($units == 'pieces'){echo 'checked = "checked"';} ?>>
        piece(s)</label>
      <br>
      <label>
        <input type="radio" name="unit" id="RadioGroup1_1" value = "cups" <?php if ($units == 'cups'){echo 'checked = "checked"';} ?>>
        cup(s)</label>
      <br>
      <label>
        <input type="radio" name="unit" id="RadioGroup1_2" value = "pounds" <?php if ($units == 'pounds'){echo 'checked = "checked"';} ?>>
        pound(s)</label>
      <label><br/>
        <input type="radio" name="unit" id="RadioGroup1_3" value = "teaspoons" <?php if ($units == 'teaspoons'){echo 'checked = "checked"';} ?>>
        teaspoons(s)</label>
      <label><br/>
        <input type="radio" name="unit" id="RadioGroup1_4" value = "tablespoons" <?php if ($units == 'tablespoons'){echo 'checked = "checked"';} ?>>
        tablespoons(s)</label>
      <label><br/>
        <input type="radio" name="unit" id="RadioGroup1_6" value = "packets" <?php if ($units == 'packets'){echo 'checked = "checked"';} ?>>
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
            <option value="vegetable">Vegetable</option>
            <option value="fruit">Fruits</option>
            <option value="grain">Grain</option>
            <option value="liquid">Liquid</option>
            <option value="dairy">Dairy</option>
            <option value="protein">Protein</option>
            <option value="misc">Miscellaneous</option>
            <option value="spice">Sice</option>
            <option value="herb">Herbs</option>
          </select>
      </p></td>
      <td class="error"><?php echo "$typeErrMsg"; ?></td>
    </tr>
  </table>


</p>
  <p>
    <input type="submit" name="submit" id="button" value="Insert" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
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
