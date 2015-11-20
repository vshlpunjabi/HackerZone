<?php

	include '../dbconnect.php';
	include '../sess_init.php';
	include '../loginauth.php';
	include '../check.php';

	session_start();

	$date = gmdate("'Y-m-d'");
	$db = db_connect();
	$user = new User($db);
	$monitor = new CheckArena($db);
	
	if ($_SESSION['uid']==0 ) {
		session_defaults();
		header('Location: ../login.php');
		
	}
	else if($_SESSION['arenalevel'] == 1){
		$link=" | <a href='../logout.php'><img src='../images/logout.gif' class='imagewarp' name='img2' /></a>";

		if(isset($_POST['submit']))
		{
			$monitor->checkMe($_POST['answer']);
			
				
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HackerZone | ISAAC HACKING COMPETITION</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery.min.js"></script>

<script type="text/javascript" src="../jquery.imageWarp.js">
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
		<img src="../images/Hacking_03.gif" style="margin-bottom:15px;" /><br />
        <a href="../index.php"><img src="../images/links_03.gif" class="imagewarp" name="img1" /></a> |	
                <?php if($_SESSION['logged']) { ?>
					<a href="../level.php"><img src="../images/arena.gif" class="imagewarp" name="img2" /></a> |
				<?php } ?>	        
		        <a href="../event.php"><img src="../images/links_11.gif" class="imagewarp" name="img4" /></a> |
		        <a href="../rules.php"><img src="../images/links_14.gif" class="imagewarp" name="img5" /></a> |
		        <a href="../faq.php"><img src="../images/links_18.gif" class="imagewarp" name="img6" /></a> |
		        <a href="../contactus.php"><img src="../images/links_21.gif" class="imagewarp" name="img7" /></a>
				<?php echo $link; ?>
                
        <div class="main" style="background-image:url(../images/level1.gif);" align="center">
       <div id="mycontent" align="center" style="position:absolute;z-index:2; margin-top:100px; font-size:24px; font-family:Tahoma, Verdana; line-height:35px; width:400px; padding-left:40px; margin-left:80px;">       
       <i>H</i>ey you <i>k</i>id ,wh<i>a</i>t are you <i>d</i>oing here,<br />you should <i>b</i>e at home ,<br />someone <i>i</i>s waiting for you <i>t</i>here.       
		</div>
        
        
        <div id="flashContent">
		   <object
		     classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
		     codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,22,0"
		     id="Movie1"
		     width="600" height="628" style="padding-left:15px;">
		     <param name="movie" value="../images/matrix.swf">
		     <param name="bgcolor" value="#FFFFFF">
		     <param name="quality" value="high">
		     <param name="wmode" value="transparent">
		     <param name="allowscriptaccess" value="samedomain">
		     <embed
		       type="application/x-shockwave-flash"
		       pluginspage="http://www.macromedia.com/go/getflashplayer"
		       name="Movie1"
		       width="600" height="628"  style="padding-left:15px; margin-top:0px; padding-top:0px;"
		       src="../images/matrix.swf"
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
        
        <?php include '../footer.php' ?>
</body>
</html>
<?php
	}
else{
	header('Location: ../level.php');
}

?>