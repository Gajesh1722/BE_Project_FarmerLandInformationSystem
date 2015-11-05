<?php
session_start();
if(isset($_SESSION['uid'])=='')
{
header("location:login.php ?msg=PLZ log in First");
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
.style2 {
	font-size: 15px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #CC3333;
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
						<li><a href="order.php">Order</a></li>
						<?php
						}
						?>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="myprofile.php" class="active">Myprofile</a></li>
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
                <form id="form1" method="post" action="">
                  <input type="hidden" name="perform" value="true" />
				  <?php
		include("connect.php");
		$id=$_SESSION['uid'];
		$q=mysql_query("select * from register where ID=$id");
		$data=mysql_fetch_array($q);
	
		?>
		  <table width="80%" height="509" border="0" align="center" style="border: #000000 double;">
            
            <tr>
              <td height="47" colspan="3"><table width="100%" height="36" border="0">
                <tr>
                  <td width="34%" bgcolor="#CCFF99"><span class="style2">WELCOME--------</span><span class="style2"><?php echo      "               " ;echo $data['f_name'];?></span></td>
                  <td width="66%" bgcolor="#CCFF99"><span style="background-color:#CCFF99; font:Georgia, 'Times New Roman', Times, serif; font-size:18px; color:#990033;">
                    <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?>
                  </span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width="33%" height="47"><span class="style1">Farmer's Name</span></td>
              <td width="1%">::</td>
              <td width="66%">
                  <label>
                  <input name="name" type="text" id="name" value="<?php echo $data['f_name'];?>" / readonly="">
                  </label></td>
            </tr>

            <tr>
              <td height="31"><span class="style1">Age</span></td>
              <td>::</td>
              <td><label>
                <input name="age" type="text" id="age" value="<?php echo $data['age'];?>" / readonly="">
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Mobile no. </span></td>
              <td>::</td>
              <td><input name="c_ n" type="text" id="c_ n" value="<?php echo $data['c_num'];?>" maxlength="10" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Address</span></td>
              <td><div align="center">::</div></td>
              <td><div align="left">
                  <textarea name="add" id="add"><?php echo $data['address'];?></textarea>
              </div></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Districtname</span></td>
              <td>::</td>
              <td><input name="dist" type="text" id="dist" value="<?php  
			$t1=$data['d_name'];
			$q2=mysql_query("select district  from dist_mngt where did='$t1'");
			$data2=mysql_fetch_array($q2);
			echo $data2['district'];
		
		?>" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Talukaname</span></td>
              <td>::</td>
              <td><input name="taluka" type="text" id="taluka" value="<?php
				
				$t=$data['t_name'];
				$q1=mysql_query("select village  from village_mngt where vid='$t'");
				$data1=mysql_fetch_array($q1);
				echo $data1['village'];
		 ?>" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Villagename</span></td>
              <td>::</td>
              <td><label>
                <input name="vill" type="text" id="vill" value="<?php echo $data['v_name'];?>" / readonly="">
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Yearly income (Rs.) </span></td>
              <td>::</td>
              <td><input name="y_i" type="text" id="y_i" value="<?php echo $data['y_income'];?>" size="35" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Servey no. </span></td>
              <td>::</td>
              <td><input name="serv" type="text" id="serv" value="<?php echo $data['s_num'];?>" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Area of Servey no. (Sq.Km) </span></td>
              <td>::</td>
              <td><input name="asn" type="text" id="asn" value="<?php echo $data['area_of_serv_no'];?>" / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Type of Land </span></td>
              <td>::</td>
              <td><input name="land" type="text" id="land" value="<?php echo $data['t_land'];?>" / readonly=""></td>
            </tr>
            <tr>
              <td height="54"><span class="style1">Water irrigation type </span></td>
              <td>::</td>
              <td><input name="water" type="text" id="water" value="<?php echo $data['w_irrigation'];?>" / readonly=""></td>
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
