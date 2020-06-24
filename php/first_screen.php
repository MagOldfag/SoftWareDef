<?php 
	include "BaseVar.php";
	if(isset($_POST['user']))
	{
		global $data;
		$quer = $_POST['user'];
		$res = $bd->query($quer);	
			$date = $res->fetchall(PDO::FETCH_ASSOC);
			echo "<table style = \"border: 1px solid grey\"  class = \"table table-bordered table-condensed table-striped table-hover  \">";
			echo "<tr class=\"bg-info\">";
			for ($i = 0; $i< $res->columnCount(); $i++)
			{
				$col = $res->getColumnMeta($i);
				$colums[]=$col['name'];
				echo "<th>".$colums[$i]."</th>";
			}
			foreach($date as $a => $items)
			{
				echo "<tr>";
				foreach($items as $s)
				{
					echo "<td>"."$s"." ";
				}
			} 
			echo "</table>";
		//}
	} 
?>