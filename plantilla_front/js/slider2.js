$(document).ready(function(){
$("#slider-dinamico .single-slider").each(function(index){

        $(this).attr("id",contador);

        contador = contador + 1;

        if(index == 0){

          $(this).addClass("activo");

        }


        if(index > 0){

          $(this).remove();

        }

      });

      var limite = $(".single-slider").length;



      setInterval(function () {

      focus = focus + 1;

     

     

    $("#rutas .single-slider").each(function(){

      var id = $(this).attr("id");

      if(id == focus){

        var banner = $(this).attr("rel");
        $(".activo").css("background-image","url("+"../../../redepyme_admin/"+banner+")");

        var encabezado = $(this).children("span").text();
        $(".encabezado").text(encabezado);
   

      }

    });

    if(focus > limite+1){

      focus = 0;

    }


      }, 3000);

     

	
});