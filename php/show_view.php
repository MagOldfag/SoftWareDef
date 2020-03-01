<?php
	$db_name = $_POST['db_name'];
	$view = $_POST['view'];
	$host = 'localhost';
	$user = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$rez = $dbh->query("SELECT * FROM {$view}")->fetchAll();
		$sql = $dbh->query("SHOW CREATE TABLE {$view};")->fetchAll();
		$ind = strripos($sql[0]["Create View"], "select");
		$sql = substr($sql[0]["Create View"], $ind);
		$table = "<h2 class=\"right-block-title\">Представление `{$view}`</h2>";
		$table .= "<p class=\"sql-code-p\">SQL код: {$sql}</p>";
		$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>";
		$ind = 0;
		foreach ($rez[0] as $key => $value) {
			if ($ind == 0) {
				$table .= "<th>{$key}</th>";
				$ind++;
			} else $ind = 0;
		}
		$table .= "</tr></thead><tbody>";
		foreach ($rez as $key => $value) {
			$table .= "<tr>";
			for ($i = 0; $i < count($value)/2; $i++) {
				$table .= "<td>{$value["{$i}"]}</td>";
			}
			$table .= "</tr>";
		}
		$table .= "</tbody></table></div>";
		echo $table."<button class=\"back-btn-open-tb btn\">Назад</button>";
	}  catch (PDOException $e) {
		echo "Ошибка view" . $e->getMessage();
	}