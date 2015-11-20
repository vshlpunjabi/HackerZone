<?php

function &db_connect() {
	require_once 'DB.php';
	

	PEAR::setErrorHandling(PEAR_ERROR_DIE);



	$db_host = '208.43.192.70:3307';
	$db_user = 'isaac';
	$db_pass = 'isaacxi';
	$db_name = 'isaac';

	$dsn = "mysql://$db_user:$db_pass@$db_host/$db_name";

	$db = DB::connect($dsn);

	

	$db->setFetchMode(DB_FETCHMODE_OBJECT);
	return $db;
}

?>