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
<title>Bảng phân công</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
/* Include the padding and border in an element's total width and height */

</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-white w3-bar-block w3-collapse w3-top w3-center w3-padding" style="z-index:3;width:300px; margin-top: 55px;" id="mySidebar">
    <br>
    <h2><b>BẢNG PHÂN CÔNG</b></h2>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">ĐÓNG</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">DANH SÁCH ĐÃ PHÂN CÔNG</a> 
    <a href="#notAssigned" onclick="w3_close()" class="w3-bar-item w3-button">DANH SÁCH CHƯA PHÂN CÔNG</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">LIÊN HỆ</a>
    <a href="scr_1003.php" onclick="w3_close()" class="w3-bar-item w3-button">TRỞ VỂ</a>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;">

    <!-- DANH SÁCH CHƯA PHÂN CÔNG -->
    <div class="w3-container" id="notAssigned">
      <br>
      <br>
      <h3 class="w3-container w3-center"><i>Danh sách chưa phân công</i></h3>
      <a href="scr_1003S2.php" class="w3-button w3-teal w3-margin-bottom w3-right"><i class="fas fa-user-plus w3-margin-right"></i>Thêm sinh viên</a>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
        <tr>
          <th name="organization_request_id">Mã phiếu yêu cầu</th>
          <th name="student_id">Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th name="class_name">Lớp</th>
          <th name="status">Trạng thái</th>
        </tr>
        <tr>
          <td>1000</td>
          <td>16001111</td>
          <td>Trần Văn A</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1000</td>
          <td>16001111</td>
          <td>Trần Văn C</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1001</td>
          <td>16001113</td>
          <td>Trần Văn B</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn B</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
        <tr>
          <td>1002</td>
          <td>16001115</td>
          <td>Trần Văn N</td>
          <td>K61A3</td>
          <td>Chưa phân công</td>
        </tr>
      </table>
    </div>
    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h3><b>LIÊN HỆ</b></h3>
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
            <li class="w3-padding-16 w3-dark-grey">
              <img src="https://www.w3schools.com/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
              <span class="w3-large">Lorem</span><br>
              <span>Sed mattis nunc</span>
            </li>
            <li class="w3-padding-16 w3-dark-grey">
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

</script>

</body>
</html>
