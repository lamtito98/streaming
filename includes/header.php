<?php
      require_once("includes/db_config.php"); 
      require_once("includes/classes/PreviewVideo.php");
      require_once("includes/classes/Entity.php");

      if(!isset($_SESSION["user"]))
      {
        header("Location: login.php");
      }

      $user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style-index.css">
</head>
<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="index.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Logo</font></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Basculer la navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Home </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(actuel)</font></font></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="movies.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Movies</font></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="series.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Series</font></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contacts</font></font></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Search</font></font></button>
    </form>
    <!--
    <div class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary ml-4 my-sm-0" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sign in</font></font>
    </button>
    </div>
  -->

    <div class="d-flex justify-content-right my-2 my-lg-0">
        <ul class="list-group list-group-horizontal ml-4 my-sm-0">
          <li class="list-group-item bg-secondary "><a href="login.php">Sign in</a></li>
        </ul>
      </div>

  </div>
</nav>
</header>
