$(document).ready(function(){

    

var validador_cliente = 1;
	
	var validador_hora = 0;
	var hora = 0;
	var servicio = 0;
	var color = 0;

	var validador_color = 0;

	var validador_servicio = 1;
	
	var cliente_id = 0;
$("#select-hora").change(function(){

	var valor = $(this).val();

	

	if(valor == 0){

		validador_hora = 0;

	} else{
		validador_hora = 1;
		hora = valor;
	}



});


$("#sel-servicios").change(function() {

	var valor_sel2 = $(this).val();





	if (valor_sel2 == 0) {

		validador_servicio = 0;
	} else {
		validador_servicio = 1;
		servicio = valor_sel2;
	}



})




$("#sel-cliente").change(function() {

	var valor_sel2 = $(this).val();
	


	

	if(valor_sel2 == 0){

		validador_cliente = 0;

	} else{
		validador_cliente = 1;
		cliente_id = valor_sel2;
	}



})








var dias_faltantes = 0;

$("#datepicker").change(function(){

	var fecha = $(this).val();

	var d = $("#dia").text();
	var m = $("#mes").text();
	var y = $("#year").text();

	fecha_organizada = m+"/"+d+"/"+y;

	




	var cadena1 = fecha.replace('-', '/');
	var cadena2 = cadena1.replace('-', '/');

	let fecha1 = new Date(fecha_organizada);
let fecha2 = new Date(fecha);
let diferencia = fecha2.getTime() - fecha1.getTime();
let diasDeDiferencia = diferencia / 1000 / 60 / 60 / 24;


dias_faltantes = diasDeDiferencia;





	
});
	

	$("#btn-asignar-cita").click(function(){

		var ultimo_evento = $("#codigo-evento").val();
		
		
		

		if ($('#datepicker').val() == "" || validador_hora == 0 || validador_servicio == 0 || validador_cliente == 0) {
			
			
			alert("No estas asignando nada");

		} else{

var color = $("#sel-colores").val();



var asesor_param = $("#asesor").val();

			
			var hora_nueva = hora+":00:00";

			var servicio_nuevo = servicio;



var year = $('#datepicker').val();


var year_new = year.substr(-4,4);

var mes = $('#datepicker').val();

var mes_new = mes.substr(3,2);


var dia = $('#datepicker').val();

var dia_new = dia.substr(-10,2);





var natalia = $(".natalia").text();



var amor = parseInt(natalia)+parseInt(1);

//alert(amor);


cliente_id = $("#res").val();
servicio_nuevo = $("#servicio").val();



console.log(dia_new+"Dia");
console.log(mes_new+"Mes");

console.log(year_new+"Año");

console.log(hora_nueva+"Hora");
console.log(servicio_nuevo+"Servicio");

console.log(asesor_param+"aSesor");

console.log(color+"Color");

console.log(amor+"Codigo evento");
console.log(dias_faltantes+"Faltantes");

console.log(cliente_id+"Cliente");
var id = $("body").attr("id");



asignar_cita(dia_new , mes_new , year_new , hora_nueva , servicio_nuevo , asesor_param , color , amor , dias_faltantes , cliente_id , amor , id);



	
}








		

	});
	
	function asignar_cita(dia_new , mes_new , year_new , hora_nueva , servicio_nuevo , asesor_param , color , amor , dias_faltantes , cliente_id , amor , id)
	{
        var natalia = $("#master").val();
        
		$.ajax({
			type: "POST",
			url: "../Agenda/asignar_turno",
			data: {
				dia:dia_new, mes:mes_new , year:year_new , hora:hora_nueva, servicio:servicio_nuevo , asesor: asesor_param , color_param: color , codigo_evento:amor , faltante: dias_faltantes , cliente: cliente_id , codigo_evento:amor, update:id , code:natalia

			}
		}).done(function(n) {
			$(".codigo2").html(n);
            $.ajax({
                type: "POST",
                url: "../Agenda/recargar_calendario",
                data: {
                    
                    
        
                }
            }).done(function(n) {
                $(".agenda-dinamica").html(n);
        
                //location.reload();
            }).fail(function(n, t, i) {
                //$(".codigo2").html("The following error occured: " + t + " " + i)
            })

			//location.reload();
		}).fail(function(n, t, i) {
			$(".codigo2").html("The following error occured: " + t + " " + i)
		})
	}


    $("#datepicker").change(function(){
        $("#select-hora").html("");
        $(".hh").css("color","black");
    var f = $(this).val();
    nd = f.replace('-','/');
    nd2 = nd.replace('-','/');

    $.ajax({
        type: "POST",
        url: "../Agenda/consultar_disponibilidad_horaria",
        data: {
            
           fecha:nd2

        }
    }).done(function(n) {
        $(".alerta").html(n);

       
        $(".h").each(function(){

            var texto1 = $(this).text();
            $(".hh").each(function(){
                var texto2 = $(this).text();

                if(texto1 == texto2){

                   $(this).css("color","red");

                  
                }
            });
            

        });
        var select_inicial = "<option value='0'>Seleccione Horario</option>";
        $("#select-hora").append(select_inicial);
        $(".hh").each(function(){

            var color = $(this).css("color");
            if(color == "rgb(255, 0, 0)"){
                var hora_no_disponible = $(this).text();
               
            }else{
            var hora_disponible = $(this).text();
            if(hora_disponible == "08:00:00"){

                var valor = "08";
            
            }
            if(hora_disponible == "09:00:00"){

                var valor = "09";
            
            }
            if(hora_disponible == "10:00:00"){

                var valor = "10";
            
            }
            if(hora_disponible == "11:00:00"){

                var valor = "11";
            
            }
            if(hora_disponible == "12:00:00"){

                var valor = "12";
            
            }
            if(hora_disponible == "14:00:00"){

                var valor = "14";
            
            }
            if(hora_disponible == "15:00:00"){

                var valor = "15";
            
            }

            if(hora_disponible == "16:00:00"){

                var valor = "16";
            
            }
         
           
            var select = "<option value='"+valor+"'>"+hora_disponible+"</option>";
            $("#select-hora").append(select);

            if(select == ""){

              
            }else{
            $("#select-hora").removeAttr("disabled");
            }

           

            
            }

           
        });

        var sel = $('#select-hora option').length;
        if(sel == 1){
            $(".mensaje").css("display","block");
            $(".mensaje2").css("display","none");
        }else{
            $(".disponible").html("");
            $("#select-hora option").each(function(index){
               if(index > 0){
                var hora = $(this).attr('value');

                if(hora == "08"){

                    var tiempo = "Am";
                }
                if(hora == "09"){

                    var tiempo = "Am";
                }
                if(hora == "10"){

                    var tiempo = "Am";
                }
                if(hora == "11"){

                    var tiempo = "Am";
                }
                if(hora == "12"){

                    var tiempo = "Am";
                }
                if(hora == "14"){

                    var tiempo = "Pm";
                }
                if(hora == "15"){

                    var tiempo = "Pm";
                }
                if(hora == "16"){

                    var tiempo = "Pm";
                }

                var html_hora = "<button class='btn btn-danger bh' id='"+hora+"' style='font-weight:bolder; margin-left:5px; margin-right:5px;'>"+hora+":00:00 "+tiempo+"</button>";

                $(".disponible").append(html_hora);
                
            }
             });
            $(".mensaje2").css("display","block");
            $(".mensaje").css("display","none");
          
        }
        //location.reload();
    }).fail(function(n, t, i) {
        //$(".codigo2").html("The following error occured: " + t + " " + i)
    })
  
    });
   
   

});