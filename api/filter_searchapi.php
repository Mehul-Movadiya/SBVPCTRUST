<?php
include("dbconfig.php");
$qry=$_POST['qry'];
$rs=mysqli_query($con,$qry);
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	$i++;
	unset($row[$i]);
	echo json_encode($row);
?>