<?php
// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $displayLogout = 'style="display: none"';
  $displayLogin = 'style="display: block"';
} else {
  $displayLogin = 'style="display: none"';
  $displayLogout = 'style="display: block"';
}
if ($_SERVER["PHP_SELF"] == "/web_management/index.php") {
  $isHome = true;
} else {
  $isHome = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="w3-top" style="z-index:4;">

    <div class="w3-container w3-bar w3-black w3-theme-d2 w3-left-align">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="/web_management/" class=" w3-padding-16 w3-bar-item w3-button w3-hover-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
      <a href="#team" class="w3-padding-16 w3-bar-item w3-button w3-hide-small w3-hover-teal <?php if (!$isHome) { ?> w3-hide <?php }?> "><i class="fa fa-user w3-margin-right"></i>Team</a>
      <a href="#work" class="w3-padding-16 w3-bar-item w3-button w3-hide-small w3-hover-teal <?php if (!$isHome) { ?> w3-hide <?php }?> "><i class="fa fa-th w3-margin-right"></i>Work</a>
      <a href="#contact" class="w3-padding-16 w3-bar-item w3-button w3-hide-small w3-hover-teal <?php if (!$isHome) { ?> w3-hide <?php }?> "><i class="fa fa-envelope w3-margin-right"></i>Contact</a>
      <!-- <div class="w3-dropdown-hover w3-mobile"> -->
        <!-- <button class="w3-button w3-padding-16">Type <i class="fa fa-caret-down"></i></button> -->
        <!-- <div class="w3-dropdown-content w3-bar-block w3-dark-grey" > -->
          <a href="/web_management/scr_100x/scr_1001/scr_1001.php" class="w3-bar-item w3-button w3-mobile w3-padding-16 w3-hover-teal <?php if (($_SESSION["role"]) !== "student") { ?> w3-hide <?php }?> " >Student</a>
          <a href="/web_management/scr_100x/scr_1002/scr_1002.php" class="w3-bar-item w3-button w3-mobile w3-padding-16 <?php if (($_SESSION["role"]) !== "organization") { ?> w3-hide <?php }?> ">Company</a>
          <a href="/web_management/scr_100x/scr_1003/scr_1003.php" class="w3-bar-item w3-button w3-mobile w3-padding-16 <?php if (($_SESSION["role"]) !== "teacher") { ?> w3-hide <?php }?> ">Teacher</a>
          <a href="/web_management/scr_100x/scr_1001/scr_1001B.php" class="w3-padding-16 w3-bar-item w3-button w3-hide-small w3-hover-teal <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> ">Danh sách phiếu yêu cầu</a>
          <a href="/web_management/scr_100x/scr_1002/scr_1002C.php" class="w3-padding-16 w3-bar-item w3-button w3-hide-small w3-hover-white <?php if (($_SESSION["role"]) !== "organization") { ?> w3-hide <?php }?> ">Tạo phiếu yêu cầu</a>
        <!-- </div> -->
      <!-- </div> -->
      <div class="w3-dropdown-hover w3-hide-small w3-mobile w3-light-grey w3-right" <?php echo($displayLogin); ?>>
        <button class="w3-button w3-padding-16 w3-teal"> <i class="fa fa-sign-in"></i> Login</button>
        <div class="w3-dropdown-content w3-bar-block w3-light-grey">
          <a href="/web_management/scr_100/login/student.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Student</a>
          <a href="/web_management/scr_100/login/organization.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Company</a>
          <a href="/web_management/scr_100/login/teacher.php" class="w3-bar-item w3-button w3-mobile w3-padding-16">Teacher</a>
        </div>
      </div>
      <div class="w3-dropdown-hover w3-hide-small w3-mobile w3-light-grey w3-right" <?php echo($displayLogout); ?>>
      <a href="/web_management/scr_100/logout/logout.php"><button class="w3-button w3-padding-16 w3-teal">Logout <i class="fa fa-sign-out"></i></button></a>
      </div>
      
    </div>
  </div>
</body>
</html>