function DeletTable( ogone){
	$( document ).ready(function(){
		$.ajax({
			method: "POST", 
			url: "deletetable.php", 
			data:  {pica: ogone},
			success: function(msg) {

				str = '';
              	document.getElementById('vol').innerHTML = str;
				$('#myModalBox1').modal('show');
			}
		});
	});
}

function DeletS( ogos){
	$( document ).ready(function(){
		$.ajax({
			method: "POST", 
			url: "DeleteST.php", 
			data:  {picd: ogos},
			success: function(msge) { 
				$('#vol').html(msge);
			}
		});
	});
}


$( document ).ready(function(){
	$( "#batpole" ).click(function(){ //
		$.ajax({
			method: "POST", 
			url: "addpole.php", 
			success: function(msg) {  
				$('#zapolner').html(msg);
			}
		});
	});
});	

$( document ).ready(function(){
	$( "#btnatr" ).click(function(){ 
		$.ajax({
			method: "POST", 
			url: "spisok_table.php", 
			data:  $('#plan :input').serialize(),
			success: function(msg) { 
				$('#block').html(msg);
			}
		});
	});
});	