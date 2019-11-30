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

// Define variables and initialize with empty values
$name = $amount = $position = $type = $status = $description = "";
$skill = $item = "";
$name_err = $amount_err = $position_err = $type_err = $description_err = $status_err = "";
$organization_id = $_SESSION["id"];

$id_request = trim($_GET["id"]);

$stmt = $link->prepare("SELECT r.`id`, r.`organization_id`, r.`position`, r.`amount`, r.`status`, r.`description`, r.`type` FROM `status` s, `request` r WHERE s.id = r.status AND r.id = ?");
$stmt->bind_param("s", $id_request);
if ($stmt->execute()) {
  $stmt->bind_result($id_request, $organization_id, $position, $amount, $status, $description, $type);
  $stmt->fetch();
} else {
  echo "<script>alert('Failed!!')</script>";
  exit;
}
$stmt->close();

$id_a = "";
$ability_id = $ability_required = $description_ability = $toReturn = "";
function loadSkill() {
  global $link, $toReturn,$id_request;
  global $id_a;
  $stmt4 = $link->prepare("SELECT r_b.`ability_id`, a_d.`name`, r_b.`request_id` FROM `request_ability` r_b, `ability_dictionary` a_d WHERE r_b.`ability_id` = a_d.`id` AND r_b.`request_id` = ?");
  $stmt4->bind_param("s", $id_request);
  $stmt4->execute();
  $result_skill = $stmt4->get_result();
  while($row = $result_skill->fetch_assoc()) {
    $toReturn = $toReturn. 
      "<form action='scr_1002E.php?id=".$row['request_id']."' method='post'><tr>
        <td value='".$row['ability_id']."'><i class='fas fa-star'></i>   ".$row['name']." 
          <input type='hidden' name='id' value=".$row["ability_id"]." />
          
        </td>
        <td><button type='submit' name='deletebtn' class='w3-right w3-button w3-red'>Xóa</button></td>
        </tr></form>";
    $id_a = $row['ability_id'];
  }
  $stmt4->close();
}
loadSkill();
//Delete skill
if (isset($_POST['deletebtn'])) {
  $did=$_POST['id'];
  $stmt5 = $link->prepare("DELETE FROM `request_ability` WHERE ability_id = ?;");
  $stmt5->bind_param("s", $did);
  if ($stmt5->execute()) {
    echo "<script>alert('Xóa kỹ năng thành công!')</script>";
    header('location: scr_1002E.php?id='.$id_request);
    exit;
  } else {
    echo "<script>alert('Failed!!')</script>";
    header('location: scr_1002E.php?id='.$id_request);
    exit;
  }
  $stmt5->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Processing form data when form is submitted
  if (isset($_POST['save'])) {
    
    $description = trim($_POST["description"]);
      
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
    $sql = " UPDATE `request` SET `organization_id` = ?, `position` = ?, `amount` = ?, `status` = ?, `description` = ?, `type` = ? WHERE `request`.`id` = ?;";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssss", $organization_id, $position, $amount, $status, $description, $type, $id_request);
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>document.getElementById('form1').style.display = 'none';</script>";
        echo "<script>alert('Lưu thành công!');</script>";
      } else {
        echo "<h4 class='w3-center w3-text-red' style='margin-top:100px; z-index:100; margin-left:300px'>Something went wrong. Please try again later. $organization_id, $position , $amount, $status, $description, $type</h1>";
      }
      mysqli_stmt_close($stmt);
    }
  }
}

?>

<!DOCTYPE html>
<html>
<title>Biên tập phiếu yêu cầu</title>
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
    <h3 class="w3-center w3-padding"><strong>BIÊN DỊCH PHIẾU YÊU CẦU</strong></h3>
    <form action="scr_1002E.php?id=<?php echo $id_request ?>" method="post">
      <div id="about" class="w3-container">
        <h4><strong>THÔNG TIN</strong></h4>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fa fa-fw fa-male"></i> Số lượng cần tuyển:</label>
            <p><input class="w3-input w3-border" type="text" name="amount" value="<?php echo $amount ?>" placeholder="" required></p>
          </div>
          <div class="w3-half w3-padding">
            <label><i class="far fa-dot-circle"></i> Vị trí tuyển dụng:</label>
            <p><input class="w3-input w3-border" type="text" placeholder="" name="position" value="<?php echo $position ?>" required></p>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fas fa-check-square"></i> Trạng thái:</label>
            <p>
              <select class="w3-select w3-border" name="status" value="<?php echo $status ?>" required>
                <option <?php if ($status == 1) { ?> selected <?php }?> value="1">Còn hiệu lực</option>
                <option <?php if ($status == 2) { ?> selected <?php }?> value="2">Hết hiệu lực</option>
              </select>
            </p>
          </div>
          <div class="w3-half w3-padding">
            <label><i class="fa fa-star-half-full"></i> Hình thức làm việc:</label>
            <p>
              <select class="w3-select w3-border" name="type" value="<?php echo $type ?>" required>
                <option <?php if ($type == "Fulltime") { ?> selected <?php }?> value="Fulltime">Fulltime</option>
                <option <?php if ($type == "Partime") { ?> selected <?php }?> value="Partime">Partime</option>
              </select>
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
            <textarea class="w3-input w3-border" type="text" placeholder="Thêm mô tả" name="description" value="<?php echo $description?>" ><?php echo $description?></textarea>
          </div>
        </div>
        <hr>
      </div>
      <div class="w3-row-padding w3-center">
        <button type="submit" class=" w3-button w3-teal" name="save" >Lưu lại</button>
      </div>
    </form>
    <div class="w3-padding" id="require">
      <br><br>
      <h4><strong>Danh sách năng lực</strong></h4>
      <div class="w3-row-padding">
        <form action="addSkill.php?id=<?php echo $id_request?>" method="post">
          <div id="myDIV" class="header w3-padding w3-third">
            <select class="w3-input w3-border" name="item" value="<?php echo $item ?>" >
              <option value="0" disabled selected>Thêm kỹ năng</option>
              <?php 
                $stmt4 = $link->prepare("SELECT a_d.id, a_d.name FROM ability_dictionary a_d WHERE a_d.id NOT IN(SELECT c.ability_id FROM request_ability c  WHERE c.request_id = ? GROUP BY c.ability_id)");
                $stmt4->bind_param("s", $id_request);
                $stmt4->execute();
                $result = $stmt4->get_result();
                while($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                }
                $stmt4->close();
              ?>
            </select>
          </div>
          <div class="w3-padding w3-half">
            <button type="submit" class="w3-button w3-black" name="addSkill" >Thêm</button>
          </div>
        </form>
      </div>
      <div class="w3-padding">
        <table class="w3-table w3-striped w3-bordered w3-hoverable">
          <?php echo $toReturn ?>
        </table>
      </div>
    </div>

    <hr />
<?php 
  
?>
    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h3><b>LIÊN HỆ</b></h3>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p>ttnga912@gmail.com</p>
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

</script>

</body>
</html>
