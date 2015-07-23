$(document).ready(function()
{
	$("button").click(id,function()
	{
		var x = document.getElementById(id);
		var number_of_copies=x.getAttribute("copies");
		alert (id+" "+number_of_copies);
		
	

	});
});

	