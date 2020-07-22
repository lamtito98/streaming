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

<body class="sign-in">
	<form class="form-signin">
  <img class="mb-4" src="img/logo_officiel.jpg" alt="logo" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="email" class="sr-only">Email address</label>
  <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required autofocus>

  <label for="login-Password" class="sr-only">Password</label>
  <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-2">
    <label>
      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
	<label for="remember"> Remember me</label>
  </div>
  <p class=" mb-1 mb-3 text-center"><a href="register.php">Don't have an account?Create one.</p>
  <input input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-lg btn-secondary btn-block" value="Log In">
  <p class="mt-1 mb-1 text-muted justify-content-center"><a href="recover.php">Forgot password?</p>
</form>
</body>
</html>