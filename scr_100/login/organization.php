<?php
  // Initialize the session
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../");
    exit;
  }

  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $password = $tax_number = $name_organization = $address_organization = $email_organization = $contact_organization = $description_organization = "";
  $tax_err = $password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if tax is empty
    if (empty(trim($_POST["tax_number"]))) {
      $tax_err = "Please enter tax number.";
    } else {
      $tax_number = trim($_POST["tax_number"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter your password.";
    } else {
      $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($tax_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = "SELECT id, tax_number, name, password, address, email, contact, description FROM organization_profile WHERE tax_number = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_tax);

        // Set parameters
        $param_tax = $tax_number;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Store result
          mysqli_stmt_store_result($stmt);
          // Check if tax exists, if yes then verify password
          if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $tax_number, $name_organization, $hashed_password, $address_organization, $email_organization, $contact_organization, $description_organization);
            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id_organization"] = $id;
                $_SESSION["tax_number"] = $tax_number;
                $_SESSION["name_organization"] = $name_organization;
                $_SESSION["description_organization"] = $description_organization;
                $_SESSION["address_organization"] = $address_organization;
                $_SESSION["email_organization"] = $email_organization;
                $_SESSION["contact_organization"] = $contact_organization;
                $_SESSION["role"] = "organization";

                // Redirect user to welcome page
                header("location: ../../scr_100x/scr_1002/scr_1002.php");
              } else {
                // Display an error message if password is not valid
                $password_err = "The password you entered was not valid.";
              }
            }
          } else {
            // Display an error message if username doesn't exist
            $tax_err = "No account found with that tax.";
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
      }
    }

    // Close connection
    mysqli_close($link);
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
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <title>Login</title>
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
      max-width: 400px;
      min-height: 600px;
      margin: 30px auto;
      background-color: rgba(10,10,10,.68);
    }
    .login-icon-field {
      height: 120px;
      width: 100%;
    }
    .login-icon {
      margin: 50px 65px;
    }
    .login-form {
      padding: 20px 20px 20px;
      height: 120px;
      width: 400px;
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
      display: block;
      width: 276px;
      height: 40px;
      padding: 0;
      margin: 10px 20px 10px;
      font-weight: 700;
      background-color: #22c08a;
      border: none;
      border-radius: 20px;     
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
    .row-btn {
      width: 110px;
      border-radius: 10px;
    }*, *:before, *:after {
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
      max-width: 400px;
      min-height: 530px;
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
      padding: 10px 20px 20px;
      height: 120px;
      width: 400px;
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
      display: block;
      width: 276px;
      height: 40px;
      padding: 0;
      margin: 10px 20px 10px;
      font-weight: 700;
      background-color: #22c08a;
      border: none;
      border-radius: 20px;     
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
    .row-btn {
      width: 110px;
      border-radius: 10px;
    }
  </style>
</head>

<body>

<div class="container_1">
  <div id="login" class="login">
    <div class="login-icon-field w3-center">
      <div><i class="fab fa-galactic-republic w3-jumbo login-icon w3-center"></i></div>
    </div>
    <div class="login-form">
    <form class="login-html" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2 for="" class="text-white w3-center" style="font-family: Poppins-Medium;">LOGIN ORGANIZATION</h2>
      <div class="login-form">
        <div class=" mb-4 form-group <?php echo (!empty($tax_err)) ? 'has-error' : ''; ?>">
          <label for="tax_number" class=" mt-3 pr-3" style="font-family: Poppins-Medium;"><i class="fa fa-user w3-xlarge w3-left"></i></label>
          <input class="mb-4" type="text" placeholder="Enter your tax number" name="tax_number" value="<?php echo $tax_number; ?>" required>
        </div>
        <hr style="color:white;">
        <div class="mt-3 mb-5 group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password" class="mt-3 pr-3 text-white" style="font-family: Poppins-Medium;"><i class="fa fa-key w3-xlarge w3-left"></i></label>
          <input class="" type="password" placeholder="Enter Password" name="password" required>
        </div>
        <span class="w3-text-red"><?php echo $password_err; ?></span>
        <div class="call-to-action ">
          <button id="login-button" type="submit">Log In</button>
        </div>
        <div class="row">
          <p>
            <button type="reset" class="row-btn w3-button w3-red ">Reset</button>
            <button type="button" onclick="window.location.href='../../'" class="row-btn  w3-blue-gray w3-right ">Cancel</button>
          </p>
          <p class="text-white w3-center" style="font-family: Poppins-Medium;">Don't have an account? <a class="w3-text-blue" href="../register/organization.php">Sign up now</a>.</p>
        </div>
      </div>	
      </form>
    </div>
    
  </div>
</div>
<script>
  // Get the modal
  
</script>
</body>

</html>