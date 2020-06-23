var x = 0;
$( document ).ready(function(){
	$( "#butt" ).click(function(){ 

		if (x < 20) {
			var str ='<input type="text" autofocus required name="mod' + (x+1) + '" placeholder="Введите название столбца" size="25" style="margin-right:10px;"><select type = "text" name="list' + (x+1) + '"><option value = "tex" >Текст... </option><option value = "int" >Число... </option></select><div id = "pole' + (x+1) +'"></div>';
			document.getElementById('pole' + x).innerHTML = str;
			x++;
		} else
		{
			alert('STOP it!');
		}
	});
});

$( document ).ready(function(){
	$( "#truns" ).click(function(){ 
		$.ajax({
			method: "POST", 
			url: "create_table.php", 
			data:  $('#model').serialize(),
			success: function(msg) { 
				$('#vol').html(msg);
			}
		});
	});
});	

$( document ).ready(function(){
	$( "#btn" ).click(function(){
		$.ajax({
			method: "POST", 
			url: "get_table_set.php", 
			data:  $('#plan :input').serialize(),
			success: function(msg) { 
				$('#block').html(msg);
			}
		});
	});
});	

$( document ).ready(function(){
	$( "#add" ).click(function(){ 
		$.ajax({
			method: "POST", 
			url: "add_stb.php", 
			data:  $('#adder').serialize(),
			success: function(msg) { // 
				$('#vol').html(msg);
			}
		});
	});
});	

$( document ).ready(function(){
	$( '#rec' ).click(function(){ 
		$.ajax({
			method: "POST", 
			url: "Renamecolumn.php", 
			data:  $('#rename').serialize(),
			success: function(msgw) { 
				$('#vol').html(msgw);
			}
		});
	});
});	

$( document ).ready(function(){
	$( "#del" ).click(function(){ 
		$.ajax({
			method: "POST", 
			url: "delete_stb.php", 
			data:  $('#deler').serialize(),
			success: function(msg) { 
				$('#vol').html(msg);
			}
		});
	});
});	

// $( document ).ready(function(){
// 	$( "#log" ).click(function(){ 
// 		$.ajax({
// 			method: "POST", 
// 			url: "logist.php", 
// 			success: function(msg) { 
// 				$('#vol').html(msg);
// 			}
// 		});
// 	});
// });	