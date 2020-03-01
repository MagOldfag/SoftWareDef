<?php
	$db_name = $_POST['db_name'];
	$view = $_POST['view'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$sql_delete_row = "DROP VIEW {$view}";
		$dbh->query($sql_delete_row);
	}  catch (PDOException $e) {
		echo "Ошибка view" . $e->getMessage();
	}
		