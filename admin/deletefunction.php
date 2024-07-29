<?php
include_once('../dbconfig.php');
$fid = $_GET['id'];
$conn->query("delete from function_ where f_id=$fid");
header('location:functionlist.php');
?>