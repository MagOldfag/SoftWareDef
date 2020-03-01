<?php
	$db_name = $_POST['db_name'];
	$proc = $_POST['proc'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$sql_delete_row = "DROP PROCEDURE {$proc}";
		$dbh->query($sql_delete_row);
	}  catch (PDOException $e) {
		echo "Ошибка delete_procedure" . $e->getMessage();
	}
		