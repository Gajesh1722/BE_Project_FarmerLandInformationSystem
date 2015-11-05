<?php
include("connect.php");
$id=$_REQUEST['aid'];
$q=mysql_query("select * from my_order where id=$id");
$data=mysql_fetch_array	($q);
$i=$data['rid'];
$t1=0;
$mtot=0;
$nq=mysql_query("select * from my_order where rid=$i and flag=1 ") or die ("QF");
while($ndata=mysql_fetch_array($nq))
{
	$t1=$ndata['amount'];
	$mtot=$mtot+$t1;
}

	if($mtot>50)
	{
		
		header("location: myprofile.php?msg=Stock Limit for this user is over");
	
	} 
	else 
	{
	
     mysql_query("update my_order set flag=1 where id=$id") or die ("QF");
	 $p=$data['taluka']; 
 	 $r=$data['amount']; 
	 $q1=mysql_query("select * from  god_mngt where taluka='$p'") or die ("QF"); 
	 $data1=mysql_fetch_array($q1);
	 $r1=$data1['stock']; 
	 $r2=$r1-$r;
     mysql_query("update god_mngt set stock=$r2 where taluka='$p'") or die ("QF");
     header("location:show_order.php?Order has been approved");
    }
?>