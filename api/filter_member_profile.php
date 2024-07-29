<?php
  include("dbconfig.php");
  $mid=$_POST['mid'];
  $rs=mysqli_query($con,"select * from memberview where member_id='$mid'");
  if(mysqli_num_rows($rs)>0)
  {
    $row=mysqli_fetch_assoc($rs);
    echo json_encode($row);
  }   
  else
  {
    echo "Not found.";
  }
?>