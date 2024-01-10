<?php
  session_start();

  if(empty($_SESSION['id_jobprovider'])) {
    header("Location: jobprovider-login.php");
    exit();
  }

  require_once("../includes/db.inc.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('includes/jobprovider-head.inc.php'); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <?php include('includes/jobprovider-header.inc.php'); ?>
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
                      <li class="active"><a href="jobprovider-index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                      <li><a href="jobprovider-edit-profile.php"><i class="fa fa-tv"></i> Edit Profile</a></li>
                      <li><a href="jobprovider-create-job.php"><i class="fa fa-file-o"></i> Create Job</a></li>
                      <li><a href="jobprovider-jobs.php"><i class="fa fa-file-o"></i> Jobs</a></li>
                      <li><a href="jobprovider-applications.php"><i class="fa fa-file-o"></i> Applications</a></li>
                      <li><a href="jobprovider-settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                      <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-9 bg-white padding-2">
                <h3>Overview</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="info-box bg-c-yellow">
                      <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                      
                      <div class="info-box-content">
                        <span class="info-box-text">Jobs Posted</span>
                        
                        <?php
                          $sql = "SELECT * FROM job WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

                          $result = $conn->query($sql);

                          if($result->num_rows > 0) {
                            $total = $result->num_rows; 
                          }

                          else {
                            $total = 0;
                          }
                        ?>

                        <span class="info-box-number"><?php echo $total; ?></span>
                      </div>
                    </div>                
                  </div>

                  <div class="col-md-6">
                    <div class="info-box bg-c-yellow">
                      <span class="info-box-icon bg-green"><i class="ion ion-ios-browsers"></i></span>
                      
                      <div class="info-box-content">
                        <span class="info-box-text">Applications For Jobs</span>
                        <?php
                          $sql = "SELECT * FROM apply WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

                          $result = $conn->query($sql);

                          if($result->num_rows > 0) {
                            $total = $result->num_rows; 
                          }

                          else {
                            $total = 0;
                          }
                        ?>
                        <span class="info-box-number"><?php echo $total; ?></span>
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
        <?php include('../includes/footer.inc.php'); ?>
      </footer>
    </div>
    <!-- ./wrapper -->
  </body>
</html>