<?php
  session_start();

  if(empty($_SESSION['id_jobprovider'])) {
    header("Location: jobprovider-index.php");
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
                <h2><i>Recent Applications</i></h2>

                <?php
                  $sql = "SELECT * FROM job INNER JOIN apply ON job.id_job=apply.id_job  INNER JOIN jobseeker ON jobseeker.id_jobseeker=apply.id_jobseeker WHERE apply.id_jobprovider='$_SESSION[id_jobprovider]'";

                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                  {     
                ?>

                <div class="attachment-block clearfix padding-2">
                  <h4 class="attachment-heading"><a href="jobprovider-application.php?id=<?php echo $row['id_jobseeker']; ?>&id_job=<?php echo $row['id_job']; ?>"><?php echo $row['jobtitle'].' @ ('.$row['firstname'].' '.$row['lastname'].')'; ?></a></h4>

                  <div class="attachment-text padding-2">
                    <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>

                    <?php 
                      if($row['status'] == 0) {
                        echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                      }

                      else if ($row['status'] == 1) {
                        echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                      }

                      else if ($row['status'] == 2) {
                        echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                      }
                    ?>            
                  </div>
                </div>

                <?php
                    }
                  }
                ?>
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