<?php
include("dbconfig.php");
$rs=mysqli_query($con,"select * from Subcast");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	{
		$i++;
	}
	unset($row[$i]);
	echo json_encode($row);
?>