<?php
  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $username_teacher = $phone_number = $email_teacher = $password = $name_teacher = $confirm_password = "";
  $username_teacher_err = $phone_number_err = $email_teacher_err = $name_teacher_err = $password_err = $confirm_password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username_teacher"]))) {
      $username_teacher_err = "Please enter a username teacher.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM teacher_profile WHERE username_teacher = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username_teacher);

        // Set parameters
        $param_username_teacher = trim($_POST["username_teacher"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          /* store result */
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) == 1) {
            $username_teacher_err = "This teacher id is already taken.";
          } else {
            $username_teacher = trim($_POST["username_teacher"]);
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


    // Validate email
    if (empty(trim($_POST["email_teacher"]))) {
      $email_teacher_err = "Please enter your email!";
    } else {
      $email_teacher = trim($_POST["email_teacher"]);
    }


    // Check input errors before inserting in database
    if (empty($username_teacher_err) && empty($password_err) && empty($confirm_password_err)) {

      // Prepare an insert statement
      $sql = "INSERT INTO teacher_profile (username_teacher, password, phone_number, email_teacher, name_teacher) VALUES (?, ?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $param_username_teacher, $param_password, $phone_number, $email_teacher, $name_teacher);

        // Set parameters
        $param_username_teacher = $username_teacher;
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
      mysqli_stmt_close($stmt);
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
    }
    span.password {
      float: right;
      padding-top: 16px;
    }

    .center-class {
      text-align: center;
    }

    /* The Modal (background) */
    .modal {
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      margin: 2% auto 10% auto;
      /* 5% from the top, 15% from the bottom and centered */
      width: 50%;
      /* Could be more or less, depending on screen size */
    }

    .fix-input {
      width: 85%;
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
    <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h4 class="w3-orange w3-padding">Register Teacher</h4>
      <div class="w3-padding w3-row w3-margin-top w3-margin-bottom">
        <div class="w3-col s6">
          <div class="form-group <?php echo (!empty($username_teacher_err)) ? 'has-error' : ''; ?>">
            <label for="username_teacher"><b>User Name</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter Username" name="username_teacher" value="<?php echo $username_teacher; ?>" required>
            <span class="w3-text-red"><?php echo $username_teacher_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password"><b>Password</b></label>
            <input class="w3-input w3-padding-large fix-input" placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
            <span class="w3-text-red"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="confirm_password"><b>Confirm Password</b></label>
            <input class="w3-input w3-padding-large fix-input" placeholder="Enter Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
            <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
          </div>
        </div>
        <div class="w3-col s6">
          <div class="form-group <?php echo (!empty($name_teacher)) ? 'has-error' : ''; ?>">
            <label for="name_teacher"><b>Name Teacher</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your name" name="name_teacher" value="<?php echo $name_teacher; ?>">
            <span class="w3-text-red"><?php echo $name_teacher_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($email_teacher)) ? 'has-error' : ''; ?>">
            <label for="email_teacher"><b>Email</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your email" name="email_teacher" value="<?php echo $email_teacher; ?>">
            <span class="w3-text-red"><?php echo $email_teacher_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($phone_number)) ? 'has-error' : ''; ?>">
            <label for="phone_number"><b>Phone Number</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your phone number" name="phone_number" value="<?php echo $phone_number; ?>">
            <span class="w3-text-red"><?php echo $phone_number_err; ?></span>
          </div>
        </div>
        <button type="submit" class="w3-button w3-orange w3-block">Register</button>
        <p class="center-class">Already have an account? <a class=" w3-text-green" href="../login/teacher.php">Login here</a>.</p>
      </div>
      <div class="w3-padding center-class" style="background-color:#f1f1f1">
        <button type="reset" class="w3-btn w3-red center-class">Reset</button>
        <button type="button" onclick="window.location.href='../../welcome.php'" class="w3-btn w3-blue-gray">Cancel</button>
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