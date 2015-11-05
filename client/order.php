<?php
session_start();
$rid=$_SESSION['uid'];
if(isset($_SESSION['uid'])=='')
{
header("location: login.php ?msg=PLZ log in first");
}
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$f=$_REQUEST['f_id'];
$am=$_REQUEST['amount'];
$t=$_REQUEST['ta'];
$qr=mysql_query("select * from god_mngt where taluka='$t'");
$data=mysql_fetch_array($qr);
$s=$data['stock'];
$t1=0;
$mtot=0;
$nq=mysql_query("select * from my_order where rid=$rid and flag=1 ") or die ("QF");
while($ndata=mysql_fetch_array($nq))
{
	$t1=$ndata['amount'];
	$mtot=$mtot+$t1;
}
 
	if($am>$s)
	{
		$msg = "Stock is Not Available";
	}
	else if($mtot>50)
	{
		$msg = "Your Stock Limit Has Been Over";
	}
	else
	{

		$pm=$_REQUEST['c'];
		$sp=$_REQUEST['state'];

		mysql_query ("insert into my_order(rid,name,taluka,main_prod,sub_prod,amount) values('$rid','$f','$t','$pm','$sp','$am')")or die("qf");

	header("location: myprofile.php?msg= Your order has been placed");
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Farmer Land Information System</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
        <style type="text/css">
<!--
.style1 {font-size: 14px}
-->
        </style>
</head>
	<script language="javascript" type="text/javascript">
function validate()
{
    if(document.getElementById('c').value=="Select your Product")
    { 
	   alert('plz select your product you want to buy');
	   document.getElementById('c').focus();
	   return false;
	}
	if(document.getElementById('state').value=="Select your Sub.Product")
    { 
	   alert('plz select product you want to order');
	   document.getElementById('state').focus();
	   return false;
	}
	if(document.getElementById('amount').value=="Select your amount")
    { 
	   alert('plz select amount you want to order');
	   document.getElementById('amount').focus();
	   return false;
	}
	
   
}
 </script>
 <script language="javascript" type="text/javascript">

function getXMLHTTP() 
{ 
		var xmlhttp=false;	
		try
		{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	
		{		
			try
			{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1)
				{
					xmlhttp=false;
				}
			}
		}
		 return xmlhttp;
}
	
	
function getState(countryId) 
{		
		
		var strURL="sub_state.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
    <body>
    	<div id="wrap">
		        <div id="menu">
				<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="activities.php">Activities</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="order.php" class="active">Order</a></li>
						<?php
						}
						?>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="myprofile.php">Myprofile</a></li>
						<li><a href="inquiry.php">Inquiry</a></li>
						<?php
						}?>
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="login.php">Login</a></li>
						<?php
						}
						else
						{
						?>
						<li><a href="Logout.php">Logout</a></li>
						<?php
						}
						?>
						</ul>
				</div>
				<div id="top_padding"></div>
				
				<div id="content_top"></div>				
				<div id="content_bg_repeat">
					
					<div class="inside">
            	<div class="row-1 outdent">
            	  <div class="wrapper"></div>
                <form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
	<input type="hidden" name="perform" value="true" />
	
	<?php
	include("connect.php");
	$id=$_SESSION['uid'];
	$q=mysql_query("select * from register where ID=$id");
	$data=mysql_fetch_array($q);
	?>
      <table width="80%" height="481" border="0" align="center" style="border: #000000 double;">
        <tr>
          <td height="62" colspan="3"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style=" font:Georgia, 'Times New Roman', Times, serif; font-size:18px; "><?php
						if(isset($msg)!="")
						{
							echo $msg;
						}
						?></font></td>
                        </tr></table>
                        <table width="100%" border="1"><tr></tr>
                      </table>
                        <p>&nbsp;</p>
              </td>
        </tr>
        <tr>
          <td colspan="3" align="center" style="color:#FF3300;"><span class="style1">Order table </span></td>
        </tr>
        <tr>
          <td width="35%"><span class="style1">Farmer name<strong><font color="#FF0000">*</font><font color="#FF0000"></font></strong></span></td>
          <td width="2%">::</td>
          <td width="63%"><label>
            <input name="f_id" type="text" id="f_id" value="<?php echo $data['f_name'];?>" / readonly="">
          </label></td>
        </tr>
        <tr>
          <td><span class="style1">District Name <strong><font color="#FF0000">*</font><font color="#FF0000"></font></strong></span></td>
          <td>::</td>
          <td><label>
          <input name="f_id2" type="text" id="f_id2" value="<?php  
			$t1=$data['d_name'];
			$q2=mysql_query("select district  from dist_mngt where did=$t1");
			$data2=mysql_fetch_array($q2);
			echo $data2['district'];
		
		    ?>" / readonly="">
          </label></td>
        </tr>
        <tr>
          <td><span class="style1">Taluka Name <strong><font color="#FF0000">*</font><font color="#FF0000"></font></strong></span></td>
          <td>::</td>
          <td><input name="ta" type="text" id="ta" value="<?php
				$t=$data['t_name'];
				$q1=mysql_query("select village  from village_mngt where vid=$t");
				$data1=mysql_fetch_array($q1);
				echo $data1['village'];
		       ?>" / readonly=""></td>
        </tr>
        <tr>
          <td><span class="style1">Village Name </span></td>
          <td>::</td>
          <td><label>
            <input name="v" type="text" id="v" value="<?php echo $data['v_name'];?>" / readonly="">
          </label></td>
        </tr>
        <tr>
          <td><span class="style1">Select your Product </span></td>
          <td>:::</td>
          <td>
		  <select name="c" id="c">
			 <option value="Select your Product" selected="selected">Select your Product</option>
			 <option value="1">Crop</option>
			 <option value="2">Pesticides</option>
			 
		
       
          </select></td>
        </tr>
        
        <tr>
          <td><span class="style1">Select your Sub.Product </span></td>
          <td>::</td>
		  <td>
	      <div id="statediv"><select name="state" id="state">
            <option value="Select your Sub.Product" selected="selected">Select your Sub.Product</option>
            
            <?php
		  include("connect.php");
		  $q=mysql_query("select * from s_prod");
		  while($data=mysql_fetch_array($q))
		  {
		  ?>
		   <option value="<?php echo $data['sid'];?>"><?php echo $data['sp_name'];?></option>
            <?php
		   }
		   ?>
                                        </select>
          </label></td>
        </tr>
        
        <tr>
          <td><span class="style1">Amount of pesti. (Kg) </span></td>
          <td>::</td>
          <td><label>
            <select name="amount" id="amount">
              <option value="Select your amount" selected="selected">Select your amount</option>
              <option value="10">10</option>
              <option value="12">11</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
                </select>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="submit" type="submit" id="submit" value="Order" /></td>
        </tr>
        <tr>
          <td height="88"><span class="normtxt">
            <label></label>
          </span></td>
          <td>&nbsp;</td>
          <td><div align="right"></div></td>
        </tr>
      </table>
    </form>
            	</div>
              <div class="row-2">
              	<div class="wrapper"></div>
              </div>
            </div>
					
				</div>
				<div id="content_bottom"></div>
				<div id="footer_top">
				  <div class="clear"></div>
				</div>
				<div id="footer_bot">
					<p>Copyright  2012. <!-- Do not remove -->Designed by <a href="http://www.metamorphozis.com/free_templates/free_templates.php" title="Free Website Templates">Free Website Templates</a><!-- end --></p>
			        
				</div>
		</div>
    </body>
</html>
