<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<!--CODE FOR PAGGING-->
<?php
$page_name="prod.php"; 

if(!isset($_REQUEST["start"])) 
{
	$start = 0;
}
else
{
	$start = $_REQUEST["start"];
}
		
		$eu = ($start - 0); 
		$limit = 10;          
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
    <td>&nbsp;</td>
    <td><table width="97%" border="1" class="table">
      <tr>
        <td colspan="3"><?php 
		if(isset($_REQUEST['msg'])!="")
		{
			echo $_REQUEST['msg'];
		}
		?></td>
        <td colspan="2"><a href="add_prod.php">Add New Product </a></td>
      </tr>
      <tr>
        <td class="font">No</td>
        <td class="font">Main Prod. Name </td>
        <td class="font">Sub Prod. Name </td>
        <td colspan="2" class="font">Action</td>
      </tr>
     <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from s_prod";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from s_prod order by sid desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			 
	?>
         <!--CODE FOR PAGGING-->
	  <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['m_pro'];?></td>
        <td><?php echo $data['sp_name'];?></td>
        <td><a href="del_prod.php?did=<?php echo $data['sid'];?>">Del</a></td>
	    <td><a href="upd_prod.php?uid=<?php echo $data['sid'];?>">Update</a></td>
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
	
	echo "<table width='97%' border='1' class='table'>
      <tr>
        
        <td colspan='2'><a href='add_prod.php'>Add New Product </a></td>
      </tr>
      <tr>
        <td class='font'>No</td>
        <td class='font'>Main Prod. Name </td>
        <td class='font'>Sub Prod. Name </td>
        <td colspan='2' class='font'>Action</td>
      </tr>
    
	  <tr>
        <td>". $i."</td>
        <td>". $data['m_pro']."</td>
        <td>". $data['sp_name']."</td>
        <td><a href='del_prod.php?did=".$data['sid']."'>Del</a></td>
	    <td><a href='upd_prod.php?uid=".$data['sid']."'>Update</a></td>
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
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
