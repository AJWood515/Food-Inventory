<?php
session_start();
 include "PHP_FoodPantryDatabase_Connection.php";

$username = "";
$password = "";
$usernameErrMsg ="";
$passwordErrMsg = "";
$name ="";
$validForm = false;

function validateUsername(){
  global $username, $usernameErrMsg, $validForm;
  if($username == ""){
    $validForm = false;
    $usernameErrMsg = "Username can't be empty.";
  }

}
function validatePassword(){
  global $password, $passwordErrMsg, $validForm;
  if($password == ""){
    $validForm = false;
    $passwordErrMsg = "Password can't be empty.";
  }

}


if(isset($_POST['submit'])){

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $validForm = true;

  validateUsername();
  validatePassword();

  if($validForm){
    $query= $con -> prepare("SELECT * FROM users WHERE name = ?  AND password = ?");
    $query->bind_param('ss', $username, $password);
    $query -> execute();
    $query->bind_result($name, $pass);
    $inserted = $query->affected_rows;
    $result = $query->fetch();



    if($username == $name){
      $_SESSION['message'] = "Welcome user.";
      $_SESSION['user'] = true;
      header('Location: inventory.php');
    }
    else {

    $_SESSION['message'] = "Sorry you are not a user. Please sign up.</h3>";
    header("Location: signUp.php");
    }
    if($password == $pass){
      $_SESSION['message'] = "Welcome user.";
      $_SESSION['user'] = true;
      header('Location: inventory.php');
    }
    else {

    $_SESSION['message'] = "Sorry you are not a user. Please sign up.</h3>";
    header("Location: signUp.php");
    }
  }

  }




?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="PREP.css" type="text/css" />
<link rel="icon" href="images/PrepIcon.png" type="image/gif" sizes="16x16">
</head>
<body>
<div id = "container">
<header>
<h1>Sign In</h1>
<div class="header">
</div>

<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="inventory.php">Inventory</a></li>
  <li><a href="Insert.php">Insert Ingredient</a></li>
  <li><a href="CanIMakeThis.php">Can I make this Recipe?</a></li>
  <li><a href="listCalories.php">Calorie Counter</a></li>
  <li><a href="calendar.html">Calendar</a></li>
  <li><a href="contactUs.html">Contact Us</a></li>
  <li><a class="active" href="signIn.php">Sign In</a></li>
  <li><a href="signUp.php">Sign Up</a></li>
</ul>

</header>

<form id="form1" name="form1" method="post" action="signIn.php">
<p>
  User name:<br>
    <input type="textbox" name="username" value="<?php echo $username ?>"><?php echo $usernameErrMsg ?><br>
    User password:<br>
    <input type="password" name="password"><?php echo $passwordErrMsg ?>
</p>
<p>
  <input type="submit" name="submit" id="button" value="Sign In" />
  <input type="reset" name="button2" id="button2" value="Reset" />
  <br/>
</p>
</form>
</body>

</html>
