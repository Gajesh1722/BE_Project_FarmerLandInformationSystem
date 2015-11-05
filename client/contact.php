<?php
session_start();
if(isset($_SESSION['uid'])=='')
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
.style3 {color: #000000}
.style4 {
	color: #FFFFFF;
	font-size: 15px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
-->
        </style>
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
						<li><a href="inquiry.php">Inquiry</a></li>
						<?php
						}?>
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="contact.php" class="active">Contact</a></li>
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
					
					<div class="inside" align="center">
            	<div class="row-1 outdent" style="width:650px;">
                
              	<div class="wrapper"></div>
                
				<div id="info" align="center" style="border:#000000 double;">
				  <p>&nbsp;</p>
				  <p>&nbsp; </p>
				  <p class="style4"><em><strong> Jadav Mahesh.</strong></em></p>
                <p class="style4">Hill drive,bhavnagar.</p>
                <p class="style4">contact no.<em>+91 9624357995</em></p>
                <p class="style4">email_id: <em>leo.mahesh.jadav@gmail.com</em> </p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Solanki Gajesh.</strong></em></p>
                <p class="style4">Hill drive,bhavnagar. </p>
                <p class="style4">contact no.<em>+91 8460577814</em></p>
                <p class="style4">email_id: <em>gajesh1722@hotmail.com</em></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Varsada Dhaval.</strong></em></p>
                <p class="style4">Hill drive,bhavnagar.</p>
                <p class="style4">contact no.<em>+91 7698965420 </em></p>
                <p class="style3"><span class="style4">email_id:<em> varsadadj@gmail.com </em></span></p>
                </div>
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
