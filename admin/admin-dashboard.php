<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: ../admin-login.php");
  exit();
}

require_once("../includes/db.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('includes/admin-head.inc.php'); ?>
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include('includes/admin-header.inc.php'); ?>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="admin-dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="admin-jobs.php"><i class="fa fa-briefcase"></i> Jobs</a></li>
                  <li><a href="admin-applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                  <li><a href="admin-jobproviders.php"><i class="fa fa-building"></i> Job Providers</a></li>
                  <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Job Portal Statistics</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Active Job Providers Registered</span>
                    <?php
                      $sql = "SELECT * FROM jobprovider WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Registered Job Seekers</span>
                    <?php
                      $sql = "SELECT * FROM jobseeker WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Jobs</span>
                    <?php
                      $sql = "SELECT * FROM job";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-yellow"><i class="ion ion-ios-browsers"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Applications</span>
                    <?php
                      $sql = "SELECT * FROM apply";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
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

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>