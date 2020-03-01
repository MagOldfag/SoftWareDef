<?php
$db_name = $_POST['db_name'];
$tb_name = $_POST['tb_name'];
$host = 'localhost';
$user = 'root';
$password = '';
try {
	$dbh = new PDO("mysql:host={$host}; dbname={$db_name}", 'root', $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $dbh->query("SHOW COLUMNS FROM `{$tb_name}`")->fetchAll();
//var_dump($result);
$table = "<h2 class=\"right-block-title\">
			Добавление записи в таблицу {$tb_name}
		</h2>";
if ($result) {
	$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>
			            <th>Имя</th>
			            <th>Тип</th>
			            <th>Значение</th>
			        </tr>
			    </thead>";
	$table .= "<tbody>";
	$ind = 1;
	foreach ($result as $value) {
		$table .= "<tr>
		            <td>`{$value["Field"]}`</td>
		            <td>{$value["Type"]}</i></td>
		            <td><input type=\"text\"></td>
				      </tr>";
	}
$table .= "</tbody></table></div>";
$add_table = "<button class=\"fin-add-row-btn btn\">Добавить</button>";
echo $table.$add_table;
}
else 
	echo "<h2 class=\"right-block-title\">
			Ошибка!
		</h2>".$add_table;
}  catch (PDOException $e) {
	echo "Ошибка get_table_set" . $e->getMessage();
}
