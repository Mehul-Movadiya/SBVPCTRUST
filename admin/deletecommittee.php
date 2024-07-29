<?php
include_once('../dbconfig.php');
$committee_id = $_GET['id'];
$conn->query("delete from committee where committee_id=$committee_id");
header('location:committeelist.php');
?>