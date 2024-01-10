<?php
  session_start(); 

  if(isset($_SESSION['id_jobseeker']) || isset($_SESSION['id_jobprovider'])) { 
    header("Location: jobprovider-index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('includes/jobprovider-head.inc.php'); ?>
  </head>

  <body class="hold-transition login-page skin-green">
    <header class="main-header">
      <?php include('includes/jobprovider-header.inc.php'); ?>
    </header>

    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg">Job Provider Login</p>

        <form method="post" action="includes/jobprovider-login.inc.php">
          <div class="form-group has-feedback">
            <input id="email" type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-8 validation">
            </div>

            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>

            <div class="col-xs-12">
              <?php 
              //If Company have successfully registered then show them this success message
              //Todo: Remove Success Message without reload?
              if(isset($_SESSION['registerCompleted'])) {
              ?>

              <div>
                <p class="text-center">You Have Registered Successfully!</p>
              </div>

              <?php
              unset($_SESSION['registerCompleted']); }

              //If Company Failed To log in then show error message.
              if(isset($_SESSION['loginError'])) {
              ?>

              <div>
                <p class="text-center">Invalid Email/Password! Try Again!</p>
              </div>

              <?php
              unset($_SESSION['loginError']); }

              if(isset($_SESSION['companyLoginError'])) {
              ?>
              <div>
                <p class="text-center"><?php echo $_SESSION['companyLoginError'] ?></p>
              </div>

              <?php
               unset($_SESSION['companyLoginError']); }
              ?>  
              </div>          
          </div>
        </form>

        <br>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->]

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
          }else{

            $(".validation").css("display","none");
          }
        });
      });
    </script>
  </body>
</html>