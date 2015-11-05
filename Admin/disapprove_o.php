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

<body class="body">
<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="20%"><table width="100%" border="1">
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
    <td width="67%"><table width="100%" border="1" align="center" class="table">
      <tr>
        <td colspan="5"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
      </tr>
      <tr>
        <td width="12%" class="font">No</td>
		<td width="16%" class="font">Name </td>
        <td width="10%" class="font">MainProd</td>
        <td width="14%" class="font">Sub.Prod</td>
        <td width="12%" class="font">Amount</td>
        <td width="31%" class="font">Action</td>
      </tr>
      <?php
	include("connect.php");
	$q=mysql_query("select * from my_order where flag=2 ")or die("qf");
	$i=1;
	while($data=mysql_fetch_array($q))
	{
	?>
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
        <td><?php echo $data['amount'];?></td>
        <td><a href="del_order.php?did=<?php echo $data['id'];?>">Delete</a></td>
        </tr>
      <?php
	$i++;
	}
	?>
    </table></td>
    <td width="13%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
