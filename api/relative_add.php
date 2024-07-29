 <?php
include("dbconfig.php");
// mysqli_select_db($con,"sbps");
$mid=$_POST['mid'];
$name=$_POST['nm'];
$mail=$_POST['mail'];
$edu=$_POST['edu'];
$prof=$_POST['prof'];
$dob=$_POST['dob'];
$gen=$_POST['gen'];
$rel=$_POST['rel'];
$inl=$_POST['inlo'];

$qry="INSERT INTO `relative`(`name`,`email`,`education`,`profession`,`dob`,`relation`,`member_id`,`gender`,`Inloves`) VALUES ('$name','$mail','$edu','$prof','$dob','$rel','$mid','$gen','$inl')";

if (mysqli_query($con, $qry))
    $last_id = mysqli_insert_id($con);
echo $last_id;
?>
