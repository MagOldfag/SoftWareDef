<?php 
$host = 'localhost';
$dbname = $_POST['db_name'];
$user = 'root';
$password = '';
try {
	$dbh = new PDO("mysql:host={$host}; dbname={$dbname}", 'root', $password);
} catch (PDOException $e) {
	echo "Ошибка open_database<br>" . $e->getMessage() . "<br>";
}
$result = $dbh->query("SHOW TABLE STATUS")->fetchAll();
$add_table = "<button class=\"add-table-btn\">Добавить таблицу</button>";
$table = "<h2 class=\"right-block-title\">
			Таблицы базы `{$dbname}`
		</h2>";
		//var_dump($result);
$table .= $add_table;
if ($result) {
	$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>
			            <th>Имя таблицы</th>
			            <th>Действие</th>
			            <th>Кол-во строк</th>
			            <!--<th>Тип</th>
			            <th>Кодировка</th>
			            <th>Размер</th>-->
			        </tr>
			    </thead>";
	$table .= "<tbody>";
	$ind = 1;
	foreach ($result as $value) {
		$data_length = $value["Data_length"]/1024;
		if ($data_length != "0")
		$table .= "<tr>
		            <td>{$value["Name"]}</td>
		            <td><i class=\"fal fa-table open_table_i\"></i><i class=\"fas fa-folder-tree struct_table\"></i><i class=\"far fa-times delete_table\"></i></td>
		            <td>{$value["Rows"]}</td>
		           <!--<td>{$value["Engine"]}</td>
		            <td>{$value["Collation"]}</td>
		            <td>{$data_length} КиБ</td>-->
				      </tr>";
	}
$table .= "</tbody></table></div>";
echo $table;
show_view_list($dbh, $dbname);
show_triggers($dbh, $dbname);
//show_procedures($dbh, $dbname);
}
else {
	echo "<h2 class=\"right-block-title\">
			В базе `{$dbname}` нет таблиц
		</h2>".$add_table;
}



function show_view_list($dbh, $dbname) {
	$res = $dbh->query("SHOW FULL TABLES IN {$dbname} WHERE TABLE_TYPE LIKE 'VIEW';")->fetchAll();
	$view = "<h2 class=\"right-block-title\">Представления базы данных `{$dbname}`</h2><br>";
	$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>
			            <th>Имя представления</th>
			            <th>Тип</th>
			            <th>Действие</th>
			        </tr>
			    </thead>";
	$table .= "<tbody>";
	foreach ($res as $value) {
		$table .= "<tr>
		            <td><a class=\"view-link\">{$value["Tables_in_{$dbname}"]}</a></td>
		            <td>{$value["Table_type"]}</td>
		            <td><i class=\"far fa-times delete_view\"></td>
				   </tr>";
	}
	$table .= "</tbody></table></div>";
		echo $view.$table;
}

function show_triggers($dbh, $dbname) {
	$res = $dbh->query("SHOW TRIGGERS FROM {$dbname};")->fetchAll();
	$view = "<h2 class=\"right-block-title\">Триггеры базы данных `{$dbname}`</h2><br>";
	//var_dump($res);
	$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>
			            <th>Имя триггера</th>
			            <th>Событие</th>
			            <th>Таблица</th>
			            <th>Выражение</th>
			            <th>Действие</th>
			        </tr>
			    </thead>";
	$table .= "<tbody>";
	foreach ($res as $value) {
		$a = $value["Tables_in_{$dbname}"];
		$b = $value["Table_type"];
		$data_length = $value["Data_length"]/1024;
		$table .= "<tr>
		            <td>{$value["Trigger"]}</td>
		            <td>{$value["Timing"]} {$value["Event"]}</td>
		            <td>{$value["Table"]}</td>
		            <td>{$value["Statement"]}</td>
		            <td><i class=\"far fa-times delete_trig\"></td>
				   </tr>";
	}
	$table .= "</tbody></table></div>";
		echo $view.$table;
}
/*
function show_procedures($dbh, $dbname) {
	$res = $dbh->query("SELECT ROUTINE_NAME as Название, ROUTINE_TYPE as Тип FROM INFORMATION_SCHEMA.ROUTINES;")->fetchAll();
	$proc = "<h2 class=\"right-block-title\">Процедуры базы данных `{$dbname}`</h2><br>";
	$table .= "<div class=\"table-block\">
				<table class=\"table\" border=\"1\">
			    <thead>
			        <tr>
			            <th>Название</th>
			            <th>Тип</th>
			            <th>Действие</th>
			        </tr>
			    </thead>";
	$table .= "<tbody>";
	foreach ($res as $value) {
		$table .= "<tr>
		            <td>{$value["Название"]}</td>
		            <td>{$value["Тип"]} {$value["Event"]}</td>
		            <td><i class=\"far fa-times delete_proc\"></td>
				   </tr>";
	}
	$table .= "</tbody></table></div>";
		echo $proc.$table;
}*/