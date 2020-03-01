<?php
	$db_name = $_POST['db_name'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host};", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql_delete_db = "DROP DATABASE {$db_name}";
		$dbh->query($sql_delete_db);
	}  catch (PDOException $e) {
		echo "Ошибка delete_db" . $e->getMessage();
	}