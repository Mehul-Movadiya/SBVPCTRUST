<?php
$rid=$_POST['rid'];

include("dbconfig.php");  
$qry="delete from `relative` where relative_id='$rid'";
mysqli_query($con,$qry); 
?>