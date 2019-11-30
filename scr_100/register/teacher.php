<?php
  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $address = $phone_number = $email_teacher = $password = $name_teacher = $confirm_password = "";
  $address_err = $phone_number_err = $email_teacher_err = $name_teacher_err = $password_err = $confirm_password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["email_teacher"]))) {
      $email_teacher_err = "Please enter your email.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM teacher_profile WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email_teacher);

        // Set parameters
        $param_email_teacher = trim($_POST["email_teacher"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          /* store result */
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) == 1) {
            $email_teacher_err = "This teacher id is already taken.";
          } else {
            $email_teacher = trim($_POST["email_teacher"]);
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter a password!";
    } elseif (strlen(trim($_POST["password"])) < 6) {
      $password_err = "Password must have atleast 6 characters.";
    } else {
      $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
      $confirm_password_err = "Please confirm password!";
    } else {
      $confirm_password = trim($_POST["confirm_password"]);
      if (empty($password_err) && ($password != $confirm_password)) {
        $confirm_password_err = "Password did not match!";
      }
    }

    // Validate phone
    if (empty(trim($_POST["phone_number"]))) {
      $phone_number_err = "Please enter your phone number!";
    } elseif (strlen(trim($_POST["phone_number"])) < 6) {
      $phone_number_err = "Your phone number is incorrect!";
    } else {
      $phone_number = trim($_POST["phone_number"]);
    }
    
    // Validate  name
    if (empty(trim($_POST["name_teacher"]))) {
      $name_teacher_err = "Please enter your name!";
    } else {
      $name_teacher = trim($_POST["name_teacher"]);
    }


    // Check input errors before inserting in database
    if (empty($email_teacher_err) && empty($password_err) && empty($confirm_password_err)) {

      // Prepare an insert statement
      $sql = "INSERT INTO teacher_profile (address, password, contact, email, name) VALUES (?, ?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $address, $param_password, $phone_number, $param_email_teacher, $name_teacher);

        // Set parameters
        $param_email_teacher = $email_teacher;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to login page
          header("location: ../login/teacher.php");
        } else {
          echo "Something went wrong. Please try again later.";
        }
      }

      // Close statement
      // mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
  }
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $_SESSION["role"] = "";
  }
?>

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>REGISTER | TEACHER</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
<script type="application/x-javascript">
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
function hideURLbar(){ 
  window.scrollTo(0,1); 
}

</script>
<!-- //Meta-Tags -->

<link href="../../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">

<!-- Fonts -->
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>TEACHER</h1>

	<div class="w3layoutscontaineragileits" style="width:65%">
	<h2>Register here</h2>
    <form class="login-html" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="login-form w3-row ">
        <div class="w3-col s6">
          <div class="form-group <?php echo (!empty($email_teacher_err)) ? 'has-error' : ''; ?>">
            <label for="email_teacher" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-user w3-xlarge w3-left"></i></label>
            <input class="mb-4" type="text" placeholder="Enter your email" name="email_teacher" value="<?php echo $email_teacher; ?>" required>
          </div>
          <span class="w3-text-red"><?php echo $email_teacher_err; ?></span>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password" class="mt-3 pr-3 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-key w3-xlarge w3-left"></i></label>
            <input placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>              
          </div>
          <span class="w3-text-red"><?php echo $password_err; ?></span>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="confirm_password" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-plane w3-xlarge w3-left"></i></label>
            <input placeholder="Enter Confirm Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>             
          </div>
          <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="w3-col s6">
          <div class="form-group <?php echo (!empty($name_teacher)) ? 'has-error' : ''; ?>">
            <label for="name_teacher" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-male w3-xlarge w3-left "></i></label>
            <input type="text" placeholder="Enter your name" name="name_teacher" value="<?php echo $name_teacher; ?>">             
          </div>
          <span class="w3-text-red"><?php echo $name_teacher_err; ?></span>
          <div class="form-group <?php echo (!empty($address)) ? 'has-error' : ''; ?>">
            <label for="address" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-home w3-xlarge w3-left"></i></label>
            <input type="text" placeholder="Enter your address" name="address" value="<?php echo $address; ?>">
          </div>
          <span class="w3-text-red"><?php echo $address_err; ?></span>
          <div class="form-group <?php echo (!empty($phone_number)) ? 'has-error' : ''; ?>">
            <label for="phone_number" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-phone w3-xlarge w3-left"></i></label>
            <input type="text" placeholder="Enter your phone number" name="phone_number" value="<?php echo $phone_number; ?>">
          </div>
          <span class="w3-text-red"><?php echo $phone_number_err; ?></span>
        </div>
      </div>
      <div class="w3-row ">
        <div class="aitssendbuttonw3ls">
          <input type="submit" value="REGISTER">
          <p> Already have an account? <span>→</span> <a href="../login/teacher.php"> Login here</a></p>
          <p><a href="../../">Cancel</a></p>
        </div>
      </div>
    </form>
	</div>
	
	<div class="w3footeragile">
		<p> &copy; 2019 Login Form. All Rights Reserved | Design by <a href="../../" target="_blank">ORIGEN</a></p>
	</div>

	
	<script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->  
		<script src="../../js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>
</html>