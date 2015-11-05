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
.style22 {color: #99FF00}
.style11 {color: #990033}
.style14 {color: #CC3300}
.style24 {font-size: 16px}
.style25 {
	font-size: 15px;
	color: #FF3333;
}
.style27 {font-size: 13px}
.style28 {color: #FF3333}
-->
        </style>
</head>
    <body>
    	<div id="wrap">
		        <div id="menu">	
				     <ul>
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="activities.php">Activities</a></li>
						<?php if (isset($_SESSION['uid'])!='')
						{
						?>
						
						<li><a href="order.php">Order</a></li>
						<?php
						}
						?>
						
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
						<li><a href="register.php">Registration</a></li>
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
                 <?php include("slider.php");?>
              	<div class="wrapper">
              	  <div class="metam1">
                  	<!-- .box1 -->
                  	<div class="box1">
                    	<h2>Animal Husbandry </h2>
                      <div class="img-box" style="height:150px;">
                          <p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;">It is agricultural practise of breeding and raising livestock production ,prevention and protection </span></span></p>
                          <p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;">In animal husbandry may employ breeders, herd health specialist, feeders, and milkers to helps care for animals</p>
                          <table width="80%" border="0">
                            <tr>
                              <td><a href="animal.php">Read more</a></td>
                            </tr>
                          </table>
                      </div>
                    </div>
                  	<!-- /.box1 -->
                  </div>
              	  <div class="metam2">
                  	<!-- .box1 -->
                  	<div class="box1">
                    	<h2 align="center">Welcome </h2>
                        <h4 align="center" class="list1 style28">Hello Dear Farmer</h4>
                        <h4 class="list1"> we welcome you to our site to feed up your needs with our all possible ways. </h4>
                        <p align="center" class="list1 style22 style24"><strong>Farmer Land Information System </strong></p>
                        <p class="style11"><span class="style14">=&gt;<span class="style27">Provides information to farmers</span></span></p>
                        <p class="style14">=&gt;<span class="style27">Provides pesticides and many crops</span></p>
                        <p class="style14">=&gt;<span class="style27">Providing latest news related to farms</span>.</p>
                    </div>
               	  </div>
              	  <div class="metam3">
                  	<!-- .box1 -->
                  	<div class="box1">
                    	<h2>News Updates</h2>
                    	<table width="100%" height="164" border="0">
                          <tr>
                            <th scope="col"><span class="style25">Latest News </span></th>
                          </tr>
                          <?php
	  include("connect.php");
	  $q=mysql_query("select * from news order by nid desc limit 3") or die ("query fail");
	  while($data=mysql_fetch_array($q))
	  {
	  ?>
                          <tr>
                            <td><?php echo $data['tittle'];?></td>
                          </tr>
                          <?php
	  }
	  ?>
                          <tr>
                            <td><a href="news_all.php">Read More </a></td>
                          </tr>
                        </table>
                    	<p>&nbsp; </p>
                  	</div>
                  	<!-- /.box1 -->
                  </div>
              	</div>
              </div>
              <div class="row-2">
           
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
