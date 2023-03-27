$(document).ready(function(){

	
	var validador_hora = 0;
	var hora = 0;
	var servicio = 0;

	var validador_servicio = 0;
$("#select-hora").change(function(){

	var valor = $(this).val();

	

	if(valor == 0){

		validador_hora = 0;

	} else{
		validador_hora = 1;
		hora = valor;
	}



});

$("#sel-servicios").change(function(){

	var valor_sel = $(this).val();

	

	if(valor_sel == 0){

		validador_servicio = 0;

	} else{
		validador_servicio = 1;
		servicio = valor_sel;
	}



});
	

	$("#btn-asignar-cita").click(function(){

		if($('#datepicker').val() == "" || validador_hora == 0 || validador_servicio == 0){

			alert("No estas asignando nada");

		} else{


			
			var hora_nueva = hora+":00:00";

			var servicio_nuevo = servicio;



var year = $('#datepicker').val();


var year_new = year.substr(-4,4);

var mes = $('#datepicker').val();

var mes_new = mes.substr(3,2);


var dia = $('#datepicker').val();

var dia_new = dia.substr(-10,2);


var evento = "{title: '"+servicio+"',start: YM + '-"+dia_new+"T"+hora_nueva+"',color: '#e91e63',}";





$.ajax({
			type: "POST",
			url: "../Agenda/asignar_turno",
			data: {
				evento:evento
				
			}
		}).done(function(n) {
			$(".turno").html(n)
alert("Cita asignada Correctamente");
			  location.reload();
		}).fail(function(n, t, i) {
			$(".turno").html("The following error occured: " + t + " " + i)
		})




		}

	});

});