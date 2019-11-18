<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "teacher") {
  header("location: ../../");
  exit;
}

// Include config file
require "../../config.php";

$phone_number = $email = $name = $address = "";
$id = $_SESSION["id"];
// Prepare a select statement
$sql = "SELECT id, contact, email, name, address FROM teacher_profile WHERE id = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
  
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "s", $id);
  // Attempt to execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Store result
    mysqli_stmt_store_result($stmt);
    // Check if username exists, if yes then verify password
    if (mysqli_stmt_num_rows($stmt) == 1) {
      // Bind result variables
      mysqli_stmt_bind_result($stmt, $id, $phone_number, $email, $name, $address);
      mysqli_stmt_fetch($stmt);
    } else {
      // Display an error message if username doesn't exist
      $email_teacher_err = "No account found with that your email!";
    }
  } else {
    echo "Oops! Something went wrong. Please try again later.";
  }
  // Close statement
  mysqli_stmt_close($stmt);
}
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<title>Teacher</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif} */
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; " id="mySidebar"><br>
    <div class="w3-container w3-center">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br>
      <h3><b><?php echo htmlspecialchars($name); ?></b></h3>
      <p class="w3-text-grey"><i>Teacher</i></p>
    </div>
    <div class="w3-bar-block">
      <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PROFILE</a> 
      <a href="#list-require" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>DANH SÁCH PHIẾU YÊU CẦU</a> 
      <a href="scr_1003S.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>BẢNG PHÂN CÔNG (SCR_1002S)</a>
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
        <h4><b>THÔNG TIN</b></h1>
        <div class="w3-row-padding">
          <div class=" w3-half w3-container w3-section w3-bottombar w3-padding-16">
            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Full name: <b><?php echo($name) ?></b></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>Phone: <b><?php echo($phone_number) ?></b></p>
          </div>
          <div class=" w3-half w3-container w3-section w3-bottombar w3-padding-16">
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Email: <b><?php echo($email) ?></b></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address: <b><?php echo($address) ?></b></p>
          </div>
        </div>
      </div>
    </header>
    
    <!-- First Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-half w3-container w3-margin-bottom">
        <img src="https://www.w3schools.com/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Lorem Ipsum</b></p>
          <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>
      </div>
      <div class="w3-half w3-container w3-margin-bottom">
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

    <div id="list-require" style="padding-top:1px;">
      <hr>
      <br>
      <h3 class="w3-container"><b>Danh sách phiếu yêu cầu</b></h3>
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
            <a href="../scr_1001/scr_1001V.php" class=" <?php if (($_SESSION["role"]) == "") { ?> w3-hide <?php }?> "><button type="submit" class="w3-button w3-right  w3-green">Chi tiết</button></a>	
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
    
    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h4><b>Contact Me</b></h4>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($email); ?></p>
        </div>
        <div class="w3-third w3-teal">
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($address); ?></p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($phone_number); ?> </p>
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
    <?php include("../../footer.php"); ?>
    
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
