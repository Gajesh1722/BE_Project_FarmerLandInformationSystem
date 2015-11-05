<?php
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
mysql_query("delete from register where id=$i") or die ("query fail");
header("location: show_user.php?msg=data are deleted...");

?>