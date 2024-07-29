<?php
include_once('../dbconfig.php');
$relative_id = $_GET['id'];
$conn->query("delete from relative where relative_id=$relative_id");
header('location:relativelist.php');
?>