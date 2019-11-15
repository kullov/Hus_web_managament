<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "student") {
  header("location: ../../");
  exit;
}
  // Include config file
  require_once "../../config.php";
// Define variables and initialize with empty values
$first_name = $last_name = $class_name = $join_date = $phone = $email = $address = $date_of_birth = $avatar = $description = "";
$first_name_err = $last_name_err = $class_name_err = $join_date_err = $phone_err = $email_err = $address_err = $date_of_birth_err = $avatar_err = "";

$username = $_SESSION["code"];
// Prepare a select statement
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
    }
      
  } else {
    echo "Oops! Something went wrong. Please try again later.";
  }
  // Close statement
  mysqli_stmt_close($stmt);
}



// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate phone
  if (empty(trim($_POST["phone"]))) {
    $phone_err = "Please enter your phone number!";
  } elseif (strlen(trim($_POST["phone"])) < 6) {
    $phone_err = "Your phone number is incorrect!";
  } else {
    $phone = trim($_POST["phone"]);
  }
  
  // Validate first name
  if (empty(trim($_POST["first_name"]))) {
    $first_name_err = "Please enter your first name!";
  } else {
    $first_name = trim($_POST["first_name"]);
  }

  // Validate last name
  if (empty(trim($_POST["last_name"]))) {
    $last_name_err = "Please enter your last name!";
  } else {
    $last_name = trim($_POST["last_name"]);
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email!";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validate class_name
  if (empty(trim($_POST["class_name"]))) {
    $class_name_err = "Please enter your class name!";
  } else {
    $class_name = trim($_POST["class_name"]);
  }

  // Validate address
  // if (empty(trim($_POST["address"]))) {
  //   $address_err = "Please enter your address!";
  // } else {
  //   $address = trim($_POST["address"]);
  // }

  // Validate birth_day
  if (empty(trim($_POST["date_of_birth"]))) {
    $date_of_birth_err = "Please enter your birthday!";
  } else {
    $date_of_birth = trim($_POST["date_of_birth"]);
  }

  // Prepare an insert statement
  $sql = "UPDATE `intern_profile` (first_name, last_name, phone, email, date_of_birth, class_name, avatar, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $phone, $email, $date_of_birth, $class_name, $avatar, $description);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to login page
      header("location: ../../scr_100x/scr_1001/scr_1001.php");
    } else {
      echo "Something went wrong. Please try again later.";
    }
  }
  // Close connection
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<title>Tạo phiếu yêu cầu</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
  /* Include the padding and border in an element's total width and height */

  /* Remove margins and padding from the list */
  ul {
    margin: 0;
    padding: 0;
  }

  /* Style the list items */
  ul li {
    position: relative;
    padding: 12px 8px 12px 40px;
    list-style-type: none;
    background: #eee;
    transition: 0.2s;
    
    /* make the list items unselectable */
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Set all odd list items to a different color (zebra-stripes) */
  ul li:nth-child(odd) {
    background: #f9f9f9;
  }

  /* Darker background-color on hover */
  ul li:hover {
    background: #ddd;
  }

  /* Style the close button */
  .close {
    position: absolute;
    right: 0;
    top: 0;
    padding: 12px 16px 12px 16px;
  }

  .close:hover {
    color: white;
  }

  .w3-input {
    display: inline-block !important;
  }
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-white w3-bar-block w3-collapse w3-top w3-center w3-padding" style="z-index:3;width:250px; margin-top: 55px;" id="mySidebar">
    <h3><b>SỬA THÔNG TIN SINH VIÊN</b></h3>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">ĐÓNG</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">THÔNG TIN</a> 
    <a href="#require" onclick="w3_close()" class="w3-bar-item w3-button">KỸ NĂNG</a> 
    <a href="scr_1001.php" onclick="w3_close()" class="w3-bar-item w3-button">TRỞ VỂ</a>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px;">

    <form action="#">
      <div id="about" class="w3-container">
        <h4><strong>THÔNG TIN</strong></h4>
        <div class="w3-row-padding w3-center">
          <div class="w3-padding">
            <h4><i class="far fa-address-card"></i> Mã sinh viên: <?php echo $username; ?></h4>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class='far fa-address-card'></i> First name:</p>
            <input class="w3-input w3-margin-top" style="width:60%" type="text" placeholder="" value="<?php echo $first_name; ?>" />
            <span class="w3-text-red"><?php echo $first_name_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class='far fa-address-card'></i> Last name</p>
            <input class="w3-input w3-margin-top" style="width:60%" type="text" placeholder="" value="<?php echo $last_name; ?>" />
            <span class="w3-text-red"><?php echo $last_name_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($date_of_birth_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class="fa fa-birthday-cake"></i> Ngày sinh</p>
            <input class="w3-input w3-margin-top" type="date" placeholder="" style="width:60%" value="<?php echo $date_of_birth; ?>" />
            <span class="w3-text-red"><?php echo $date_of_birth_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($class_name_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class="fas fa-graduation-cap"></i> Lớp</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" style="width:60%" value="<?php echo $class_name; ?>" />
            <span class="w3-text-red"><?php echo $class_name_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class="fa fa-phone"></i> Số điện thoại</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" style="width:60%" value="<?php echo $phone; ?>" />
            <span class="w3-text-red"><?php echo $phone_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"">
            <p style="width:30%; display: inline-block"><i class="fa fa-envelope fa-fw"></i> Email</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" style="width:60%" value="<?php echo $email; ?>" />
            <span class="w3-text-red"><?php echo $email_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-padding">
            <p><i class="fa fa-info-circle"></i> Thông tin thêm:</p>
            <textarea class="w3-input w3-margin-top" type="textarea" placeholder="" style="width:95.5%; height:200px"><?php echo $description; ?></textarea>
          </div>
        </div>
      </div>
      <!-- Yêu cầu -->
      <div class="w3-container" id="require">
        <br><br><br>
        <h4><strong>KỸ NĂNG</strong></h4>
        <div>
          <div class="w3-row-padding">
            <div id="myDIV" class="header w3-padding w3-third">
              <input class="w3-input w3-border" type="text" placeholder="Thêm năng lực" id="myInput" name="skill" list="listSkill" />
              <datalist id="listSkill">
                <option value="PHP">
                <option value="JAVA">
                <option value="HTML">
                <option value="CSS">
                <option value="JavaScript">
                <option value="C/C++">
                <option value="Python">
                <option value="MySQL">
                <option value="NodeJs">
                <option value="Cấu trúc dữ liệu">
                <option value="Trí tuệ nhân tạo">
                <option value="Thiết kế đánh giá thuật toán">
                <option value="Giải tích">
                <option value="Mạng máy tính">
                <option value="Lập trình hướng đối tượng">
                <option value="TOEFL">
                <option value="TOEIC">
                <option value="IELTS">
              </datalist>
            </div>
            <div class="w3-padding w3-half">
              <input type="button" class="w3-button w3-black" onclick="newElement()" value="Thêm" id="submitSkill" />
            </div>
          </div>
          <div class="w3-padding">
            <ul class="w3-ul w3-padding" id="myUL">
            </ul>
          </div>
        </div>
      </div>
      <p class="w3-center">
        <button type="submit" class="w3-button w3-teal">Lưu thông tin</button>
        <button type="reset" class="w3-button w3-dark-grey">Làm lại</button>
      </p>
    </form>

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

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  li.className = "item";
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

</body>
</html>
