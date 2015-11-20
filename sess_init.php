<?

function session_defaults() {
	$_SESSION['logged'] = false;
	$_SESSION['uid'] = 0;
	$_SESSION['username'] = '';
	$_SESSION['cookie'] = 0;
	$_SESSION['arenalevel'] = 0;
	
}

session_start();

if (!isset($_SESSION['uid']) ) {
	session_defaults();
}
?>