<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("location: scr_100/login/login.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html>
<title>Detail Recruit Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}
</style>
<body>
  <?php include("../../navigation.php"); ?>
  <div class="w3-content w3-border-left w3-border-right" style=" margin-top: 55px;">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-light-grey w3-bar-block w3-collapse w3-top w3-center" style="z-index:3;width:250px; margin-top: 55px;" id="mySidebar">
      <h3 class="w3-padding-64 w3-center"><b>NEWWAVE <br>Solution JSC</b></h3>
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
      <a href="#space" onclick="w3_close()" class="w3-bar-item w3-button">SPACE</a> 
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a> 
      <a href="#subcribe" onclick="w3_close()" class="w3-bar-item w3-button">SUBCRIBE</a> 
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
      <span class="w3-bar-item">Rental</span>
      <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-white" style="margin-left:260px">

      <!-- Push down content on small screens -->
      <div class="w3-hide-large" style="margin-top:80px"></div>

      <!-- Slideshow Header -->
      <div class="w3-container" id="space">
        <h1 class="w3-text-green">Java Job</h1>
        <h4><strong>SPACE</strong></h4>
        <div class="w3-display-container mySlides">
          <img src="https://www.w3schools.com/w3images/livingroom.jpg" style="width:100%;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Our Company</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://www.w3schools.com/w3images/diningroom.jpg" style="width:100%;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Our Company</p>
          </div>
          </div>
        <div class="w3-display-container mySlides">
          <img src="https://www.w3schools.com/w3images/bedroom.jpg" style="width:100%;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Our Company</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://www.w3schools.com/w3images/livingroom2.jpg" style="width:100%;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Our Company</p>
          </div>
        </div>
      </div>
      <div class="w3-row-padding w3-section">
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://www.w3schools.com/w3images/livingroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Living room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://www.w3schools.com/w3images/diningroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://www.w3schools.com/w3images/bedroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://www.w3schools.com/w3images/livingroom2.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
        </div>
      </div>
      <div id="about" class="w3-container">
        <br>
        <br>
        <h4><strong>ABOUT</strong></h4>
        <div class="w3-row w3-large">
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>30</b> người</p>
            <p><i class="fa fa-fw fa-bath"></i> Số lượng đã đăng ký: 62</p>
            <p><i class="fa fa-fw fa-clock-o"></i> Check In: 8:30 AM</p>
          </div>
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>
            <p><i class="fa fa-fw fa-bed"></i> Đã được phân công: 10</p>
            <p><i class="fa fa-fw fa-clock-o"></i> Check Out: 5:30 PM</p>
          </div>
        </div>
        <hr>
        
        <h4><strong>Amenities</strong></h4>
        <div class="w3-row w3-large">
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-shower"></i> Playing</p>
            <p><i class="fa fa-fw fa-wifi"></i> WiFi</p>
            <p><i class="fa fa-fw fa-tv"></i> TV</p>
          </div>
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-cutlery"></i> Kitchen</p>
            <p><i class="fa fa-fw fa-thermometer"></i> Heating</p>
            <p><i class="fa fa-fw fa-wheelchair"></i> Accessible</p>
          </div>
        </div>
        <hr>
        
        <h4><strong>Extra Info</strong></h4>
        <p>Our apartment is really clean and we like to keep it that way. Enjoy the lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
        <hr>
        
        <h4><strong>Rules</strong></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div id="subcribe">
          <p>Subscribe to receive updates on available dates and special offers.</p>
          <br>
          <p><button class="w3-button w3-green w3-third" onclick="document.getElementById('subscribe').style.display='block'">ĐĂNG KÝ</button></p>
        </div>
      </div>
      <hr>
      
      <!-- Contact -->
      <div class="w3-container" id="contact" style="margin-bottom:120px">
        <h2>CONTACT</h2>
        <i class="fa fa-map-marker" style="width:30px"></i> 334 Nguyễn Trãi, Thanh Xuân, Hà Nội<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: 0349.749.393<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: tranthanhnga_t61@hus.edu.vn<br>
        <p>Questions? Go ahead, ask them:</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
        <button type="submit" class="w3-button w3-green w3-third">Send a Message</button>
        </form>
      </div>
      
      <footer class="w3-container w3-padding-16" style="margin-top:32px">Powered by 
        <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Origen</a>
        <button class="w3-button w3-green w3-right" onclick="document.getElementById('subscribe').style.display='block'">Trở về</button>
      </footer>

    <!-- End page content -->
    </div>

    <!-- Subscribe Modal -->
    <div id="subscribe" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom w3-padding-large">
        <div class="w3-container w3-white w3-center">
          <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
          <h2 class="w3-wide">ĐĂNG KÝ</h2>
          <p>Join our mailing list to receive updates on available dates and special offers.</p>
          <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
          <button type="button" class="w3-button w3-padding-large w3-green w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
        </div>
      </div>
    </div>

    <script>
    // Script to open and close sidebar when on tablets and phones
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }
    
    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    // Slideshow Apartment Images
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
      }
      x[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " w3-opacity-off";
    }
    </script>
  </div>
</body>
</html>
