<?php
include_once('../dbconfig.php');
$gotra_id = $_GET['id'];
$conn->query("delete from gotra where gotra_id=$gotra_id");
header('location:gotralist.php');
?>