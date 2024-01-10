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
                      <li class="active"><a href="jobprovider-edit-profile.php"><i class="fa fa-tv"></i> Edit Profile</a></li>
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
                <h2><i>My Company</i></h2>
                <p>In this section you can change your company details</p>
                <div class="row">
                  <form action="includes/jobprovider-update.inc.php" method="post" enctype="multipart/form-data">
                    <?php
                      $sql = "SELECT * FROM jobprovider WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

                      $result = $conn->query($sql);

                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-6 latest-job ">
                      <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
                      </div>

                      <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">
                      </div>

                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-success">Update Company Profile</button>
                      </div>
                    </div>

                    <div class="col-md-6 latest-job ">
                      <div class="form-group">
                        <label for="contactno">Contact Number</label>
                        <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control input-lg" id="address" name="address" value="<?php echo $row['address']; ?>" placeholder="address">
                      </div>

                      <div class="form-group">
                        <label>Change Company Logo</label>
                        <input type="file" name="image" class="btn btn-default">
                        <?php if($row['logo'] != "") { ?>
                        <img src="uploads/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                        <?php } ?>
                      </div>
                    </div>

                    <?php
                        }
                      }
                    ?>  
                  </form>
                </div>

                <?php if(isset($_SESSION['uploadError'])) { ?>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                  </div>
                </div>

                <?php unset($_SESSION['uploadError']); } ?>
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