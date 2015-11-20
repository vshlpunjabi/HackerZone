<?php

include 'dbconnect.php';
include 'sess_init.php';
include 'loginauth.php';

session_start();

$date = gmdate("'Y-m-d'");
$db = db_connect();
$user = new User($db);

if ($_SESSION['uid']==0 ) {
		session_defaults();
		header('Location: index.php');
}
else
{
	$username=$user->db->quote($_SESSION['username']);
	$sql="SELECT level from zacmember where username=$username";
	$result=(array)$user->db->getRow($sql);
	$level=$result['level'];	
	$_SESSION['arenalevel'] = $level;
	header('Location: level'.$level.'/index.php');
}

?>