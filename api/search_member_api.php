<?php
include("dbconfig.php");
// $con=mysqli_connect("localhost","root","","sbps");

$rs=mysqli_query($con,"select * from member");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	$i++;
	unset($row[$i]);
	echo json_encode($row);
?>