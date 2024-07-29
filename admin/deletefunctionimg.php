<?php
include_once('../dbconfig.php');
$img_id = $_GET['id'];
$conn->query("delete from functionimg where imgid=$img_id");
header('location:functionimageslist.php');
?>