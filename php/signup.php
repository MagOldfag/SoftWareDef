<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css" >		
	<link rel="stylesheet" href="css/Style.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
      <!-----------------------Форма заполения поля регитсрации----------------------------->
<center>
	<form  action="/OBR_sign.php" method = "POST"> 
		<p><h3>Регистрация пользователя</h3></p>
		<p><h6>Зарегистрируйтесь</h6></p><br><br>
		<div id = "log" class = "has-error">
			<input type = "text"  placeholder="Введите логин" id ="sugar" name = "sugar" value = "<?php echo @$_POST['sugar'];?>">
			<span id ="gly1" class = "glyphicon glyphicon-remove"></span>
		</div>
		<br>
		<div id = "por" class = "has-error">
			<input type = "password" placeholder="Введите пароль" id = "cheese" name = "cheese" value = "<?php echo @$_POST['cheese'];?>">
			<span id ="gly2" class = "glyphicon glyphicon-remove"></span>
		</div>
		<br>
		<div id = "por2" class = "has-error">
			<input type = "password" placeholder="Повторите пароль" size="24" id = "tomato" name = "tomato" value = "<?php echo @$_POST['tomato'];?>">
			<span id ="gly3" class = "glyphicon glyphicon-remove"></span>
		</div> 
		<br>
		<div>
			<button id="but" disabled = "false" type = "submit" name = "go" class="btn btn-primary">Зарегистрироваться</button>
		</div>
	</form>
</center>

<script src="dist/css/bootstrap.min.js"></script>
<script src = "AutoReg.js"></script>