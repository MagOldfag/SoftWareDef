<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$host = 'localhost';
	$user = 'root';
	$password = '';
	if (isset($_POST['current_db'])) {
		$current_db = $_POST['current_db'];
		try {
			$dbh = new PDO("mysql:host={$host}; dbname={$current_db}", 'root', $password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$textarea_text = $_POST['textarea_text'];

				// $dbh->query("call countSpace('   343        ',@q)");
				// $rez = $dbh->query("select @q")->fetchAll();
				// if (isset($rez))
				// 	var_dump($rez);
				// else echo "loh";$str = strtoupper(explode(' ', explode(';', $textarea_text)[1])[0]);
			if (strtoupper(explode(' ', explode(';', $textarea_text)[0])[0]) == 'CALL'
				&& substr(strtoupper(explode(' ', explode(';', $textarea_text)[1])[0]), 1, strlen(strtoupper(explode(' ', explode(';', $textarea_text)[1])[0]))) == 'SELECT') {
				$q1 =  explode(';', $textarea_text)[0];
				$q2 =  explode(';', $textarea_text)[1];
				$dbh->query($q1);
				$rez = $dbh->query($q2)->fetchAll();
				respond($rez);
			}
			else if (strtoupper(explode(' ', $textarea_text)[0]) == "SELECT" ||
		        strtoupper(explode(' ', $textarea_text)[0]) == "CALL") {
				$rez = $dbh->query($textarea_text);
				$rez = $rez->fetchAll();
				respond($rez);
			}
			else {
				$rez = $dbh->query($textarea_text);
				echo "Запрос выполнен!";
			}
		} catch (PDOException $e) {
			echo "Ошибка! Запрос не выполнен" . $e->getMessage();
		}
	}
	else {
		try {
			$dbh = new PDO("mysql:host={$host};", 'root', $password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$textarea_text = $_POST['textarea_text'];
			$rez = $dbh->query($textarea_text)->fetchAll();
			if (strtoupper(explode(' ', $textarea_text)[0]) == "SELECT")
				respond($rez);
			else echo "Запрос выполнен!";
		} catch (PDOException $e) {
			echo "Ошибка! Запрос не выполнен" . $e->getMessage();
		}
	}
	function respond($rez){
		if ($rez == null)
			echo "<h2 class=\"right-block-title\">Результат пустой!</h2>";
		else {
			$table = "<h2 class=\"right-block-title\">Результат:</h2>";
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
			echo $table;
		}
	}