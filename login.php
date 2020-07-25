<?php
  
require_once("includes/db_config.php");
require_once ("includes/classes/FormSanitizer.php");
require_once ("includes/classes/Constants.php");
require_once ("includes/classes/Account.php");

  $account = new Account($connection);

  if(isset($_POST["signin"]))
  {
    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    
    $success = $account->login_user($username,$password);

    if($success)
    {
      $_SESSION["user"] = $username;
      header("Location: index.php");
    }

  }






?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign in</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

</head>

<body class="sign-in" >
	<form class="form-signin" method="POST">
  <img class="mb-4" src="img/logo_officiel.jpg" alt="logo" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <?php echo $account->getError(Constants::$loginFailed);?>
  <?php echo $account->getError(Constants::$notRegister);?>
  <input type="text" name="username" id="email" tabindex="1" class="form-control" placeholder="Username" required autofocus>
  <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-2">
    <label>
      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
	<label for="remember"> Remember me</label>
  </div>
  <p class=" mb-1 text-center"><a href="register.php">Don't have an account?Create one.</p>
  <button type="submit" name="signin" class="btn btn-lg btn-secondary">Sign in</button>
  <p class="mt-1 mb-1 text-muted justify-content-center"><a href="recover.php">Forgot password?</p>
</form>
</body>
</html>
