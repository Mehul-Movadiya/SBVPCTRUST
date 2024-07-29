<?php
  include("dbconfig.php");
  $cno=$_POST['cno'];
  $rs=mysqli_query($con,"select * from member where member_id='$cno'");
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