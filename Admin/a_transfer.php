<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}

include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$tf=$_REQUEST['t1'];
$gf=$_REQUEST['t2'];
$tt=$_REQUEST['t3'];
$gt=$_REQUEST['t4'];
$p=$_REQUEST['t5'];
$sp=$_REQUEST['t6'];
$a=$_REQUEST['t7'];
mysql_query("insert into transfer(ftaluka,fgodown,ttaluka,tgodown,product,sub_product,tones) values('$tf','$gf','$tt','$gt','$p','$sp','$a')")or die("qf");
header("location: a_transfer.php?msg= Transfer has been done");


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
   if(document.getElementById('t1').value=="Select Godown")
    {
	  alert('plz select name of the taluka');
	  document.getElementById('t1').focus();
	  return false;
	}
	 if(document.getElementById('t2').value=="Select Godown")
    {
	  alert('plz select name of godown');
	  document.getElementById('t2').focus();
	  return false;
	}
	 if(document.getElementById('t3').value=="Select your product")
    {
	  alert('plz select name of the taluka');
	  document.getElementById('t3').focus();
	  return false;
	}
	 if(document.getElementById('t4').value=="Select your subproduct")
    {
	  alert('plz select godown name');
	  document.getElementById('t4').focus();
	  return false;
	}
	 if(document.getElementById('t5').value=="")
    {
	  alert('plz enter amounts');
	  document.getElementById('t5').focus();
	  return false;
	}
	 
}
</script>
</head>

<body class="body">
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="18%" valign="top"><table width="100%" border="1">
      <tr>
        <td><a href="show_transfer.php">Show Transfers </a></td>
      </tr>
      <tr>
        <td><a href="a_transfer.php">Make Transfer </a></td>
      </tr>
    </table></td>
    <td width="62%"><form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
	<input type="hidden" name="perform" value="true" /> 
      <table width="97%" border="1" align="center" class="table">
        <tr>
          <td colspan="3" align="center"><span class="header">
            <?php 
	  	if(isset($_REQUEST['msg'])!="")
		{
			echo $_REQUEST['msg'];
		}
	  ?>
          </span></td>
          </tr>
        <tr>
          <td width="24%" class="font">Taluka(From)</td>
          <td width="1%">&nbsp;</td>
          <td width="75%"><select name="t1" id="t1">
            <option value="Select taluka" selected="selected">Select taluka</option>
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
          </select>          </td>
        </tr>
        <tr>
          <td class="font">Select Godown(From)</td>
          <td>&nbsp;</td>
          <td><select name="t2" id="t2">
		   <option value="Select Godown" selected="selected">Select Godown</option>
		   <?php
		  include("connect.php");
		  $q=mysql_query("select * from god_mngt");
		  while($data=mysql_fetch_array($q))
		  {
		  ?>
		   <option value="<?php echo $data['godown_name'];?>"><?php echo $data['godown_name'];?></option>
        <?php
		}
		?>   
          </select>          </td>
        </tr>
        <tr>
          <td class="font">Taluka(To)</td>
          <td>&nbsp;</td>
          <td><select name="t3" id="t3">
            <option value="Select taluka" selected="selected">Select taluka</option>
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
            </select></td>
        </tr>
        <tr>
          <td class="font">Select Godown(To) </td>
          <td>&nbsp;</td>
          <td><select name="t4" id="t4">
            <option value="Select Godown" selected="selected">Select Godown</option>
            
		   <?php
		  include("connect.php");
		  $q=mysql_query("select * from god_mngt");
		  while($data=mysql_fetch_array($q))
		  {
		  ?>
		  <option value="<?php echo $data['godown_name'];?>"><?php echo $data['godown_name'];?></option>
          <?php
		  }
		  ?>                
		   </select></td>
        </tr>
        <tr>
          <td class="font">Product</td>
          <td>&nbsp;</td>
          <td><select name="t5" id="t5">
           <option value="Select your product" selected="selected">Select your product</option>
            <option value="Crop">Crop</option>
            <option value="Pesticides">Pesticides</option>
                              </select></td>
        </tr>
        <tr>
          <td class="font">Select Sub.Product </td>
          <td>&nbsp;</td>
          <td><select name="t6" id="t6">
		  <option value="Select your subproduct" selected="selected">Select your subproduct</option>
           <?php
		  include("connect.php");
		  $q=mysql_query("select * from s_prod");
		  while($data=mysql_fetch_array($q))
		  {
		  ?>
		    <option value="<?php echo $data['sp_name'];?>"><?php echo $data['sp_name'];?></option>
           <?php
		   }
		   ?>
            </select></td>
        </tr>
        <tr>
          <td class="font">Amount (Tones) </td>
          <td>&nbsp;</td>
          <td><input name="t7" type="text" id="t7" /></td>
        </tr>
        <tr>
          <td class="font">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Transfer" /></td>
        </tr>
      </table>
        </form>
    </td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
