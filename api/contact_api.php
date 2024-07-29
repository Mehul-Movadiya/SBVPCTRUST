<?php
include("dbconfig.php");
$cid=$_POST['com_id'];
// $rs=mysqli_query($con,"select * from committe_menber_view where committee_id ='$cid'");
// if(mysqli_num_rows($rs)>0)
// {
//     $row=mysqli_fetch_assoc($rs);
//     echo json_encode($row);
// } 

$rs=mysqli_query($con,"select * from committe_member_view where committee_id ='$cid'");
$i=0;
	while ($row[]=mysqli_fetch_assoc($rs))
	{
		$i++;
	}
	unset($row[$i]);
	echo json_encode($row);
?>
