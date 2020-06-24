<!DOCTYPE html>
<?php include "shop.php"; ?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<!--<title></title>-->
	<!--<link rel="stylesheet" href="libs/overhang/overhang.css">-->
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
	<!--<link rel="stylesheet" href="css/style.css">-->
  
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=56785741&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/56785741/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="56785741" data-lang="ru" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56785741, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56785741" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
  <?php if(isset($_COOKIE['user'])):?>
</body>
	<div class="left-block">
		<h1 class="name-of-project">
		</h1>
		<div class="navigation_database">
			<a class="btn_create_database btn">Создать базу данных</a>
			<?php require_once("php/connection.php");?>
      <?php require_once("php/header.php");?>
		</div>
	</div>
	<div class="right-block">
	</div>
	<div class="sql-block-input">
		<div class="sql-block-open">
		</div>
		<div class="sql-block-content">
			
      <p class="sql-block-content-text">Запишите SQL запрос</p>
			<button class="sql-block-content-btn">Выполнить</button>
			<textarea cols="49" rows="9"></textarea>
		
<div id = "plan">
     
      <div class="btn-group">
          <button type="button" id = "btn" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name ="dar" style="margin-left:30px; ">
          Таблицы <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" style="margin-left:30px; ">
          <li class="dropdown-item"> <div id = "block"></div></li>
        </ul>
   
    
      
      <ul class="nav nav-tabs">
        <li role="navigation" class="active" ><a href="#">Прямой запрос</a></li>
        <li role="navigation"><a href="connection.php">Список БД</a></li>
      </ul>


      
      <div id = "form">
        <center>
          <p>
          <p><input type="text" autofocus name="user" placeholder="Введите запрос" size="100"></p>
          <p>
            <button type="button" id ="bta" class="btn btn-primary">Отправить</button>
            <input type="reset" class="btn btn-danger" value="Отмена">
          </p>  
        </center> 
      </div>
    </div>
    <br>
    <div id="vol"></div>
    <center>
        <a type="button"  href="/logout.php">Выйти</a>
      </center>
    
      <div id = "vivod"></div>

      <div id = "plan">

        <div class="btn-group">
          <button type="button" id = "btn" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name ="dar" style="margin-left:30px; ">
          Таблицы <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" style="margin-left:30px; ">
          <li class="dropdown-item"> <div id = "block"></div></li>
          </ul>
        </div>
      </div>
      <br>
      <div id="vol"></div>
    <?php else: ?>
      <center>
        <?php/* 
          if(isset($_POST['do_login']))
          {
            $log = $_POST['login'];
            $res = $bd->query("SELECT login FROM shop WHERE login = '$log'");
            $records = $res->fetchall(PDO::FETCH_ASSOC);
            if(!$records) 
            {
              $errors[]='Логин занят';
            }
            else
            {
              
              $pas = $bd->query("SELECT password FROM shop WHERE login = '$log'");
              $pass = $pas->fetch(PDO::FETCH_ASSOC);
              foreach($pass as $i)
                $pas=$i;
              
              if(password_verify($_POST['password'],$pas))
              {
                  $_SESSION['logged_user'] = $log; 
              }
              else
              {
                //$errors[]='Ошибка ввода пароля';
                if($_POST['password']=='')  
                {
                  $errors[]='Введите пароль!';
                }
                else $errors[]='Неверно введен пароль';
              }
              }
            }

            if(empty($errors))
            {
              include "index.php";
              exit;
            }
            else
            {
              echo '<div style = "color: red;">';
              foreach($errors as $a)echo $a.'<br>'; 
              echo '</div><hr>';
            }

          }
        */?>
       
        <!--<form action="index.php" method = "POST">--> 
          <form action="autorise.php" method = "POST"> 
          <p>
            <p><stgong>Логин</stgong></p>
            <input type = "text" name = "login" value = "<?php echo @$_POST['login'];?>">
          </p>

          <p>
            <p><stgong>Пароль</stgong></p>
            <input type = "password" name = "password" value = "<?php echo @$_POST['password'];?>">
          </p>

          <p>
            <button type = "submit" name = "do_login" class="btn btn-primary">Войти</button>
          </p>
        </form>

        
        <a type="button"  href="/signup.php">Регистрация</a>
      </center>
    <?php endif; ?>

    </div>
	</div>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="libs/overhang/overhang.js"></script>
	<script src="js/script.js"></script>
  <script src="libs/ace.js"></script>
</body>
</html>
<a href="#" class="view-link"></a>

