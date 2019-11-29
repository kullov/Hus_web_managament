<?php 
// Initialize the session
session_start();
// Include config file
require "../../config.php";

if (isset($_POST['addSkill'])) {
  $item = trim($_POST["item"]);
  $stmt5 = $link->prepare("INSERT INTO `request_ability` (`request_id`, `ability_id`) VALUES (?, ?);");
  $stmt5->bind_param("ss", $_SESSION["request_id"], $item);
  if ($stmt5->execute()) {
    echo "<script>alert('Them thanh cong!')</script>";
    header('location: scr_1002E.php');
    exit;
  } else {
    echo "<script>alert('Failed!!')</script>";
    header('location: scr_1002E.php');
    exit;
  }
  $stmt5->close();
}

?>