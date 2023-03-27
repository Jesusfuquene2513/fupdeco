$(document).ready(function(){

	 $.ajax({
      type: "POST",
      url: "Slider/cargar_slider",
      data: {
        
      }
    }).done(function(n) {
      $("#dinamico").html(n);
         
         $(".natalia").each(function(){
             
             var ruta = $(this).attr("src");

        var comparacion = ruta.substr(0,4)

        if(comparacion == "http"){

        }else{

$(this).attr("src","../administrador/"+ruta+"");
            
           



            
         

        }
         });

      $(".carousel-item").each(function(index){
          
          if(index == 0){
              
              $(this).addClass("active");
             
             }
          
      });
      
      

      

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});