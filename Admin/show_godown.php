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
<!--CODE FOR PAGGING-->
<?php
$page_name="show_godown.php"; 

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
    <td width="16%">&nbsp;</td>
    <td width="63%"><table width="98%" border="1" class="table">
      <tr>
        <td colspan="4" align="center"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
        <td width="29%" colspan="2"><a href="add_godown.php">Add New Godown</a></td>
      </tr>
      <tr>
        <td width="18%" class="font">No</td>
        <td width="18%" class="font">Taluka</td>
        <td width="17%" class="font">Godown</td>
        <td width="18%" class="font">Stock</td>
        <td colspan="2" class="font">Action</td>
      </tr>
	 <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from  god_mngt";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from  god_mngt order by gid desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			 
	?>
         <!--CODE FOR PAGGING-->
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['taluka'];?></td>
        <td><?php echo $data['godown_name'];?></td>
        <td><?php echo $data['stock'];?></td>
        <td><a href="del_godown.php?did=<?php echo $data['gid'];?>">Delete</a></td>
        <td><a href="update_godown.php?uid=<?php echo $data['gid'];?>">Update</a></td>
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
	
	echo "<table width=.98%. border=.1. class=.table.>
      <tr>
        
        <td width=.29%. colspan=.2.><a href=.add_godown.php.>Add New Godown</a></td>
      </tr>
      <tr>
        <td width='18%' class='font'>No</td>
        <td width='18%' class='font'>Taluka</td>
        <td width='17%' class='font'>Godown</td>
        <td width='18%' class='font'>Stock</td>
        <td colspan='2' class='font'>Action</td>
      </tr>
	
      <tr>
        <td>". $i."</td>
        <td>". $data['taluka']."</td>
        <td>". $data['godown_name']."</td>
        <td>". $data['stock']."</td>
        <td><a href='del_godown.php?did=".$data['gid']."'>Delete</a></td>
        <td><a href='update_godown.php?uid=".$data['gid']."'>Update</a></td>
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
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>

</html>
