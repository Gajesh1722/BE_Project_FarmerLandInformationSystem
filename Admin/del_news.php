<?php 
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
$q=mysql_query("delete from news where nid=$i") or die ("query fail");
header("location:show_news.php?msg=news is deleted...")
?>
