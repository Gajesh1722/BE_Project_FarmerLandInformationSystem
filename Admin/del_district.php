<?php
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
mysql_query("delete from village_mngt where vid=$i") or die ("query fail");
header("location: show_city_mgnt.php?msg=District has been deleted...");

?>