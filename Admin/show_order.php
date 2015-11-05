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
$page_name="show_order.php"; 

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
    <td width="19%"><table width="100%" border="1">
      <tr>
        <td><a href="all_order.php">All Order </a></td>
      </tr>
      
      <tr>
        <td><a href="approve_o.php">Approved Order </a></td>
      </tr>
      <tr>
        <td><a href="disapprove_o.php">Disapproved Order </a></td>
      </tr>
    </table></td>
    <td width="68%"><table width="98%" border="1" align="center" class="table">
      <tr>
        <td colspan="8"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
        <td width="24%"><font color="#FF0000">
          <?php
						if(isset($msg)!="")
						{
							echo $msg;
						}
						?>
        </font></td>
      </tr>
      <tr>
        <td width="3%" class="font">No</td>
        <td width="16%" class="font">Name </td>
        <td width="13%" class="font">Main Prod. </td>
        <td width="13%" class="font">Sub.Prod</td>
        <td width="10%" class="font">Amount</td>
        <td colspan="4" class="font">Action</td>
        </tr>
     <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from my_order";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from my_order order by id desc limit $eu,$limit ");
	if(mysql_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysql_fetch_array($sql_group))
	{
			  
	
	
	?>
         <!--CODE FOR PAGGING-->
      <tr>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php  
			$t1=$data['main_prod'];
			$q2=mysql_query("select m_pro from s_prod where sid=$t1");
			$data2=mysql_fetch_array($q2);
			echo $data2['m_pro'];
		
		?></td>
		
        <td><?php  
			$t1=$data['sub_prod'];
			$q2=mysql_query("select sp_name from s_prod where sid=$t1");
			$data2=mysql_fetch_array($q2);
			echo $data2['sp_name'];
		
		?></td>
        <td><?php echo $data['amount'];?></td
        ><td width="7%"><a href="app_order.php?aid=<?php echo $data['id'];?>">Approve</a></td>
        <td width="9%"><a href="dis_app_order.php?aid=<?php echo $data['id'];?>"> Disapprove</a></td>
        <td width="5%"><a href="del_order.php?did=<?php echo $data['id'];?>">Delete</a></td>
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
	
	echo "<<table width='98%' border='1' align='center' class='table'>
      
      <tr>
        <td width='3%' class='font'>No</td>
        <td width='16%' class='font'>Name </td>
        <td width='13%' class='font'>Main Prod. </td>
        <td width='13%' class='font'>Sub.Prod</td>
        <td width='10%' class='font'>Amount</td>
        <td colspan='4' class='font'>Action</td>
        </tr>
     
      <tr>
        <td>".$i."</td>
        <td>".$data['name']."</td>
        <td>
			".$data2['m_pro']."
		
		</td>
		
        <td>
			
			".$data2['sp_name']."
		
		</td>
        <td>".$data['amount']."</td
        ><td width='7%'><a href='app_order.php?aid=".$data['id']."'>Approve</a></td>
        <td width='9%'><a href='dis_app_order.php?aid=".$data['id']."'> Disapprove</a></td>
        <td width='5%'><a href='del_order.php?did=". $data['id']."'>Delete</a></td>
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
