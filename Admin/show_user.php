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
$page_name="show_user.php"; 

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
    <td width="7%">&nbsp;</td>
    <td width="86%">
	<table width="100%" border="1" class="table">
      <tr>
        <td colspan="16"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
      </tr>
      <tr>
        <td width="13%" class="font">ID</td>
        <td width="6%" class="font">Name</td>
        <td width="6%" class="font">F_id</td>
        <td width="6%" class="font">Password</td>
        <td width="6%" class="font">Age</td>
        <td width="6%" class="font">Contact</td>
        <td width="6%" class="font">Address</td>
        <td width="6%" class="font">District</td>
        <td width="6%" class="font">Taluka</td>
        <td width="6%" class="font">Village</td>
        <td width="6%" class="font">Income</td>
        <td width="6%" class="font">Serv.no</td>
        <td width="6%" class="font">Area</td>
        <td width="6%" class="font">Land</td>
        <td width="3%" class="font">Irrigation</td>
        <td width="4%" class="font">Action</td>
      </tr>
      <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
	$i=1;
	$sql2 = "select * from register";
	$fetch = mysql_query($sql2) or die("query failed");
	$nume = mysql_num_rows($fetch);
	$sql_group=mysql_query("select * from register order by id desc limit $eu,$limit ");
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
        <td><?php echo $i;?></td>
        <td><?php echo $data['f_name'];?></td>
        <td><?php echo $data['f_id'];?></td>
        <td><?php echo $data['password'];?></td>
        <td><?php echo $data['age'];?></td>
        <td><?php echo $data['c_num'];?></td>
        <td><?php echo $data['address'];?></td>
        <td><?php  
			$t1=$data['d_name'];
			$q2=mysql_query("select district  from dist_mngt where did=$t1");
			$data2=mysql_fetch_array($q2);
			echo $data2['district'];
		
		?></td>
        <td><?php
				
				$t=$data['t_name'];
				$q1=mysql_query("select village  from village_mngt where vid=$t");
				$data1=mysql_fetch_array($q1);
				echo $data1['village'];
		 ?></td>
        <td><?php echo $data['v_name'];?></td>
        <td><?php echo $data['y_income'];?></td>
        <td><?php echo $data['s_num'];?></td>
        <td><?php echo $data['area_of_serv_no'];?></td>
        <td><?php echo $data['t_land'];?></td>
        <td><?php echo $data['w_irrigation'];?></td>
        <td><div align="center"><a href="del_userdata.php?did=<?php echo $data['id'];?>">Delete</a></div></td>
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
	
	echo "<table width='100%' border='1' class='table'>
      
      <tr>
        <td width='13%' class='font'>ID</td>
        <td width='6%' class='font'>Name</td>
        <td width='6%' class='font'>F_id</td>
        <td width='6%' class='font'>Password</td>
        <td width='6%' class='font'>Age</td>
        <td width='6%' class='font'>Contact</td>
        <td width='6%' class='font'>Address</td>
        <td width='6%' class='font'>District</td>
        <td width='6%' class='font'>Taluka</td>
        <td width='6%' class='font'>Village</td>
        <td width='6%' class='font'>Income</td>
        <td width='6%' class='font'>Serv.no</td>
        <td width='6%' class='font'>Area</td>
        <td width='6%' class='font'>Land</td>
        <td width='3%' class='font'>Irrigation</td>
        <td width='4%' class='font'>Action</td>
      </tr>
     
		     
      <tr>
        <td>".$i."</td>
        <td>".$data['f_name']."</td>
        <td>".$data['f_id']."</td>
        <td>".$data['password']."</td>
        <td>".$data['age']."</td>
        <td>".$data['c_num']."</td>
        <td>".$data['address']."</td>
        
        <td>
				". $data1['village']."
		</td>
        <td>".$data['v_name']."</td>
        <td>".$data['y_income']."</td>
        <td>".$data['s_num']."</td>
        <td>".$data['area_of_serv_no']."</td>
        <td>".$data['t_land']."</td>
        <td>".$data['w_irrigation']."</td>
        <td><a href='del_userdata.php?did=".$data['id']."'>Delete</a></div></td>
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


?></p></td>
              </tr>
              <?php
	 }
	
	?>
	 
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
