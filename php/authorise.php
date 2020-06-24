<?php 
include "shop.php"; 
	//<!------------------------------ Обработчик формы авторизации и запуск сессии по аккаунтом -------------------------->
	function avtoris(array $pass)
	{		
		if(trim ($_POST['login'])=='')
		{
			throw new Exception('Введите логин!');
		}
		if($_POST['password']=='') 
		{
			throw new Exception('Введите пароль!');
		}
		if(!$pass)
		{
			throw new Exception('Проверьте написание пароля и логина');
		}
		foreach($pass as $i => $items)
			foreach($items as $a)
				$pas=$a;
		if(!password_verify($_POST['password'],$pas))// сравнение введенного пароля с существующим
		{
			throw new Exception('Проверьте написание пароля и логина');
		}		

		setcookie("user", 10, time()+3600, "/");	
		$agent=$_SERVER['HTTP_USER_AGENT'];
		setcookie("user", $agent, time()+3600, "/");	
		return true;
	}
	if(isset($_POST['go']))
	{
		$log = $_POST['login'];
		$res = $bd->query("SELECT login FROM shop WHERE login = '$log'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		$pas = $bd->query("SELECT password FROM shop WHERE login = '$log'");
		$pass = $pas->fetchall(PDO::FETCH_ASSOC);
		
		try{
			avtoris($pass);
			header('Location: /');
		}catch(Exception $e){
			header("HTTP/1.0 401");			
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
			include "index.php";
			exit;
		}
?> 