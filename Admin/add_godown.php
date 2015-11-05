<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['perform'])=="true")
{
	include("connect.php");
	$y=$_REQUEST['ta'];
	$g=$_REQUEST['t1'];
	$s=$_REQUEST['t2'];
	mysql_query("insert into god_mngt (taluka,godown_name,stock) values ('$y','$g','$s')") or die ("QF");
	header("location: show_godown.php?msg=New Godown has been Added sucessfully");
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
  
	if(document.getElementById('t1').value=="")
    { 
	   alert('plz enter godown name');
	   document.getElementById('t1').focus();
	   return false;
	}
	if(document.getElementById('t2').value=="")
    { 
	   alert('plz enter stock of godown');
	   document.getElementById('t2').focus();
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
    <td width="18%">&nbsp;</td>
    <td width="65%"><form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
      <input type="hidden" name="perform" value="true" />
      <table width="100%" border="1" class="table">
        <tr>
          <td colspan="3"><div align="center" class="font">Add New Godown </div></td>
        </tr>
        <tr>
          <td class="font">Select Taluka </td>
          <td>&nbsp;</td>
          <td><select name="ta" id="ta">
          <?php
		  include("connect.php");
		  $q=mysql_query("select * from village_mngt");
		  while($data=mysql_fetch_array($q))
		  {
		  ?>  
			<option value="<?php echo $data['village'];?>"><?php echo $data['village'];?></option>
        <?php
		}
		?>  
		  </select>
          </td>
        </tr>
        <tr>
          <td width="26%" class="font">Godown Name</td>
          <td width="2%">&nbsp;</td>
          <td width="72%"><label>
            <input name="t1" type="text" id="t1" />
          </label></td>
        </tr>
        <tr>
          <td class="font">Stock(kg)</td>
          <td>&nbsp;</td>
          <td><label>
            <input name="t2" type="text" id="t2" />
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
