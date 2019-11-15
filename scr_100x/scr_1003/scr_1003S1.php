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
    <h2><b>DANH SÁCH SINH VIÊN</b></h2>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">ĐÓNG</a>
    <a href="scr_1003S.php" onclick="w3_close()" class="w3-bar-item w3-button">TRỞ VỂ</a>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;">
    <!-- DANH SÁCH ĐÃ PHÂN CÔNG -->
    <div class="w3-container">
      <br>
      <br>
      <h3 class="w3-container w3-center"><i>Danh sách sinh viên đã đăng ký nhưng chưa được phân công</i></h3>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
        <tr>
          <th name="student_id">Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th name="organization_request_id">Mã phiếu đã đăng ký</th>
          <th name="date_of_birth">Ngày sinh</th>
          <th name="email">Email</th>
          <th name="class_name">Lớp</th>
          <th>Thao tác</th>
        </tr>
        <tr>
          <td>16001111</td>
          <td>Trần Văn A</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001111</td>
          <td>Trần Văn C</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001113</td>
          <td>Trần Văn B</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001115</td>
          <td>Trần Văn M</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
        <tr>
          <td>16001115</td>
          <td>Trần Văn N</td>
          <td>1000</td>
          <td>21/10/1998</td>
          <td>abc@gmail.com</td>
          <td>K61A3</td>
          <td><a href="scr_1003S.php" class="w3-center w3-button w3-teal w3-hover-black">Chọn</a></td>
        </tr>
      </table>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey" style="margin-top:170px">
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
