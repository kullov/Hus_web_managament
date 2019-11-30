<?php 
// Initialize the session
session_start();
// Include config file
require "../../config.php";
$id_request = trim($_GET["id"]);
if (isset($_POST['addSkill'])) {
  $item = trim($_POST["item"]);
  $stmt5 = $link->prepare("INSERT INTO `request_ability` (`request_id`, `ability_id`) VALUES (?, ?);");
  $stmt5->bind_param("ss", $id_request, $item);
  if ($stmt5->execute()) {
    echo "<script>alert('Thêm kỹ năng thành công!!')</script>";
    header('location: scr_1002E.php?id='.$id_request);
    exit;
  } else {
    echo "<script>alert('Failed!!')</script>";
    header('location: scr_1002E.php?id='.$id_request);
    exit;
  }
  $stmt5->close();
}
// Close connection
mysqli_close($link);
?>