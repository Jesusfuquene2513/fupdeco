$(document).ready(function(){



	$(".img-rompecabezas").css("display","none");

	setTimeout(animation1, 2000);
	setTimeout(animation2, 3000);
	setTimeout(animation3, 4000);
	setTimeout(animation4, 5000);

	function animation1(){
$(".img-rompecabezas").each(function(index){

	if(index == 0){

		$(this).css("display","block");

	}



	});
	};

	function animation2(){
$(".img-rompecabezas").each(function(index){

	if(index == 1){

		$(this).css("display","block");

	}



	});
	};

	function animation3(){
$(".img-rompecabezas").each(function(index){

	if(index == 2){

		$(this).css("display","block");

	}



	});
	};
	function animation4(){
$(".img-rompecabezas").each(function(index){

	if(index == 3){

		$(this).css("display","block");

	}



	});
	};

});