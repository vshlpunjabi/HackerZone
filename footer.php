<div style="color:#ffffff; font-size:8px; font-family:verdana; margin-top:15px;">
		<i><u><a href="index.php"><span style="color:#ffffff";>Home</span></a></u> | <u><a href="event.php"><span style="color:#ffffff";>Event Format</span></a></u> | <u><a href="rules.php"><span style="color:#ffffff";>Rules & Regulation</span></a></u> | <u><a href="faq.php"><span style="color:#ffffff";>FAQ</span></a></u> | <u><a href="contactus.php"><span style="color:#ffffff";>Contact-us</span></a></u></i>
	</div>
	<div style="color:white; font-size:12px; font-family:tahoma; margin-top:5px;">
	<i><span align="left">Copyrights &copy; ISAAC 2010. All Rights Reserved.</span></i>
</div>
<script type="text/javascript">
var rev = "fwd";
function titlebar(val)
{
	var msg  = "HackerZone | ISAAC HACKING COMPETITION";
	var res = " ";
	var speed = 100;
	var pos = val;

	msg = "   |--! - ! - ! -  "+msg+" -! - ! - !--|";
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