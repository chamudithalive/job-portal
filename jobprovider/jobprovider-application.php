<?php
  session_start();

  if(empty($_SESSION['id_jobprovider'])) {
    header("Location: jobprovider-index.php");
    exit();
  }

  require_once("../includes/db.inc.php");

  $sql = "SELECT * FROM apply WHERE id_jobprovider='$_SESSION[id_jobprovider]' AND id_jobseeker='$_GET[id]'";
  $result = $conn->query($sql);

  if($result->num_rows == 0) 
  {
    header("Location: jobprovider-index.php");
    exit();
  }
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
                      <li><a href="jobprovider-index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                      <li><a href="jobprovider-edit-profile.php"><i class="fa fa-tv"></i> Edit Profile</a></li>
                      <li><a href="jobprovider-create-job.php"><i class="fa fa-file-o"></i> Create Job</a></li>
                      <li><a href="jobprovider-jobs.php"><i class="fa fa-file-o"></i> Jobs</a></li>
                      <li class="active"><a href="jobprovider-applications.php"><i class="fa fa-file-o"></i> Applications</a></li>
                      <li><a href="jobprovider-settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                      <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-9 bg-white padding-2">
                <div class="row margin-top-20">
                  <div class="col-md-12">
                    <?php
                      $sql = "SELECT * FROM jobseeker WHERE id_jobseeker='$_GET[id]'";
                      $result = $conn->query($sql);

                      //If Job Post exists then display details of post
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                      {
                    ?>

                    <div class="pull-left">
                      <h2><b><i><?php echo $row['firstname']. ' '.$row['lastname']; ?></i></b></h2>
                    </div>

                    <div class="pull-right">
                      <a href="jobprovider-applications.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="clearfix"></div>

                    <hr>

                    <div>
                      <?php
                        echo 'Email: '.$row['email'];
                        echo '<br>';

                        if($row['resume'] != "") {
                          echo '<a href="../jobseeker/uploads/'.$row['resume'].'" class="btn btn-info" download="Resume">Download Resume</a>';
                        }

                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                      ?>
                      <div class="row">
                        <div class="col-md-3 pull-left">
                          <a href="includes/jobprovider-review.inc.php?id=<?php echo $row['id_jobseeker']; ?>&id_job=<?php echo $_GET['id_job']; ?>" class="btn btn-success">Mark Under Review</a>
                        </div>
                        <div class="col-md-3 pull-right">
                          <a href="includes/jobprovider-reject.inc.php?id=<?php echo $row['id_jobseeker']; ?>&id_job=<?php echo $_GET['id_job']; ?>" class="btn btn-danger">Reject Application</a>
                        </div>
                      </div>
                    </div>

                    <div>
                    </div>
                    <?php
                        }
                      }
                    ?>
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

      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
  </body>
</html>