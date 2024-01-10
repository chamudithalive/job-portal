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
                      <li class="active"><a href="jobprovider-jobs.php"><i class="fa fa-file-o"></i> Jobs</a></li>
                      <li><a href="jobprovider-applications.php"><i class="fa fa-file-o"></i> Applications</a></li>
                      <li><a href="jobprovider-settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                      <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-9 bg-white padding-2">
                <h2><i>My Job Posts</i></h2>
                <p>In this section you can view all job posts created by you.</p>
                <div class="row margin-top-20">
                  <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">
                      <table id="example2" class="table table-hover">
                        <thead>
                          <th>Job Title</th>
                          <th>View</th>
                        </thead>

                        <tbody>
                          <?php
                            $sql = "SELECT * FROM job WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

                            $result = $conn->query($sql);

                            //If Job Post exists then display details of post
                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                            {
                          ?>

                          <tr>
                            <td><?php echo $row['jobtitle']; ?></td>
                            <td><a href="jobprovider-view-job.php?id=<?php echo $row['id_job']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                          </tr>

                          <?php
                             }
                           }
                          ?>
                        </tbody>                    
                      </table>
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
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <script>
      $(function () {
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        });
      });
    </script>
  </body>
</html>