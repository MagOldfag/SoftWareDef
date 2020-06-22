<?php include "shop.php"; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="dist/css/bootstrap.min.css" >	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
	if(isset($_POST['do_signup']))
	{
		if(trim ($_POST['login'])=='') 
		{
			$errors[]='Введите логин!';
		}
		if($_POST['password']=='')  
		{
			$errors[]='Введите пароль!';
		}
		if($_POST['password2'] != $_POST['password']) 
		{
			$errors[]='Повторный пароль введен не верно ';
		}
		
		$log = $_POST['login'];
		$res = $bd->query("SELECT login FROM shop WHERE login = '$log'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		if($records) 
		{
			$errors[]='Логин занят';
		}
		if(empty($errors))
		{
			$login = $_POST['login'];
			$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$res = $bd->query("insert into shop (login, password) values ('$login', '$password')");
			echo '<div style = "color: green;">'."Регистрация прошла успешно!".'</div><hr>';
		}
		else
		{
			echo '<div style = "color: red;">';
			foreach($errors as $a)echo $a.'<br>'; 
			echo '</div><hr>';
		}
	}
?>

<center>
          <!-----------------------Форма заполения поля регитсрации----------------------------->
<form action="/signup.php" method = "POST"> 

	<p>
		<p><stgong>Логин</stgong></p>
		<input type = "text" name = "login" value = "<?php echo @$_POST['login'];?>">
	</p>

	<p>
		<p><stgong>Пароль</stgong></p>
		<input type = "password" name = "password" value = "<?php echo @$_POST['password'];?>">
	</p>

	<p>
		<p><stgong>Введите пароль заного</stgong></p>
		<input type = "password" name = "password2" value = "<?php echo @$_POST['password2'];?>">
	</p>

	<p>
		<button type = "submit" name = "do_signup" class="btn btn-primary">Зарегистрироваться</button>
	</p>
</form>
</center>
<script src="dist/css/bootstrap.min.js"></script> 