<?php 
	/*session_start();
	session_destroy();*/
	setcookie("user", 10, time()-3600, "/");
    //include "index.php";
    //exit;
    header('Location: /');
?> 