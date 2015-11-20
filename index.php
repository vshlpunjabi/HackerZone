<?php

include 'dbconnect.php';
include 'sess_init.php';
include 'loginauth.php';

$date = gmdate("'Y-m-d'");
$dbObj = db_connect();
$userObj = new User($dbObj);

$sql="SELECT username,LEVEL FROM zacmember ORDER BY LEVEL DESC, (playtime-regtime) ASC LIMIT 0 , 7";
$result=mysql_query($sql);
$topcount=0;

$currenttime=time();
$esttime=1286040353;
$countdown=$esttime-$currenttime;


include 'header.php';

?>
<script src="countdown.js"></script>
</head>
<body>
<center>
	<div class="wrap">
		<img src="images/Hacking_03.gif" /><br><br>
		<span style="font-family:Tahoma, Verdana; font-size:14px;"><strong>Contest Closed Winners are Aks and adityaa</strong><br><br>
         <script>
countdown("<?php echo $countdown; ?>");
      </script><br><br>
        <div class="main" align="left">
        	<div style="float:left; padding-top:532px;">
				  <a href="http://groups.google.com/group/isaac10hackerzone" target="_blank"><img src="images/googlegroup.gif"></a>
				  </div>
       	  <div style="padding-top:472px; padding-left:440px;">
            	<img src="images/img_03.gif" style="padding-left:10px;" /><br />
        	  <a href="index.php"><img src="images/links_03.gif" class="imagewarp" style="padding-top:5px;" name="img1" /></a><br />
			  <?php if(!$_SESSION['logged']) { ?>
			<a href="login.php"><img src="images/links_06.gif" class="imagewarp" name="img2" /></a><br />
	        <a href="register.php"><img src="images/links_08.gif" class="imagewarp" name="img3" /></a><br />
			<?php } ?>
			<?php if($_SESSION['logged']) { ?>
			<a href="level.php"><img src="images/arena.gif" class="imagewarp" name="img2" /></a><br />
			<?php } ?>
	        <a href="event.php"><img src="images/links_11.gif" class="imagewarp" name="img4" /></a><br />
	        <a href="rules.php"><img src="images/links_14.gif" class="imagewarp" name="img5" /></a><br />
	        <a href="faq.php"><img src="images/links_18.gif" class="imagewarp" name="img6" /></a><br />
	        <a href="contactus.php"><img src="images/links_21.gif" class="imagewarp" name="img7" /></a><br />
			<?php if($_SESSION['logged']) { ?>
            <a href="logout.php"><img src="images/logout_03.gif" class="imagewarp" name="img2" /></a>
			<?php } ?>
			</div>
        </div>

        <img src="images/Hacking_11.gif" style="margin-bottom:20px"/><br />
		<!--
		<div>
        	<table width="100%" bordercolor="#666666" border="0" cellpadding="15" cellspacing="0" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size:14px">
            <tr bgcolor="#333333">
            <th align="center">Top 5 Hackers</th>
            <th align="center">Level Reached</th>
            </tr>
            <?php /* while($data=mysql_fetch_array($result)){ 
			if($data[0]=="king" || $data[0]=="admin")
			{
				continue;
			}
			if($x==666666)
			{
				$x=999999;
			}
			else
			{
				$x=666666;
			} */
			?>
            <tr bgcolor="#<?php echo $x; ?>">
            <td align="center"><?php echo $data[0]; ?></td>
            <td align="center"><?php echo $data[1]; ?></td>
            </tr>
            <?php //$topcount+=1; if($topcount==5)break; } ?>
           
            </table>
        </div>
		--><br>
        <img src="images/Hacking_15.gif" />
	</div>
	<?php include 'footer.php' ?>

</center>
</body>
</html>