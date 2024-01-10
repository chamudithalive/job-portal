<?php

session_start();

if(isset($_SESSION['id_admin'])) {
  header("Location: admin-dashboard.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php include('includes/admin-head.inc.php'); ?>
</head>

<body class="hold-transition login-page skin-green">
  <header class="main-header">
    <?php include('includes/admin-header.inc.php'); ?>
  </header>
<div class="login-box">
  <div class="login-box-body">
    <p class="login-box-msg">Admin Login</p>

    <form action="includes/admin-login.inc.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
      <?php 
//If User Failed To log in then show error message.
if(isset($_SESSION['loginError'])) {
  ?>
  <div>
    <p class="text-center">Invalid Email/Password! Try Again!</p>
  </div>
<?php
 unset($_SESSION['loginError']); }
?>

    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>