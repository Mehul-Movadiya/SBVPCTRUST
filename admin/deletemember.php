<?php
include_once('../dbconfig.php');
$member_id = $_GET['id'];
$conn->query("delete from member where member_id=$member_id");
header('location:memberlist.php');
?>