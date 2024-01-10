<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
  header("Location: jobseeker-index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../includes/db.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('includes/jobseeker-head.inc.php'); ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include('includes/jobseeker-header.inc.php'); ?>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                 <ul class="nav nav-pills nav-stacked">
                  <li><a href="jobseeker-index.php"><i class="fa fa-address-card-o"></i> Applied Jobs</a></li>
                  <li><a href="jobseeker-edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li class="active"><a href="jobseeker-settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Change Password</i></h2>
            <p>Type in new password that you want to use</p>
            <div class="row">
              <div class="col-md-6">
                <form id="changePassword" action="includes/jobseeker-change-password.php" method="post">
                  <div class="form-group">
                    <input id="password" class="form-control input-lg" type="password" name="password" autocomplete="off" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Change Password</button>
                  </div>
                  <div id="passwordError" class="color-red text-center hide-me">
                    Password Mismatch!!
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <form action="includes/jobseeker-deactivate-account.php" method="post">
                  <label><input type="checkbox" required> I Want To Deactivate My Account</label>
                  <button type="submit" class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2022 <a href="index.php">JobPortal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
</body>
</html>