<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = 'localhost';
$user = 'root';
$password = '';
$current_db = $_POST['current_db'];
$table_name = $_POST['table_name'];
$count_rows = $_POST['count_rows'];
$table = $_POST['table'];
if (isset($current_db)) {
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$current_db}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$create_table_query = "CREATE TABLE `{$table_name}`(";
		$prim_key = "";
		for ($i = 1; $i <= $count_rows; $i++)
			if ($table[$i][6] == "true")
				$prim_key .= $table[$i][0];
		for ($i = 1; $i <= $count_rows; $i++) {
			if ($table[$i][5] == "true") {$table[$i][5] = "UNIQUE";}
			if ($table[$i][5] == "false"){ $table[$i][5] = "";}
			if ($table[$i][4] == "true") {$table[$i][4] = "NOT NULL";}
			if ($table[$i][4] == "false"){ $table[$i][4] = "";}
			if ($table[$i][6] == "true") {$table[$i][6] = "AUTO_INCREMENT";}
			if ($table[$i][6] == "false") {$table[$i][6] = "";}
			if ($table[$i][1] == "INT" || $table[$i][1] == "VARCHAR") {
				$create_table_query .= "`{$table[$i][0]}` {$table[$i][1]}({$table[$i][2]}) {$table[$i][3]} {$table[$i][4]} {$table[$i][5]} {$table[$i][6]},";
			}
			else {			
				$create_table_query .= "{$table[$i][0]} {$table[$i][1]} {$table[$i][3]} {$table[$i][4]} {$table[$i][5]} {$table[$i][6]},";
			}
		}
		if (strlen($prim_key) > 0)
			$create_table_query .= "PRIMARY KEY ({$prim_key}),";
		$create_table_query = substr($create_table_query, 0, strlen($create_table_query)-1);
		$create_table_query .= ");";
		$rez = $dbh->query($create_table_query);
		if ($rez)
			echo "Таблица `{$table_name}` создана";
		else echo "Ошибка";
	} catch (PDOException $e) {
		echo "Ошибка create_table" . $e->getMessage();
	}
}
else {
	echo "error";
}