<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("location: scr_100/login/login.php");
//   exit;
// }
?><!DOCTYPE html>
<html>
<title>Danh sach phieu yeu cau</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;" class="">
  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main">

    <!-- Header -->
    <header id="">
      <div class="w3-container w3-center">
        <h1><b>DANH SÁCH PHIẾU YÊU CẦU</b></h1>
				<br>
				<br>
      </div>
    </header>
		<div class="w3-row-padding">
			<div class="w3-col m3">
				<label><i class="fa fa-map-pin fa-fw"></i> Địa điểm</label>
				<input class="w3-input w3-border" type="text" placeholder="Address">
			</div>
			<div class="w3-col m3">
				<label><i class="fa fa-fw fa-check"></i> Trạng thái</label>
				<select class="w3-select w3-border" name="option">
					<option value="" disabled selected>Chọn trạng thái</option>
					<option value="0">Đang chờ</option>
					<option value="1">Đang thực hiện</option>
					<option value="2">Đã thực hiện xong</option>
				</select>
			</div>
			<div class="w3-col m2">
				<label><i class="fas fa-calendar-alt fa-fw"></i> Hình thức làm việc</label>
				<select class="w3-select w3-border" name="option">
					<option value="" disabled selected>Hình thức làm việc</option>
					<option value="0">Fulltime</option>
					<option value="1">Partime</option>
				</select>
			</div>
			<div class="w3-col m3">
				<label><i class="fa fa-child"></i> Công việc</label>
				<input class="w3-input w3-border" type="text" placeholder="Java/PHP/...">
			</div>
			<div class="w3-col m1 w3-right">
				<label><i class="fa fa-search"></i> Search</label>
				<button class="w3-button w3-block w3-blue">Search</button>
			</div>
		</div>
		<br>
		<br>
    
    <!-- First Photo Grid-->
    <div class="w3-row-padding" id="OPEN">
      <div class="w3-half w3-container w3-margin-bottom">
        <img src="https://newwave.vn/wp-content/uploads/2018/12/15875037_751901071624876_248931472081814559_o.jpg" alt="Norway" style="width:100%;height:350px" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>				
        </div>
      </div>
      <div class="w3-half w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%;height:350px" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
    </div>
    
    <!-- Second Photo Grid-->
    <div class="w3-row-padding" id="OPEN">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
    </div>

		<div class="w3-row-padding" id="close">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
				<h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
					<h4><i class="fa fa-diamond fa-fw"></i>  Công ty: New Wave</h4>
          <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
					<p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
					<p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
					<p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
					<a href="/web_management/scr_100x/scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h4><b>Contact Me</b></h4>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p>email@email.com</p>
        </div>
        <div class="w3-third w3-teal">
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p>Chicago, US</p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p>512312311</p>
        </div>
      </div>
      <hr class="w3-opacity">
      <form action="/action_page.php" target="_blank">
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
          <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
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
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="/web_management/" target="_blank" class="w3-hover-opacity">Origen</a></div>

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