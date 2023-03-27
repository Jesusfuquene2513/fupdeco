$(document).ready(function(){

	 $.ajax({
      type: "POST",
      url: "Publicaciones/cargar_publicaciones",
      data: {
        
      }
    }).done(function(n) {
      $("#servicios-dinamicos").html(n);

     
$(".imagen-archivo").each(function(index){
//$(this).parent("a").attr("href","../../administrador/"+ruta+"");
        

       // var comparacion = ruta.substr(0,4);
    
    var tipo_elemento = $(this).attr("id");
    
  if(tipo_elemento == "1"){
     var ruta = $(this).attr("src");
      
      $(this).attr("src","../administrador/"+ruta+"");
     
     }
    
    
    if(tipo_elemento == "3"){
     var ruta = $(this).attr("src");
        var iframe = '<iframe class="imagen-archivo" style="width:100%"  src="'+ruta+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        
        $(this).replaceWith(iframe);
     
     }
    



      });
	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});