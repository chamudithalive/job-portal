<?php 

session_start();

if(isset($_SESSION['id_jobseeker']) || isset($_SESSION['id_jobprovider'])) { 
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('includes/head.inc.php'); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <?php include('includes/header.inc.php'); ?>
      </header>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="margin-left: 0px;">
        <section class="content-header">
          <div class="container">
            <div class="row latest-job margin-top-50 margin-bottom-20">
              <h1 class="text-center margin-bottom-20">Signup</h1>
              <div class="col-md-6 latest-job ">
                <div class="small-box bg-yellow padding-5">
                  <div class="inner">
                    <h3 class="text-center">Job Seeker Signup</h3>
                  </div>
                  <a href="jobseeker/jobseeker-signup.php" class="small-box-footer">
                    Signup <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-md-6 latest-job ">
                <div class="small-box bg-red padding-5">
                  <div class="inner">
                    <h3 class="text-center">Job Provider Signup</h3>
                  </div>
                  <a href="jobprovider/jobprovider-signup.php" class="small-box-footer">
                    Signup <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer" style="margin-left: 0px;">
        <?php include('includes/footer.inc.php'); ?>
      </footer>

      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
  </body>
</html>