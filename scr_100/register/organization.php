<?php
  // Include config file
  require_once "../../config.php";

  // Define variables and initialize with empty values
  $tax_number = $name_organization = $email = $employee_count = $gross_revenue = $address = $contact = $password = $confirm_password = "";
  $employee_count_err = $gross_revenue_err = $name_organization_err = $tax_err = $email_err = $address_err = $contact_err = $password_err = $confirm_password_err = "";

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
    if (empty(trim($_POST["name_organization"]))) {
      $name_organization_err = "Please enter your name organization!";
    } else {
      $name_organization = trim($_POST["name_organization"]);
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
      $sql = "INSERT INTO organization_profile (password, name_organization, tax_number, email, address, employee_count, gross_revenue, contact ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

      if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $param_password, $name_organization, $param_tax, $email, $address, $employee_count, $gross_revenue, $contact);

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
      mysqli_stmt_close($stmt);
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
      margin: 1% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      width: 50%;
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
      <h4 class="w3-padding w3-blue">Register Organization</h4>
      <div class="w3-padding-large w3-row">
        <div class="w3-col s5 w3-margin">
          <div class="form-group <?php echo (!empty($tax_err)) ? 'has-error' : ''; ?>">
            <label for="tax_number"><b>Tax number</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter tax number" name="tax_number" value="<?php echo $tax_number; ?>" required>
            <span class="w3-text-red"><?php echo $tax_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($name_organization_err)) ? 'has-error' : ''; ?>">
            <label for="name_organization"><b>Organization Name</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter your organization name" name="name_organization" value="<?php echo $name_organization; ?>" required>
            <span class="w3-text-red"><?php echo $name_organization_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($employee_count_err)) ? 'has-error' : ''; ?>">
            <label for="employee_count"><b>Employee Count</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter your employee count" name="employee_count" value="<?php echo $employee_count; ?>">
            <span class="w3-text-red"><?php echo $employee_count_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label for="email"><b>Email</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
            <span class="w3-text-red"><?php echo $email_err; ?></span>
          </div>
        </div>
        <div class="w3-col s5 w3-margin">
          <div class="form-group <?php echo (!empty($gross_revenue_err)) ? 'has-error' : ''; ?>">
            <label for="gross_revenue"><b>Gross revenue</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter your gross revenue" name="gross_revenue" value="<?php echo $gross_revenue; ?>">
            <span class="w3-text-red"><?php echo $gross_revenue_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
            <label for="address"><b>Address</b></label>
            <input class="w3-input w3-padding-large" type="text" placeholder="Enter your address" name="address" value="<?php echo $address; ?>">
            <span class="w3-text-red"><?php echo $address_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
            <label for="contact"><b>Contact</b></label>
            <input class="w3-input w3-padding-large" placeholder="Enter Contact" name="contact" class="form-control" value="<?php echo $contact; ?>" required>
            <span class="w3-text-red"><?php echo $contact_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password"><b>Password</b></label>
            <input class="w3-input w3-padding-large" placeholder="Enter Password"  type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
            <span class="w3-text-red"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="confirm_password"><b>Confirm Password</b></label>
            <input class="w3-input w3-padding-large" placeholder="Confirm Password"  type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
            <span class="w3-text-red"><?php echo $confirm_password_err; ?></span>
          </div>
        </div>
        <button type="submit" class="w3-button w3-blue w3-block">Register</button>
        <p class="center-class">Already have an account? <a href="../login/organization.php">Login here</a>.</p>
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