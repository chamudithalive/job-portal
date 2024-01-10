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
                  <li><a href="admin-dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="admin-jobs.php"><i class="fa fa-briefcase"></i> Jobs</a></li>
                  <li><a href="admin-applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                  <li class="active"><a href="admin-jobproviders.php"><i class="fa fa-building"></i> Job Providers</a></li>
                  <li><a href="../includes/logout.inc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Job Providers</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Company Name</th>
                      <th>Job Provider</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM jobprovider";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td>
                        <?php
                          if($row['active'] == '1') {
                            echo "Activated";
                          } else if($row['active'] == '2') {
                            ?>
                            <a href="includes/reject-jobprovider.inc.php?id=<?php echo $row['id_jobprovider']; ?>">Reject</a> <a href="approve-company.php?id=<?php echo $row['id_jobprovider']; ?>">Approve</a>
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="includes/approve-jobprovider.inc.php?id=<?php echo $row['id_jobprovider']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo "Rejected";
                          }
                        ?>                          
                        </td>
                        <td><a href="includes/admin-delete-jobprovider.inc.php?id=<?php echo $row['id_jobprovider']; ?>">Delete</a></td>
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