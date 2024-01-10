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
        <?php include('includes/header.inc.php'); ?>
      </header>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="margin-left: 0px;">
        <section class="content-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
              <h1 class="text-center">Jobs</h1>  
                <div class="input-group input-group-lg">
                    <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                    <span class="input-group-btn">
                      <button id="searchBtn" type="button" class="btn btn-info btn-flat">Search!</button>
                    </span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="content-header">
          <div class="container">
            <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <div id="target-content">   
                </div>
                <div id="jobs">
                  <?php
                  include_once("includes/jobs.inc.php");
                  ?>
                </div> 
              </div>
              <div class="col-md-2">
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

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
        $("#searchBar").keyup(function(){
          var input = $(this).val();

          if(input != ""){
            $.ajax({
              url: "includes/search.inc.php",
              method: "POST",
              data: {input:input},

              success:function(data){
                $("#target-content").html(data);
                $("#target-content").css("display","block");
                $("#jobs").css("display","none");
              }
            });
          }
          
          else{
            $("#target-content").css("display","none");
            $("#jobs").css("display","block");
          }
        });
      });
    </script>
  </body>
</html>