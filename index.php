<?php

//To Handle Session Variables on This Page
session_start();
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
        <section class="content-header bg-main">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
                <h1>IT <strong>JOBS</strong> Around Sri Lanka!</h1>
                <p>Via One Portal</p>
                <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
              </div>
            </div>
          </div>
        </section>

        <section class="content-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12 latest-job margin-bottom-20">
                <h1 class="text-center">Jobs</h1>            
                <?php 
                /* Show any 4 random job post
                 * 
                 * Store sql query result in $result variable and loop through it if we have any rows
                 * returned from database. $result->num_rows will return total number of rows returned from database.
                */
                include("includes/jobs.inc.php");
                ?>
              </div>
            </div>
          </div>
        </section>

        <section class="content-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>Job Providers</h1>          
              </div>
            </div>
            <div class="row">
            <?php
                $sql1 = "SELECT * FROM jobprovider Order By Rand()";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) {
                  while($row1 = $result1->fetch_assoc()) 
                  {
                    ?>
                      <div class="col-sm-4 col-md-3 ">
                        <div class="thumbnail company-img">
                          <img src="jobprovider/uploads/<?php echo $row1['logo']; ?>">
                          <div class="caption">
                            <h3 class="text-center"><?php echo $row1['companyname']; ?></h3>
                          </div>
                        </div>
                      </div>
                    <?php
                  }
                }
            $conn->close();
            ?>
            </div>
        </section>

        <section id="about" class="content-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>About Us</h1>                      
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 about-text margin-bottom-20">
                <p>
                  We provide the best service to the job seekers and the job providers all around Sri Lanka. Our website works closely to bridge the gap between talent & opportunities and offers end-to-end recruitment solutions. We bring job seekers and top job providers under one roof. 
                  This website is used to provide a platform for potential job seekers to get their dream job to excel in their career. This site can be used as a paving path for both job providers and job seekers for a better life.
                </p>
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