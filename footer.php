<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third w3-center w3-margin-right" style="width:35%;">
      <h4><strong>ORIGEN</strong></h4>
      <p>Origen - nơi cung cấp dịch vụ an toàn, tiện ích, nhanh chóng về tuyển dụng cũng như tìm kiếm việc làm cho sinh viên và các doanh nghiệp.</p>
    </div>
  
    <div class="w3-third w3-center w3-border-left w3-border-right <?php if (($_SESSION["role"]) !== "organization") { ?> w3-hide <?php }?> " style="width:20%;">
      <h4><strong>DOANH NGHIỆP</strong></h4>
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:40%;" class="w3-round">
      <p><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
    </div>
    <div class="w3-third w3-center w3-border-left w3-border-right <?php if (($_SESSION["role"]) !== "student") { ?> w3-hide <?php }?> " style="width:20%;">
      <h4><strong>SINH VIÊN</strong></h4>
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:40%;" class="w3-round">
      <p><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
    </div>
    <div class="w3-third w3-center w3-border-left w3-border-right <?php if (($_SESSION["role"]) !== "teacher") { ?> w3-hide <?php }?> " style="width:20%;">
      <h4><strong>GIÁO VIÊN</strong></h4>
      <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" style="width:40%;" class="w3-round">
      <p><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
    </div>

    <div class="w3-third w3-center w3-margin-left" style="width:35%;">
      <h4><strong>POPULAR TAGS</strong></h4>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Work At</span> 
        <span class="w3-tag w3-grey w3-margin-bottom">New York</span> 
        <span class="w3-tag w3-grey w3-margin-bottom">London</span>
        <span class="w3-tag w3-grey w3-margin-bottom">China</span>
        <br> 
        <span class="w3-tag w3-black w3-margin-bottom">Jobs</span> 
        <span class="w3-tag w3-grey w3-margin-bottom">JAVA WEB</span>
        <span class="w3-tag w3-grey w3-margin-bottom">PHP DEV</span> 
        <span class="w3-tag w3-grey w3-margin-bottom">RUBY</span> 
        <span class="w3-tag w3-grey w3-margin-bottom">ANGULAR</span>
        <span class="w3-tag w3-grey w3-margin-bottom">NODE JS</span>
      </p>
    </div>

  </div>
</footer>
</html>