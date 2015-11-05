<?php
session_start();
?>
}
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
.style5 {	color: #000000;
	font-weight: bold;
}
.style6 {color: #000000}
.style7 {color: #FFFFFF}
-->
        </style>
</head>
<body>
    	<div id="wrap">
		        <div id="menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="activities.php" class="active">Activities</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="order.php">Order</a></li>
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
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Georgia, 'Times New Roman', Times, serif; border:double #000000;font-size:16px; color:#FFFFFF">
                  <tbody>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" width="30" align="center"><span class="style5">1.</span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style6" style="color:#FFFFFF;">Agriculture,
                        including agricultural extension, agricultural engineering,   
                        agricultural statistics, crop protection from pests and diseases, 
                        agricultural   research and agricultural school and colleges, 
                        agriculture loans, agricultural   colonization, animal husbandry 
                        including dairying and live stock improvement,   veterinary science, 
                        veterinary education and prevention of animal diseases.</div></td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>2.</b></span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style6" style="color:#FFFFFF;">The
                        prevention of extension from one unit to another of infections of 
                        contagious   disease or pests affecting animals or plants.</div></td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>3.</b></span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style6" style="color:#FFFFFF;">The
                        prevention of extension from one unit to another of infections of 
                        contagious   disease or pests affecting animals or plants.</div></td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>4.</b></span></td>
                      <td class="ac_nrm_text11 style6" style="color:#FFFFFF;">Manure and fertilizers including trading schemes.</td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>5.</b></span></td>
                      <td class="ac_nrm_text11 style7">Control of fruit products.</td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>6.</b></span></td>
                      <td class="ac_nrm_text11 style7">Milk Schemes.</td>
                    </tr>
                    <tr>
                      <td height="12" align="center" valign="baseline" class="ac_nrm_text11 style6"></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>7.</b></span></td>
                      <td class="ac_nrm_text11 style7">Administration of the Food Bonus Fund.</td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>8.</b></span></td>
                      <td class="ac_nrm_text11 style7">Meteorological organizations and observatories.</td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>9.</b></span></td>
                      <td class="ac_nrm_text11 style7">Support prices of agriculture products excluding food grains.</td>
                    </tr>
                    <tr>
                      <td height="12" align="center" valign="baseline" class="ac_nrm_text11 style6"></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>10.</b></span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style7">Lift
                        Irrigation by societies falling within the meaning of that term under 
                        the   Gujarat Co-operative Societies.</div></td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>11.</b></span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style7">Forest labourer&#8217;s Co-operative Societies</div></td>
                    </tr>
                    <tr>
                      <td align="center" valign="baseline" class="ac_nrm_text11 style6">&nbsp;</td>
                      <td class="ac_nrm_text11 style6">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>12.</b></span></td>
                      <td class="ac_nrm_text11"><div align="justify" class="style7">Aid to Housing Co-operative Societies through Gujarat State Co-operative Housing   Finance Society Limited, etc.</div></td>
                    </tr>
                    <tr>
                      <td height="12" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                    <tr>
                      <td class="ac_nrm_text11" valign="baseline" align="center"><span class="style6"><b>13.</b></span></td>
                      <td class="ac_nrm_text11 style7">Money lending and Money lenders.</td>
                    </tr>
                    <tr>
                      <td height="38" valign="baseline" align="center"><span class="style6"></span></td>
                      <td><span class="style6"></span></td>
                    </tr>
                  </tbody>
                </table>
                <p></p>
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
