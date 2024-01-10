<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
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
                      <li><a href="jobprovider-applications.php"><i class="fa fa-file-o"></i> Applications</a></li>
                      <li class="active"><a href="jobprovider-settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                      <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-9 bg-white padding-2">
                <h2><i>Account Settings</i></h2>
                <p>In this section you can change your name and account password</p>
                <div class="row">
                  <div class="col-md-6">
                    <form id="changePassword" action="includes/jobprovider-change-password.inc.php" method="post">
                      <div class="form-group">
                        <input id="password" class="form-control input-lg" type="password" name="password" autocomplete="off" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-success btn-lg">Change Password</button>
                      </div>
                    </form>
                  </div>

                  <div class="col-md-6">
                    <form action="includes/jobprovider-update-name.inc.php" method="post">
                      <div class="form-group">
                        <label>Your Name (Full Name)</label>
                        <input class="form-control input-lg" name="name" type="text" required>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-primary btn-lg">Change Name</button>
                      </div>
                    </form>
                  </div>              
                </div>

                <br>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <form action="includes/jobprovider-deactivate.inc.php" method="post">
                      <label><input type="checkbox" required> I Want To Deactivate My Account</label>
                      <button class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
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