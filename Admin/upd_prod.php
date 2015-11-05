<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['update'])=="true")
{
include("connect.php");
$i=$_REQUEST['upid'];
$m=$_REQUEST['mp'];
$s=$_REQUEST['sp'];
mysql_query("update s_prod set m_pro='$m', sp_name='$s' where sid=$i") or die ("QF");
header("location: prod.php?msg=Product has Updated sucessfully");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" type="text/javascript">
function validate()
{
  
	if(document.getElementById('mp').value=="Select Product")
    { 
	   alert('plz select product you want to update');
	   document.getElementById('mp').focus();
	   return false;
	}
	
}
</script>

</head>

<body class="body">&nbsp;</p>

 

<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<?php
	include("connect.php");
	$i=$_REQUEST['uid'];
	$q=mysql_query("select * from s_prod where sid=$i") or die ("QF");
	$data=mysql_fetch_array($q);
	?>
	<form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
	<input type="hidden" name="update" value="true" />
	<input type="hidden" name="upid" value="<?php echo $data['sid'];?>" />
	  <table width="100%" border="1" align="center" class="table">
        <tr>
          <td colspan="3" class="font">Update New Product </td>
        </tr>
        <tr>
          <td width="43%" class="font">Select Main Product </td>
          <td width="4%" class="font">::</td>
          <td width="53%" class="font"><select name="mp" id="mp">
              <option value="Select Product" selected="selected">Select Product</option>
              <option value="Crop">Crop</option>
              <option value="Pesticides">Pesticides</option>
            </select>          </td>
        </tr>
        <tr>
          <td class="font">Name Of Sub Product </td>
          <td class="font">::</td>
          <td class="font"><input name="sp" type="text" id="sp" size="30"  value="<?php echo $data['sp_name'];?>"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="Submit" value="Update Product" /></td>
        </tr>
      </table>
      </form>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
