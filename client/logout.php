<?php
session_start();
$_SESSION['uid']='';
session_destroy();
header("location: login.php?msg=Thanks for visit");
?>