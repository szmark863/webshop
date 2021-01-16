<?php 
session_start();
if (isset($_SESSION["rendelesid"]))
{

}
else
{
  $_SESSION["rendelesid"] = session_create_id(time());
}
?>
<?php require("db.php")?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Webshop</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link href="css/all.css" rel="stylesheet">
</head>
<body>

<?php

/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/

  if (isset($_SESSION["username"]))
  {
      print '<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="index.php">Webshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <h6 style="color:white;">Bejelentkezve mint: ' . $_SESSION["username"] . '</h6>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
    <li class="nav-item active">
        <a class="btn btn-danger" style="margin-right: 5px;" href="index.php"><i class="fas fa-home"></i></i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="btn btn-danger" style="margin-right: 5px;" href="index.php?page=kosar"><i class="fas fa-shopping-cart"></i></a>
    </li>
    <li class="nav-item active">
      <a class="btn btn-danger" style="margin-right: 5px;" href="index.php?page=rendelhistory"><i class="fas fa-history"></i></a>
    </li>
      <li class="nav-item">
        <form method="POST" action="logout.inc.php">
        <button type="submit" name="submit" class="btn btn-danger button-submit"><i class="fas fa-sign-out-alt"></i> Kijelentkezés</button>
      </form>
      </li>
    </ul>
</div>
</nav></br>';
    }
  else
  {
    print '<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="index.php">Webshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="btn btn-danger" style="margin-top: 3px;margin-right: 5px;" href="index.php"><i class="fa fa-home"></i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="btn btn-danger" style="margin-top: 3px;margin-right: 5px;" href="index.php?page=kosar"><i class="fas fa-shopping-cart"></i></a>
    </li>
      <li class="nav-item">
        <a class="btn btn-danger" style="margin-top: 3px;margin-right: 5px;" href="index.php?page=signup"><i class="fa fa-user-plus"></i> Regisztráció</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-danger" style="margin-top: 3px;margin-right: 5px;" href="index.php?page=login"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
    </ul>
</div>
</nav></br>';
  }
?>