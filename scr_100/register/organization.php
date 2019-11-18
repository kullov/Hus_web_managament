<?php
  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $tax_number = $name = $email = $employee_count = $gross_revenue = $address = $contact = $password = $confirm_password = "";
  $employee_count_err = $gross_revenue_err = $name_err = $tax_err = $email_err = $address_err = $contact_err = $password_err = $confirm_password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["tax_number"]))) {
      $tax_err = "Please enter tax number.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM organization_profile WHERE tax_number = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_tax);

        // Set parameters
        $param_tax = trim($_POST["tax_number"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          /* store result */
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) == 1) {
            $tax_err = "This organization tax id is already taken.";
          } else {
            $tax_number = trim($_POST["tax_number"]);
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }

      // Close statement
     mysqli_stmt_close($stmt);
    }

    // Validate $employee_count
    if (empty(trim($_POST["employee_count"]))) {
      $employee_count_err = "Please enter employee count!";
    } else {
      $employee_count = trim($_POST["employee_count"]);
    }

    // Validate gross_revenue
    if (empty(trim($_POST["gross_revenue"]))) {
      $gross_revenue_err = "Please enter gross revenue !";
    } else {
      $gross_revenue = trim($_POST["gross_revenue"]);
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

    
    // Validate name
    if (empty(trim($_POST["name"]))) {
      $name_err = "Please enter your name organization!";
    } else {
      $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
      $email_err = "Please enter your email!";
    } else {
      $email = trim($_POST["email"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
      $address_err = "Please enter your address!";
    } else {
      $address = trim($_POST["address"]);
    }

    // Validate contact
    if (empty(trim($_POST["contact"]))) {
      $contact_err = "Please enter your contact!";
    } else {
      $contact = trim($_POST["contact"]);
    }

    // Check input errors before inserting in database
    if (empty($tax_err) && empty($password_err) && empty($confirm_password_err)) {

      // Prepare an insert statement
      $sql = "INSERT INTO organization_profile (password, name, tax_number, email, address, employee_count, gross_revenue, contact ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $param_password, $name, $param_tax, $email, $address, $employee_count, $gross_revenue, $contact);

        // Set parameters
        $param_tax = $tax_number;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to login page
          header("location: ../login/organization.php");
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

<title>REGISTER | COMPANY</title>

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

	<h1>DOANH NGHIỆP</h1>

	<div class="w3layoutscontaineragileits" style="width:65%">
	<h2>Register here</h2>
    <form class="login-html" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="login-form w3-row ">
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($tax_err)) ? 'has-error' : ''; ?>">
            <label for="tax_number" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="	fa fa-print w3-xlarge w3-left"></i></label>
            <input class="mb-4" type="text" placeholder="Enter tax number" name="tax_number" value="<?php echo $tax_number; ?>" required>
          </div>
          <span class="w3-text-red"><?php echo $tax_err; ?></span>
          <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label for="name" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-user w3-xlarge w3-left"></i></label>
            <input placeholder="Enter your organization name"  type="password" name="name" class="form-control" value="<?php echo $name; ?>" required>              
          </div>
          <span class="w3-text-red"><?php echo $name_err; ?></span>
          <div class="form-group <?php echo (!empty($employee_count_err)) ? 'has-error' : ''; ?>">
            <label for="employee_count" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-users w3-large w3-left"></i></label>
            <input type="text" placeholder="Enter your employee count" name="employee_count" value="<?php echo $employee_count; ?>" required>
          </div>
          <span class="w3-text-red"><?php echo $employee_count_err; ?></span>
        </div>
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($gross_revenue_err)) ? 'has-error' : ''; ?>">
            <label for="gross_revenue" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-male w3-xlarge w3-left "></i></label>
            <input type="text" placeholder="Enter your gross revenue" name="gross_revenue" value="<?php echo $gross_revenue; ?>">             
          </div>
          <span class="w3-text-red"><?php echo $gross_revenue_err; ?></span>
          <div class="form-group <?php echo (!empty($address)) ? 'has-error' : ''; ?>">
            <label for="address" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-home w3-xlarge w3-left"></i></label>
            <input type="text" placeholder="Enter your address" name="address" value="<?php echo $address; ?>">
          </div>
          <span class="w3-text-red"><?php echo $address_err; ?></span>
          <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
            <label for="contact" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-phone w3-xlarge w3-left"></i></label>
            <input type="text" placeholder="Enter your contact" name="contact" value="<?php echo $contact; ?>">
          </div>
          <span class="w3-text-red"><?php echo $contact_err; ?></span>
        </div>
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-key w3-xlarge w3-left"></i></label>
            <input placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>              
          </div>
          <span class="w3-text-red"><?php echo $password_err; ?></span>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="confirm_password" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-plane w3-xlarge w3-left"></i></label>
            <input placeholder="Enter Confirm Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>             
          </div>
          <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label for="email" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-envelope-o w3-large w3-left"></i></label>
            <input type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
          </div>
          <span class="w3-text-red"><?php echo $email_err; ?></span>
        </div>
      </div>
      <div class="w3-row ">
        <div class="aitssendbuttonw3ls">
          <input type="submit" value="REGISTER">
          <p> Already have an account? <span>→</span> <a href="../login/organization.php"> Login here</a></p>
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