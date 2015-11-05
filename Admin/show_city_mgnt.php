<?php
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body class="body">
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="4"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
  </tr>
  <tr>
    <td width="15%">&nbsp;</td>
    <td width="33%" align="left"><a href="show_district.php">SHOW ME DISTRICT </a></td>
    <td width="33%" align="left"><a href="show_city.php">SHOW ME TALUKA</a></td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</body>
</html>
