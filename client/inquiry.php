<?php
session_start();
//if(isset($_SESSION['uid'])=='')
if(isset($_REQUEST['perform'])=="true")
{
include("connect.php");
$n=$_REQUEST['name'];
$p=$_REQUEST['mobile'];
$d=$_REQUEST['dist'];
$t=$_REQUEST['taluka'];
$v=$_REQUEST['vill'];
$a=$_REQUEST['add'];
$s=$_REQUEST['serv'];
$c=$_REQUEST['com'];
mysql_query ("insert into inquiry(f_name,c_num,d_name,t_name,v_name,address,serv_no,comments) values('$n','$p','$d','$t','$v','$a','$s','$c')")or die("qf");
header("location: myprofile.php?msg=  Inquiry is done..");
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
.style4 {font-size: 15px}
-->
        </style>
		<script language="javascript" type="text/javascript">
function validate()
{
   if(document.getElementById('name').value=="")
    { 
	   alert('plz enter ur name');
	   document.getElementById('name').focus();
	   return false;
	}
	 if(document.getElementById('mobile').value=="")
    { 
	   alert('plz enter ur phone num');
	   document.getElementById('mobile').focus();
	   return false;
	}
	if(document.getElementById('mobile').value.lenght<10)
    { 
	   alert('plz enter ur phone num has not enough digits ');
	   document.getElementById('mobile').focus();
	   return false;
	}
	if(document.getElementById('mobile').value.lenght>10)
    { 
	   alert('plz have entered more than 13 digits');
	   document.getElementById('mobile').focus();
	   return false;
	}
	 if(document.getElementById('dist').value=="")
    { 
	   alert('plz enter ur District name');
	   document.getElementById('dist').focus();
	   return false;
	}
	if(document.getElementById('taluka').value=="")
    { 
	   alert('plz enter ur taluka name');
	   document.getElementById('taluka').focus();
	   return false;
	}
	if(document.getElementById('vill').value=="")
    { 
	   alert('plz enter ur village name');
	   document.getElementById('vill').focus();
	   return false;
	}
	 if(document.getElementById('add').value=="")
    { 
	   alert('plz enter ur address');
	   document.getElementById('add').focus();
	   return false;
	}
	 if(document.getElementById('serv').value=="")
    { 
	   alert('plz enter ur servey no.');
	   document.getElementById('serv').focus();
	   return false;
	}
	 if(document.getElementById('com').value=="")
    { 
	   alert('plz enter ur comments');
	   document.getElementById('com').focus();
	   return false;
	}
	 
}
</script>
</head>
    <body>
    	<div id="wrap">
		        <div id="menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="activities.php">Activities</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="order.php" >Order</a></li>
						<?php
						}
						?>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="myprofile.php">Myprofile</a></li>
						<li><a href="inquiry.php" class="active">Inquiry</a></li>
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
                <form id="form1" method="post" action="" onsubmit="return validate();">
                  <input type="hidden" name="perform" value="true" />
                  <table width="80%" height="545" border="0" align="center" style="border:#000000 double;">
                    <tr>
                      <td colspan="3"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style=" font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; "><?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?></td>
                        </tr></table></td>
                    </tr>
                    
                    <tr>
                      <td width="22%"><span class="style1">Name</span></td>
                      <td width="1%">::</td>
                      <td width="77%"><label>
                        <input name="name" type="text" id="name" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style4">Mobile No</span> </td>
                      <td>::</td>
                      <td><label>
                        <input name="mobile" type="text" id="mobile" maxlength="10" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">District</span></td>
                      <td>::</td>
                      <td><label>
                      <input name="dist" type="text" id="dist" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">Taluka</span></td>
                      <td>::</td>
                      <td><label>
                        <input name="taluka" type="text" id="taluka" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">Village</span></td>
                      <td>::</td>
                      <td><label>
                        <input name="vill" type="text" id="vill" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">Address</span></td>
                      <td>::</td>
                      <td><label>
                        <textarea name="add" id="add"></textarea>
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">Servey No </span></td>
                      <td>::</td>
                      <td><label>
                        <input name="serv" type="text" id="serv" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1">Comments</span></td>
                      <td>::</td>
                      <td><label>
                        <textarea name="com" id="com"></textarea>
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Submit" />
                      </label></td>
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
