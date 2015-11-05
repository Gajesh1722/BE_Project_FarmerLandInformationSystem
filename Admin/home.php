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
$page_name="home.php"; 

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
  <table width="100%" border="1" align="center" class="background">
    <tr>
      <td colspan="3" ><?php include("header.php");?></td>
    </tr>
    <tr>
      <td width="14%" rowspan="2" class="background" >&nbsp;</td>
      <td width="79%" class="background"><?php 
	  	if(isset($_REQUEST['msg'])!="")
		{
			echo $_REQUEST['msg'];
		}
	  ?></td>
      <td width="7%" rowspan="2" class="background">&nbsp;</td>
    </tr>
    <tr>
      <td class="background"><table width="98%" border="1" class="table">
        <tr>
          <td class="font">Taluko</td>
          <td class="font">Godown</td>
          <td class="font">Stock(kg)</td>
        </tr>
		<!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from god_mngt";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from god_mngt order by gid desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			  
	
	//$q=mysql_query("select * from news order by nid desc ");
	 
	//while($data=mysql_fetch_array($q))
	//{
	?>
         <!--CODE FOR PAGGING-->
        <tr>
          <td>
		  <?php 
		  	if(($data['stock'])<50)
			{
			?><font color="#FF0000"><?php  echo $data['taluka'];?></font>
			<?php
			}
			else
			{
			?>
			<font color="#FFFFFF"><?php echo $data['taluka'];?></font><?php }?>		  
		  </td>
          <td>
		  <?php 
		  	if(($data['stock'])<50)
			{
			?><font color="#FF0000"><?php  echo $data['godown_name'];?></font>
			<?php
			}
			else
			{
			?>
			<font color="#FFFFFF"><?php echo $data['godown_name'];?></font><?php }?>
		  </td>
          <td><?php 
		  	if(($data['stock'])<50)
			{
			?><font color="#FF0000"><?php  echo $data['stock'];?></font>
			<?php
			}
			else
			{
			?>
			<font color="#FFFFFF"><?php echo $data['stock'];?></font><?php }?>
		  </td>
        </tr>
		<?php
		}
		?>
      </table>
      <p>
        <?php 

echo "<table border=1 align=center style=border:#2980C5; border-style:groove>";
while($r=mysql_fetch_array($sql_group))

{
	
	echo "<table width='98%' border='1' class='table'>
        <tr>
          <td class='font'>Taluko</td>
          <td class='font'>Godown</td>
          <td class='font'>Stock(kg)</td>
        </tr>
		
        <tr>
          <td>
		
		  	if((".$data['stock'].")<50)
			{
			<font color='#FF0000'>".$data['taluka']."</font>
			
			}
			else
			{
		
			<font color='#FFFFFF'>".$data['taluka']."</font> }	  
		  </td>
          <td>
		  
		  	if((".$data['stock'].")<50)
			{
			?><font color='#FF0000'>".$data['godown_name']."</font>
			
			else
			{
			
			<font color='#FFFFFF'>".$data['godown_name']."</font> }
		  </td>
          <td> 
		  	if((".$data['stock'].")<50)
			{
			<font color='#FF0000'><".$data['stock']."</font>
			
			}
			else
			{
	
			<font color='#FFFFFF'>".$data['stock']."</font>}
		  </td>
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
    </tr>
    <tr>
      <td class="background">&nbsp;</td>
      <td class="background">&nbsp;</td>
      <td class="background">&nbsp;</td>
    </tr>
</table>
</body>
</html>
