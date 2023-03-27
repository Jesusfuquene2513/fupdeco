$(document).ready(function(){
	refrescar();
var user = $(".admin-name").text();







  

  $("#btn-refrescar").click(function(){

 window.location.href = '../Asesor/dashboard'; 
  });

    




function refrescar(){
var user = $(".admin-name").text();


  $.ajax({
      type: "POST",
      url: "../Agenda/actualizar_eventos_corridos",
      data: {
      
      usuario: user
        
      }
    }).done(function(n) {
      $(".update").html(n)

      

  var d = $("#dia").text();
  var m = $("#mes").text();
  var y = $("#year").text();

  var fecha_organizada = m+"/"+d+"/"+y;

   $("#actual").html(fecha_organizada);

   $(".dn").each(function(){
   	
   	
   var fecha_a_comparar = $(this).text();
   
   
  


let fecha1 = new Date(fecha_organizada);
let fecha2 = new Date(fecha_a_comparar);
let diferencia = fecha2.getTime() - fecha1.getTime();
let diasDeDiferencia = diferencia / 1000 / 60 / 60 / 24;



dias_faltantes2 = diasDeDiferencia;








var id = $(this).attr("id");




$.ajax({
      type: "POST",
      url: "../Agenda/update_agenda_corrida",
      data: {
       id_arg:id , fecha:dias_faltantes2
        
      }
    }).done(function(n) {
      $(".update").html(n);
    

        //location.reload();
    }).fail(function(n, t, i) {
      $(".update").html("The following error occured: " + t + " " + i)
    })






   });

       
    }).fail(function(n, t, i) {
      $(".update").html("The following error occured: " + t + " " + i)
    })









   $.ajax({
      type: "POST",
      url: "../Asesor/cargar_eventos_asesor",
      data: {
        usuario: user
      }
    }).done(function(n) {
      $(".prueba").html(n);

      

var divs = document.getElementsByClassName("nd").length;

$.ajax({
    type: "POST",
    url: "../Agenda/crear_variable_global_conteo",
    data: {
     
        acumulador:divs
      
    }
  }).done(function(n) {
    $(".conteo-global").html(n)

      //location.reload();
  }).fail(function(n, t, i) {
    $(".update").html("The following error occured: " + t + " " + i)
  })


if(divs == 0){

  $("#codigo-evento").val(1);

} else{

  var id_acumulador = 0;

$(".nd").each(function(){

  id_acumulador = id_acumulador + 1;



});

$(".nd").each(function(index){

  if(index == id_acumulador-1){
var id_evento = $(this).attr("id");

if(id_evento == null){

  $("#ultimo, #codigo-evento").val(0);

}

$("#ultimo, #codigo-evento").val(parseInt(id_evento)+1);
  }

});

}

      var conteo = divs-1;
      var codigo_1 = "$(function() { var todayDate = moment().startOf('day');";

$("#parte1").append(codigo_1);


var conta = 0;
    $(".nd").each(function(index){



      var id = $(this).attr("id");
      
    
      
     

      var faltante = $(this).attr("title");





     


var codigo_new = "$(function() { var todayDate = moment().startOf('day'); var EVENTO_"+id+" = todayDate.clone().add("+faltante+", 'day').format('YYYY-MM-DD');$('#calendar').fullCalendar({ header: { left: 'prev,next today', center: 'title', right: 'month,agendaWeek,agendaDay,listWeek' }, editable: true, eventLimit: true, navLinks: true, backgroundColor: '#1f2e86', eventTextColor: '#1f2e86', textColor: '#378006', dayClick: function(date, jsEvent, view) { alert('Clicked on: ' + date.format()); alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY); alert('Current view: ' + view.name);  $(this).css('background-color', 'red'); }, events: [";

var codigo2 = "var EVENTO_"+id+" = todayDate.clone().add("+faltante+", 'day').format('YYYY-MM-DD');";
$("#parte1").append(codigo2);


     



        var texto = $(this).text();

        var prev = $("#parte2").text();

        $("#parte2").text(prev+texto);


        conta = conta + 1;

        




        var parte1 = $("#parte1").text();
        var parte2 = $("#parte2").text();
        var parte3 = $("#parte3").text();


        $("#agenda-completa").text(parte1+parte2+parte3);


        if(index == conteo){

         





var fechas = document.getElementsByClassName("fc-content").length;


var data = document.getElementsByClassName("nd").length;




if(data == fechas){

} else{

 // $("#btn-refrescar").click();
}

        }



    });




          var codigo_3 = "$('#calendar').fullCalendar({ header: { left: 'prev,next today', center: 'title', right: 'month,agendaWeek,agendaDay,listWeek' }, editable: true, eventLimit: true,  navLinks: true, backgroundColor: '#1f2e86', eventTextColor: '#1f2e86', textColor: '#378006', dayClick: function(date, jsEvent, view) { alert('Clicked on: ' + date.format()); alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY); alert('Current view: ' + view.name); $(this).css('background-color', 'red'); }, events: [";

    $("#parte1").append(codigo_3);

 var agenda_completa = $("#agenda-completa").text();

 (agenda_completa);


listados_eventos(agenda_completa);


       




     
  

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

}


function listados_eventos(){

  var p1 = $("#parte1").text();

 var p2 = $("#parte2").text();

 var p3 = $("#parte3").text();

agenda_completa = p1+p2+p3;

  $.ajax({
      type: "POST",
      url: "../Asesor/ver_citas_asesor",
      data: {
      agenda:agenda_completa
        
      }
    }).done(function(n) {
      $(".nat").html(n)


        
    }).fail(function(n, t, i) {
      $(".confirmacion").html("The following error occured: " + t + " " + i)
    })
}


	

});