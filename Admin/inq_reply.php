<?php
session_start();
if(isset($_REQUEST['perform'])=="true")
{
	
	$to=$_REQUEST['t1'];
	$from=$_REQUEST['t2'];
	$suject=$_REQUEST['t3'];
	$description=$body;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$from." <".$from.">\r\n";
	mail($to,$sub,$description,$headers);
	header("location:show_inquiry.php?msg=Relpy has been sent to the user");
}	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="perform" value="true" />
  <table width="100%" border="1" class="background">
    <tr>
      <td colspan="3"><?php include("header.php");?></td>
    </tr>
    <tr>
      <td width="16%">&nbsp;</td>
	  <?php 
	  include("CONNECT.PHP");
	  $i=$_REQUEST['rid'];
	  $q=mysql_query("select c_num from inquiry where iid=$i");
	  $data=mysql_fetch_array($q);
	  ?>
      <td width="63%"><table width="100%" border="1" class="table">
        <tr>
          <td colspan="3"><?php
		  if(isset($_REQUEST['msg'])!="")
		  {
		    echo $_REQUEST['msg'];
		   }
		   
		  ?>
		  </td>
        </tr>
        <tr>
          <td width="24%" class="font">To</td>
          <td width="1%">&nbsp;</td>
          <td width="75%"><input name="t1" type="text" id="t1" value="<?php echo $data['c_num'];?>" /></td>
        </tr>
        <tr>
          <td class="font">From</td>
          <td>&nbsp;</td>
          <td><input name="t2" type="text" id="t2" / value="leo.mahesh.jadav@gmail.com" size="31" /></td>
        </tr>
        <tr>
          <td class="font">Subject</td>
          <td>&nbsp;</td>
          <td><p>
              <textarea name="t3" id="t3"></textarea>
          </p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Send Reply" /></td>
        </tr>
      </table></td>
      <td width="21%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
