$(document).ready(function() {
    
    dibujar_clave_dia();
    dibujar_numero_dia();
    dibujar_mes();
  
  function dibujar_clave_dia(){
     var clave_dia = $(".dia").text();
   if(clave_dia == 1){
       
       clave_dia = "Lunes";
       
       
   }
    if(clave_dia == 2){
       
       clave_dia = "Martes";
       
       
   }
   if(clave_dia == 3){
       
       clave_dia = "Miercoles";
       
       
   }
   if(clave_dia == 4){
       
       clave_dia = "Jueves";
       
       
   }
   if(clave_dia == 5){
       
       clave_dia = "Viernes";
       
       
   }
   if(clave_dia == 6){
       
       clave_dia = "Sabado";
       
       
   }
   if(clave_dia == 7){
       
       clave_dia = "Domingo";
       
       
   }  
   
   
   
   $(".dia").text(clave_dia);
  }
  
  function dibujar_numero_dia(){
      
      var numero_dia = $(".dia-mes").text();
      
      $(".dia-mes").text(" , "+numero_dia+" De ");
  }
  
  function dibujar_mes(){
      var mes = $(".mes").text();
      
      if(mes == 01){
          mes = "Enero";
          
      }
      if(mes == 02){
          mes = "Febrero";
          
      }
      if(mes == 03){
          mes = "Marzo";
          
      }
      if(mes == 04){
          mes = "Abril";
          
      }
      if(mes == 05){
          mes = "Mayo";
          
      }
      if(mes == 06){
          mes = "Junio";
          
      }
      if(mes == 07){
          mes = "Julio";
          
      }
      if(mes == 08){
          mes = "Agosto";
          
      }
      if(mes == 09){
          mes = "Septiembre";
          
      }
      if(mes == 10){
          mes = "Octubre";
          
      }
      if(mes == 11){
          mes = "Noviembre";
          
      }
      if(mes == 12){
          mes = "Diciembre";
          
      }
      
      $(".mes").text(mes+" De ");
  }
   
});