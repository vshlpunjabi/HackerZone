<?php

class CheckArena
{
	var $wrong = false;
	var $db = null;
	
	function CheckArena(&$db){
		$this->db = $db;	
	}

	function checkMe($ans)
	{
		$userid = $this->db->quote($_SESSION['username']);
		$id = $_SESSION['arenalevel'];
		$answer = $this->db->quote(md5(strtolower($ans)));
		$sql = "SELECT * from zaclevel where id=$id AND answer=$answer";		
		$result = $this->db->getRow($sql);
		$playtime = time();
		if (is_object($result) ) {

			$id++;
			$sql = "UPDATE zacmember SET level=$id, playtime=$playtime  WHERE username=$userid";			
			$this->db->query($sql);
			header('Location: ../level.php');
		}
		else
		{
			$this->wrong = true;
		}
	}

	function lvlcheckMe($ans)
	{
		$userid = $this->db->quote($_SESSION['username']);
		$id = $_SESSION['arenalevel'];
		$answer = $this->db->quote(md5(strtolower($ans)));
		$sql = "SELECT * from zaclevel where id=$id AND answer=$answer";		
		$result = $this->db->getRow($sql);
		$playtime = time();
		if (is_object($result) ) {

			$id++;
			$sql = "UPDATE zacmember SET level=$id, playtime=$playtime WHERE username=$userid";			
			$this->db->query($sql);
			header('Location: ../../level.php');
		}
		else
		{
			$this->wrong = true;
		}
	}

	function checkDup($lvl,$ans,$real)
	{		
		$userid = $this->db->quote($_SESSION['username']);
		$answer=$ans;	
		$ip=$real;
		$id = $lvl;
		$chkanswer = implode("",explode('.',$answer));
		$realans = implode("",explode('.',$ip));		
		$playtime = time();
		if ($chkanswer==$realans) {			
			$id++;
			$sql = "UPDATE zacmember SET level=$id, playtime=$playtime WHERE username=$userid";			
			$this->db->query($sql);
			header('Location: ../level.php');
		}
		else
		{
			$this->wrong = true;
		}
	}
}
?>