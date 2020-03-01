<?php
	$db_name = $_POST['db_name'];
	$trig = $_POST['trig'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$sql_delete_row = "DROP TRIGGER {$trig}";
		$dbh->query($sql_delete_row);
	}  catch (PDOException $e) {
		echo "Ошибка trig" . $e->getMessage();
	}
		