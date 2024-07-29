<?php
include_once('dbconfig.php');
$relative_id = $_GET['relative_id'];
$conn->query("delete from relative where relative_id=$relative_id");
header('location:myrelatives.php');
?>