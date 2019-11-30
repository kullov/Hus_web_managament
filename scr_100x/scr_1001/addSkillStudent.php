<?php 
// Initialize the session
session_start();
// Include config file
require "../../config.php";

if (isset($_POST['addSkill'])) {
  $rate = trim($_POST["rate"]);
  $item = trim($_POST["item"]);
  $id = trim($_GET["id"]);
  echo "<script>alert('".$id."')</script>";
  $stmt5 = $link->prepare("INSERT INTO `intern_ability` (`intern_id`, `ability_id`, `rate`) VALUES (?, ?, ?);");
  $stmt5->bind_param("sss", $id, $item, $rate);
  if ($stmt5->execute()) {
    echo "<script>alert('Them thanh cong!')</script>";
    header('location: scr_1001D.php');
    exit;
  } else {
    echo "<script>alert('Failed!!')</script>";
    header('location: scr_1001D.php');
    exit;
  }
  $stmt5->close();
}
// Close connection
mysqli_close($link);
?>