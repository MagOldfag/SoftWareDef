<?php 
	$agent=$_SERVER['HTTP_USER_AGENT'];
	setcookie("user", $agent, time()-3600, "/");
	include "journal.php";
	header('Location: /');
?>