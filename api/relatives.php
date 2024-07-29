<?php
include("dbconfig.php");
$mid=$_POST['mid'];
$rs=mysqli_query($con,"select * from relative where member_id='$mid'");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	$i++;
	unset($row[$i]);
	echo json_encode($row);
?>