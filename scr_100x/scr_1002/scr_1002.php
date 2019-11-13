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
<title>Organization</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; " id="mySidebar"><br>
    <div class="w3-container">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br>
      <h3><b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></h3>
      <p class="w3-text-grey"><i>Organization</i></p>
    </div>
    <div class="w3-bar-block">
      <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>ABOUT</a> 
      <a href="#list-require" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>DANH SÁCH PHIẾU YÊU CẦU</a> 
      <a href="#assignment" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>BẢNG PHÂN CÔNG (SCR_1002S)</a>
      <a href="scr_1002E.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>BIÊN TẬP PHIẾU YÊU CẦU (SCR_1002E)</a>
      <a href="scr_1002C.php" class="w3-bar-item w3-button w3-padding">TẠO PHIẾU YÊU CẦU (SCR_1002C)</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    </div>
    <div class="w3-panel w3-large">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;">

    <!-- Header -->
    <header id="PROFILE">
      <a href="#"><img src="https://www.w3schools.com/w3images/mountains.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h1><b>My profile</b></h1>
      </div>
    </header>

    <div class="w3-container">
      <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <div class="w3-container">
        <h4><strong>KHÔNG GIAN</strong></h4>
        <div class="w3-display-container mySlides">
          <img src="https://we25.vn/media/images/anh3(13).jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://file4.batdongsan.com.vn/resize/745x510/2019/06/10/20190610085624-b7e0_wm.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
          </div>
        <div class="w3-display-container mySlides">
          <img src="https://cogo.vn/2018_cogo_contents/images/SYL_7995.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://znews-photo.zadn.vn/w660/Uploaded/wyhktpu/2018_05_10/image007.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
      </div>
      <div class="w3-row-padding w3-section">
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://we25.vn/media/images/anh3(13).jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(1)" title="Living room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://cogo.vn/2018_cogo_contents/images/SYL_7995.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://znews-photo.zadn.vn/w660/Uploaded/wyhktpu/2018_05_10/image007.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://file4.batdongsan.com.vn/resize/745x510/2019/06/10/20190610085624-b7e0_wm.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
        </div>
      </div>
    </div>

    <div id="list-require" style="padding-top:1px;">
      <hr>
      <br>
      <h3 class="w3-container"><b>Danh sách phiếu yêu cầu</b></h3>
      <!-- Second Photo Grid-->
      <div class="w3-row-padding">
        <div class="w3-third w3-container w3-margin-bottom">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
        <div class="w3-third w3-container">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
      </div>
      <!-- Second Photo Grid-->
      <div class="w3-row-padding">
        <div class="w3-third w3-container w3-margin-bottom">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
        <div class="w3-third w3-container">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Lorem Ipsum</b></p>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          </div>
        </div>
      </div>
      <div class="w3-center w3-padding-32">
        <div class="w3-bar">
          <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
          <a href="#" class="w3-bar-item w3-black w3-button">1</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
      </div>
    </div>
    
    <!-- Assignment -->
    <div class="w3-container" id="assignment">
      <hr>
      <br>
      <h3><b>Bảng phân công</b></h3>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
        <tr>
          <th name="organization_request_id">Mã phiếu yêu cầu</th>
          <th name="student_id">Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th name="start_date">Ngày bắt đầu thực tập</th>
          <th name="end_date">Ngày kết thúc thực tập</th>
          <th name="status">Trạng thái</th>
          <th name="create_date">Thời gian phân công</th>
        </tr>
        <tr>
          <td>1000</td>
          <td>16001111</td>
          <td>Trần Văn A</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1000</td>
          <td>16001111</td>
          <td>Trần Văn C</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1001</td>
          <td>16001113</td>
          <td>Trần Văn B</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
        <tr>
        <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn N</td>
          <td>21/10/2019</td>
          <td>01/12/2019</td>
          <td>Đang thực hiện</td>
          <td>15/10/2019</td>
        </tr>
      </table>
      <!-- Pagination -->
      <div class="w3-center w3-padding-32">
        <div class="w3-bar">
          <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
          <a href="#" class="w3-bar-item w3-black w3-button">1</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h3><b>Contact Me</b></h3>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p>tranthanhnga_t61@hus.edu.com</p>
        </div>
        <div class="w3-third w3-teal">
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p>334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p>512312311</p>
        </div>
      </div>
      <hr class="w3-opacity">
      <form action="https://www.w3schools.com/w3images/action_page.php" target="_blank">
        <div class="w3-section">
          <label>Name</label>
          <input class="w3-input w3-border" type="text" name="Name" required>
        </div>
        <div class="w3-section">
          <label>Email</label>
          <input class="w3-input w3-border" type="text" name="Email" required>
        </div>
        <div class="w3-section">
          <label>Message</label>
          <input class="w3-input w3-border" type="text" name="Message" required>
        </div>
        <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
      </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey">
      <div class="w3-row-padding">
        <div class="w3-third">
          <h3>FOOTER</h3>
          <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
          <p>Powered by <a href="#" target="_blank">Origen</a></p>
        </div>
      
        <div class="w3-third">
          <h3>BLOG POSTS</h3>
          <ul class="w3-ul w3-hoverable">
            <li class="w3-padding-16">
              <img src="https://www.w3schools.com/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
              <span class="w3-large">Lorem</span><br>
              <span>Sed mattis nunc</span>
            </li>
            <li class="w3-padding-16">
              <img src="https://www.w3schools.com/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
              <span class="w3-large">Ipsum</span><br>
              <span>Praes tinci sed</span>
            </li> 
          </ul>
        </div>

        <div class="w3-third">
          <h3>POPULAR TAGS</h3>
          <p>
            <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">London</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">DIY</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Shopping</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Games</span>
          </p>
        </div>

      </div>
    </footer>
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="/web_management/" title="Origen" target="_blank" class="w3-hover-opacity">Origen</a></div>

  <!-- End page content -->
  </div>
</div>

<script>
// Script to open and close sidebar
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

</body>
</html>
