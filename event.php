<?php

	include 'dbconnect.php';
	include 'sess_init.php';
	include 'loginauth.php';	

	session_start();

	$date = gmdate("'Y-m-d'");
	$db = db_connect();
	$user = new User($db);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HackerZone | ISAAC HACKING COMPETITION</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript" src="jquery.imageWarp.js">
</script>

<script type="text/javascript">

jQuery(document).ready(function($){
	$('img.imagewarp').imageWarp() 
})

</script>
</head>

<body>
<center>
	<div class="wrap">
		<img src="images/Hacking_03.gif" style="margin-bottom:15px;" /><br />
        <a href="index.php"><img src="images/links_03.gif" class="imagewarp" name="img1" /></a> |
				<?php if(!$_SESSION['logged']){ ?>
		        <a href="login.php"><img src="images/links_06.gif" class="imagewarp" name="img2" /></a> |
		        <a href="register.php"><img src="images/links_08.gif" class="imagewarp" name="img3" /></a> |
				<?php } ?>
                <?php if($_SESSION['logged']) { ?>
					<a href="level.php"><img src="images/arena.gif" class="imagewarp" name="img2" /></a> |
				<?php } ?>
		        <a href="event.php"><img src="images/links_11.gif" class="imagewarp" name="img4" /></a> |
		        <a href="rules.php"><img src="images/links_14.gif" class="imagewarp" name="img5" /></a> |
		        <a href="faq.php"><img src="images/links_18.gif" class="imagewarp" name="img6" /></a> |
		        <a href="contactus.php"><img src="images/links_21.gif" class="imagewarp" name="img7" /></a>
				<?php if($_SESSION['logged']){ ?> | 
                <a href="logout.php"><img src="images/logout.gif" class="imagewarp" name="img2" /></a>
				<?php } ?>
<div class="main" style="background-image:url(images/event2.gif);" align="center">
        <div style="background-color:#000000; position:absolute;z-index:2; width:500px;  margin-top:100px; margin-left:40px; font-family:Tahoma, Verdana; line-height:35px;" align="left">
        		<ol><li>It is a complete online event</li>
<li>There are different levels of increasing difficulties which test the player's hacking abilities in various fields like html,javascript,php,other web technologies and also graphical and logical thinking.</li>
<li>The player who finishes the maximum no of levels at the end of the competition wins.Ties will be broken based on the time difference between the first login to HackerZone website and the time of the last correct solution of a challenge. The person with a smaller time difference will be ranked higher.</li></ol>
		</div>
        <div id="flashContent">
		   <object
		     classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
		     codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,22,0"
		     id="Movie1"
		     width="600" height="628" style="padding-left:15px;">
		     <param name="movie" value="images/matrix.swf">
		     <param name="bgcolor" value="#FFFFFF">
		     <param name="quality" value="high">
		     <param name="wmode" value="transparent">
		     <param name="allowscriptaccess" value="samedomain">
		     <embed
		       type="application/x-shockwave-flash"
		       pluginspage="http://www.macromedia.com/go/getflashplayer"
		       name="Movie1"
		       width="600" height="628"  style="padding-left:15px; margin-top:0px; padding-top:0px;"
		       src="images/matrix.swf"
		       bgcolor="#FFFFFF"
		       quality="high"
		       wmode="transparent"
		       swliveconnect="true"
		       allowscriptaccess="samedomain">
		       <noembed>
		       </noembed>
		     </embed>
		   </object>

		 
 </div>

</div>
        
       
		<?php include 'footer.php' ?>

</body>
</html>
