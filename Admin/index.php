<?php
session_start();
if(isset($_REQUEST['perform'])=="true")
{
   include("connect.php");
   $l=$_REQUEST['t1'];
   $p=$_REQUEST['t2'];
   $q=mysql_query("select * from admin where a_login='$l' and a_password='$p'")or die("qf");
   if(mysql_num_rows($q))
   {
      $data=mysql_fetch_array($q);
	  $_SESSION['admin']=$data['aid'];
	  header("location: home.php");
	  
   }
   else
   {
     header("location: index.php?msg= Enter your Correct ID AND PASSWORD");
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" type="text/javascript">
function chk()
{
	if(document.getElementById('t1').value=="")
	{
		alert('please enter product ID');
		document.getElementById('t1').focus();
		return false;
	}
	else if(document.getElementById('t2').value=="")
	{
		alert('please enterr ur password');
		document.getElementById('t2').focus();
		return false;
	}
	 
	 
}
</script>
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body bgcolor="#99CC99">
<form id="form1" name="form1" method="post" action="" onsubmit="return chk();">
<input type="hidden" name="perform" value="true" />
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="544" height="171" border="1" align="center" class="table">
    <tr>
      <td colspan="3"><div align="center" class="font style1">Admin Log in </div></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#CC99FF" class="table"><font color= color="#000000">
        <?php
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?>
      </font></td>
    </tr>
    <tr>
      <td width="108" class="font">Admin ID </td>
      <td width="8">&nbsp;</td>
      <td width="375"><label>
        <input name="t1" type="text" id="t1" />
      </label></td>
    </tr>
    <tr>
      <td class="font">Admin Password </td>
      <td>&nbsp;</td>
      <td><input name="t2" type="password" id="t2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Log in" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
