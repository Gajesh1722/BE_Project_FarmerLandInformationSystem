<?php
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['pid'];
mysql_query("delete from dist_mngt where did=$i") or die ("query fail");
header("location: show_city_mgnt.php?msg=Taluka has been is deleted...");

?>