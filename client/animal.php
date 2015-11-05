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
.style4 {
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
					
					<div class="inside" style="border: #000000; border-style:double;">
            	<div class="row-1 outdent">
              	<div class="wrapper" style=" width:190px; height:125px; background-image:url(images/images.jpeg); border: #000000; border-bottom-style:double;"></div>
               
                <p></p>
            	<p align="left" class="style8 style4"> Animal husbandry has been practiced for thousands of years, since the first domestication of animals.</p>
            	<p align="left" class="style8 style4">In more modern times, the cowboys of North America, charros of Mexico, or vaqueros, gauchos, huasos of South America, and farmers or stockmen of Australia tend their herds on horses, all-terrain vehicles, motorbikes, in four-wheel drive  vehicles and helicopters, depending on the terrain and livestock concerned.</p>
            	<p align="left" class="style8 style4">Today, herd managers often oversee thousands of animals and many staff. Farms, stations and ranches may employ breeders, herd health specialists, feeders, and milkers to help care for the animals.</p>
            	<p align="left" class="style8 style4">&nbsp;</p>
            	<p align="left" class="style8 style4">Techniques:</p>
            	<p align="left" class="style8 style4">Techniques such as artificial insemination and embryo transfer are frequently used today, not only as methods to guarantee that females breed regularly but also to help improve herd genetics.</p>
            	<p align="left" class="style8 style4">This may be done by transplanting embryos from stud-quality females into flock-quality surrogate mothers - freeing up the stud-quality mother to be reimpregnated. This practice vastly increases the number of offspring which may be produced by a small selection of stud-quality parent animals. On the one hand, this improves the ability of the animals to convert feed to meat, milk, or fibre more efficiently, and improve the quality of the final product. On the other, it decreases genetic diversity, increasing the severity of disease outbreaks among other risks.</p>
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


