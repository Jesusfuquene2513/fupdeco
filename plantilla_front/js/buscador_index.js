$(document).ready(function(){



	$("#i").keyup(function(){

		$("#resultados-index").css("display","block");

		$(".spinner2").css("display","block");
		setTimeout(function(){ 
$(".spinner2").css("display","none");
		 }, 1000);

		if($(this).val().length >0){

			var bus = $(this).val();

 $.ajax({
      type: "POST",
      url: "Servicios/buscador",
      data: {busqueda: bus
        
      }
    }).done(function(n) {

      
      $("#servicios-dinamicos-index").html(n);

   $(".indicador-busqueda").remove();
   var conteo = $(".programa").toArray().length;
      $("#servicios-dinamicos-index").parent().prepend("<center><h4 class='indicador-busqueda' style='font-size:15px; font-style:oblique; font-weight:bolder'><br><br><br>Resultados de Busqueda para ' "+bus+" '<br> <br><span>("+conteo+") Resultados de busqueda</span> <br> <br><span class='completo' style='color:blue;  text-decoration:underline; cursor:pointer'>Ver todos los servicios</span></h4></center>");

     


$(".completo").click(function(){
$.ajax({
      type: "POST",
      url: "Servicios/cargar_servicios_cliente",
      data: {
        
      }
    }).done(function(n) {
      $("#servicios-dinamicos-index").html(n);


      $(".indicador-busqueda").remove();
   var conteo = $(".programa").toArray().length;
      $("#servicios-dinamicos-index").parent().prepend("<center><h4 class='indicador-busqueda' style='font-size:15px; font-style:oblique; font-weight:bolder'><br><br><br>Todos los resultados de Busqueda<br> <br><span>("+conteo+") Resultados de busqueda</span> <br> <br><span class='completo' style='color:blue;  text-decoration:underline; cursor:pointer'>Ver todos los servicios</span></h4></center>");

    

	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })
});
     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })



		} else{
			$("#resultados-index").css("display","none");
		}

	});

});