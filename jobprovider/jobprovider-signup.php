<?php
session_start();

if(isset($_SESSION['id_jobseeker']) || isset($_SESSION['id_jobprovider'])) { 
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
       <section class="content-header">
          <div class="container">
            <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
              <h1 class="text-center margin-bottom-20">Job Provider Signup</h1>

              <form method="post" id="registerCompanies" action="includes/jobprovider-signup.inc.php" enctype="multipart/form-data">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" name="name" placeholder="Full Name" required>
                  </div>

                  <div class="form-group">
                    <input class="form-control input-lg" type="text" name="companyname" placeholder="Company Name" required>
                  </div>

                  <div class="form-group">
                    <input class="form-control input-lg" type="text" name="website" placeholder="Website">
                  </div>

                  <div class="form-group">
                    <input id="email" class="form-control input-lg" type="text" name="email" placeholder="Email" required>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" name="aboutme" placeholder="Brief info about your company"></textarea>
                  </div>
                    <?php 
                    //If Company already registered with this email then show error message.
                    if(isset($_SESSION['registerError'])) {
                    ?>
                      <div>
                        <p class="text-center" style="color: red;">Email Already Exists! Choose A Different Email!</p>
                      </div>
                    <?php
                     unset($_SESSION['registerError']); }
                    ?> 
                    <?php 
                    if(isset($_SESSION['uploadError'])) {
                    ?>
                      <div>
                        <p class="text-center" style="color: red;"><?php echo $_SESSION['uploadError']; ?></p>
                      </div>
                    <?php
                     unset($_SESSION['uploadError']); }
                    ?> 
                  </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                    <input class="form-control input-lg" type="text" name="contactno" placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" name="address" placeholder="Address"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Attach Company Logo</label>
                    <input type="file" name="image" class="form-control input-lg">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Register</button>
                  </div>

                  <div class="form-group validation">

                  </div>
                </div>
              </form>
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

    <script>
      $(document).ready(function(){
        $("#email").keyup(function(){
          var input = $(this).val();

          if(input != ""){
            $.ajax({
              url: "../includes/validate.inc.php",
              method: "POST",
              data: {input:input},

              success:function(data){
                $(".validation").html(data);
                $(".validation").css("display","block");
              }
            });
          }
          else{
            $(".validation").css("display","none");
          }
        });
      });
    </script>
  </body>
</html>