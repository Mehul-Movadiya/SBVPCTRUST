<?php
include("dbconfig.php");
$rs=mysqli_query($con,"select com_name,committee_id from committee");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	$i++;
	unset($row[$i]);
	echo json_encode($row);
?>