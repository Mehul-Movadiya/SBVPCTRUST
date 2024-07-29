<?php
if(isset($_COOKIE['admin_id']))
{
    setcookie('admin_id', '', time()-7000000);
    header("Location: index.php");
}
?>
