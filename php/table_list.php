<?php
   	include "GeneralBase.php";
	$res = $bd->query("SHOW TABLES FROM `test`");
	$dat = $res->fetchall(PDO::FETCH_ASSOC);
	foreach($dat as $a => $items)
	{ 
		foreach($items as $s)
		{
			if($s != 'log')
			{
				$t[$a]=$s;
				echo "<div> <center> <button type=\"button\" class=\"btn btn-link\" onclick = \"TableShow(this.name)\" name = \"$t[$a]\">$t[$a]</button></center> </div>";
			}
		}
	}	
?>

<script>
	function TableShow(ogon){
		$( document ).ready(function(){
			$.ajax({
				method: "POST",  
				url: "pressed.php", 
				data:  {pic: ogon},
				success: function(msgs) { 
					$('#vol').html(msgs);
				}
			});
		});
	}
</script>