<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['perform'])=="true")
{
	include("connect.php");
	$ds=$_REQUEST['dist'];
	$d=$_REQUEST['t1'];
	mysql_query("insert into village_mngt (did,village) values ('$ds','$d')") or die ("QF");
	header("location: show_city.php?msg=New Taluka has been added sucessfully");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" type="text/javascript">
function validate()
{
   if(document.getElementById('dist').value=="Select Your District")
    { 
	   alert('plz select name of the district ');
	   document.getElementById('dist').focus();
	   return false;
	}
	if(document.getElementById('t1').value=="")
    { 
	   alert('plz enter name of the taluka you want to add');
	   document.getElementById('t1').focus();
	   return false;
	}
}
</script>
</head>

<body class="body">
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?Php include("header.php");?></td>
  </tr>
  <tr>
    <td width="18%"><table width="100%" border="1">
      <tr>
        <td height="58"><a href="show_city_mgnt.php">SHOW ME MAIN PAGE OF CITY MANGEMENT </a></td>
      </tr>
    </table></td>
    <td width="65%"><form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
      <input type="hidden" name="perform" value="true" />
      <table width="100%" border="1" class="table">
        <tr>
          <td colspan="3"><div align="center" class="font">Add New Taluka </div></td>
        </tr>
        <tr>
          <td class="font">Select District</td>
          <td>&nbsp;</td>
          <td><select name="dist" id="dist">
            <option value="Select Your District" selected="selected">Select Your District</option>
            <?php
		include("connect.php");
		$q=mysql_query("select * from  dist_mngt") or die ("QF");
		while($data=mysql_fetch_array($q))
		{
		?>
            <option value="<?php echo $data['did'];?>"><?php echo $data['district'];?></option>
            <?php
		}
		?>
          </select></td>
        </tr>
        <tr>
          <td width="26%" class="font">Taluka Name </td>
          <td width="2%">&nbsp;</td>
          <td width="72%"><label>
            <input name="t1" type="text" id="t1" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="Add" />
          </label></td>
        </tr>
      </table>
    </form></td>
    <td width="17%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
