<?php
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
mysql_query("delete from feedback where id=$i") or die ("query fail");
header("location: show_feedback.php?msg=data are deleted...");

?>