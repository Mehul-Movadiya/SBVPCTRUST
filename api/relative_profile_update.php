<?php
include("dbconfig.php");
mysqli_select_db($con,"sbps");
$mid=$_POST['mid'];
$name=$_POST['nm'];
$mail=$_POST['mail'];
$edu=$_POST['edu'];
$prof=$_POST['prof'];
$dob=$_POST['dob'];
$gen=$_POST['gen'];

$qry="update `relative` set `name`='$name',`email`='$mail',`education`='$edu',`profession`='$prof',`dob`='$dob',`gender`='$gen' where `member_id`='$mid'";

mysqli_query($con,$qry);
echo "Update successfully";   
?>
