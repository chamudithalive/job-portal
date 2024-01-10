<?php
session_start();

if(isset($_SESSION['id_jobseeker']) || isset($_SESSION['id_jobprovider'])) { 
  header("Location: jobseeker-index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('includes/jobseeker-head.inc.php'); ?>
</head>
<body class="hold-transition login-page skin-green">
  <header class="main-header">
    <?php include('includes/jobseeker-header.inc.php'); ?>
  </header>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Job Seeker Login</p>

    <form method="post" action="includes/jobseeker-login.inc.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8 validation">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br>

    <?php 
    //If User have successfully registered then show them this success message
    //Todo: Remove Success Message without reload?
    if(isset($_SESSION['registerCompleted'])) {
      ?>
      <div>
        <p id="successMessage" class="text-center">Check your email!</p>
      </div>
    <?php
     unset($_SESSION['registerCompleted']); }
    ?>   
    <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['loginError'])) {
      ?>
      <div>
        <p class="text-center">Invalid Email/Password! Try Again!</p>
      </div>
    <?php
     unset($_SESSION['loginError']); }
    ?>      

    <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['userActivated'])) {
      ?>
      <div>
        <p class="text-center">Your Account Is Active. You Can Login</p>
      </div>
    <?php
     unset($_SESSION['userActivated']); }
    ?>    

     <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['loginActiveError'])) {
      ?>
      <div>
        <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
      </div>
    <?php
     unset($_SESSION['loginActiveError']); }
    ?>   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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

  $(function() {
    $("#successMessage:visible").fadeOut(8000);
  });
</script>

</body>
</html>