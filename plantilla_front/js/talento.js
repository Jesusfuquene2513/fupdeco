$(document).ready(function(){

	 $.ajax({
      type: "POST",
      url: "Talento/cargar_talentos",
      data: {
        
      }
    }).done(function(n) {
      $("#talento-dinamico").html(n);

     
$(".talento").each(function(){
    var ruta = $(this).attr("src");
    
    var ruta_nueva = "../administrador/"+ruta;
    
    
    $(this).attr("src",ruta_nueva);
    
});
	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});