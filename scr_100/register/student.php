<?php
  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $username = $first_name = $last_name = $class_name = $join_date = $phone = $email = $address = $date_of_birth = $password = $confirm_password = $avatar = "";
  $username_err = $first_name_err = $last_name_err = $class_name_err = $join_date_err = $phone_err = $email_err = $address_err = $date_of_birth_err = $password_err = $confirm_password_err = $avatar_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
      $username_err = "Please enter a username.";
    } else {
      // Prepare a select statement
      $sql = "SELECT id FROM intern_profile WHERE code = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // Set parameters
        $param_username = trim($_POST["username"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          /* store result */
          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) == 1) {
            $username_err = "This student id is already taken.";
          } else {
            $username = trim($_POST["username"]);
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
    if (empty(trim($_POST["phone"]))) {
      $phone_err = "Please enter your phone number!";
    } elseif (strlen(trim($_POST["phone"])) < 6) {
      $phone_err = "Your phone number is incorrect!";
    } else {
      $phone = trim($_POST["phone"]);
    }
    
    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
      $first_name_err = "Please enter your first name!";
    } else {
      $first_name = trim($_POST["first_name"]);
    }

    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
      $last_name_err = "Please enter your last name!";
    } else {
      $last_name = trim($_POST["last_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
      $email_err = "Please enter your email!";
    } else {
      $email = trim($_POST["email"]);
    }

    // Validate class_name
    if (empty(trim($_POST["class_name"]))) {
      $class_name_err = "Please enter your class name!";
    } else {
      $class_name = trim($_POST["class_name"]);
    }

    // Validate address
    // if (empty(trim($_POST["address"]))) {
    //   $address_err = "Please enter your address!";
    // } else {
    //   $address = trim($_POST["address"]);
    // }

    // Validate birth_day
    if (empty(trim($_POST["date_of_birth"]))) {
      $date_of_birth_err = "Please enter your birthday!";
    } else {
      $date_of_birth = trim($_POST["date_of_birth"]);
    }

    // Validate join_date
    if (empty(trim($_POST["join_date"]))) {
      $join_date_err = "Please enter your join date!";
    } else {
      $join_date = trim($_POST["join_date"]);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

      // Prepare an insert statement
      $sql = "INSERT INTO intern_profile (code, password, first_name, last_name, phone, email, date_of_birth, join_date, class_name, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_password, $first_name, $last_name, $phone, $email, $date_of_birth, $join_date, $class_name, $avatar);

        // Set parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to login page
          header("location: ../login/student.php");
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
      <h4 class="w3-green w3-padding">Register Student</h4>
      <div class="w3-padding w3-row w3-margin-top w3-margin-bottom">
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label for="userName"><b>User Name</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
            <span class="w3-text-red"><?php echo $username_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password"><b>Password</b></label>
            <input class="w3-input w3-padding-large fix-input" placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
            <span class="w3-text-red"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password"><b>Confirm Password</b></label>
            <input class="w3-input w3-padding-large fix-input" placeholder="Enter Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
            <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label for="email"><b>Email</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
            <span class="w3-text-red"><?php echo $email_err; ?></span>
          </div>
        </div>
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
            <label for="last_name"><b>Last Name</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your last name" name="last_name" value="<?php echo $last_name; ?>" required>
            <span class="w3-text-red"><?php echo $last_name_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
            <label for="first_name"><b>First Name</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your first name" name="first_name" value="<?php echo $first_name; ?>" required>
            <span class="w3-text-red"><?php echo $first_name_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($date_of_birth_err)) ? 'has-error' : ''; ?>">
            <label for="date_of_birth"><b>Birth Day</b></label>
            <input class="w3-input w3-padding-large fix-input" type="date" placeholder="Enter your birth day" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>
            <span class="w3-text-red"><?php echo $date_of_birth_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
            <label for="phone"><b>Phone</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your phone number" name="phone" value="<?php echo $phone; ?>">
            <span class="w3-text-red"><?php echo $phone_err; ?></span>
          </div>
        </div>
        <div class="w3-col s4">
          <div class="form-group <?php echo (!empty($join_date_err)) ? 'has-error' : ''; ?>">
            <label for="join_date"><b>Join date</b></label>
            <input class="w3-input w3-padding-large fix-input" type="date" placeholder="" name="join_date" value="<?php echo $join_date; ?>">
            <span class="w3-text-red"><?php echo $join_date_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($class_name_err)) ? 'has-error' : ''; ?>">
            <label for="class_name"><b>Class name</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your class name" name="class_name" value="<?php echo $class_name; ?>">
            <span class="w3-text-red"><?php echo $class_name_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($avatar_err)) ? 'has-error' : ''; ?>">
            <label for="avatar"><b>Link photo</b></label>
            <input class="w3-input w3-padding-large fix-input" type="text" placeholder="Enter your link photo" name="avatar" value="<?php echo $avatar; ?>">
            <span class="w3-text-red"><?php echo $avatar_err; ?></span>
          </div>
        </div>
        <button type="submit" class="w3-button w3-green w3-block">Register</button>
        <p class="center-class">Already have an account? <a class=" w3-text-green" href="../login/student.php">Login here</a>.</p>
      </div>
      <div class="w3-padding center-class" style="background-color:#f1f1f1">
        <button type="reset" class="w3-btn w3-red center-class">Reset</button>
        <button type="button" onclick="window.location.href='../../welcome.php'" class="w3-btn w3-blue-gray">Cancel</button>
        <!-- <button type="button" onclick="window.location.href='../../welcome.php'" class="w3-btn w3-blue-gray">Cancel</button> -->
      </div>
    </form>
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