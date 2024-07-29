<?php
include("dbconfig.php");
$mid=$_POST['mem_id'];


$rs=mysqli_query($con,"select member_name from member where member_id ='$mid'");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	{
		$i++;
	}
	unset($row[$i]);
	echo json_encode($row);
?>
