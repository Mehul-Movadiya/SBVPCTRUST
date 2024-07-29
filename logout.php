<?php
if(isset($_COOKIE['member_id']))
{
    setcookie('member_id', '', time()-7000000);
    setcookie('member_name', '', time()-7000000);
    header("Location: index.php");
}
?>