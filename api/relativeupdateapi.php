<?php
$rid=$_POST['rid'];
$nm=$_POST['nm'];
$meid=$_POST['emid'];
$ed=$_POST['ed'];
$prf=$_POST['prf'];
$dob=$_POST['dob'];
$re=$_POST['rel'];
$rel=utf8_encode($re);
$gn=$_POST['gn'];
$inl=$_POST['inlo'];

include("dbconfig.php");  
$qry="update relative set name='$nm',email='$meid',education='$ed',profession='$prf',dob='$dob',relation='$rel',gender='$gn',Inloves='$inl' where relative_id='$rid'";
mysqli_query($con,$qry);
//echo $qry;
//echo "Success..";
$rs=mysqli_query($con,"select * from relative where relative_id='$rid'");
if(mysqli_num_rows($rs)>0)
{
    $row=mysqli_fetch_assoc($rs);
    echo json_encode($row);
}   
?>