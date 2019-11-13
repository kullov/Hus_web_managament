<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("location: scr_100/login/login.php");
//   exit;
// }
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

    <form action="/action_page.php" target="_blank">
      <div id="about" class="w3-container">
        <h4><strong>THÔNG TIN</strong></h4>
        <div class="w3-row-padding">
          <div class="w3-padding">
            <input class="w3-input w3-animate-input" type="text" placeholder="NHẬP TÊN PHIẾU YÊU CẦU"  style="width:30%" />
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fa fa-fw fa-male"></i> Số lượng cần tuyển:</label>
            <p><input class="w3-input w3-border" type="text" placeholder=""></p>
          </div>
          <div class="w3-half w3-padding">
            <label>Vị trí tuyển dụng:</label>
            <p><input class="w3-input w3-border" type="text" placeholder=""></p>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label>Trạng thái:</label>
            <p>
              <select class="w3-select w3-border" name="option">
                <option value="" disabled selected>Chọn trạng thái</option>
                <option value="0">Còn hiệu lực</option>
                <option value="1">Quá hạn</option>
              </select>
            </p>
          </div>
          <div class="w3-half w3-padding">
            <label>Hình thức làm việc:</label>
            <p>
              <span>
                <input class="w3-radio" type="radio" name="gender" value="male" checked>
                <label>Fulltime</label>
              </span>
              <span class="w3-padding">
                <input class="w3-radio" type="radio" name="gender" value="female">
                <label>Partime</label>
              </span>
            </p>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-half w3-padding">
            <label><i class="fas fa-map-marker-alt"></i> Địa chỉ làm việc:</label>
            <p><input class="w3-input w3-border" type="text" placeholder=""></p>
          </div>
          <div class="w3-half w3-padding">
            <label><i class="fa fa-fw fa-clock-o"></i> Thời gian làm việc:</label>
            <p><input class="w3-input w3-third" type="time" style="width:120px;" placeholder=""> <span class="w3-center w3-padding w3-third" style="width:50px;">To</span> <input class="w3-input w3-third"  style="width:120px;" type="time" placeholder=""></p>
          </div>
        </div>
        <hr>
        
        <h4><strong>Mô tả công việc</strong></h4>
        <div class="w3-row-padding">
          <div class="w3-padding w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Thêm mô tả" id="addToDo" onkeyup="if(this.value.length > 0) document.getElementById('submitToDo').disabled = false; else document.getElementById('submitToDo').disabled = true;" />
          </div>
          <div class="w3-padding w3-half">
            <input type="button" class="w3-button w3-black" onclick="addListToDo()" value="Thêm" id="submitToDo" disabled />
          </div>
        </div>
        <div class="results w3-padding">
          <ul class="w3-ul w3-padding" id="listToDo">
          </ul>
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
        <div>
        <h6><strong>Danh sách năng lực:</strong></h6>
          <div class="w3-row-padding">
            <div id="myDIV" class="header w3-padding w3-third">
              <input class="w3-input w3-border" type="text" placeholder="Thêm yêu cầu" id="myInput" name="skill" list="listSkill" />
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

        <hr />
        <div class="w3-row-padding">
          <div class="w3-padding w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Thêm yêu cầu" id="addRequire" />
          </div>
          <div class="w3-padding w3-half">
            <input type="button" class="w3-button w3-black" onclick="addListRequire()" value="Thêm" id="submitRequire" />
          </div>
        </div>
        <div class="w3-padding results">
          <ul id="listRequire" >
          </ul>
        </div>
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
        <button type="submit" class="w3-button w3-teal">Tạo mới</button>
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
      <form action="https://www.w3schools.com/w3images/action_page.php" target="_blank">
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

function addListToDo() {
  var li = document.createElement("li");
  li.className = "item";
  var inputValue = document.getElementById("addToDo").value; 
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("listToDo").appendChild(li);
  }
  document.getElementById("addToDo").value = "";

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

function addListRequire() {
  var li = document.createElement("li");
  li.className = "item";
  var inputValue = document.getElementById("addRequire").value; 
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("listRequire").appendChild(li);
  }
  document.getElementById("addRequire").value = "";

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