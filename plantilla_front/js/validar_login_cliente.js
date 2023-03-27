$(document).ready(function(){
    
    
    
    $("#sel-tipo-documento").change(function(){
        
        var valor = $(this).val();
        
        if(valor == 1){
            $("#documento").removeAttr("disabled");
           }else{
                $("#documento").attr("disabled","disabled");
           }
        
    });
    $("#documento").keyup(function () {
        
        
        
        $(".alert-danger").css("display","none");
        if ($(this).val().length > 0) {

            
            $("#cedula").text("1");
            

            var documento = $(this).val();


            $.ajax({
                type: "POST",
                url: "consultar_identificacion_login",
                data: {
                    identificacion: documento
                }
            }).done(function (n) {
                $(".alert-danger").html(n);









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })



        }else{
           validador_cedula = 0;
                 $("#cedula").text("0");
            
        }
    });
    
    $("#nombre").keyup(function(){
      if($(this).val().length > 0){
          
          $("#nom").text("1");
         
         }  else{
             $("#nom").text("0");
         }
    });
    
     $("#correo").keyup(function(){
      if($(this).val().length > 0){
          
          $("#email").text("1");
         
         }  else{
             $("#email").text("0");
         }
    });
    
    $("#telefono").keyup(function(){
      if($(this).val().length > 0){
          
          $("#phone").text("1");
         
         }  else{
             $("#phone").text("0");
         }
    });
    
    $("#c").keyup(function(){
      if($(this).val().length > 0){
          
          $("#pa").text("1");
         
         }  else{
             $("#pa").text("0");
         }
    });
    
    $("#btn-registrar").click(function(){
      if($("#cedula").text() == "1" && $("#nom").text() == "1" && $("#email").text() == "1" && $("#phone").text() == "1" && $("#pa").text() == "1" ){
         
          
          var nombre = $("#nombre").val();

            var sel_tipo_documento = $("#sel-tipo-documento").val();

            var documento = $("#documento").val();

            var correo = $("#correo").val();

            var telefono = $("#telefono").val();
          
          var tipo_cliente = "Registrado";
          
          var password = $("#c").val();
         
          
          $.ajax({
                        type: "POST",
                        url: "../Cliente/crear_cliente_login",
                        data: {
                        cliente: nombre,
                        identificacion: documento,
                        correo: correo,
                        telefono: telefono,
                        cliente_tipo: tipo_cliente ,
                            clave:password
                    }
                    }).done(function (n) {
                      
              
              $(".fin").html(n);
              
              var respuesta = $(".fin").text();
              
              if(respuesta == "1"){
                  
                  $(".inicio").css("display","block");
                   $(".fin").css("display","block");
                  $(".fin").text("Has sido Registrado en nuestro Sistema!!! Redireccionando....");
                  $(".spinner2").css("display","block");
                  
                  setTimeout(function(){ window.location.href = "login"; }, 3000);
                  
                  
                 
                 }








                    }).fail(function (n, t, i) {
                        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                    })
          
          
          
         }  else{
             alert("Por Favor diligencie todos los datos");
         }
    });
});