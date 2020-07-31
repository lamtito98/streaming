<?php 
require_once("includes/db_config.php");
require_once ("includes/classes/FormSanitizer.php");
require_once ("includes/classes/Constants.php");
require_once ("includes/classes/Account.php");

	$account = new Account($connection);

if (isset($_POST["register-submit"])) 
	{
		$firstname =FormSanitizer::sanitizeFormString($_POST["firstname"]);
		$lastname = FormSanitizer::sanitizeFormString($_POST["lastname"]);
		$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
		$email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
		$email2 = FormSanitizer::sanitizeFormEmail($_POST["confirm_email"]);
		$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
		$password2 = FormSanitizer::sanitizeFormPassword($_POST["confirm_password"]);
		
		$success = $account->register_user($firstname,$lastname,$username,$email,$email2,$password,$password2);

		if($success)
		{
			$_SESSION["user"] = $username;
			header("Location: index.php");
		}
	}

function getInputValue($name)
  {
    if(isset($_POST[$name]))
    {
      echo $_POST[$name];
    }
  }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 50%;
  }
  </style>
</head>
<body>
	<div class="form-signin">
		<form method="POST">
		  <fieldset>
		    <legend>Register</legend>
		    <div class="form-group">
		      <?php echo $account->getError(Constants::$firstNameErrorMessage) ; ?>
		      <input type="text" class="form-control" id="FirstName"  name="firstname" placeholder="First Name" value="<?php getInputValue("firstname");  ?>" required>
		    </div>
		    <div class="form-group">
		    	<?php echo $account->getError(Constants::$lastNameErrorMessage) ; ?>
		      <input type="text" class="form-control" id="lastName"  name="lastname" placeholder="Last Name" value="<?php getInputValue("lastname");  ?>" required>
		    </div>
		    <div class="form-group">
		    	<?php echo $account->getError(Constants::$userNameErrorMessage) ; ?>
		    	<?php echo $account->getError(Constants::$usernameExists);?>
		      <input type="text" class="form-control" id="username"  name="username" placeholder="Username" value="<?php getInputValue("username");  ?>" required>
		    </div>
		    <div class="form-group">
		    	<?php echo $account->getError(Constants::$emailsDontMatch);?>
		    	<?php echo $account->getError(Constants::$invalidEmail);?>
		    	<?php echo $account->getError(Constants::$emailExists);?>
		      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php getInputValue("email");  ?>" required>
		    </div>
		    <div class="form-group">
		      <input type="email" class="form-control" id="exampleInputEmail2" name="confirm_email" aria-describedby="emailHelp" placeholder="Confirm Enter email" value="<?php getInputValue("confirm_email"); ?>" required>
		    </div>
		    <div class="form-group">
		    	<?php echo $account->getError(Constants::$passwordsDontMatch);?>
		    	<?php echo $account->getError(Constants::$passwordErrorMessage);?>
		      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" value="<?php getInputValue("password");  ?>" required>
		    </div>
		    <div class="form-group">
		      <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password" placeholder="Confirm Password" value="<?php getInputValue("confirm_password");  ?>" required>
		    </div>
		    
		    <button type="submit" name="register-submit" class="btn btn-secondary">Register</button>
		  </fieldset>
		</form>
		<a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
	</div>
<?php include "includes/footer.php";  ?>