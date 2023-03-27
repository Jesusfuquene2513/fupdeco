$(document).ready(function(){

    var validador = 0;
$("#nombre-pago").keyup(function(){

    var validador_nombre_pago = 0;

    if($(this).val().length>0){

       validador_nombre_pago = 1;
       $("#tipo-pago").removeAttr("disabled"); 

    }else{
        validador_nombre_pago = 1;

        var select = document.getElementById('tipo-pago');
        select.value = "0";
        $("#tipo-pago").attr("disabled","disabled"); 
    }
});


$("#btn-guardar-metodo-pago").click(function(){
    if(validador == 1){

        validar_ahorro();
    }
});

function validar_ahorro(){
    

    if($("#banco-ahorro").val().length> 0 && $("#cuenta-ahorro").val().length>0){

        var banco_ahorro = $("#banco-ahorro").val();

        var cuenta_ahorro = $("#cuenta-ahorro").val();
        var nombre = $("#nombre").val();

        $.ajax({
            type: "POST",
            url: "Pagos/crear_ahorro",
            data: {
            nombre_metodo: nombre , banco:banco_ahorro , cuenta:cuenta_ahorro
            }
          }).done(function(n) {
            $("#ahorro").html(n);
      
      
           
          
      
           
      
       
            
            
          }).fail(function(n, t, i) {
            //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)
      
            
      
      
      
          })


       
    }else{
    alert("Faltan datos");
}
}

$("#tipo-pago").change(function(){

    var valor = $(this).val();

    if(valor == 0){
        $("#nombre-pago").val("Seleccione tipo de pago");
        $("#formulario-cuenta-corriente").css("display","none");
        $("#formulario-cuenta-ahorro").css("display","none");
        $("#formulario-convenio").css("display","none");
    }

    if(valor == 1){

        formulario_cuenta_ahorro();
        validador = 1;
    }

    if(valor == 2){

        formulario_cuenta_corriente();
    }

    if(valor == 3){

        formulario_convenio();
    }

    if(valor == 4){

        formulario_nequi();
    }

    if(valor == 5){

        formulario_daviplata();
    }
    if(valor == 6){

        formulario_ahorro_mano();
    }
});

function formulario_cuenta_ahorro(){
    $("#nombre-pago").val("Consignacion Bancaria");
    $("#nombre-pago").attr("disabled","disabled");
    $("#formulario-cuenta-corriente , #formulario-convenio , #formulario_nequi , #formulario-daviplata , #formulario-ahorro").css("display","none");
$("#formulario-cuenta-ahorro").css("display","block");
    
}


function formulario_cuenta_corriente(){
    $("#nombre-pago").val("Consignacion Bancaria");
    $("#nombre-pago").attr("disabled","disabled");
    $("#formulario-cuenta-ahorro , #formulario-convenio , #formulario-nequi , #formulario-daviplata , #formulario-ahorro").css("display","none");
    $("#formulario-cuenta-corriente").css("display","block");
        
    }

    function formulario_convenio(){

        $("#nombre-pago").val("Pago en efectivo");
        $("#nombre-pago").attr("disabled","disabled");
        $("#formulario-cuenta-ahorro , #formulario-cuenta-corriente , #formulario-nequi , #formulario-daviplata , #formulario-ahorro").css("display","none");
        $("#formulario-convenio").css("display","block");
            
        }

        function formulario_nequi(){

            $("#nombre-pago").val("Nequi");
            $("#nombre-pago").attr("disabled","disabled");
            $("#formulario-cuenta-ahorro , #formulario-cuenta-corriente , #formulario-convenio , #formulario-daviplata , #formulario-ahorro ").css("display","none");
            $("#formulario-nequi").css("display","block");
                
            }

            function formulario_daviplata(){

                $("#nombre-pago").val("Daviplata");
                $("#nombre-pago").attr("disabled","disabled");
                $("#formulario-cuenta-ahorro , #formulario-cuenta-corriente , #formulario-convenio , #formulario-nequi , #formulario-ahorro").css("display","none");
                $("#formulario-daviplata").css("display","block");
                    
                }

                function formulario_ahorro_mano(){

                    $("#nombre-pago").val("Bancolombia Ahorro a la mano");
                    $("#nombre-pago").attr("disabled","disabled");
                    $("#formulario-cuenta-ahorro , #formulario-cuenta-corriente , #formulario-convenio , #formulario-nequi , #formulario-daviplata").css("display","none");
                    $("#formulario-ahorro").css("display","block");
                        
                    }
});