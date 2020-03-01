<?php
	$db_name = $_POST['db_name'];
	$tb_name = $_POST['tb_name'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql_delete_tb = "DROP TABLE `{$tb_name}`";
		$dbh->query($sql_delete_tb);
	}  catch (PDOException $e) {
		echo "Ошибка delete_table" . $e->getMessage();
	}