<?php
	$db_name = $_POST['db_name'];
	$tb_name = $_POST['tb_name'];
	$key = $_POST['key'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql_delete_row = "ALTER TABLE `{$tb_name}` DROP COLUMN `{$key}`";
		$dbh->query($sql_delete_row);
	}  catch (PDOException $e) {
		echo "Ошибка delete_stb" . $e->getMessage();
	}