<?php
	include "shop.php";
	include "check_dict.php";
	
	if(isset($_POST['go']))
	{
		$log = filter_var($_POST['log'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$res = $bd->query(" SELECT login FROM shop WHERE login ='$log'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		
		try{
			registr($records);
			$ches = password_hash(htmlspecialchars(filter_var($_POST['cheese'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)),PASSWORD_DEFAULT);
			$res = $bd->query("insert into shop (login, password) values ('$log ', '$ches')");
			include "index.php";
			exit;	
		}catch(Exception $e){	
			header("HTTP/1.0 401");		
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
			include "signup.php";
			exit;
		}
	}
?>