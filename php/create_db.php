<?php
	$db_name = $_POST['db_name'];
	$db_charset = $_POST['db_charset'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host};", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_create_db = "CREATE DATABASE `{$db_name}` COLLATE {$db_charset}";
		if ($dbh->query($sql_create_db))
			echo "База данных \"".$db_name."\" добавлена";
		else echo "Ошибка создания";
	}  catch (PDOException $e) {
		echo "Ошибка create_db" . $e->getMessage();
	}