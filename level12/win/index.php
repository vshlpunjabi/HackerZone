<?php

	include '../../dbconnect.php';
	include '../../sess_init.php';
	include '../../loginauth.php';
	include '../../check.php';
	session_start();

	$date = gmdate("'Y-m-d'");
	$db = db_connect();
	$user = new User($db);
	$monitor = new CheckArena($db);
	
	if ($_SESSION['uid']==0) {
		session_defaults();
		header('Location: ../../login.php');
		
	}
	
	else if($_SESSION['arenalevel'] == 12)
	{		

		if(isset($_POST['submit']))
		{
			$monitor->lvlcheckMe($_POST['password']);
			
				
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HackerZone | ISAAC HACKING COMPETITION</title>
<body style="padding:0px; margin:0px; background-image:url(liner.jpg); background-repeat:repeat-x; background-color:#003399;">

        
        <div style="background-image:url(xp.jpg); background-repeat:no-repeat; width:1024px; height:425px; padding-top:348px; padding-left:197px;" align="center">
        <form action="index.php" method="post">
        <input type="password" name="password" style="border:none;" />
        <span style="padding-left:18px;">
        <input type="submit" name="submit" value=" "  style="border:none; background:none;"  />
        </span>
        </form>
        </div>
        
        

<script type="text/javascript">
var rev = "fwd";
function titlebar(val)
{
	var msg  = "HackerZone | ISAAC HACKING COMPETITION";
	var res = " ";
	var speed = 100;
	var pos = val;

	msg = "   |--- "+msg+" ---|";
	var le = msg.length;
	if(rev == "fwd"){
		if(pos < le){
		pos = pos+1;
		scroll = msg.substr(0,pos);
		document.title = scroll;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "bwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
	}
	else{
		if(pos > 0){
		pos = pos-1;
		var ale = le-pos;
		scrol = msg.substr(ale,le);
		document.title = scrol;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "fwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}	
	}
}

titlebar(0);
</script>
</body>
</html>
<?php
	}
else{
	header('Location: ../index.php');
}

?>