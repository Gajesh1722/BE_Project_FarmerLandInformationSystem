<?php
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$fn=$_REQUEST['fn'];
$mn=$_REQUEST['mn'];
$ln=$_REQUEST['ln'];
$name=$fn."-".$mn."-".$ln;
$fid=$_REQUEST['id'];
$pd=$_REQUEST['pswd'];
$age=$_REQUEST['age'];
$cntct=$_REQUEST['mobile'];
$ad=$_REQUEST['add'];
$dist=$_REQUEST['dist'];
$tal=$_REQUEST['state'];
$vill=$_REQUEST['vill'];
$in=$_REQUEST['y_i'];
$serv=$_REQUEST['serv'];
$area=$_REQUEST['asn'];
$land=$_REQUEST['land'];
$water=$_REQUEST['water'];

$q1=mysql_query("select * from register where f_id='$fid'") or die("QF");
$q2=mysql_query("select * from register where s_num='$serv'")or die ("QF");
	if(@mysql_num_rows($q1)!= 0)		
	{
		$msg = "This ID  has been already taken";
	}
	else if(@mysql_num_rows($q2)!=0)
	{
		$msg = "This servey number has been already registered";
	}
	else
	{
	mysql_query( "insert into register(f_name,f_id,password,age,c_num,address,d_name,t_name,v_name,y_income,s_num,area_of_serv_no,t_land,w_irrigation) values('$name','$fid','$pd','$age','$cntct','$ad','$dist','$tal','$vill','$in','$serv','$area','$land','$water')")or  die("qf");
header("location: register.php ?msg=Registration has beeen done");
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
.style1 {color: #999933}
.style3 {color: #999933; font-size: 14px; }
.style5 {color: #FFFFFF; font-size: 14px; }
-->
        </style>
</head>
<script language="javascript" type="text/javascript">
function validate()
{
   if(document.getElementById('fn').value=="")
    { 
	   alert('please enter your first name');
	   document.getElementById('fn').focus();
	   return false;
	}
	 if(document.getElementById('mn').value=="")
    { 
	   alert('please enter your middle name');
	   document.getElementById('mn').focus();
	   return false;
	}
	 if(document.getElementById('ln').value=="")
    { 
	   alert('please enter your last name');
	   document.getElementById('ln').focus();
	   return false;
	}
	if(document.getElementById('id').value=="")
    { 
	   alert('please enter your ID');
	   document.getElementById('id').focus();
	   return false;
	}
	if(document.getElementById('pswd').value=="")
    { 
	   alert('please enter your password');
	   document.getElementById('pswd').focus();
	   return false;
	}
	 if(document.getElementById('age').value=="")
    { 
	   alert('please enter your age');
	   document.getElementById('age').focus();
	   return false;
	}
	 if(document.getElementById('mobile').value=="")
    { 
	   alert('please enter your contact number');
	   document.getElementById('mobile').focus();
	   return false;
	}
	 if(document.getElementById('add').value=="")
    { 
	   alert('please enter your Address');
	   document.getElementById('add').focus();
	   return false;
	}
	 if(document.getElementById('dist').value=="Select Your District")
    { 
	   alert('please enter your District');
	   document.getElementById('dist').focus();
	   return false;
	}
	 if(document.getElementById('state').value=="Select Your Taluka")
    { 
	   alert('please enter your Taluka');
	   document.getElementById('state').focus();
	   return false;
	}
	 if(document.getElementById('vill').value=="")
    { 
	   alert('please enter your village');
	   document.getElementById('vill').focus();
	   return false;
	}
	 if(document.getElementById('y_i').value=="Select Your income")
    { 
	   alert('please enter your Yearly Income');
	   document.getElementById('y_i').focus();
	   return false;
	}
	 if(document.getElementById('serv').value=="")
    { 
	   alert('please enter your Servey no');
	   document.getElementById('serv').focus();
	   return false;
	}
	 if(document.getElementById('asn').value=="")
    { 
	   alert('please enter your area of servey no');
	   document.getElementById('asn').focus();
	   return false;
	}
	  if(document.getElementById('land').value=="Type of Land")
    { 
	   alert('please enter type of land you are using');
	   document.getElementById('land').focus();
	   return false;
	}
	 
	 if(document.getElementById('water').value=="Water Irrigation Type")
    { 
	   alert('please enter water irrigation type');
	   document.getElementById('water').focus();
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
		
		var strURL="findState.php?country="+countryId;
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
						<?php if (isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="order.php">Order</a></li>
						<?php
						}
						?>
						<li><a href="register.php" class="active">Registration</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="inquiry.php">Inquiry</a></li>
						<li><a href="myprofile.php">Myprofile</a></li>
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
                
                   <table width="80%" height="579" border="0" align="center" style="border: #000000 double;">
                       <tr>
                     <td height="26" colspan="3"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#990033;"><?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                        if(isset($msg)!="")
							{
								echo $msg;
							}
							?>
							 </td>
                        </tr></table></td>
                  </tr>
                   <tr>
      <td height="56" colspan="3"><div align="center" class="style1">Register form </div>        <div align="center"></div>        <div align="center"></div></td>
    </tr>
    <tr>
	
      <td width="33%"><span class="style5">Farmer's Name</span></td>
      <td width="1%"><div align="center">::</div></td>
      <td width="66%"><div align="left">
        <label>
        <input name="fn" type="text" id="fn" />
        </label>
        <input name="mn" type="text" id="mn" />
        <input name="ln" type="text" id="ln" />
      </div></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Farmer ID </span></td>
      <td>::</td>
      <td><input name="id" type="text" id="id" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Password</span></td>
      <td>::</td>
      <td><input name="pswd" type="password" id="pswd" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Age</span></td>
      <td>::</td>
      <td><label>
        <input name="age" type="text" id="age" maxlength="3" />
      </label></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Mobile no. </span></td>
      <td>::</td>
      <td><input name="mobile" type="text" id="mobile" maxlength="10" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Address</span></td>
      <td><div align="center">::</div></td>
      <td><div align="left">
        <textarea name="add" id="add"></textarea>
      </div></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">District </span></td>
      <td>::</td>
      <td><select name="dist" id="dist" onChange="getState(this.value)">
        <option value="Select Your District">Select Your District</option>
        <?php
		include("connect.php");
		$q=mysql_query("select * from  dist_mngt") or die ("QF");
		while($data=mysql_fetch_array($q))
		{
		?>
		<option value="<?php echo $data['did'];?>"><?php echo $data['district'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Taluka</span></td>
      <td>::</td>
      <td>
	  <div id="statediv"><select name="state" id="state">
        <option value="Select Your Taluka" selected="selected">Select Your Taluka</option>
         </select></div></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Village</span></td>
      <td>::</td>
      <td><label>
        <input name="vill" type="text" id="vill" />
      </label></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Yearly income</span> </td>
      <td>::</td>
      <td><select name="y_i" id="y_i">
        <option value="Select Your income">Select Your income</option>
        <option value="Less than 10000">Less than 10000</option>
        <option value="10000-25000" selected="selected">10000-25000</option>
        <option value="25000-50000">25000-50000</option>
        <option value="50000-100000">50000-100000</option>
        <option value="More than 100000">More than 100000</option>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Servey no. </span></td>
      <td>::</td>
      <td><input name="serv" type="text" id="serv" />
        <input name="textfield" type="text" value="Eg. 201" / readonly=""></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Area of Servey no. (Sq.Km) </span></td>
      <td>::</td>
      <td><input name="asn" type="text" id="asn" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Type of Land</span> </td>
      <td>::</td>
      <td><select name="land" id="land">
        <option value="Type of Land" selected="selected">Type of Land</option>
        <option value="Black soil">Black soil</option>
        <option value="Red soil">Red soil</option>
        <option value="Desert soil">Desert soil</option>
        <option value="Forest soil">Forest soil</option>
        <option value="Residual sandy soil">Residual sandy soil</option>
        <option value="Hill soil">Hill soil </option>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Water irrigation type</span> </td>
      <td>::</td>
      <td><select name="water" id="water">
        <option value="Water Irrigation Type" selected="selected">Water Irrigation Type</option>
        <option value="Flood Irrigation">Flood Irrigation</option>
        <option value="Spray Irrigation">Spray Irrigation</option>
        <option value="Furrow Irrigation">Furrow Irrigation</option>
        <option value="Drip Irrigation">Drip Irrigation</option>
        <option value="Canal Irrigation">Canal Irrigation</option>
      </select></td>
    </tr>
    <tr>
      <td height="24"><label>
        <input name="submit2" type="reset" id="submit2" value="Reset" />
      </label></td>
      <td>&nbsp;</td>
      <td><input name="register" type="submit" id="register" value="Register" /></td>
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
