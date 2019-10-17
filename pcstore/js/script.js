$(document).ready(function(){
	$("#btnsend").on("click" , function(){
		var userNumber = $("#inputuser").val();

		var resultado = Math.floor(userNumber * 1.34);

		$(".resultado > h1").html(resultado + " USD");

	})
});