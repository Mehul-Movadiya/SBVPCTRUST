<?php
include("dbconfig.php");
$fid=$_POST['fid'];
$rs=mysqli_query($con,"select * from function_ where f_id = '$fid'");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	{
		$i++;
	}
	unset($row[$i]);
	echo json_encode($row);
?>