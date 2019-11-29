<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../../");
  exit;
}
?><!DOCTYPE html>
<html>
<title>Danh sach phieu yeu cau</title>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
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
    
    <div class="w3-container w3-padding-large">
      <!-- First Photo Grid-->
      <div class="w3-row-padding w3-container" id="OPEN">
        <div class="w3-half w3-container w3-margin-bottom w3-card">
          <img src="https://newwave.vn/wp-content/uploads/2018/12/15875037_751901071624876_248931472081814559_o.jpg" alt="Norway" style="width:100%;height:350px" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
            <h4><i class="fa fa-users fa-fw"></i>  Công ty: New Wave</h4>
            <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
            <p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
            <p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
            <p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
            <a href="scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?>"><button type="submit" class="w3-button w3-right w3-green">Chi tiết</button></a>
            <a href="scr_1001A.php" class=" <?php if (($_SESSION["role"]) !== "student") { ?> w3-hide <?php }?>  "><button type="submit" class="w3-button w3-left w3-blue">Đăng kí</button></a>			
          </div>
        </div>
        <div class="w3-half w3-container w3-margin-bottom w3-card">
          <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%;height:350px" class="w3-hover-opacity">
          <div class="w3-container w3-white">
          <h3 class="w3-center"><b>Lập trình viên Java (Angularjs, Javascript, Java)</b></h3>
            <h4><i class="fa fa-users fa-fw"></i>  Công ty: New Wave</h4>
            <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>3</b> người</p>
            <p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>20</b></p>
            <p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
            <p><i class="fa fa-fw fa-check"></i> Trạng thái: Còn hiệu lực</p>					
            <a href="scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>
            <a href="scr_1001A.php" class=" <?php if (($_SESSION["role"]) !== "student") { ?> w3-hide <?php }?>  "><button type="submit" class="w3-button w3-left w3-blue">Đăng kí</button></a>	
          </div>
        </div>
      </div>
      
      <?php 
        // Include config file
        require "../../config.php";
        // echo $listRequest 
        $stmt = $link->prepare("SELECT r.`id`, o.`name`, r.`position`, o.`address`, r.`amount`, r.`date_created`, r.`description`, r.`type`, r.`status`, ( SELECT COUNT(*) FROM `request_assignment` ra WHERE ra.request_id = r.id ) assignment FROM `request` r, organization_profile o WHERE r.`organization_id` = o.id ORDER BY r.status DESC" );
        $stmt->execute();
        $result = $stmt->get_result();
        echo '<div class="w3-row-padding w3-container">';
        while($row = $result->fetch_assoc()) {
          echo '
          <div class="w3-third w3-container w3-margin-bottom w3-card">
            <img src="https://newwave.vn/wp-content/uploads/2018/12/15875037_751901071624876_248931472081814559_o.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white" style="height:270px;">
              <h3 class="w3-center"><b>'.$row['position'].'</b></h3>
              <h4><i class="fa fa-users fa-fw"></i>  Công ty: '.$row['name'].'</h4>
              <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>'.$row['amount'].'</b> người</p>
              <p><i class="fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>'.$row['assignment'].'</b></p>
              <p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: <i>'.$row['address'].'</i></p>
              <p><i class="fa fa-fw fa-check"></i> Trạng thái: '; 
              if ($row['status'] == "1") {
                echo 'Hết hiệu lực';
              } else {
                echo 'Còn hiệu lực';
              }
              echo '</p>
              </div>
              <div class="w3-white" style="height: 38px;">					
              <a href="scr_1001V.php" ><button type="submit" class="w3-button w3-right w3-green">Chi tiết</button></a>
              <a href="scr_1001A.php" class=" '; 
              if (($_SESSION["role"]) !== "student") { echo 'w3-hide'; }; 
              echo ' "><button type="submit" class="w3-button w3-left w3-blue">Đăng kí</button></a>	
            </div>
          </div>';
        }
        echo '</div>';
        
        $stmt->close();
        // Close connection
        mysqli_close($link);
      ?>

    </div>

    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h4><b>Contact Me</b></h4>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
					<br>
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p>thuynt181998@gmail.com</p>
        </div>
        <div class="w3-third w3-teal">
					<br>
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p>334 Nguyễn Trãi, Thanh Xuân, Hà nội</p>
        </div>
        <div class="w3-third w3-dark-grey">
					<br>
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p>0349.749.393</p>
        </div>
      </div>
      <hr class="w3-opacity">
    </div>

    <!-- Footer -->
    <?php include("../../footer.php"); ?>
    

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