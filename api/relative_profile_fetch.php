<?php
include("dbconfig.php");
$rid=$_POST['rid'];
  
$rs=mysqli_query($con,"select * from relative where relative_id='$rid'");
if(mysqli_num_rows($rs)>0)
{
    $row=mysqli_fetch_assoc($rs);
    echo json_encode($row);
}   
?>