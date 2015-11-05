<?php
session_start();
$_SESSION['admin']='';
session_destroy();
header("location: index.php?msg=Thanks For Visit");
?>