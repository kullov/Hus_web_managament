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
$code = $request_id = $start_date = $end_date = "";
$request_id_err = $student_id_err = $code_err = "";

// Processing form data when form is submitted
if (isset($_POST["submitbtn"])) {

  // Validate request_id
  if (empty(trim($_POST["request_id"]))) {
    $request_id_err = "Please choose the request id!";
  } else {
    $request_id = trim($_POST["request_id"]);
  }

  // Validate student_id
  if (empty(trim($_POST["student_id"]))) {
    $student_id_err = "Please choose the student id!";
  } else {
    $student_id = trim($_POST["student_id"]);
  }
  
  // $code = trim($_POST["code"]);
  // Validate start_date
  if (!empty(trim($_POST["start_date"]))) {
    $start_date = trim($_POST["start_date"]);
  }
  // Validate end date
  if (!empty(trim($_POST["end_date"]))) {
    $end_date = trim($_POST["end_date"]);
  }

  // Prepare an insert statement
  $sql = " INSERT INTO `request_assignment` (`request_id`, `intern_id`, `start_date`, `end_date`, `status`) VALUES (?, ?, ?, ?, '2');";

  if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssss", $request_id, $student_id, $start_date, $end_date);
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to login page
      echo "<script>alert('Thành công!')</script>";
      header("location: scr_1003S.php");
    } else {
      echo "<script>alert('Thất bại!')</script>";
      echo "Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
  }
}
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
    <!-- DANH SÁCH ĐÃ PHÂN CÔNG -->
    <div class="w3-container">
      <br>
      <br>
      <h3 class="w3-container w3-center"><i>Danh sách đã phân công</i></h3>
      <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-margin-bottom w3-right"><i class="fas fa-user-plus w3-margin-right"></i>Thêm sinh viên</button>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
        <tr>
          <th name="organization_request_id">Mã phiếu yêu cầu</th>
          <th>Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th >Ngày bắt đầu thực tập</th>
          <th >Ngày kết thúc thực tập</th>
          <th name="organization_name">Công ty thực tập</th>
          <th name="status">Trạng thái</th>
          <th name="create_date">Thời gian phân công</th>
        </tr>
        <?php 
          $stmt = $link->prepare("SELECT ra.`id`, ra.`request_id` as request_id, o.name AS organization_name, i.code, i.first_name, i.last_name, ra.`start_date`, ra.`end_date`, s.name AS STATUS , ra.`date_created` FROM `request_assignment` ra, request re, organization_profile o, intern_profile i, STATUS s WHERE ra.request_id = re.id AND re.organization_id = o.id AND ra.intern_id = i.id AND ra.status = s.id ORDER BY ra.id DESC LIMIT 20" );
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()) {
            echo '
              <tr>
                <td>'.$row['request_id'].'</td>
                <td>'.$row['code'].'</td>
                <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                <td>'.$row['start_date'].'</td>
                <td>'.$row['end_date'].'</td>
                <td>'.$row['organization_name'].'</td>
                <td>'.$row['STATUS'].'</td>
                <td>'.$row['date_created'].'</td>
              </tr>
            ';
          }
          
          $stmt->close();
        ?>
      </table>
    </div>

    <!-- DANH SÁCH CHƯA PHÂN CÔNG -->
    <div class="w3-container" id="notAssigned">
      <br>
      <br>
      <h3 class="w3-container w3-center"><i>Danh sách chưa phân công</i></h3>
      <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-teal w3-margin-bottom w3-right"><i class="fas fa-user-plus w3-margin-right"></i>Thêm sinh viên</button>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
        <tr>
          <th>Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th name="class_name">Lớp</th>
          <th>Ngày sinh</th>
          <th>Email</th>
          <th>Số điện thoại</th>
        </tr>
        <?php 
          $str = "";
          // echo $listRequest 
          $stmt1 = $link->prepare("SELECT `id`, `code`, `first_name`, `last_name`, `date_of_birth`, `email`, `phone`, class_name FROM `intern_profile` WHERE id NOT IN( SELECT ra.intern_id FROM request_assignment ra GROUP BY ra.intern_id) ORDER BY id ASC LIMIT 20" );
          $stmt1->execute();
          $result = $stmt1->get_result();
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $str = $str . '<option value="'.$row['id'].'" >'.$row['code']. ' | '.$row['first_name'].' '.$row['last_name'].'</option>';
            echo '
              <tr>
                <td>'.$row['code'].'</td>
                <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                <td>'.$row['class_name'].'</td>
                <td>'.$row['date_of_birth'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
              </tr>
            ';
          }
          
          $stmt1->close();
        ?>
      </table>
      <hr>
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
    </div>

        
    <!-- Footer -->
    <?php include("../../footer.php"); ?>
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="./" title="Origen" target="_blank" class="w3-hover-opacity">Origen</a></div>

  <!-- End page content -->
  </div>
