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
$skill = $item = "";
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
  // Close statement
  mysqli_stmt_close($stmt);
}

$id_a = "";
$ability_id = $ability_required = $description_ability = $toReturn = "";
function loadSkill() {
  global $link, $toReturn, $id;
  global $id_a;
  $stmt4 = $link->prepare("SELECT r_b.`ability_id`, a_d.`name`, r_b.`rate` FROM `intern_ability` r_b, `ability_dictionary` a_d WHERE r_b.`ability_id` = a_d.`id` AND r_b.`intern_id` = ?");
  $stmt4->bind_param("s", $id);
  $stmt4->execute();
  $result_skill = $stmt4->get_result();
  while($row = $result_skill->fetch_assoc()) {
    $toReturn = $toReturn. 
      "<form action='scr_1001D.php' method='post'>
        <tr>
          <td value='".$row['ability_id']."'>".$row['name']."</td>
          <td value='".$row['rate']."'>".$row["rate"]."%</td>
          <td>
            <input type='hidden' name='id' value=".$row["ability_id"]." />
            <button type='submit' name='deletebtn' class='w3-right w3-button w3-red'>Xóa</button>
          </td>
        </tr>
      </form>";
    $id_a = $row['ability_id'];
  }
  $stmt4->close();
}
loadSkill();
//Delete skill
if (isset($_POST['deletebtn'])) {
  $did= $_POST['id'];
  $stmt5 = $link->prepare("DELETE FROM `intern_ability` WHERE ability_id = ?;");
  $stmt5->bind_param("s", $did);
  if ($stmt5->execute()) {
    echo "<script>alert('Xóa kỹ năng thành công!')</script>";
    header('location: scr_1001D.php');
    exit;
  } else {
    echo "<script>alert('Failed!!')</script>";
    header('location: scr_1001D.php');
    exit;
  }
  $stmt5->close();
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['save'])) {
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

    $avatar = trim($_POST["avatar"]);
    $description = trim($_POST["description"]);

    // Prepare an insert statement
    $sql = "UPDATE `intern_profile` SET `first_name` = ?, `last_name` = ?, `date_of_birth` = ?, `class_name` = ?, `avatar` = ?, `email` = ?, `phone` = ?, `description` = ? WHERE `intern_profile`.`code` = ?;";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name, $date_of_birth, $class_name, $avatar, $email, $phone, $description, $username);
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: scr_1001.php");
      } else {
        echo "Something went wrong. Please try again later.";
      }
      mysqli_stmt_close($stmt);
    }
  }
  
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

    <div id="about" class="w3-container">
      <h4><strong>THÔNG TIN</strong></h4>
      <div class="w3-row-padding w3-center">
        <div class="w3-padding">
          <h4><i class="far fa-address-card"></i> Mã sinh viên: <?php echo $username; ?></h4>
        </div>
      </div>
      <form action="scr_1001D.php" method="post">
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class='far fa-address-card'></i> First name:</p>
            <input class="w3-input w3-margin-top" style="width:60%" type="text" name="first_name" placeholder="" value="<?php echo $first_name; ?>" />
            <span class="w3-text-red"><?php echo $first_name_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class='far fa-address-card'></i> Last name</p>
            <input class="w3-input w3-margin-top" style="width:60%" type="text" name="last_name" placeholder="" value="<?php echo $last_name; ?>" />
            <span class="w3-text-red"><?php echo $last_name_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($date_of_birth_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class="fa fa-birthday-cake"></i> Ngày sinh</p>
            <input class="w3-input w3-margin-top" type="date" placeholder="" name="date_of_birth" style="width:60%" value="<?php echo $date_of_birth; ?>" />
            <span class="w3-text-red"><?php echo $date_of_birth_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($class_name_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class="fas fa-graduation-cap"></i> Lớp</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" name="class_name" style="width:60%" value="<?php echo $class_name; ?>" />
            <span class="w3-text-red"><?php echo $class_name_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class="fa fa-phone"></i> Số điện thoại</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" name="phone" style="width:60%" value="<?php echo $phone; ?>" />
            <span class="w3-text-red"><?php echo $phone_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class="fa fa-envelope fa-fw"></i> Email</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" name="email" style="width:60%" value="<?php echo $email; ?>" />
            <span class="w3-text-red"><?php echo $email_err; ?></span>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding form-group <?php echo (!empty($avatar_err)) ? 'has-error' : ''; ?>">
            <p style="width:30%; display: inline-block"><i class="fa fa-user"></i> Ảnh đại diện</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" name="avatar" style="width:60%" value="<?php echo $avatar; ?>" />
            <span class="w3-text-red"><?php echo $avatar_err; ?></span>
          </div>
          <div class="w3-half w3-padding form-group">
            <p style="width:30%; display: inline-block"><i class="fa fa-calendar fa-fw"></i> Ngày bắt đầu</p>
            <input class="w3-input w3-margin-top" type="text" placeholder="" disabled style="width:60%" value="<?php echo $join_date; ?>" />
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-padding">
            <p><i class="fa fa-info-circle"></i> Thông tin thêm:</p>
            <textarea class="w3-input w3-margin-top" type="textarea" placeholder="" name="description" style="width:95.5%; height:200px"><?php echo $description; ?></textarea>
          </div>
        </div>
        <div class="w3-center">
          <button type="submit" name="save" class="w3-button w3-teal">Lưu thông tin</button>
        </div>
      </form>
    </div>
    <!-- Yêu cầu -->
    <div class="w3-container" id="require">
      <br><br><br>
      <h4><strong>KỸ NĂNG</strong></h4>
      <form action="addSkillStudent.php?id=<?php echo $id ?>" method="post">
        <div class="w3-row-padding">
          <div class="w3-padding w3-third">
            <select class="w3-input w3-border" name="item" value="<?php echo $item ?>" >
              <option value="0" disabled selected>Thêm kỹ năng</option>
                <?php 
                  $stmt4 = $link->prepare("SELECT a_d.id, name FROM ability_dictionary a_d WHERE a_d.id NOT IN(SELECT c.ability_id FROM intern_ability c  WHERE c.intern_id = ? GROUP BY c.ability_id)");
                  $stmt4->bind_param("s", $id);
                  $stmt4->execute();
                  $result = $stmt4->get_result();
                  while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                  }
                  $stmt4->close();
                ?>
            </select>
          </div>
          <div class="w3-padding w3-third">
            <span class="w3-left w3-padding">Đánh giá: </span>
            <input class="w3-input w3-border w3-third" min="1" max="100" type="number" placeholder="%" name="rate" required />
          </div>
          <div class="w3-padding w3-third">
            <button type="submit" class="w3-button w3-black " name="addSkill" >Thêm</button> 
          </div>  
        </div>
      </form> 
      <div class="w3-padding">
        <table class="w3-table w3-striped w3-bordered w3-hoverable">
          <?php echo $toReturn ?>
        </table>
      </div>
    </div>

    <!-- Footer -->
    <?php include("../../footer.php"); ?>
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="./" title="Origen" target="_blank" class="w3-hover-opacity">Origen</a></div>

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
/*  */
</script>

</body>
</html>
