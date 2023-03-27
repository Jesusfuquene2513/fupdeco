$(document).ready(function(){

 
var user = $(".admin-name").text();
var password =$(".c").val();
	 $.ajax({
      type: "POST",
      url: "../Asesor/cargar_asesor",
      data: {
        usuario: user, clave: password
      }
    }).done(function(n) {
      $(".confirmacion").html(n);

     
	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});