 <?php
include("dbconfig.php");
// mysqli_select_db($con,"sbps");
$name=$_POST['name'];
$mail=$_POST['mail'];
$pwd=$_POST['pwd'];
$cn=$_POST['con'];
$qry="INSERT INTO `member`(`member_name`,`email`,`password`,`contact_no`) VALUES ('$name','$mail','$pwd','$cn')";
mysqli_query($con,$qry);
// echo "Inserted successfuly";

$qry="select member_id from member where contact_no='$cn'";
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_assoc($rs);
echo $row['member_id'];

?>