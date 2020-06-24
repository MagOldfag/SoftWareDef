<?php 
	include "GeneralBase.php";
	$name_table = $_POST['pic'];
	$quer = "SELECT * from `$name_table`";
	vivod($bd, $quer, $name_table); 
?>