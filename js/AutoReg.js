function check()
{
	var Value = $('#login').val();
	var Value1 = $('#pass1').val();
	var Value2 = $('#pass2').val();
	if(Value != 0 && Value1 != 0 && Value2 != 0 && Value1 == Value2)
	{
		$('#but').attr('disabled', false);
	}
	else 
	{
		$('#but').attr('disabled', true);
	}
}

$('#login').keyup(function(){
	var Value = $('#login').val();
	if(Value == 0)
	{
		//$('#errmsg').text("введите значения");
		$('#log').removeClass("has-success").addClass("has-error");
		$('#gly1').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		//$('#errmsg').text("");
		$('#log').removeClass("has-error").addClass("has-success");
		$('#gly1').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	proverka();
});

$('#pass2').keyup(function(){
	var Value = $('#pass2').val();
	if(Value == 0)
	{
		$('#por').removeClass("has-success").addClass("has-error");
		$('#gly2').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		$('#por').removeClass("has-error").addClass("has-success");
		$('#gly2').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
		$('#por2').removeClass("has-success").addClass("has-error");
		$('#gly3').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	proverka();
});

$('#pass1').keyup(function(){
	var Value = $('#pass1').val();
	var Value1 = $('#pass2').val();
	if(Value != 0)
	{
		if(Value != Value1)
		{
			$('#por2').removeClass("has-success").addClass("has-error");
			$('#gly3').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
		}
		else 
		{
			$('#gly3').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
			$('#por2').removeClass("has-error").addClass("has-success");
		}
	}
	check();
});
function Blockverka() // Блокировка кнопки ,если поля не заполнены
{
	var Value1 = $('#BLogin').val();
	var Value2 = $('#Bpassword').val();
	if( Value1 != 0 && Value2 != 0)
	{
		$('#Abut').attr('disabled', false);
	}
	else 
	{
		$('#Abut').attr('disabled', true);
	}
}

$('#BLogin').keyup(function(){
	var Value = $('#BLogin').val();
	if(Value == 0)
	{
		//$('#errmsg').text("введите значения");
		$('#Blog').removeClass("has-success").addClass("has-error");
		$('#msg1').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		//$('#errmsg').text("");
		$('#Blog').removeClass("has-error").addClass("has-success");
		$('#msg1').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	Blockverka();
});


$('#Bpassword').keyup(function(){
	var Value = $('#Bpassword').val();
	if(Value == 0)
	{
		$('#Apor').removeClass("has-success").addClass("has-error");
		$('#msg2').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		$('#Apor').removeClass("has-error").addClass("has-success");
		$('#msg2').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	Blockverka();
});