<?php
	include "shop.php";
	

	function registr(array $records)
	{		
		if(trim ($_POST['login'])=='')
		{
			throw new Exception('Введите логин!');
		}
		if($_POST['password']=='') 
		{
			throw new Exception('Введите пароль!');
		}
		if($_POST['password2']=='') 
		{
			throw new Exception('Введите поворный пароль!');
		}
		if($_POST['password2'] != $_POST['password'])
		{
			throw new Exception('Повторный пароль введен не верно');
		}
		if($records)
		{
			throw new Exception('Пользователь с таким логином занят');
		}

		return true;
	}

	if(isset($_POST['do_login']))
	{
		$log = $_POST['login'];
		$res = $bd->query("SELECT login FROM shop WHERE login = '$log'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);

		try{
			registr($records);
			$pas = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$res = $bd_xleb->query("insert into shop (login, password) values ('$log ', '$pas')");
			include "index.php";
			exit;	
		}catch(Exception $e){		
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
		}
	}
?> 