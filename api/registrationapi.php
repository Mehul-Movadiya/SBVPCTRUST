<?php
include("dbconfig.php");
//mysqli_select_db($con,"sbps");
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

$rs=mysqli_query($con,"select * from member where contact_no='$num'");

if(mysqli_num_rows($rs)>0)
{
    $qry="update member set member_name='$name',email='$email',gender='$gender',dob='$date',home_address='$hadd',home_pincode='$pincode',education='$education',profession='$profession',business_address='$profadd',business_pincode='$profpin',gotra_id='$gotra',password='$password' where contact_no='$num'";
}
else
{
    $qry="INSERT INTO member(member_name,contact_no,email,gender,dob,home_address,home_pincode,education,profession,business_address,business_pincode,gotra_id,password) VALUES ('$name','$num','$email','$gender','$date','$hadd','$pincode','$education','$profession','$profadd','$profpin','$gotra','$password')";

}
// echo $qry;
mysqli_query($con,$qry);

$qry="select * from member where contact_no='$num'";
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_assoc($rs);
echo $row['member_id'];
// echo "Success....";
?>