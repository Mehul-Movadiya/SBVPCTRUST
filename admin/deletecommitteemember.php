<?php
include_once('../dbconfig.php');
$cm_id = $_GET['id'];
$conn->query("delete from committeemember where cm_id=$cm_id");
header('location:committeememberlist.php');
?>