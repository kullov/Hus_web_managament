<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "organization") {
  header("location: ../../");
  exit;
}
// Include config file
require "../../config.php";

// INSERT INTO `request` (`id`, `organization_id`, `position`, `amount`, `date_created`, `status`, `description`, `type`) VALUES (NULL, '1', 'Java Dev', '4', '2019-11-18', '1', 'abcde', 'Fulltime');

// Define variables and initialize with empty values
$id_request = $name = $amount = $position = $type = $status = $description = "";
$listSkill = "";
$name_err = $amount_err = $position_err = $type_err = $description_err = $status_err = "";
$organization_id = $_SESSION["id"];
// Prepare a select statement
// Câu SQL lấy danh sách
// $sql = "SELECT id, first_name, last_name, email, phone, date_of_birth, class_name, join_date, avatar, description FROM intern_profile WHERE code = ?";
 
// if ($stmt = mysqli_prepare($link, $sql)) {
  
//   // Bind variables to the prepared statement as parameters
//   mysqli_stmt_bind_param($stmt, "s", $username);

//   // Attempt to execute the prepared statement
//   if (mysqli_stmt_execute($stmt)) {
//     // Store result
//     mysqli_stmt_store_result($stmt);
//     // Check if username exists, if yes then verify password
//     if (mysqli_stmt_num_rows($stmt) == 1) {
//       // Bind result variables
//       mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $email, $phone, $date_of_birth, $class_name, $join_date, $avatar, $description);
//       mysqli_stmt_fetch($stmt);
//     }
//   } else {
//     echo "Oops! Something went wrong. Please try again later.";
//   }
//   // Close statement
//   mysqli_stmt_close($stmt);
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Processing form data when form is submitted
  // Validate name
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter name of request!";
  } else {
    $name = trim($_POST["name"]);
  }
  
  // Validate description
  // if (empty(trim($_POST["description"]))) {
  //   $description_err = "Please enter description!";
  // } else {
    $description = trim($_POST["description"]);
    // }
    
  // Validate position
  if (empty(trim($_POST["position"]))) {
    $position_err = "Please enter the position!";
  } else {
    $position = trim($_POST["position"]);
  }

  // Validate type
  if (empty(trim($_POST["type"]))) {
    $type_err = "Please choose type!";
  } else {
    $type = trim($_POST["type"]);
  }

  // Validate amount
  if (empty(trim($_POST["amount"]))) {
    $amount_err = "Please enter the amount of this job!";
  } else {
    $amount = trim($_POST["amount"]);
  }

  // Validate status
  if (empty(trim($_POST["status"]))) {
    $status_err = "Please choose status!";
  } else {
    $status = trim($_POST["status"]);
  }
  // $code = trim($_POST["code"]);

  // Prepare an insert statement
  $sql = " INSERT INTO `request` (`organization_id`, `position`, `amount`, `status`, `description`, `type`) VALUES (?, ?, ?, ?, ?, ?);";

  if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $organization_id, $position, $amount, $status, $description, $type);
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to login page
      header("location: scr_1002.php");
    } else {
      echo "<h4 class='w3-center w3-text-red' style='margin-top:100px; z-index:100; margin-left:300px'>Something went wrong. Please try again later. $organization_id, $position , $amount, $status, $description, $type</h1>";
    }
    mysqli_stmt_close($stmt);
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
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php include("../../navigation.php"); ?>
<div style=" margin-top: 55px;">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-white w3-bar-block w3-collapse w3-top w3-center w3-padding" style="z-index:3;width:300px; margin-top: 55px;" id="mySidebar">
    <h3><b>NEWWAVE <br>Solution JSC</b></h3>
    <p><i>Tạo mới phiếu yêu cầu của doanh nghiệp</i></p>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">ĐÓNG</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">THÔNG TIN</a> 
    <a href="#require" onclick="w3_close()" class="w3-bar-item w3-button">YÊU CẦU</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">LIÊN HỆ</a>
    <a href="scr_1002.php" onclick="w3_close()" class="w3-bar-item w3-button">TRỞ VỂ</a>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;">

    <form action="#" id="form1" method="post">
      <div id="about" class="w3-container">
        <h4><strong>THÔNG TIN</strong></h4>
        <div class="w3-row-padding">
          <div class="w3-padding">
            <input class="w3-input w3-animate-input" type="text" name="name" value="<?php echo $name ?>" placeholder="NHẬP TÊN PHIẾU YÊU CẦU" style="width:30%" />
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fa fa-fw fa-male"></i> Số lượng cần tuyển:</label>
            <p><input class="w3-input w3-border" type="text" name="amount" value="<?php echo $amount ?>" placeholder="" required></p>
          </div>
          <div class="w3-half w3-padding">
            <label>Vị trí tuyển dụng:</label>
            <p><input class="w3-input w3-border" type="text" placeholder="" name="position" value="<?php echo $position ?>" required></p>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label>Trạng thái:</label>
            <p>
              <select class="w3-select w3-border" name="status" value="<?php echo $status ?>" required>
                <option value="" disabled selected>Chọn trạng thái</option>
                <option value="1">Còn hiệu lực</option>
                <option value="2">Quá hạn</option>
              </select>
            </p>
          </div>
          <div class="w3-half w3-padding">
            <label>Hình thức làm việc:</label>
            <p>
              <span>
                <input class="w3-radio" type="radio" name="type" value="fulltime" checked>
                <label>Fulltime</label>
              </span>
              <span class="w3-padding">
                <input class="w3-radio" type="radio" name="type" value="partime">
                <label>Partime</label>
              </span>
            </p>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fas fa-map-marker-alt"></i> Địa chỉ làm việc:</label>
            <p><input class="w3-input w3-border" type="text" disabled value="<?php echo htmlspecialchars($_SESSION["address_organization"]); ?>" placeholder=""></p>
          </div>
          <div class="w3-half w3-padding">
            <label><i class="fa fa-fw fa-clock-o"></i> Thời gian làm việc:</label>
            <p><input class="w3-input w3-third" type="time" disabled style="width:125px;" value="08:00" placeholder=""> <span class="w3-center w3-padding w3-third" style="width:50px;">To</span> <input class="w3-input w3-third" disabled style="width:125px;" type="time" placeholder="" value="17:00"></p>
          </div>
        </div>
        <hr>
        
        <h4><strong>Mô tả công việc</strong></h4>
        <div class="w3-row-padding">
          <div class="w3-padding">
            <textarea class="w3-input w3-border" type="textarea" placeholder="Thêm mô tả" name="description" value="<?php echo $description?>" ></textarea>
          </div>
        </div>
        <hr>

        <h4><strong>Phúc lợi</strong></h4>
        <div class="w3-row w3-large">
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-shower"></i> Playing</p>
            <p><i class="fa fa-fw fa-wifi"></i> WiFi</p>
            <p><i class="fa fa-fw fa-tv"></i> TV</p>
          </div>
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-cutlery"></i> Kitchen</p>
            <p><i class="fa fa-fw fa-thermometer"></i> Heating</p>
            <p><i class="fa fa-fw fa-wheelchair"></i> Accessible</p>
          </div>
        </div>
        <div>
          <h4>Ngoài ra, bạn sẽ được hưởng:</h4>
          <p>• Mức lương hỗ trợ từ 3 triệu VND trở lên</p>
          <p>• Môi trường làm việc chuyên nghiệp</p>
          <p>• Có cơ hội thăng tiến, đào tạo</p>
        </div>
      </div>
      <hr>
      
      <!-- Yêu cầu -->
      <div class="w3-container" id="require">
        <br><br><br>
        <h4><strong>YÊU CẦU</strong></h4>
        <!-- <div class="w3-row-padding">
          <div class="w3-padding w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Thêm yêu cầu" id="addRequire" />
          </div>
          <div class="w3-padding w3-half">
            <input type="button" class="w3-button w3-black" onclick="addListRequire()" value="Thêm" id="submitRequire" />
          </div>
        </div>
        <div class="w3-padding results">
          <ul id="listRequire" name="list_require">
          </ul>
        </div> -->
        <h6><strong>Yêu cầu thêm:</strong></h6>
        <ul class="w3-ul w3-padding">
          <li class="item">Tốt nghiệp Đại học nước ngoài hoặc tốt nghiệp hệ kỹ sư tài năng các trường Đại học chính quy như ĐH Quốc Gia Hà Nội, ĐH Bách Khoa, ĐH Khoa học tự nhiên, Đại học FPT…</li>
          <li class="item">Có kinh nghiệm lập trình về <b>Java</b></li>
          <li class="item">Có thể làm việc bằng tiếng Anh với người nước ngoài – tương đương TOEFL iBT 85 điểm trở lên</li>
          <li class="item">Có kỹ năng làm việc nhóm, có tinh thần trách nhiệm cao.</li>
          <li class="item">Ưu tiên kinh nghiệm với AngularJS (từ 2 trở lên), CSS (SASS), HTML5, Bootstrap</li>
          <li class="item">Ưu tiên kinh nghiệm với Java 8, Spring Boot, Hibernate, Rest APIs, Micro services, design patterns và TDD</li>
          <li class="item">Cam kết thực tập tối thiểu 3 tháng</li>
        </ul>
      </div>
      <p class="w3-center">
        <button type="submit" class="w3-button w3-teal" name="submit" value="save">Tạo mới</button>
        <button type="reset" class="w3-button w3-dark-grey">Làm lại</button>
      </p>
    </form>
    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h3><b>LIÊN HỆ</b></h3>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($_SESSION["email_organization"]); ?></p>
        </div>
        <div class="w3-third w3-teal">
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($_SESSION["address_organization"]); ?> 334 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($_SESSION["contact_organization"]); ?></p>
        </div>
      </div>
    </div>

        
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
