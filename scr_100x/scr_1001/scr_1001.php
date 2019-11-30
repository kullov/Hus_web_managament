<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "student") {
  header("location: ../../");
  exit;
}

// Include config file
require "../../config.php";
// Define variables and initialize with empty values
$first_name = $last_name = $class_name = $join_date = $phone = $email = $address = $date_of_birth = $avatar = $description = "";
$first_name_err = $last_name_err = $class_name_err = $join_date_err = $phone_err = $email_err = $address_err = $date_of_birth_err = $avatar_err = "";

$username = $_SESSION["code"];
// Prepare a select statement
// Câu SQL lấy danh sách
$sql = "SELECT id, first_name, last_name, email, phone, date_of_birth, class_name, join_date, avatar, description FROM intern_profile WHERE code = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
  
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "s", $username);

  // Attempt to execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Store result
    mysqli_stmt_store_result($stmt);
    // Check if username exists, if yes then verify password
    if (mysqli_stmt_num_rows($stmt) == 1) {
      // Bind result variables
      mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $email, $phone, $date_of_birth, $class_name, $join_date, $avatar, $description);
      mysqli_stmt_fetch($stmt);
    }
  } else {
    echo "Oops! Something went wrong. Please try again later.";
  }
}

// Close connection
mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<title>Student</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
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
      <img src="<?php echo htmlspecialchars($avatar); ?>" style="width:45%;" class="w3-round"><br><br>
      <h3><b><?php echo htmlspecialchars($first_name . " " . $last_name); ?></b></h3>
      <p class="w3-text-grey"><i>Student</i></p>
    </div>
    <div class="w3-bar-block">
      <a href="#PROFILE" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PROFILE</a> 
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>THÔNG TIN</a>
      <a href="scr_1001D.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>SỬA THÔNG TIN</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-fw w3-margin-right"></i>LIÊN HỆ</a>
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
      <img src="https://www.w3schools.com/w3images/mountains.jpg" style="width:65px;" class="w3-circle w3-center w3-margin w3-hide-large w3-hover-opacity">
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h4><b>Sơ yếu lý lịch</b></h4>
        <div class="w3-row-padding">
          <div class=" w3-half w3-container w3-section w3-bottombar w3-padding-16">
            <p><i class="far fa-address-card w3-margin-right w3-large w3-text-teal"></i>Student ID: <b><?php echo($username) ?></b></p>
            <p><i class="fa fa-birthday-cake w3-margin-right w3-large w3-text-teal"></i>Date of birth: <b><?php echo($date_of_birth) ?></b></p>
            <p><i class="fas fa-graduation-cap w3-margin-right w3-large w3-text-teal"></i>Class name: <b><?php echo($class_name) ?></b></p>
            <p><i class="fa fa-calendar-check-o w3-margin-right w3-large w3-text-teal"></i>Join date: <b><?php echo($join_date) ?></b></p>
            </div>
          <div class=" w3-half w3-container w3-section w3-bottombar w3-padding-16">
            <p><i class="far fa-address-card w3-margin-right w3-large w3-text-teal"></i>Full name: <b><?php echo($first_name) ?> <?php echo($last_name) ?></b></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address: London, UK</p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Email: <b><?php echo($email) ?></b></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>Phone: <b><?php echo($phone) ?></b></p>
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

    <div class="w3-container w3-padding-large" style="margin-bottom:32px" id="about">
      <br>
      <br>
      <h4><b>About Me</b></h4>
      <p><?php echo htmlspecialchars($description); ?></p>
      <hr>
      
      <h4>Technical Skills</h4>
      <!-- Progress bars / Skills -->
      <p>Photography</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
      </div>
      <p>Web Design</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
      </div>
      <p>Photoshop</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
      </div>
      <p>
        <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
          <i class="fa fa-download w3-margin-right"></i>Download Resume
        </button>
      </p>
      <hr>
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
          <p>Chicago, US</p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($phone); ?></p>
        </div>
      </div>
      <hr class="w3-opacity">
    </div>

    <!-- Footer -->
    <?php include("../../footer.php"); ?>
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="/web_management/" title="W3.CSS" target="_blank" class="w3-hover-opacity">Origen</a></div>

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
