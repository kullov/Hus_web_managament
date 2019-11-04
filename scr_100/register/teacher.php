<?php include('../../server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>

  <form method="post" action="teacher.php">
    <?php include('../../errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Phone</label>
      <input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" placeholder="Password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" placeholder="Confirm password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="../login/teacher.php">Sign in</a>
    </p>
  </form>
</body>
</html>
