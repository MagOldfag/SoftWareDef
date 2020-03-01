<?php
$db_name = $_POST['db_name'];
$tb_name = $_POST['tb_name'];
$values = $_POST['values'];
$prim_key = $_POST['prim_key'];
$name_prim_k = $_POST['name_prim_k'];
$host = 'localhost';
$user = 'root';
$password = '';
try {
	$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$day = array( "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28");
	$month = array( "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12" );

	for ($i = 0; $i < 750; $i++) {
		$id_product = rand(1,100);
		$id_seller = rand(1,50);
		$count = rand(1,20);
		$date = rand(2015,2018)."-".$month[rand(0,11)]."-".$day[rand(0,27)];
		$query = "INSERT INTO shop.sale VALUES (null, {$id_product}, {$id_seller}, {$count}, '{$date}');";
		echo $query."<br>";
		$dbh->query($query);
	}
} catch (PDOException $e) {
	echo "Ошибка! Строка не обновлена. " . $e->getMessage();
}