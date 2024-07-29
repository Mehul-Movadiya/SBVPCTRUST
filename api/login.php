<?php
include("dbconfig.php");
// $cno=8200548284;
$cno=$_POST['cno'];
$pwd=$_POST['pwd'];
$tok=$_POST['tok'];

mysqli_query($con,"update member set fcm_id='$tok' where contact_no='$cno'");
		
$rs=mysqli_query($con,"select * from member where contact_no = '$cno' and password='$pwd'");

	// $i=0;
	// while ($row[]=mysqli_fetch_assoc($rs))
	// {
	// 	$i++;
	// }
	
	// unset($row[$i]);
	if(mysqli_num_rows($rs)>0)
	{
		
		$row=mysqli_fetch_assoc($rs);
		echo json_encode($row);
	}
	else
	{
		echo "Not Found";
	}

?>