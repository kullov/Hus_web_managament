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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
  <h2>Đội ngũ phát triển</h2>
  <p>Gặp gỡ chúng tôi</p>

  <div class="w3-row"><br>

    <div class="w3-col w3-third">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Trần Thanh Nga</h3>
      <p>Lập trình viên</p>
      <p>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-envelope-o w3-hover-opacity w3-large"></i>
      </p>
    </div>

    <div class="w3-col w3-third" w3-third style="width:%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Nguyễn Thị Thủy</h3>
      <p>Lập trình viên</p>
      <p>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-envelope-o w3-hover-opacity w3-large"></i>
      </p>
    </div>

    <div class="w3-col w3-third" w3-third style="width:%">
      <img src="https://www.w3schools.com/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Đặng Đình Tài</h3>
      <p>Lập trình viên</p>
      <p>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-envelope-o w3-hover-opacity w3-large"></i>
      </p>
    </div>
  </div>
</div>
<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

  <div class="w3-quarter">
    <h2>Giới thiệu chung</h2>
    <p>Năm bắt được nhu cầu tuyển dụng nhân lực trẻ, năng động, hăng hái học hỏi kinh nghiệm của các doanh nghiệp hay nhu cầu tìm kiếm việc làm của sinh viên, chúng tôi đã xây dựng một website để đáp ứng những yêu cầu trên.</p>
    <p>Đó là sàn giao dịch thực tập sinh. Sàn giao dịch thực tập sinh là nơi cung cấp dịch vụ an toàn, tiện ích, nhanh chóng về tuyển dụng cũng như tìm kiếm việc làm cho sinh viên và các doanh nghiệp. Website không chỉ hữu ích cho sinh viên và doanh nghiệp mà còn mang lại lợi ích cho cả giáo viên. Giáo viên có thể giới thiệu những công việc tốt và phù hợp với từng sinh viên hay giới thiệu cho doanh nghiệp các sinh viên ưu tú, có kinh nghiệm, phù hợp với nhu cầu của họ.</p>
    <!-- <p>Khi mà phương thức tuyển dụng hay tìm kiếm việc làm truyền thống đã không được truyền đến mọi người một cách kịp thời đúng lúc thì website của chúng tôi ra đời hứa hẹn sẽ giải quyết vấn đề này một cách tối ưu nhất.</p> -->
  </div>

<div class="w3-quarter w3-padding-16">
  <div class="w3-card w3-white">
    <img src="https://znews-photo.zadn.vn/w660/Uploaded/Ycgmvlbp/2018_11_25/sap_mang.jpg" alt="Snow" style="width:100%; height: 230px">
    <div class="w3-container">
      <h3>Sinh viên</h3>
      <h4></h4>
      <p>Khi tham gia, sinh viên sẽ tìm được công việc phù hợp với năng lực, khả năng và yêu cầu của bản thân.</p>
      </div>
    </div>
  </div>
<div class="w3-quarter w3-padding-16">
  <div class="w3-card w3-white">
    <img src="http://cafefcdn.com/thumb_w/650/2018/9/4/photo1536030960684-15360309606851865409927.jpg" alt="Lights" style="width:100%; height: 230px">
    <div class="w3-container">
      <h3>Doanh nghiệp</h3>
      <h4></h4>
      <p>Khi tham gia, doanh nghiệp sẽ tiếp cận và tuyển dụng được các thành viên với năng lực phù hợp, đáp ứng yêu cầu.</p>
      <p></p>
    </div>
  </div>
</div>

<div class="w3-quarter w3-padding-16">
  <div class="w3-card w3-white">
    <img src="https://timviec365.vn/pictures/images/giang-vien-la-gi.jpg" alt="Mountains" style="width:100%; height: 230px">
    <div class="w3-container">
      <h3>Giáo viên</h3>
      <h4></h4>
      <p>Cung cấp thông tin hữu ích về việc làm cho sinh viên và doanh nghiệp. Nắm bắt được cơ hội việc làm của sinh viên .</p>
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
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Liên hệ với chúng tôi</span></div>
      <h3>Địa chỉ </h3>
      <p>334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Hà Nội, Việt Nam</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  0349.749.393</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  thuynt181998@gmail.com</p>
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