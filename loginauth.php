<?php

class User {
	var $db = null; // PEAR::DB pointer
	var $failed = false; // failed login attempt
	var $date; // current date GMT
	var $id = 0; // the current user's id

	function User(&$db) {
		$this->db = $db;
		$this->date = $GLOBALS['date'];

		if ($_SESSION['logged']) {
			$this->checkSession();
		}
	}	

	function checkLogin($username, $password) {
		$username = $this->db->quote($username);
		$password = $this->db->quote(md5($password));

		$sql = "SELECT * FROM zacmember WHERE " .
			"username = $username AND " .
			"password = $password";

		$result = $this->db->getRow($sql);

		if ( is_object($result) ) {
			$this->setSession($result);
			return true;
		} else {
			$this->failed = true;
			$this->logout();
			return false;
		}
	}


	function setSession(&$values, $init = true) {
	   $this->id = $values->id;
	   $_SESSION['uid'] = $this->id;
	   $_SESSION['username'] = htmlspecialchars($values->username);	  
	   $_SESSION['logged'] = true;	   
	
	   if ($init) {
	      $session = $this->db->quote(session_id());
	      $ip = $this->db->quote($_SERVER['REMOTE_ADDR']);
	
	      $sql = "UPDATE zacmember SET session = $session, ip = $ip WHERE " .
	         "id = $this->id";
	      $this->db->query($sql);
	   }
	}

	

	function logout(){
		session_defaults();
		
	}

	function checkSession() {
		$username = $this->db->quote($_SESSION['username']);		
		$session = $this->db->quote(session_id());
		$ip = $this->db->quote($_SERVER['REMOTE_ADDR']);
		
		$sql = "SELECT * FROM zacmember WHERE " .
			"(username = $username) AND " .
			"(session = $session) AND (ip = $ip)";
	
		$result = $this->db->getRow($sql);
	
		if (is_object($result) ) {
			$this->setSession($result, false);
		} else {
			$this->logout();
		}
	}
}


?>