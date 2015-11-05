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
$page_name="show_district.php"; 

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
<body>
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
  </tr>
  <tr>
    <td width="26%"><table width="100%" border="1">
      <tr>
        <td height="58"><a href="show_city_mgnt.php">SHOW ME MAIN PAGE OF CITY MANGEMENT </a></td>
      </tr>
    </table></td>
    <td width="58%"><table width="101%" border="1" class="table">
      <tr>
        <td colspan="2"
		  >&nbsp;</td>
        <td width="25%"><a href="add_district.php">Add New </a></td>
      </tr>
      <tr>
        <td width="33%" class="font">No</td>
        <td width="42%" class="font">District Name </td>
        <td class="font">Action</td>
      </tr>
      <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from dist_mngt";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from dist_mngt order by did desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			  
	
	
	?>
         <!--CODE FOR PAGGING-->
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['district'];?></td>
        <td><a href="del_taluka.php?pid=<?php echo $data['did'];?>">Delete</a></td>
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
	
	echo "<table width='97%' border='1' class='tabl'>
      <tr>
        <td colspan='2'
		  >&nbsp;</td>
        <td width='25%'><a href='add_district.php'>Add New </a></td>
      </tr>
      <tr>
        <td width='33%' class='font'>No</td>
        <td width='42%' class='font'>District Name </td>
        <td class='font'>Action</td>
      </tr>
      
      <tr>
        <td>". $i."</td>
        <td>". $data['district']."</td>
        <td><a href='del_taluka.php?pid=".$data['did'].".>Delete</a></td>
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
             
    <td width="16%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
