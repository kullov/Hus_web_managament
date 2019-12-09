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
  // echo $listRequest 
  $stmt = $link->prepare("SELECT  i.`id`,  i.`code`,  i.`first_name`,  i.`last_name`,  i.`date_of_birth`,  i.`email`, i.`phone`,  i.`class_name`, r.`request_id`, r.`start_date`, r.`end_date` FROM  `intern_profile` i, `register` r WHERE i.`id` = r.`intern_id` AND i.`id` NOT IN(  SELECT  ra.`intern_id`  FROM  request_assignment ra  GROUP BY  ra.`intern_id`) ORDER BY i.`id` ASC" );
  $stmt->execute();
  $result = $stmt->get_result();
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
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-row-padding w3-center w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h3 class="w3-container w3-center"><i>Danh sách sinh viên đã đăng ký nhưng chưa được phân công</i></h3>
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
  

</body>
<script>
document.getElementById('id01').style.display='block';
</script>
</html>