</div>
<!-- SCR_1003S1 -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content" style="padding-bottom:50px;">
    <div class="w3-row-padding w3-center w3-container">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <h3 class="w3-container w3-center"><i>PHÂN CÔNG SINH VIÊN ĐÃ ĐĂNG KÝ</i></h3>
      <form action='' method='POST'>
        <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable">
          <tr>
            <th>STT</th>
            <th name="student_id">Mã sinh viên</th>
            <th name="name_student">Tên sinh viên</th>
            <th name="organization_request_id">Mã phiếu yêu cầu</th>
            <th name="date_of_birth">Ngày sinh</th>
            <th name="email">Email</th>
            <th name="class_name">Lớp</th>
            <th>Thao tác</th>
          </tr>
          <?php 
            // echo $listRequest 
            $stmt = $link->prepare("SELECT  i.`id`,  i.`code`,  i.`first_name`,  i.`last_name`,  i.`date_of_birth`,  i.`email`, i.`phone`,  i.`class_name`, r.`request_id`, r.`start_date`, r.`end_date` FROM  `intern_profile` i, `register` r WHERE i.`id` = r.`intern_id` AND i.`id` NOT IN(  SELECT  ra.`intern_id`  FROM  request_assignment ra  GROUP BY  ra.`intern_id`) ORDER BY i.`id` ASC" );
            // $stmt = $link->prepare("SELECT  `id`,  `code`,  `first_name`,  `last_name`,  `date_of_birth`,  `email`, `phone`,  class_name FROM  `intern_profile` WHERE id NOT IN(  SELECT  ra.intern_id  FROM  request_assignment ra  GROUP BY  ra.intern_id) AND id IN(  SELECT  `id` FROM  `register`  GROUP BY  intern_id) ORDER BY id ASC" );
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 1;
            while($row = $result->fetch_assoc()) {
              echo '
                <tr class="tblRows" data="'.$row['code'].' '.$row['first_name'].' '.$row['last_name'].' '.$row['request_id'].'">
                <td>'.$i.'</td>
                <td>'.$row['code'].'</td>
                  <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                  <td>'.$row['request_id'].'</td>
                  <td>'.$row['date_of_birth'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['class_name'].'</td>
                  <td><input type="submit" name='.$i.' class="btn-sm w3-center w3-button w3-teal w3-hover-black" value="Chọn" /></td>
                </tr>
              ';
              if (isset($_POST[$i])) {
                $intern_id = $row["id"];
                $request_id = $row["request_id"];
                $start_date = $row["start_date"];
                $end_date = $row["end_date"];
                // Prepare an insert statement
                $sql = "INSERT INTO `request_assignment` (intern_id, request_id, start_date, end_date) VALUES (?, ?, ?, ?)";

                if ($stmt = mysqli_prepare($link, $sql)) {
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "ssss", $intern_id, $request_id, $start_date, $end_date);
                  // Attempt to execute the prepared statement
                  if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Phân công thành công!")</script>';
                    echo '<script>window.location.replace("scr_1003S.php");</script>';
                  } else {
                    echo '<script>alert("Phân công thất bại!")</script>';
                  }
                }
              }
              $i++;
            }
            $stmt->close();
          ?>
        </table>
      </form>
    </div>
  </div>	
</div>

<!-- SCR_1003S2 -->
<div id="id02" class="mfp-hide w3-modal">
  <div class="contact-form1 w3-modal-content">
    <div class="w3-row-padding w3-center w3-container">
      <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <h3 class="w3-container w3-center"><i>PHÂN CÔNG SINH VIÊN</i></h3>
      <form action="scr_1003S.php" method="post">
        <div class="w3-half w3-padding-large <?php echo (!empty($student_id_err)) ? 'has-error' : ''; ?>">
          <select class="w3-select w3-border" name="student_id" required value="<?php echo $student_id; ?>">
            <option value="" disabled selected>Chọn sinh viên</option>
            <?php echo $str ?>
          </select>
        </div>
        <div class="w3-half w3-padding-large <?php echo (!empty($request_id_err)) ? 'has-error' : ''; ?>">
          <select class="w3-select w3-border" name="request_id" required value="<?php echo $request_id; ?>">
            <option value="" disabled selected>Chọn phiếu yêu cầu</option>
            <?php 
              $str = "";
              $stmt = $link->prepare("SELECT r.`id`, r.`organization_id`, r.`position`, r.`amount`, ( SELECT COUNT(*) FROM `request_assignment` ra WHERE ra.request_id = r.id ) assignment, r.`date_created`, r.`description`, r.`type` FROM `request` r, request_assignment ra WHERE r.status = 2 AND r.amount >( SELECT COUNT(*) FROM `request_assignment` ra WHERE ra.request_id = r.id ) GROUP BY r.id DESC" );
              $stmt->execute();
              $result = $stmt->get_result();
              $i = 0;
              while($row = $result->fetch_assoc()) {
                $amount = $row['amount'];
                $assignment = $row['assignment'];
                $opening = $amount - $assignment;
                echo '<option value="'.$row['id'].'" > Mã: '.$row['id']. ' | Vị trí: '.$row['position'].' | Số lượng: '.$opening.'</option>';
              }
              
              $stmt1->close();
              // Close connection
              // mysqli_close($link);
            ?>
          </select>
        </div>
        <div class="w3-half w3-padding-large">
          <p><label><i class="fa fa-calendar-check-o"></i> Ngày bắt đầu</label></p>
          <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="start_date" required value="<?php echo $start_date; ?>">
        </div>
        <div class="w3-half w3-padding-large">
          <p><label><i class="fa fa-calendar-o"></i> Ngày kết thúc</label></p>
          <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="end_date" required value="<?php echo $end_date; ?>">
        </div>
        <div class="w3-padding-large">
          <input class="w3-button w3-teal" name="submitbtn" type="submit" value="Phân công">
        </div>
      </form>
    </div>
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
