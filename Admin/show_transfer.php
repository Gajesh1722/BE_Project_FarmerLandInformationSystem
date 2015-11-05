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
	  alert('plz enter district name');
	  document.getElementById('t2').focus();
	  return false;
	}
	 if(document.getElementById('t2').value=="Select Godown")
    {
	  alert('plz enter taluka name');
	  document.getElementById('t2').focus();
	  return false;
	}
	 if(document.getElementById('t3').value=="Select your product")
    {
	  alert('plz select godown name');
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
<!--CODE FOR PAGGING-->
<?php
$page_name="show_transfer.php"; 

if(!isset($_REQUEST["start"])) 
{
	$start = 0;
}
else
{
	$start = $_REQUEST["start"];
}
		
		$eu = ($start - 0); 
		$limit = 3;          
		$this1 = $eu + $limit; 
		$back = $eu - $limit; 
		$next = $eu + $limit; 
?>
		
<!--CODE FOR PAGGING-->	
<body class="body">
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="18%" valign="top"><table width="100%" border="1" class="table">
      <tr>
        <td><a href="show_transfer.php">Show Transfers </a></td>
      </tr>
      <tr>
        <td><a href="a_transfer.php">Make Transfer </a></td>
      </tr>
    </table></td>
    <td width="62%"><table width="99%" border="1" class="table">
      <tr>
        <td colspan="9"><span class="header">
          <?php 
	  	if(isset($_REQUEST['msg'])!="")
		{
			echo $_REQUEST['msg'];
		}
	  ?>
        </span></td>
        </tr>
      <tr>
        <td class="font">No</td>
        <td class="font">From Taluka </td>
        <td class="font">From Godown </td>
        <td class="font">To Taluka </td>
        <td class="font">To Godown </td>
        <td class="font">Prod. </td>
        <td class="font">Sub Prod. </td>
        <td class="font">Amount</td>
        <td class="font">Action</td>
      </tr>
      <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from transfer";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from transfer order by tid desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			  
	
	
	?>
         <!--CODE FOR PAGGING-->
	  <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['ftaluka'];?></td>
        <td><?php echo $data['fgodown'];?></td>
        <td><?php echo $data['ttaluka'];?></td>
        <td><?php echo $data['tgodown'];?></td>
        <td><?php echo $data['product'];?></td>
        <td><?php echo $data['sub_product'];?></td>
        <td><?php echo $data['tones'];?> </td>
        <td><a href="del_transfer.php?did=<?php echo $data['tid'];?>">Delete</a></td>
	  </tr>
	  <?php
	  $i++;
	  }
	  ?>
    </table>
    <p>
      <?php 

echo "<table border=1 align=center style=border:#2980C5; border-style:groove>";
while($r=mysql_fetch_array($sql_group))

{
	
	echo "<table width='99%' border='1' class='table'>
      
      <tr>
        <td class='font'>No</td>
        <td class='font'>From Taluka </td>
        <td class='font'>From Godown </td>
        <td class='font'>To Taluka </td>
        <td class='font'>To Godown </td>
        <td class='font'>Prod. </td>
        <td class='font'>Sub Prod. </td>
        <td class='font'>Amount</td>
        <td class='font'>Action</td>
      </tr>
      
	  <tr>
        <td>". $i."</td>
        <td>". $data['ftaluka']."</td>
        <td>". $data['fgodown']."</td>
        <td>". $data['ttaluka']."</td>
        <td>". $data['tgodown']."</td>
        <td>". $data['product']."</td>
        <td>". $data['sub_product']."</td>
        <td>". $data['tones']." </td>
        <td><a href='del_transfer.php?did=".$data['tid']."'>Delete</a></td>
	  </tr>
	  
    </table>";
} 
echo "</table>";



echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";

if($back>=0) 
{ 
	echo "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 

	echo "</td><td align=center width='40%'>Page:";
	$i=0;
	$l=1;
	$total=0;
	for($i=0;$i < $nume;$i=$i+$limit)
	{
		if($i <> $eu)
		{
			echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
		}
		else 
		{ 
			echo "<font face='Verdana' size='2' color=red>$l</font>";
		}
		$l=$l+1;
		$total = $total+1;
	}
echo " of $total</td><td  align='right' width='40%'>";



if($this1 < $nume) 
{ 
	echo "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
	echo "</td></tr></table>";
}

?>
	</p></td>
              
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
