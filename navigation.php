
<?php
// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $displayLogout = 'style="display: none"';
  $displayLogin = 'style="display: block"';
} else {
  $displayLogin = 'style="display: none"';
  $displayLogout = 'style="display: block"';
}
  $_SESSION["displayLogin"] = $displayLogin;
  $_SESSION["displayLogout"] = $displayLogout;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
  .hidden{
      visibility="hidden";
  }
  .show{
      visibility="visible";
  }
</style>
</head>
<body>
  <div class="w3-container w3-bar w3-black">
    <a href="/demo-project/welcome.php" class="w3-bar-item w3-button w3-mobile w3-light-grey w3-padding-16">Home</a>
    <div class="w3-dropdown-hover w3-mobile">
      <button class="w3-button w3-padding-16">Type <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
        <a href="/demo-project/scr_100x/student/scr_1001.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Student</a>
        <a href="/demo-project/scr_100x/organization/scr_1002.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Company</a>
        <a href="/demo-project/scr_100x/teacher/scr_1003.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Teacher</a>
      </div>
    </div>
    <div class="w3-dropdown-hover w3-mobile w3-light-grey w3-right" <?php echo($_SESSION["displayLogin"]); ?>>
      <button class="w3-button w3-padding-16">Login<i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-light-grey">
        <a href="/demo-project/scr_100/login/student.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Student</a>
        <a href="/demo-project/scr_100/login/organization.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Company</a>
        <a href="/demo-project/scr_100/login/teacher.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Teacher</a>
      </div>
    </div>
    <a href="/demo-project/scr_100/logout/logout.php" class="w3-bar-item w3-button w3-mobile w3-light-grey w3-padding-16 w3-right" <?php echo($_SESSION["displayLogout"]); ?> >Logout</i></a>
  </div>
</body>
</html>