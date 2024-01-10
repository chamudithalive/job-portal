<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
  header("Location: jobseeker-index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../includes/db.inc.php");

$sql = "SELECT * FROM apply WHERE id_jobseeker='$_SESSION[id_jobseeker]' AND id_job='$_GET[id]'";
$result = $conn->query($sql);
if($result->num_rows > 0) 
{
  
  $sql1 = "SELECT * FROM job INNER JOIN jobprovider ON job.id_jobprovider=jobprovider.id_jobprovider WHERE id_job='$_GET[id]'";
  $result1 = $conn->query($sql1);
  if($result1->num_rows > 0) 
  {
    $row = $result1->fetch_assoc();
  }

} else {
  header("Location: jobseeker-index.php");
  exit();
}
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
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="jobseeker-index.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['jobtitle']; ?></span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>              
            </div>
            <div>
              <?php echo stripcslashes($row['description']); ?>
            </div>
            
            
          </div>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../jobprovider/uploads/<?php echo $row['logo']; ?>" alt="companylogo">
              <div class="caption text-center">
                <h3><?php echo $row['companyname']; ?></h3>
                <p><a href="#" class="btn btn-primary btn-flat" role="button">More Info</a>
                <hr>
                <div class="row">
                  <div class="col-md-4"><a href=""><i class="fa fa-warning"></i> Report</a></div>
                  <div class="col-md-4"><a href=""><i class="fa fa-envelope"></i> Email</a></div>
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
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
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