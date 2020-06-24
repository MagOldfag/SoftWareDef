<?php

		function registr(array $records)
		{		
			if(trim ($_POST['log'])=='')
			{
				throw new Exception('Введите логин');
			}
			if(filter_var($_POST['log'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)!=$_POST['log'])
			{
				throw new Exception('В логине присутствуют служебные символы: "*", "%", "<", ">", "?", "!", "+", "#"');
			}
			if($records)
			{
				throw new Exception('Пользователь с таким логином занят');
			}
			
			if($_POST['ch']=='') 
			{
				throw new Exception('Введите пароль');
			}
			if(filter_var($_POST['ch'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)!=$_POST['ch'])
			{
				throw new Exception('В пароле присутствуют служебные символы: "*", "%", "<", ">", "?", "!", "+", "#"');
			}
			if($_POST['tmt']=='') 
			{
				throw new Exception('Введите поворный пароль');
			}
			if($_POST['tmt'] != $_POST['ch'])
			{
				throw new Exception('Повторный пароль введен не верно');
			}	
			
			return true;
		}

		function avtoris(array $pass)
		{		
			if(trim ($_POST['log'])=='')
			{
				throw new Exception('Введите логин!');
			}
			if($_POST['ch']=='') 
			{
				throw new Exception('Введите пароль!');
			}
			if(!$pass)
			{
				throw new Exception('Проверьте написание пароля и логина');
			}
			foreach($pass as $i => $items)
				foreach($items as $a)
					$ches=$a;
			if(!password_verify($_POST['ch'],$ches))//
			{
				throw new Exception('Проверьте написание пароля и логина');
			}		
			return true;
		}		
?>