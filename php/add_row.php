<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = $_POST['db_name'];
$tb_name = $_POST['tb_name'];
$values = $_POST['values'];
$v = "";
try {
	$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$struct = $dbh->query("SHOW COLUMNS FROM {$tb_name}")->fetchAll();
	$add_row = "INSERT INTO `{$tb_name}`(";
	$ind = 0;
	foreach ($struct as $value) {
		if ($values[$ind] != "")
			$add_row .= $value["Field"].",";
		$ind++;
	}
	$add_row = substr($add_row, 0, strlen($add_row)-1);
	$add_row .= ") VALUES(";
	foreach ($values as $value) {
		if ($value != "")
			$add_row .= "'".$value."',";
	}
	$add_row = substr($add_row, 0, strlen($add_row)-1);
	$add_row .= ")";
	$v = $add_row;
	$dbh->query($add_row);
	echo "Строка добавлена!";
} catch (PDOException $e) {
	echo "Ошибка add_row" . $e->getMessage();
}
// $rez = $dbh->query($create_table_query);
// if ($rez)
// 	echo "Таблица `{$table_name}` успешно создана!";
// else echo "Ошибка! Такая таблица уже есть или ошибка в заполнение(Автоинкрементом могут быть только int или double).";