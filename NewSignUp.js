$(document).ready(function()
{
	$('form').submit(function(event)
	{
		var uname = $('#uname').val();
		var email = $('#email').val();
		var addr = $('#addr').val();
		var phone = $('#phone').val();
		var pin = $('#pin').val();
		var pass = $('#pass').val();
		var cpass = $('#cpass').val();
		
		var formData = {
		'uname':$('input[name=uname]').val(),
		'email':$('input[name=email]').val(),
		'addr':$('input[name=addr]').val(),
		'phone':$('input[name=phone]').val(),
		'pin':$('input[name=pin]').val(),
		'pass':$('input[name=pass]').val()
		};
		if(uname == ''||email ==''||addr == ''||phone == ''||pin == ''||pass ==''||cpass=='')
		{
			alert("Please enter all fields");
			return false;
		}
		if(phone.length<10)
		{	
			alert("Phone should be of 10 digits");
			return false;
		}
		if(pin.length<5)
		{	
			alert("Pin should be of 5 digits");
			return false;
		}
		if(pass.length<8)
		{
			alert("Password length is less than 8 !");
			return false;
		}
		if(!(pass===cpass))
		{
			alert("Passwords don't match ! Please re-enter");
			return false;
		}
		if((uname!='')&&(email != '')&&(addr != '')&&(phone != '')&&(pin != '')&&(pass != '')&&(cpass != '')&&(phone.length===10)&&(pass===cpass)&&(pass.length>=8))
		{
			$.ajax({  
			type: 'POST',
			dataType:'json',
			url: 'Signup.php', 
			cache: false,
			data: formData,
			encode : true
			})
			.done(function(data) { alert(data['success']); })
			.fail(function(data) { alert(data['success']); });
		}
		else {
			alert("Please Enter All Fields");
			return false;
		}
	});
});
