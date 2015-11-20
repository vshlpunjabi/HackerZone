<?php

	include 'dbconnect.php';
	include 'sess_init.php';
	include 'loginauth.php';

	$date = gmdate("'Y-m-d'");
	$db = db_connect();
	$user = new User($db);

	$user->logout();
	header('Location: index.php');

?>