<?php
  // Initialize the session
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../../");
    exit;
  }

  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $username = $password = $first_name = $last_name = $email = $phone = $date_of_birth = $class_name = $join_date = $avatar = $description_student = "";
  $username_err = $password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
      $username_err = "Please enter username.";
    } else {
      $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter your password.";
    } else {
      $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = "SELECT id, code, first_name, last_name, password, email, phone, date_of_birth, class_name, join_date, avatar, description FROM intern_profile WHERE code = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Store result
          mysqli_stmt_store_result($stmt);
          // Check if username exists, if yes then verify password
          if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $username, $first_name, $last_name, $hashed_password, $email, $phone, $date_of_birth, $class_name, $join_date, $avatar, $description_student);
            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["code"] = $username;
                $_SESSION["last_name_student"] = $last_name;
                $_SESSION["first_name_student"] = $first_name;
                $_SESSION["email_student"] = $email;
                $_SESSION["phone_student"] = $phone;
                $_SESSION["date_of_birth_student"] = $date_of_birth;
                $_SESSION["class_name"] = $class_name;
                $_SESSION["join_date_student"] = $join_date;
                $_SESSION["avatar"] = $avatar;
                $_SESSION["description_student"] = $description_student;
                $_SESSION["role"] = "student";

                // Redirect user to scr_1001 page
                header("location: ../../scr_100x/scr_1001/scr_1001.php");
              } else {
                // Display an error message if password is not valid
                $password_err = "The password you entered was not valid.";
              }
            }
          } else {
            // Display an error message if username doesn't exist
            $username_err = "No account found with that username.";
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
  <title>Login</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
    }

    button:hover {
      opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .custom-btn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    span.password {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .login-btn {
      font-size: 16px;  
      text-transform: uppercase;  
      justify-content: center;     
      padding: 0 20px;
      height: 50px;
    }
    


    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.password {
        display: block;
        float: none;
      }

      .custom-btn {
        width: 100%;
      }
    }
    body{
      margin:0;
      color:#6a6f8c;
      background:#c8c8c8;
      font:600 16px/18px 'Open Sans',sans-serif;
    }


    .login-wrap{
      width:100%;
      margin: auto;
      max-width:525px;
      min-height:550px;
      position:relative;
      background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
      box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    }
    .login-html{
      width:100%;
      height:100%;
      position:absolute;
      padding:90px 70px 50px 70px;
      background:rgba(50,50,99,.6);
    }
    .login-form .group{
      margin-bottom:40px;
    }
    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button{
      width:100%;
      color:#fff;
      display:block;
    }
    .login-form .group .input{
      border:none;
      padding:15px 20px;
      border-radius:25px;
      background:rgba(255,255,255,.1);
    }
  </style>
</head>

<body>
<!-- <div class = "mt-0" style="background-image: url('https://www.w3schools.com/w3images/sailboat.jpg');"> -->
  <div class="login-wrap" style="margin-top: 75px;" >
    <form class="login-html" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2 for="" class="text-white mb-4" style="font-family: Poppins-Medium;">LOGIN STUDENT</h2>
      <div class="login-form">
        <div class="group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label for="username" class="w3-left text-white" style="font-family: Poppins-Medium;">Student ID</label>
          <input class="input w3-padding-large " type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
          <span class="w3-text-red"><?php echo $username_err; ?></span>
        </div>
        <div class="group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password" class="w3-left text-white" style="font-family: Poppins-Medium;">Password</label>
          <input class="input w3-padding-large" type="password" placeholder="Enter Password" name="password" required>
          <span class="w3-text-red"><?php echo $password_err; ?></span>
        </div>
        <button type="submit" class="w3-button w3-blue w3-block login-btn mb-2">Login</button>
        <p class="text-white" style="font-family: Poppins-Medium;">Don't have an account? <a class="w3-text-green" href="../register/student.php">Sign up now</a>.</p>
        <button type="reset" class="w3-btn w3-red btn">Reset</button>
        <button type="button" onclick="window.location.href='../../'" class="w3-btn w3-blue-gray btn">Cancel</button>
      </div>	
      </form>
    </div>
  </div>
<!-- </div> -->
<script>
  // Get the modal
  var modal = document.getElementById('dialog');
  // When the user clicks anywhere outside of the modal, close it
  // window.onclick = function(event) {
  //   if (event.target == modal) {
  //     modal.style.display = "none";
  //   }
  // }
  document.getElementById('dialog').style.display='block';
</script>
</body>

</html>