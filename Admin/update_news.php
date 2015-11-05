<?php
 session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
 if(isset($_REQUEST['update'])=="true")
 {
 	include("connect.php");
	$i=$_REQUEST['upid'];
	$t=$_REQUEST['t1'];
	$d=$_REQUEST['t2'];
	 
	mysql_query("update news set tittle='$t',description='$d' where nid=$i") or die ("query fail");
	
	header("location:show_news.php?msg=News are Updated...");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body class="body">
<table width="100%" border="1" align="center" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="22%"><table width="100%" border="1" class="table">
      <tr>
        <td><a href="add_news.php">Add News</a></td>
      </tr>
      <tr>
        <td><a href="show_news.php">Show News</a></td>
      </tr>
    </table></td>
    <td width="74%"><?php 
		include("connect.php");
		$i=$_REQUEST['uid'];
		$q=mysql_query("select * from news where nid=$i") or die ("query fail");
		$data=mysql_fetch_array($q);
	?>
        <form id="form1" name="form1" method="post" action="">
          <input type="hidden" name="update" value="true" />
          <input type="hidden" name="upid" value="<?php echo $data['nid'];?>" />
          <table width="100%" border="1" class="table">
            <tr>
              <td colspan="3"><div align="center" class="font style1">Update News </div></td>
            </tr>
            <tr>
              <td width="33%" class="font">Tittle</td>
              <td width="2%">&nbsp;</td>
              <td width="65%"><label>
                <input name="t1" type="text" id="t1" value="<?php echo $data['tittle'];?>" />
              </label></td>
            </tr>
            <tr>
              <td class="font">Description</td>
              <td>&nbsp;</td>
              <td><textarea name="t2" id="t2"><?php echo $data['description'];?></textarea></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center"><label>
                <input type="submit" name="Submit" value="Add news" />
              </label></td>
            </tr>
          </table>
        </form></td>
    <td width="4%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
