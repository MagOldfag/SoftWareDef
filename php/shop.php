<?php
	/*$host = "localhost";
	$db_name = "shop";
	$db_name = "shop";
	$username = "root";*/
	$fh = fopen("D:/test.txt", "r");
    list($f1,$f2,$f3)= fscanf($fh, "%s %s %s");
	$host = "$f1";
	$db_name = "$f2";
	$username = "$f3";
	$password = "";
	
	try {
		$bd = new PDO("mysql:host={$host};dbname={$db_name};", $username, $password);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}  
 
	catch(PDOException $exception){
		header("HTTP/1.0 501");
		include "Errors_prog/501.php";
		exit;
	}
	session_start();
?>