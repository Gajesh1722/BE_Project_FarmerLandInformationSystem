<?php
session_start();
if(isset($_REQUEST['login'])=="true")
{
include("connect.php");
$un=$_REQUEST['id'];
$pass=$_REQUEST['ps'];
$q=mysql_query("select * from register where f_id='$un' and password='$pass'")or die("qf");
if(mysql_num_rows($q))
{
   $data=mysql_fetch_array($q);
   $_SESSION['uid']=$data['id'];
   header("location: myprofile.php?msg=WELCOME");
}
else
{
header("location:login.php? msg=Your ID or Password may be wrong");
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
.style14 {
	font-size: 16px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #990000;
}
.style18 {color: #FFFFFF; font-size: 14px; }
-->
        </style>
</head>
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
						<li><a href="register.php">Registration</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="inquiry.php">Inquiry</a></li>
						<li><a href="myprofile.php">Myprofile</a></li>
						<?php
						}?>
						
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="login.php" class="active">Login</a></li>
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
                <form id="form1" method="post" action="">
                  <input type="hidden" name="login" value="true" />
                  <table width="669" height="254" border="0" align="center" bordercolor="#000000" style="border:#000000 double;">
                    <tr>
                      <td height="56" colspan="3"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style="font-family:Georgia, 'Times New Roman', Times, serif; color:#990000; font-size:20px;"><?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?></td>
                      </tr></table><div align="center" class="style14">Log in Form </div></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                      </td>
                    </tr>
                    <tr>
                      <td width="207"><span class="style18">Farmer ID </span></td>
                      <td width="13">::</td>
                      <td width="427"><label>
                        <input name="id" type="text" id="id" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style18">Password</span></td>
                      <td>::</td>
                      <td><input name="ps" type="password" id="ps" /></td>
                    </tr>
                    <tr>
                      <td><input type="reset" name="Submit2" value="Reset" /></td>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Log in" />
                      </label></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
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

