<?php
include("dbconfig.php");
// mysqli_select_db($con,"sbvp");
$num=$_POST['con_no'];
$name=$_POST['mname'];
$email=$_POST['mail'];
$gender=$_POST['gend'];
$date=$_POST['dob'];
$hadd=$_POST['homeadd'];
$pincode=$_POST['pin'];
$education=$_POST['edu'];
$profession=$_POST['prof'];
$profadd=$_POST['padd'];
$profpin=$_POST['ppin'];
$gotra=$_POST['gotra'];
$password=$_POST['pwd'];
$mid=$_POST['mid'];
$mar=$_POST['Mar'];

$qry="update `member` set `member_name`='$name',`email`='$email',`gender`='$gender',`dob`='$date',`home_address`='$hadd',`home_pincode`='$pincode',`education`='$education',`profession`='$profession',`business_address`='$profadd',`business_pincode`='$profpin',`gotra_id`='$gotra',`password`='$password',`married_status`='$mar' where `member_id`='$mid'";

mysqli_query($con,$qry);
$qry="select * from `member` where `member_id`='$mid'";

$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_assoc($rs);
echo $row['member_id'];
// echo "$qry";
?>