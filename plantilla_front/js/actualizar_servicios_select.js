$(document).ready(function () {




    var conteo_servicios = 0;

    var estado_cliente = 0;

    var estado_documento = 0;
    var estado_correo = 0;
    var estado_telefono = 0;

    var estado_acepto = 0;

    var estado_servicios = 0;





    var $codigo_master;

    var tipo_cliente = 0;
    
 var servicios_repetidos = 0;

   
    

    $("#cedula").text("0")

    $("#tipo-cliente").text(tipo_cliente);








    $("#btn-agregar").click(function () {

        conteo_servicios = conteo_servicios + 1;

        var html = '<div class="form-group col-xl-6 col-lg-6  col-md-6  col-sm-6  col-12"><label for="" class="parrafo">Servicio Seleccionado *</label><select name="" class="form-control service" id="' + conteo_servicios + '"></select></div>        <div class="form-group col-xl-6 col-lg-6  col-md-6  col-sm-6  col-12">        <label for="" class="parrafo ">Costo</label>        <input type="text" class="form-control price" value="" disabled="disabled" id="pre-' + conteo_servicios + '"></div>';
        $("#services").append(html);



        $(".service").each(function (index) {


            var servicio_agregado = document.getElementById(conteo_servicios);






            //*A qui*//

            $.ajax({
                type: "POST",
                url: "Servicios/cargar_servicios_cliente_select",
                data: {

                }
            }).done(function (n) {
                
                
                /* 
Change Select
*/
                
               
                
                


                $(servicio_agregado).html(n);

                var precio = "pre-" + conteo_servicios;



                var precio_seleccionado = document.getElementById(precio);

                var selec_servicio = $(servicio_agregado).val();

                var valor = selec_servicio;




                $.ajax({
                    type: "POST",
                    url: "Servicios/actualizar_precios",
                    data: {
                        programa: valor

                    }
                }).done(function (n) {
                    $(precio_seleccionado).val(n);


servicio_inicial = $("#sel-servicios").val();
                    






                }).fail(function (n, t, i) {
                    //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                })




                $(".service").change(function () {
                    var servicio_cambiado = $(this).attr("id");
                    var precio = "pre-" + conteo_servicios;





                    var precio_seleccionado = document.getElementById(precio);
                    var selec_servicio = $(servicio_agregado).val();

                    var valor = selec_servicio;




                    $.ajax({
                        type: "POST",
                        url: "Servicios/actualizar_precios",
                        data: {
                            programa: valor

                        }
                    }).done(function (n) {
                        $(precio_seleccionado).val(n);









                    }).fail(function (n, t, i) {
                        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                    })



                });





            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })


        });






    });


    $("#sel-servicios").change(function () {
        
       

        var valor = $(this).val();

        if (valor == 0) {

            $("#precio").removeAttr("disabled");
            $("#precio").val("0");



        } else {
            $.ajax({
                type: "POST",
                url: "Servicios/actualizar_precios",
                data: {
                    programa: valor

                }
            }).done(function (n) {


                $("#precio").val(n);




                var pro = $("#sel-servicios").val();






                $.ajax({
                    type: "POST",
                    url: "Asesor/cargar_asesor_reserva",
                    data: {
                        programa: pro

                    }
                }).done(function (n) {


                    $("#asesor").html(n);








                }).fail(function (n, t, i) {
                    //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                })









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })
        }


    });
    $("#sel-tipo-documento").change(function () {

        if ($(this).val() > 0) {

            $("#documento").removeAttr("disabled");
            $(this).css("border", "solid 2px green");

        } else {
            $("#documento").attr("disabled", "disabled");
            $("#documento").val("");
            estado_documento = 0;
            $(this).css("border", "solid 2px red");
            $("#documento").css("border", "solid 2px red");
        }

    });

    setInterval(function () {
        var cedula = $("#cedula").text();





        if (tipo_cliente == 0) {
            //alert("Aqui");

            $.ajax({
                type: "POST",
                url: "Cliente/consultar_ultimo_cliente",
                data: {

                }
            }).done(function (n) {
                $("#ultimo_cliente").html(n);

                if (n == 0) {

                    $("#ultimo_cliente").text("1");


                }









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })

        } else {
            var cedula = $("#documento").val();

            $.ajax({
                type: "POST",
                url: "Cliente/consultar_id_definido",
                data: {
                    documento: cedula
                }
            }).done(function (n) {
                $("#ultimo_cliente").html(n);









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })
        }








        if (cedula == 1) {

            estado_cliente = 1;

            estado_documento = 1;
            estado_correo = 1;
            estado_telefono = 1;
            tipo_cliente = 1;

        }

    }, 1000);

    $("#documento").keyup(function () {
        if ($(this).val().length > 0) {

            estado_documento = 1;
            $(this).css("border", "solid 2px green");

            var documento = $(this).val();


            $.ajax({
                type: "POST",
                url: "Cliente/consultar_identificacion_reserva",
                data: {
                    identificacion: documento
                }
            }).done(function (n) {
                $("#cedula").html(n);









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })



        } else {
            estado_documento = 0;
            $(this).css("border", "solid 2px red");
        }
    });


    $("#documento").keyup(function () {
        if ($(this).val().length > 0) {

            estado_documento = 1;
            $(this).css("border", "solid 2px green");

            var documento = $(this).val();


            $.ajax({
                type: "POST",
                url: "Cliente/consultar_identificacion_tipo_cliente",
                data: {
                    identificacion: documento
                }
            }).done(function (n) {
                $("#tipo-cliente").html(n);









            }).fail(function (n, t, i) {
                //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





            })



        } else {
            estado_documento = 0;
            $(this).css("border", "solid 2px red");
        }
    });






    $("#nombre").keyup(function () {
        if ($(this).val().length > 0) {

            estado_cliente = 1;
            $(this).css("border", "solid 2px green");

        } else {
            estado_cliente = 0;
            $(this).css("border", "solid 2px red");
        }
    });


    $("#correo").keyup(function () {
        if ($(this).val().length > 0) {

            estado_correo = 1;
            $(this).css("border", "solid 2px green");

        } else {
            estado_correo = 0;
            $(this).css("border", "solid 2px red");
        }
    });

    $("#telefono").keyup(function () {
        if ($(this).val().length > 0) {

            estado_telefono = 1;
            $(this).css("border", "solid 2px green");

        } else {
            estado_telefono = 0;
            $(this).css("border", "solid 2px red");
        }
    });


    $("#acepto").change(function () {

        if ($(this).val() == 1) {

            estado_acepto = 1;
            $(this).css("border", "solid 2px green");


        } else {
            estado_acepto = 0;
            $(this).css("border", "solid 2px red");
        }

    });



    const generateRandomString = (num) => {
        const characters = '0123456789';
        let result1 = ' ';
        const charactersLength = characters.length;
        for (let i = 0; i < num; i++) {
            result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result1;
    }

    const displayRandomString = () => {
        let randomStringContainer = document.getElementById('random_string');
        randomStringContainer.innerHTML = generateRandomString(8);
    }

    var token = generateRandomString(35);
    codigo_master = token;

    var tok = parseInt(token);



    $.ajax({
        type: "POST",
        url: "Contador/validar_token",
        data: {
            token_arg: tok
        }
    }).done(function (n) {
        $("#nd").html(n);

        if (n == 1) {

            codigo_master = token;



        }









    }).fail(function (n, t, i) {
        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





    })





    $("#procesar").click(function () {









        if (estado_cliente == 1 && estado_documento == 1 && estado_correo == 1 && estado_telefono == 1 && estado_acepto == 1 &&   servicios_repetidos == 0) {






            var nombre = $("#nombre").val();

            var sel_tipo_documento = $("#sel-tipo-documento").val();

            var documento = $("#documento").val();

            var correo = $("#correo").val();

            var telefono = $("#telefono").val();


            $(".service").each(function () {
                //crear_reserva(servicio , costo , asesor , nombre , sel_tipo_documento , documento , correo , telefono);

                var servicio = $(this).val();
                var costo = $(this).parent().next().children("input").val();

                if (conteo_servicios == 0) {

                    var codigo_servicio = $("#ultimo_cliente").text();
                    $.ajax({
                        type: "POST",
                        url: "Contador/generar_reserva",
                        data: {

                            servicio_arg: servicio,
                            costo_arg: costo,
                            asesor_arg: "Por definirse",
                            nombre_arg: nombre,
                            tipo_documento_arg: sel_tipo_documento,
                            documento_arg: documento,
                            correo_arg: correo,
                            telefono_arg: telefono,
                            codigo_master_reserva: codigo_servicio,
                            master: codigo_master

                        }
                    }).done(function (n) {
                      









                    }).fail(function (n, t, i) {
                        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                    })
                } else {
                    var codigo_servicio = $("#ultimo_cliente").text();
                    $.ajax({
                        type: "POST",
                        url: "Contador/generar_reserva",
                        data: {

                            servicio_arg: servicio,
                            costo_arg: costo,
                            asesor_arg: "Por definirse",
                            nombre_arg: nombre,
                            tipo_documento_arg: sel_tipo_documento,
                            documento_arg: documento,
                            correo_arg: correo,
                            telefono_arg: telefono,
                            codigo_master_reserva: codigo_servicio,
                            master: codigo_master

                        }
                    }).done(function (n) {
                        $(".respuesta").html(n);









                    }).fail(function (n, t, i) {
                        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                    })
                }



            });



            var cliente_nuevo = $("#cedula").text();

            if (cliente_nuevo == 0 || cliente_nuevo == "") {

                var tipo_cliente = $("#tipo-cliente").text();
               // alert(tipo_cliente);

                $.ajax({
                    type: "POST",
                    url: "Contador/crear_cliente",
                    data: {
                        cliente: nombre,
                        identificacion: documento,
                        correo: correo,
                        telefono: telefono,
                        cliente_tipo: tipo_cliente
                    }
                }).done(function (n) {
                    $("#david").html(n);

                   // alert("Tus Datos De reservación Han sido Generados Correctamente");



                    /* 
fUNCION QUE GUARDA EL CODIGO UNICO DE LA RESERVA O SEA EL TOKEN GENERADO
*/
var nombre = $("#nombre").val();
var correo = $("#correo").val();
var telefono = $("#telefono").val();
var cedula = $("#documento").val();

                    $.ajax({
                        type: "POST",
                        url: "Contador/generar_combo_servicios",
                        data: {


                            master: codigo_master,
                            email:correo,
                            cliente: nombre,
                            tel:telefono,
                            cc:cedula
                            
                            

                        }
                    }).done(function (n) {
                        $(".mail").css("display","block");
                        $(".pdf").html(n);
                          alert("Click Payu");
                          window.location.href = 'Reserva/confirmacion?correo='+correo+'&&nombre='+nombre+'';
                        
                        
                        









                    }).fail(function (n, t, i) {
                        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                    })








                }).fail(function (n, t, i) {
                    //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                })
            } else {

               // alert("Tus Datos De reservación Han sido Generados Correctamente");
               
                /* 
fUNCION QUE GUARDA EL CODIGO UNICO DE LA RESERVA O SEA EL TOKEN GENERADO
*/
var nombre = $("#nombre").val();
var correo = $("#correo").val();
var telefono = $("#telefono").val();
var cedula = $("#documento").val();
                $.ajax({
                    type: "POST",
                    url: "Contador/generar_combo_servicios",
                    data: {


                        master: codigo_master,
                        email:correo,
                        cliente: nombre,
                        tel:telefono,
                        cc:cedula
                       
                       

                    }
                }).done(function (n) {
                    $(".mail").css("display","block");
                   $(".pdf").html(n);

                   alert("Click Payu");
                   window.location.href = 'Reserva/confirmacion?correo='+correo+'&&nombre='+nombre+'';
                  
                   









                }).fail(function (n, t, i) {
                    //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





                })


            }





        } else {
            alert("Faltan Datos para tu reserva");
            if(servicios_repetidos == 1){
    
    alert("No puedes Seleccionar el Servicio Mas de Una vez");
   
   }else{
      
   }
        }

    });


    $("#btn-quitar").click(function () {

        var elemento_eliminado = document.getElementById(conteo_servicios);

        var precio = "pre-" + conteo_servicios;
        var precio_eliminado = document.getElementById(precio);





        var precio_seleccionado = document.getElementById(precio);

        $(elemento_eliminado).parent().remove();
        $(precio_eliminado).parent().remove();

        conteo_servicios = conteo_servicios - 1;


    });

    setInterval(function () {
        if (conteo_servicios > 0) {

            $("#btn-quitar").css("display", "block");

        } else {
            $("#btn-quitar").css("display", "none");
        }
    }, 300);
    
    
    //*Validar servicios repetidos*//
    
    setInterval(function () {
    let servicios = [];
          $(".elementos").html("");
        $(".service").each(function(){
            var service = $(this).val();
           var codigo = "<span style='color:red; display:block'>"+service+"</span>";
            
           servicios.push(service);
        });
         
         function esPrimero(valor, indice, lista) {
    return (lista.indexOf(valor) === indice);
}

function noEsPrimero(valor, indice, lista) {
    return !(lista.indexOf(valor) === indice);
}

  


var retorno = servicios.some(noEsPrimero);
         if(retorno == true){
             
             //console.log("No puedes seleccionar el mismo servicio mas de una vez");
             var longitud = servicios.length;
             
             for(var i = 1 ; i<=longitud ; i++){
                 
                 servicios.pop();
                 
             }
             console.log(servicios);
             servicios_repetidos = 1;
            
            }else{
                console.log(servicios);
                servicios_repetidos = 0;
            }   
    }, 300);
    
    
     
    
    
    
   
   
    
    
    
    
    



 
    
    





});
