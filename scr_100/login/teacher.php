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
  $email_teacher = $password = $name_teacher = $address_teacher = $phone_number = "";
  $email_teacher_err = $password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["email_teacher"]))) {
      $email_teacher_err = "Please enter your email!";
    } else {
      $email_teacher = trim($_POST["email_teacher"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter your password.";
    } else {
      $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_teacher_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = "SELECT id, contact, email, password, name, address FROM teacher_profile WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email_teacher);

        // Set parameters
        $param_email_teacher = $email_teacher;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Store result
          mysqli_stmt_store_result($stmt);
          // Check if username exists, if yes then verify password
          if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $phone_number, $email_teacher, $hashed_password, $name_teacher, $address_teacher);
            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                // $_SESSION["id"] = $id;
                $_SESSION["address_teacher"] = $address_teacher;
                $_SESSION["name_teacher"] = $name_teacher;
                $_SESSION["phone_teacher"] = $phone_number;
                $_SESSION["email_teacher"] = $email_teacher;
                $_SESSION["role"] = "teacher";
               // $_SESSION["first_name"] = $first_name;

                // Redirect user to scr_1003 page
                header("location: ../../scr_100x/scr_1003/scr_1003.php");
              } else {
                // Display an error message if password is not valid
                $password_err = "The password you entered was not valid.";
              }
            }
          } else {
            // Display an error message if username doesn't exist
            $email_teacher_err = "No account found with that your email!";
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    .modal {
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      margin: 5% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      width: 40%;
      /* Could be more or less, depending on screen size */
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
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
  </style>
</head>

<body>
  <?php include("../../navigation.php"); ?>
  <div>
    <div class="w3-display-container w3-animate-opacity">
      <img src="https://www.w3schools.com/w3images/sailboat.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
    </div>
  </div>
  <div id="dialog" class="modal">
    <form class="modal-content animate"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h4 class="w3-padding w3-orange">Login Teacher</h4>
      <div class="w3-padding-large">
        <div class="form-group <?php echo (!empty($email_teacher_err)) ? 'has-error' : ''; ?>">
          <label for="email_teacher"><b>Email Teacher</b></label>
          <input class="w3-input w3-padding-large" type="text" placeholder="Enter your email" name="email_teacher" value="<?php echo $email_teacher; ?>" required>
          <span class="w3-text-red"><?php echo $email_teacher_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password"><b>Password</b></label>
          <input class="w3-input w3-padding-large" type="password" placeholder="Enter Password" name="password" required>
          <span class="w3-text-red"><?php echo $password_err; ?></span>
        </div>
        <button type="submit" class="w3-button w3-orange w3-block">Login</button>
        <!-- <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label> -->
        <p>Don't have an account? <a class="w3-text-green" href="../register/teacher.php">Sign up now</a>.</p>
      </div>
      <div class="w3-padding" style="background-color:#f1f1f1">
        <button type="reset" class="w3-btn w3-red">Reset</button>
        <button type="button" onclick="window.location.href='../../'" class="w3-btn w3-blue-gray">Cancel</button>
      </div>
    </form>
  </div>
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