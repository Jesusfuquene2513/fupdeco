$(document).ready(function(){


var album_id = $("body").attr("id");


	 $.ajax({
      type: "POST",
      url: "consultar_galeria",
      data: {
        album: album_id
      }
    }).done(function(n) {
      $("#galeria-dinamica").html(n);


      $(".imagen-archivo").each(function(index){

        var ruta = $(this).attr("src");

        var comparacion = ruta.substr(0,4)

        if(comparacion == "http"){

        }else{

$(this).attr("src","../../administrador/"+ruta+"");
            
            $(this).next().children(".natalia").attr("href");


$(this).parent("a").attr("href","../../administrador/"+ruta+"");
            
            $(this).next().children(".natalia").attr("href","../../administrador/"+ruta+"");

        }



      });
         
         $(".natalia").click(function(){
             $(this).children(".portfolio-img").children(".portfolio-btn").children("a .natalia").click();
         });



        $.ajax({
      type: "POST",
      url: "consultar_titulo",
      data: {
        album: album_id
      }
    }).done(function(n) {
      $("#titulo").html(n);


     

    

  

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

    

	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});