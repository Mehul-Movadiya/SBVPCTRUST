<?php
include("dbconfig.php");
mysqli_select_db($con,"sbps");
$meid =$_POST['emid'];
$mname=$_POST['mname'];
$h_add=$_POST['h_add'];
$con_no=$_POST['con_no'];
$email=$_POST['email'];
$pswd=$_POST['pswd'];
$gnd=$_POST['gnd'];
$edu=$_POST['edu'];
$prof=$_POST['prof'];
$dob=$_POST['dob'];
$gid=$_POST['gid'];
$sid=$_POST['sid'];
$hpin=$_POST['hpin'];
$img=$_POST['imageView'];
$badd=$_POST['badd'];
$bpin=$_POST['bpin'];

$qry="INSERT INTO `member`(`member_id`,`member_name`,`home_address`,`contact_no`,`email`,`password`,`gender`,`education`,`profession`,`dob`,`gotra_id`,`subcast_id`,`home_pincode`,`image`,`business_address`,`business_pincode`) VALUES ('$mid','$mname','$h_add','$con_no','$email','$pswd','$gnd','$edu','$prof','$dob','$gid','$sid','$hpin','$img','$badd','$bpin')";
//$qry="INSERT INTO `member`(`member_name`,`home_address`,`contact_no`,`email`,`password`,`education`,`profession`,`home_pincode`,`business_address`,`business_pincode`) VALUES ('$mname','$h_add','$con_no','$email','$pswd','$edu','$prof','$hpin','$badd','$bpin')";


mysqli_query($con,$qry);
echo $mid;
?>