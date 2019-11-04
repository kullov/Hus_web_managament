<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();

require_once "config.php";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $name = mysqli_real_escape_string($link, $_POST['name']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $phone = mysqli_real_escape_string($link, $_POST['phone']);
  $address = mysqli_real_escape_string($link, $_POST['address']);
  $password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($link, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($link, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO teachers (username, name, email, phone, address, password)
      VALUES('$username', '$name', '$email', '$phone', '$address', '$password')";
    mysqli_query($link, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: ../../index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $password = mysqli_real_escape_string($link, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
  	$query = "SELECT * FROM teachers WHERE username='$username' AND password='$password'";
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../../index.php');
    } else {
      array_push($errors, "Username/password combination invalid.");
    }
  }
}

?>
