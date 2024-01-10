<!-- Logo -->
<a href="index.php" class="logo logo-bg">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>J</b>P</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Job</b>Portal</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li>
        <a href="jobs.php">Jobs</a>
      </li>
      <?php if(empty($_SESSION['id_jobseeker']) && empty($_SESSION['id_jobprovider'])) { ?>
      <li>
        <a href="login.php">Login</a>
      </li>
      <li>
        <a href="signup.php">Sign Up</a>
      </li>  
      <?php } else { 

        if(isset($_SESSION['id_jobseeker'])) { 
      ?>        
      <li>
        <a href="jobseeker/jobseeker-index.php">Job Seeker - Dashboard</a>
      </li>
      <?php
      } else if(isset($_SESSION['id_jobprovider'])) { 
      ?>        
      <li>
        <a href="jobprovider/jobprovider-index.php">Job Provider - Dashboard</a>
      </li>
      <?php } ?>
      <li>
        <a href="includes/logout.inc.php">Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>