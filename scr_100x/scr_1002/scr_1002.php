<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "organization") {
  header("location: ../../");
  exit;
}

// Include config file
require_once "../../config.php";

// Define variables and initialize with empty values
$tax_number = $name = $address = $contact = $description = "";
$id = $_SESSION["id"];
// Prepare a select statement
$sql = "SELECT id, tax_number, name, address, contact, description FROM organization_profile WHERE id = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
  
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "s", $id);

  // Attempt to execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Store result
    mysqli_stmt_store_result($stmt);
    // Check if tax exists, if yes then verify password
    if (mysqli_stmt_num_rows($stmt) == 1) {
      // Bind result variables
      mysqli_stmt_bind_result($stmt, $id, $tax_number, $name, $address, $contact, $description);
      mysqli_stmt_fetch($stmt);
    }
  } else {
    echo "Oops! Something went wrong. Please try again later.";
  }
}
// Close statement
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html>
<title>Organization</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br>
      <h3><b><?php echo htmlspecialchars($name); ?></b></h3>
      <p class="w3-text-grey"><i>Organization</i></p>
    </div>
    
    <div class="w3-bar-block">
      <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
      <a href="#list-require" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>DANH SÁCH PHIẾU YÊU CẦU</a> 
      <a href="#assignment" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sitemap w3-margin-right"></i>BẢNG PHÂN CÔNG</a>
      <a href="scr_1002C.php" class="w3-bar-item w3-button w3-padding"><i class="	fas fa-folder-plus w3-margin-right"></i>TẠO PHIẾU YÊU CẦU</a>
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
        <h1><b>My profile</b></h1>
      </div>
    </header>

    <div class="w3-container">
      <p><?php echo htmlspecialchars($description); ?></p>
      <div class="w3-container">
        <h4><strong>KHÔNG GIAN</strong></h4>
        <div class="w3-display-container mySlides">
          <img src="https://we25.vn/media/images/anh3(13).jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://file4.batdongsan.com.vn/resize/745x510/2019/06/10/20190610085624-b7e0_wm.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
          </div>
        <div class="w3-display-container mySlides">
          <img src="https://cogo.vn/2018_cogo_contents/images/SYL_7995.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
        <div class="w3-display-container mySlides">
          <img src="https://znews-photo.zadn.vn/w660/Uploaded/wyhktpu/2018_05_10/image007.jpg" style="width:100%;height:420px;margin-bottom:-6px">
          <div class="w3-display-bottomleft w3-container w3-black">
            <p>Công ty của chúng tôi</p>
          </div>
        </div>
      </div>
      <div class="w3-row-padding w3-section">
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://we25.vn/media/images/anh3(13).jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(1)" title="Living room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://cogo.vn/2018_cogo_contents/images/SYL_7995.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://znews-photo.zadn.vn/w660/Uploaded/wyhktpu/2018_05_10/image007.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="https://file4.batdongsan.com.vn/resize/745x510/2019/06/10/20190610085624-b7e0_wm.jpg" style="width:100%;height:106px;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
        </div>
      </div>
    </div>

    <div id="list-require" style="padding-top:1px;">
      <hr>
      <br>
      <h3 class="w3-container"><b>Danh sách phiếu yêu cầu</b></h3>
      <!-- Second Photo Grid-->
      <?php 
        // echo $listRequest 
        if ($_SESSION["role"] === "organization") {
          $stmt4 = $link->prepare("SELECT r.`id`, o.`name`, r.`position`, o.`address`, r.`amount`, r.`date_created`, r.`description`, r.`type`, r.`status`, ( SELECT COUNT(*) FROM `request_assignment` ra WHERE ra.request_id = r.id ) assignment FROM `request` r, organization_profile o WHERE r.`organization_id` = o.id AND o.`id` = ? ORDER BY r.id DESC LIMIT 6" );
          $stmt4->bind_param("s", $id);
          $stmt4->execute();
          $result = $stmt4->get_result();
          echo '<div class="w3-row-padding">';
          $i = 1;
          while($row = $result->fetch_assoc()) {
            echo '
            <div class="w3-third w3-container w3-margin-bottom">
              <img src="https://www.ourlincolnpark.com/wp-content/uploads/2014/07/I-wish-it-were-that-easy.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
              <div class="w3-container w3-white" style="height:270px;">
                <h3 class="w3-center"><i>Vị trí: </i><b>'.$row['position'].'</b></h3>
                <h4><i class="fa fa-diamond fa-fw"></i>  Công ty: '.$row['name'].'</h4>
                <p><i class="fa fa-fw fa-male"></i> Chúng tôi cần: <b>'.$row['amount'].'</b> người</p>
                <p><i "fa fa-fw fa-check-square"></i> Số lượng đã đăng ký: <b>'.$row['assignment'].'</b></p>
                <p><i class="fa fa-map-pin fa-fw"></i> Địa điểm làm việc: '.$row['address'].'</p>
                <p><i class="fa fa-fw fa-check"></i> Trạng thái: ';
            if ( $row['status'] === 2) {
              echo 'Hết hiệu lực';
            } else {
              echo 'Còn hiệu lực';
            }
            echo '</p>
              </div>
              <div class="w3-white" style="height: 38px;">
                <form action="scr_1002E.php?id='.$row["id"].'" method="post"><button type="submit" name='.$i.' class="w3-button w3-right w3-green">Chi tiết</button></form>
              </div>
            </div>';
            // if (isset($_POST[$i])) {
            //   session_start();
            //   // Store data in session variables
            //   $_SESSION["request_id"] = $row["id"];
            //   echo '<script>window.location.replace("scr_1002E.php?id='.$row['id'].'");</script>';
            // }
            $i++;
          }
          echo '</div>';
          
          $stmt4->close();
        }
        
      ?>
      
      <div class="w3-center w3-padding-32 w3-row-padding">
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
    <!-- Assignment -->
    <div class="w3-container" id="assignment">
      <hr>
      <br>
      <h3><b>Bảng phân công</b></h3>
      <table class="w3-table w3-striped w3-bordered w3-centered w3-hoverable w3-margin-bottom">
        <tr>
          <th name="organization_request_id">Mã phiếu yêu cầu</th>
          <th name="student_id">Mã sinh viên</th>
          <th name="name_student">Tên sinh viên</th>
          <th name="start_date">Ngày bắt đầu thực tập</th>
          <th name="end_date">Ngày kết thúc thực tập</th>
          <th name="position">Vị trí thực tập</th>
          <th name="status">Trạng thái</th>
          <th name="create_date">Thời gian phân công</th>
        </tr>
        <?php 
          // echo $listRequest 
          $stmt = $link->prepare("SELECT ra.`id`, ra.`request_id` as request_id, re.position, o.name AS organization_name, i.code, i.first_name, i.last_name, ra.`start_date`, ra.`end_date`, s.name AS STATUS , ra.`date_created` FROM `request_assignment` ra, request re, organization_profile o, intern_profile i, STATUS s WHERE o.tax_number = ? AND ra.request_id = re.id AND re.organization_id = o.id AND ra.intern_id = i.id AND ra.status = s.id ORDER BY ra.request_id DESC LIMIT 20" );
          $stmt->bind_param("s", $tax_number);
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
                <td>'.$row['position'].'</td>
                <td>'.$row['STATUS'].'</td>
                <td>'.$row['date_created'].'</td>
              </tr>
            ';
          }
          
          $stmt->close();
          // Close connection
          mysqli_close($link);
        ?>
      </table>
      <br><br>
    </div>
    <!-- Contact Section -->
    <div id="contact" class="w3-container w3-padding-large w3-grey">
      <br>
      <br>
      <h3><b>Contact Me</b></h3>
      <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($name); ?></p>
        </div>
        <div class="w3-third w3-teal">
          <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($address); ?></p>
        </div>
        <div class="w3-third w3-dark-grey">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p><?php echo htmlspecialchars($contact); ?></p>
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
// Slideshow Apartment Images
var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
      }
      x[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " w3-opacity-off";
    }
</script>

</body>
</html>
