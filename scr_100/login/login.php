<?php
// Initialize the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style type="text/css">
    body {
      font: 14px sans-serif;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="page-header">
    <h1>Welcome to our site ^^</h1>
    <h4>- Please login or register -</h4>
  </div>
  <p>
    <div class="w3-dropdown-hover">
      <button class="w3-button">Login</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="student.php" class="w3-bar-item w3-button">Student</a>
        <a href="teacher.php" class="w3-bar-item w3-button">Teacher</a>
        <a href="organization.php" class="w3-bar-item w3-button">Organization</a>
      </div>
    </div>
  </p>
</body>

</html>