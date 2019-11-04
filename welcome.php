<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $_SESSION["role"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style type="text/css">
    body {
      font: 16px sans-serif;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php include("navigation.php"); ?>
  <div class="w3-container" style="margin-top:150px;">
    <h1>Welcome to our site ^^</h1>
    <p><i>Please login your account!</i></p>
  </div>
  <!-- <p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
  </p> -->
</body>

</html>