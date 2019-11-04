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
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    body {
      font: 16px sans-serif;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php include("navigation.php"); ?>
  <div>
    <div class="w3-display-container w3-animate-opacity">
      <img src="https://www.w3schools.com/w3images/sailboat.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
    </div>
  </div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-teal w3-display-container"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
        <h4>Oh snap! We just showed you a modal..</h4>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-container">
        <p>Cool huh? Ok, enough teasing around..</p>
        <p>Go to our <a class="w3-text-teal" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal footer</p>
      </footer>
    </div>   
  </div>
  <!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
  <h2>OUR TEAM</h2>
  <p>Meet the team - our office rats:</p>

  <div class="w3-row"><br>

    <div class="w3-col" style="width:20%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Tran Thanh Nga</h3>
      <p>Web Designer</p>
    </div>

    <div class="w3-col" style="width:20%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Nguyễn Thị Thủy</h3>
      <p>Web Designer</p>
    </div>

    <div class="w3-col" style="width:20%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Đặng Đình tài</h3>
      <p>Web Designer</p>
    </div>

    <div class="w3-col" style="width:20%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Đặng Xuân PHúc</h3>
      <p>Web Designer</p>
    </div>

    <div class="w3-col" style="width:20%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Vũ Hữu Sơn</h3>
      <p>Web Designer</p>
    </div>
  </div>
</div>
<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

  <div class="w3-quarter">
    <h2>Our Work</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>

<div class="w3-quarter">
  <div class="w3-card w3-white">
    <img src="https://www.w3schools.com/w3images/snow.jpg" alt="Snow" style="width:100%">
    <div class="w3-container">
      <h3>Customer 1</h3>
      <h4>Trade</h4>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
      </div>
    </div>
  </div>
<div class="w3-quarter">
  <div class="w3-card w3-white">
    <img src="https://www.w3schools.com/w3images/lights.jpg" alt="Lights" style="width:100%">
    <div class="w3-container">
      <h3>Customer 2</h3>
      <h4>Trade</h4>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
    </div>
  </div>
</div>

<div class="w3-quarter">
  <div class="w3-card w3-white">
    <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Mountains" style="width:100%">
    <div class="w3-container">
      <h3>Customer 3</h3>
      <h4>Trade</h4>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
      <p>Blablabla</p>
    </div>
  </div>
</div>

</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
  style="position:absolute;top:-28px;right:24px">+</a>
</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address </h3>
      <p>334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Hà Nội, Việt Nam</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  0349.749.393</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  thuynt181998@gmail.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
        <div class="w3-section">      
          <label>Name</label>
          <input class="w3-input" type="text" name="Name" required>
        </div>
        <div class="w3-section">      
          <label>Email</label>
          <input class="w3-input" type="text" name="Email" required>
        </div>
        <div class="w3-section">      
          <label>Message</label>
          <input class="w3-input" type="text" name="Message" required>
        </div>  
        <input class="w3-check" type="checkbox" checked name="Like">
        <label>I Like it!</label>
        <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
  <!-- <p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
  </p> -->
</body>

</html>