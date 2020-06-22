<?php
	$host = "localhost";
	$db_name = "shop";
	$db_name = "shop";
	$username = "root";
	$password = "";
	
	try {
		$bd = new PDO("mysql:host={$host};dbname={$db_name};", $username, $password);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}  
 
	catch(PDOException $exception){
		echo "Ошибка подключения: " . $exception->getMessage();
	}
	session_start();
?>