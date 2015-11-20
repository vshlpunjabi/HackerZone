<?php

	include 'dbconnect.php';
	include 'sess_init.php';
	include 'loginauth.php';
	require_once('recaptchalib.php');
	
	
  

	session_start();

	$date = gmdate("'Y-m-d'");
	$db = db_connect();
	$user = new User($db);
	$error_hash = null;
	
	function valMember($username,$password)
	{
		if(trim($username)==""){
			$error_hash.="Username cannot be blank<br />";
		}
		if (strlen($username) > 59) {
			$error_hash.="Username should be less than 60 characters<br />";
		}
		if (!preg_match("/\W/",$username)==false)
		{
			$error_hash.="Illegal characters in username<br />";
		}
		if(trim($password)==""){
			$error_hash.="Password cannot be blank<br />";
		}
		if ((strlen($password) < 7) || (strlen($password) > 15)) {
			$error_hash.="Password should be between 7-15 characters<br />";			
			
		}
		if (!((preg_match("`[a-z]+`",$password)==true) && (preg_match("`[0-9]+`",$password)==true))) {			
			$error_hash.="Password should contain alphanumeric value<br />";
		}
		$resp = recaptcha_check_answer ("6LfHeL0SAAAAABFmzguWJb9OMeY3ae12OAZ8TrXo",$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

	  	if (!$resp->is_valid) {    
    			$error_hash.="Enter Proper Captcha Code<br />";
	  	} 
		return $error_hash;
	}
	
	if(isset($_POST['submit']))
	{
		$error_hash=null;
		$error_hash=valMember($_POST['username'],$_POST['password']);
		if(!$error_hash)
			$user->checkLogin($_POST['username'],$_POST['password']);	
	}
	if ($_SESSION['uid']==0 ) {
		session_defaults();
		
	include 'header.php';

?>
<style type="text/css">
<!--
#sponsorAdDiv {position:absolute; height:1; width:1px; top:0; left:0;}
-->
</style>

<script type="text/javascript">

adTime=5;  // seconds ad reminder is shown
chanceAd=1; // ad will be shown 1 in X times (put 1 for everytime)

var ns=(document.layers);
var ie=(document.all);
var w3=(document.getElementById && !ie);
var calunit=ns? "" : "px"
adCount=0;
function initAd(){
	if(!ns && !ie && !w3) return;
	if(ie)		adDiv=eval('document.all.sponsorAdDiv.style');
	else if(ns)	adDiv=eval('document.layers["sponsorAdDiv"]');
	else if(w3)	adDiv=eval('document.getElementById("sponsorAdDiv").style');
	randAd=Math.ceil(Math.random()*chanceAd);
        if (ie||w3)
        adDiv.visibility="visible";
        else
        adDiv.visibility ="show";
	if(randAd==1) showAd();
}
function showAd(){
if(adCount<adTime*10){adCount+=1;
	if (ie){documentWidth  =truebody().offsetWidth/2+truebody().scrollLeft-20;
	documentHeight =truebody().offsetHeight/2+truebody().scrollTop-20;}	
	else if (ns){documentWidth=window.innerWidth/2+window.pageXOffset-20;
	documentHeight=window.innerHeight/2+window.pageYOffset-20;} 
	else if (w3){documentWidth=self.innerWidth/2+window.pageXOffset-20;
	documentHeight=self.innerHeight/2+window.pageYOffset-20;} 
	adDiv.left=documentWidth-200+calunit;adDiv.top =documentHeight-200+calunit;
	setTimeout("showAd()",100);}else closeAd();
}
function closeAd(){
if (ie||w3)
adDiv.display="none";
else
adDiv.visibility ="hide";
}

function truebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

onload=initAd;
//End-->
</script>
<script type="text/javascript">
	
	var illegalChars = /\W/;

	function checkmail(u,p){
		
		if(u.value==""){
			alert("Please enter your username.")
			u.select()
			returnval=false
		}
		else if (u.value.length > 59) {
			alert("No need to TrY ThinGs HeRE Try iT in ArEnA")
			u.select()
			returnval=false
		}
		else if (illegalChars.test(u.value))
		{
			alert("Please dont use illegal characters enter a valid username.")
			u.select()
			returnval=false
		}
		else{
			returnval=true
		}

		if(p.value==""){
			alert("Please enter your password.")
			u.select()
			returnval=false
		}
		else if ((p.value.length <7 ) || (p.value.length > 15)) {
			alert("Recheck Your Password")
			u.select()
			returnval=false
		}
		else{
			returnval=true
		}
		
		return returnval
	}

</script>
</head>
<body>
<center>
	<div class="wrap">
		<img src="images/Hacking_03.gif" style="margin-bottom:15px;" /><br />
        <a href="index.php"><img src="images/links_03.gif" class="imagewarp" name="img1" /></a> |
		        <a href="login.php"><img src="images/links_06.gif" class="imagewarp" name="img2" /></a> |
		        <a href="register.php"><img src="images/links_08.gif" class="imagewarp" name="img3" /></a> |
		        <a href="event.php"><img src="images/links_11.gif" class="imagewarp" name="img4" /></a> |
		        <a href="rules.php"><img src="images/links_14.gif" class="imagewarp" name="img5" /></a> |
		        <a href="faq.php"><img src="images/links_18.gif" class="imagewarp" name="img6" /></a> |
		        <a href="contactus.php"><img src="images/links_21.gif" class="imagewarp" name="img7" /></a> 
                 <div style=" margin-top:10px; text-align:center; color:RED;"><i><?php if(isset($_POST['submit'])){ if($error_hash){ echo "Please Scroll Down To Check The Errors"; } } ?></i></div>                
        <div class="main" style="background-image:url(images/login.jpg); margin-bottom:0px; margin-top:55px; height:400px;" align="center">
        <form action="login.php" method="post">
        	<input type="text" style="background-color:#000000; border-style:hidden; border-color:#000000; color:#FFFFFF; margin-top:53px; margin-left:175px; width:290px; text-align:center;" name="username" /><br />
            <input type="password" style="background-color:#000000; border-style:hidden; border-color:#000000; color:#FFFFFF;  margin-top:42px; margin-left:175px; width:290px; text-align:center;" name="password" />            
            <div style="margin-top:25px; margin-left:160px;">
                <?php
             	  require_once('recaptchalib.php');
	          $publickey = "6LfHeL0SAAAAAATEMSZfxGWubD5uB7tkrKzrStXP";
	          echo recaptcha_get_html($publickey);
	        ?>
		</div>
            <img src="images/liner.gif" style="margin-top:10px; margin-left:85px;" />
            <input type="submit" value="SUBMIT" name="submit" onClick="return checkmail(this.form.username,this.form.password);" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; height:40px;  margin-top:22px; margin-left:175px; width:290px;"  />
            </form>
        </div>
        <span style=" margin-top:150px; text-align:center; color:#FFFFFF;"><i><?php if(isset($_POST['submit'])){ echo $error_hash; } ?></i></span>
        <?php include 'footer.php' ?>

<?php
	if($user->failed==true){

	?>

	<div id="sponsorAdDiv" style="visibility:hidden">
<table width="450px" height="350px" bgcolor="#666666"><tr><td>
<table width="445px" height="345px" bgcolor="#000000"><tr><td align="center" valign="middle">

<!--*****EDIT THIS MESSAGE*****-->
<p><IMG SRC="images/ghost.gif"></p><br />
<p style="color:#FF0000; border:thin; border:#FFFFFF;"><b>Failed Login Attempt. Please Enter Correct Login Details</b>
</p>
<br>

<!--*****EDIT THE ABOVE MESSAGE*****-->
</td></tr></table></td></tr></table>
</div>

	<?php
	
}
?>
</body>
</html>


<?php
	}
	else {
		header('Location: level.php');
		
	}
	
?>