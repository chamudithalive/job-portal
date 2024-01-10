<?php

require_once("db.inc.php");

$sql = "SELECT * FROM job Order By Rand() Limit 4";
$result = $conn->query($sql);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) 
  {
    $sql1 = "SELECT * FROM jobprovider WHERE id_jobprovider='$row[id_jobprovider]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) 
      {
        ?>
        <div class="attachment-block clearfix">
          <img class="attachment-img" src="jobprovider/uploads/<?php echo $row1['logo']; ?>" alt="Attachment Image">
          <div class="attachment-pushed">
            <h4 class="attachment-heading"><a href="view-job.php?id=<?php echo $row['id_job']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">Rs.<?php echo $row['maximumsalary']; ?>/Month</span></h4>
            <div class="attachment-text">
                <div><strong><?php echo $row1['companyname']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
            </div>
          </div>
        </div>
        <?php
      }
    }
  }
}
?>