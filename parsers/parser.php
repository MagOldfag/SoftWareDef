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

	$fir_name_man = array("Евгений", "Кирилл", "Николай", "Сергей",  "Павел",  "Денис",  "Михаил",  "Матвей",  "Алексей",  "Иван",  "Владимир",  "Иосиф",  "Василий",  "Максим",  "Айдар",  "Ярослав",  "Александр",  "Петр",  "Альберт",  "Исаак");
	$sec_name_man = array("Ньютон",  "Эйнштейн",  "Некрасов",  "Кокаровцев",  "Селиверстов",  "Шаблонов",  "Хохряков",  "Трегубов",  "Баранов",  "Сталин",  "Ленин",  "Иванов",  "Радостев",  "Хабибулин",  "Шумилов",  "Бартов",  "Капустин",  "Бабин",  "Сидоров",  "Жигалов");
	$otch_man = array("Владимирович",  "Леонидович",  "Васильевич",  "Максимович",  "Олегович",  "Артёмович",  "Александрович",  "Алексеевич",  "Михайлович",  "Эдуардович",  "Борисович",  "Иванович",  "Николаевич",  "Дмитриевич",  "Андреевич",  "Владиславович",  "Сергеевич",  "Фаданисович",  "Витальевич",  "Петрович");
	$fir_name_woman = array("Ольга",  "Светлана",  "Елизавета",  "Анастасия",  "Виктория",  "Ангелина",  "Софья",  "Евгения",  "Екатерина",  "Алина",  "Алёна",  "Елена",  "Любовь",  "Валерия",  "Анна",  "Наталья",  "Ульяна",  "Ирина",  "Ксения",  "Людмила");
	$sec_name_woman = array("Некрасова",  "Кокаровцева",  "Граничникова",  "Цылова",  "Тонкоева",  "Селиверстова",  "Бутолина",  "Никитина",  "Иванова",  "Петрова",  "Сидирова",  "Баранова",  "Трегубова",  "Хохрякова",  "Некрасова",  "Собчак",  "Михеева",  "Сергеева",  "Королёва",  "Тихонова");
	$otch_woman = array("Владимировна",  "Леонидовна",  "Васильевна",  "Максимовна",  "Андреевна",  "Олеговна",  "Александровна",  "Алексеевна",  "Михайловна",  "Эдуардовна",  "Ивановна",  "Николаевна",  "Дмитриевна",  "Владиславовна",  "Сергеевна",  "Витальевна",  "Петровна",  "Викторовна",  "Анатольевна",  "Валерьевна");
	for ($i = 0; $i < 50; $i++) {
		$n_department = rand(1,8);
		$gender = rand(0,1);
		$fio = "";
		$age = rand(18,50);
		if ($gender == 0) {
			$gender = "М"; 
			$fio = $fir_name_man[rand(0,19)]." ".$sec_name_man[rand(0,19)]." ".$otch_man[rand(0,19)];
		}
		else {
			$gender = "Ж";
			$fio = $fir_name_woman[rand(0,19)]." ".$sec_name_woman[rand(0,19)]." ".$otch_woman[rand(0,19)];
		}
		$query = "INSERT INTO shop.seller VALUES (null, '{$fio}', {$age}, '{$gender}', {$n_department});";
		$dbh->query($query);
	}
} catch (PDOException $e) {
	echo "Ошибка! Строка не обновлена. " . $e->getMessage();
}