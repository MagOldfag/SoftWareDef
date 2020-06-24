<?php 
include "shop.php"; 
include "check_dict.php";
	
	if(isset($_POST['go']))
	{
		$log = $_POST['log'];
		$res = $bd->query("SELECT login FROM shop WHERE login ='$log'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		$ches = $bd->query(" SELECT password FROM shop WHERE login ='$log'");
		$pass = $ches->fetchall(PDO::FETCH_ASSOC);
		
		try{
			avtoris($pass);
			$agent=$_SERVER['HTTP_USER_AGENT'];
			setcookie("user", $agent, time()+3600, "/");
			include "journal.php";
			header('Location: /');
		}catch(Exception $e){
			header("HTTP/1.0 401");			
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
			include "index.php";
			exit;
		}
		
	}
?>