<?php
include_once('../dbconfig.php');
$relation_id = $_GET['id'];
$conn->query("delete from relation where relation_id=$relation_id");
header('location:relationlist.php');
?>