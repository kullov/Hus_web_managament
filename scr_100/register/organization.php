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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Register</title>
  <style>
    *, *:before, *:after {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      width: 100%;
      overflow: hidden;
    }
    .container_1 {
      padding: 1px 0;
      height: 100%;
      width: 100%;
      background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/226578/campnou(optimized).jpg");
      background-size: cover;
      color: #fff;
      font-family: "Comfortaa", "Helvetica", sans-serif;
    }
    .login {
      max-width: 1000px;
      min-height: 590px;
      margin: 40px auto;
      background-color: rgba(10,10,10,.60);
    }
    .login-icon-field {
      height: 120px;
      width: 100%;
    }
    .login-icon {
      margin: 35px 65px;
    }
    .login-form {
      padding: 10px 0px 5px;
      height: 120px;
      width: 900px;
    }
    input {
      position: absolute;
      width: 250px;
      height: 40px;
      margin: 10px 0;
      background: transparent;
      color: rgba(255,255,255,.4);
      border: none;
      border-bottom: 1px solid white;
      border-color: white;   
    }
    button {
         
    }
    button:hover {
      background-color: #26d69a;
    }
    button:active {
      background-color: #1eaa7a;
    }
    p {
      display: inline-block;
      width: 300px;
      margin: 0 20px;
      font-size: 17px;
      color: rgba(255,255,255,.4);
    }
    @-webkit-keyframes dash {
      to {
        stroke-dashoffset: 0;
      }
    }
    @keyframes dash {
      to {
        stroke-dashoffset: 0;
      }
    }
    .btn-register {
      /* margin: 30px 0px 10px; */
      margin: 30px 10px;
      display: block;
      width: 400px;
      height: 40px;
      padding: 0;
      font-weight: 700;
      background-color: #22c08a;
      border: none;
      border-radius: 20px;  
    }
    .row-btn {
      width: 150px;
      border-radius: 10px;
    }
    .btn-register {
      margin-left: 246px;
    }
    .btn-button {
      /* margin: 30px 101px 10px; */
      margin-left: 233px;
    }
    .btn-button-2 {
      margin-right: 245px;
      height: 41px;
    }
    .note {
      margin-left: -28px;
    }
  </style>
</head>

<body>
<div class="container_1 ">
  <div id="login" class="login ">
    <div class="login-icon-field w3-center">
      <div><i class="fa fa-users w3-jumbo login-icon w3-center"></i></div>
    </div>
    <div class="login-form container">
      <form class="login-html" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 for="" class="text-white w3-center" style="font-family: Poppins-Medium;">REGISTER ORGANIZATION</h2>
        <div class="login-form w3-row ">
          <div class="w3-col s4">
            <div class="form-group <?php echo (!empty($tax_err)) ? 'has-error' : ''; ?>">
              <label for="tax_number" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="	fa fa-print w3-xlarge w3-left"></i></label>
              <input class="mb-4" type="text" placeholder="Enter tax number" name="tax_number" value="<?php echo $tax_number; ?>" required>
            </div>
            <span class="w3-text-red"><?php echo $tax_err; ?></span>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
              <label for="name" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-user w3-xlarge w3-left"></i></label>
              <input class="" placeholder="Enter your organization name"  type="password" name="name" class="form-control" value="<?php echo $name; ?>" required>              
            </div>
            <span class="w3-text-red"><?php echo $name_err; ?></span>
            <div class="form-group <?php echo (!empty($employee_count_err)) ? 'has-error' : ''; ?>">
              <label for="employee_count" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-users w3-large w3-left"></i></label>
              <input class="" type="text" placeholder="Enter your employee count" name="employee_count" value="<?php echo $employee_count; ?>" required>
            </div>
            <span class="w3-text-red"><?php echo $employee_count_err; ?></span>
          </div>
          <div class="w3-col s4">
            <div class="form-group <?php echo (!empty($gross_revenue_err)) ? 'has-error' : ''; ?>">
              <label for="gross_revenue" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-male w3-xlarge w3-left "></i></label>
              <input class="" type="text" placeholder="Enter your gross revenue" name="gross_revenue" value="<?php echo $gross_revenue; ?>">             
            </div>
            <span class="w3-text-red"><?php echo $gross_revenue_err; ?></span>
            <div class="form-group <?php echo (!empty($address)) ? 'has-error' : ''; ?>">
              <label for="address" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-home w3-xlarge w3-left"></i></label>
              <input class="" type="text" placeholder="Enter your address" name="address" value="<?php echo $address; ?>">
            </div>
            <span class="w3-text-red"><?php echo $address_err; ?></span>
            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
              <label for="contact" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-phone w3-xlarge w3-left"></i></label>
              <input class="" type="text" placeholder="Enter your contact" name="contact" value="<?php echo $contact; ?>">
            </div>
            <span class="w3-text-red"><?php echo $contact_err; ?></span>
          </div>
          <div class="w3-col s4">
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label for="password" class="mt-3 pr-2 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-key w3-xlarge w3-left"></i></label>
              <input class="" placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>              
            </div>
            <span class="w3-text-red"><?php echo $password_err; ?></span>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label for="confirm_password" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-plane w3-xlarge w3-left"></i></label>
              <input class="" placeholder="Enter Confirm Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>             
            </div>
            <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <label for="email" class=" mt-3 pr-2" style="font-family: Poppins-Medium;"><i class="fa fa-envelope-o w3-large w3-left"></i></label>
              <input class="" type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
            </div>
            <span class="w3-text-red"><?php echo $email_err; ?></span>
          </div>
        </div>
        <div class="w3-row ">
          <div class="btn-register">
            <button id="login-button" type="submit" class="btn-register w3-center ml-3 mb-1">Register</button>
          </div>
          <div class=" ">
            <p>
              <button type="reset" class=" w3-button w3-red btn-button row-btn btn-button">Reset</button>             
            </p>
            <button type="button" onclick="window.location.href='../../'" class="w3-blue-gray w3-right w3-button row-btn btn-button-2">Cancel</button>
            <p></p>
            <p class="text-white w3-center note mt-2" style="font-family: Poppins-Medium;">Already have an account? <a class="w3-text-blue" href="../login/teacher.php">Login here</a>.</p>
          </div>	
        </div>
        
      </form>
    </div> 
  </div>
</div>
  <script>
    // Get the modal
    var modal = document.getElementById('dialog');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    document.getElementById('dialog').style.display='block';
  </script>
</body>

</html>