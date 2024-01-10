<?php

session_start();

require_once("includes/db.inc.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('includes/head.inc.php'); ?>
  </head>

  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">

      <header class="main-header">
        <?php include('includes/header.inc.php'); ?>
      </header>

      <div class="content-wrapper" style="margin-left: 0px;">
        <?php
        
          $sql = "SELECT * FROM job INNER JOIN jobprovider ON job.id_jobprovider=jobprovider.id_jobprovider WHERE id_job='$_GET[id]'";
          $result = $conn->query($sql);
          if($result->num_rows > 0) 
          {
            while($row = $result->fetch_assoc()) 
            {
        ?>

        <section id="candidates" class="content-header">
          <div class="container">
            <div class="row">          
              <div class="col-md-9 bg-white padding-2">
                <div class="pull-left">
                  <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
                </div>

                <div class="pull-right">
                  <a href="jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>

                <div class="clearfix"></div>

                <hr>

                <div>
                  <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['jobtitle']; ?></span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>              
                </div>

                <div>
                  <?php echo stripcslashes($row['description']); ?>
                </div>

                <?php 
                if(isset($_SESSION["id_jobseeker"]) && empty($_SESSION['companyLogged'])) {
                ?>

                <div>
                  <a href="jobseeker/includes/jobseeker-apply.inc.php?id=<?php echo $row['id_job']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
                </div>
                <?php } ?>
                
                
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="jobprovider/uploads/<?php echo $row['logo']; ?>" alt="companylogo">
                  <div class="caption text-center">
                    <h3><?php echo $row['companyname']; ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php 
          }
        }
        ?>

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