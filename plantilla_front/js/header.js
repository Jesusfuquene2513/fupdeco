$(document).ready(function(){

	$("#btn-bar").click(function(){
$(".barnav").toggle();
	});

	var ancho = $(window).width();
	
	if(ancho < 759){

			$(".barnav").hide();

		}


		


	$(window).resize(function(){
		var ancho = $(window).width();

		if(ancho > 1199){

			$(".barnav").show();

		}
		if(ancho < 759){

			$(".barnav").hide();

		}else{
			$(".barnav").show();	
		}

	});

});