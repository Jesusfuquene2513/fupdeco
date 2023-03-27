$(document).ready(function(){
$(".nav-link").css("font-size","15px");

$(".nav-link").mouseover(function(){
	$(this).css("font-size","15px");
});
    var validar_municipio = 0;
$(".btn").css("--bs-btn-box-shadow","inset 0 0px 0 rgba(255, 255, 255, 0.15),0 0px 0px rgba(0, 0, 0, 0.075)");




cargar_departamentos();
	function cargar_departamentos(n) {
		$.ajax({
			type: "POST",
			url: "Footer/cargar_departamentos",
			data: {
				peticion: 27,
				
			}
		}).done(function(n) {
			$("#sel-departamento").html(n)
		}).fail(function(n, t, i) {
			$("#sel-departamento").html("The following error occured: " + t + " " + i)
		})
	}

	$("#sel-departamento").change(function(){

		var value = $(this).val();

		if(value > 0){

			$("#sel-municipio").removeAttr("disabled");

			$.ajax({
			type: "POST",
			url: "Footer/cargar_municipios",
			data: {
				departamento: value
				
			}
		}).done(function(n) {
			$("#sel-municipio").html(n)
		}).fail(function(n, t, i) {
			$("#sel-municipio").html("The following error occured: " + t + " " + i)
		})

		}else{
			$("#sel-municipio").attr("disabled", "disabled");
			document.ready = document.getElementById("sel-municipio").value = "0"
		}

	});

    $("#sel-municipio").change(function(){
        var valor = $(this).val();
        if(valor > 0){
    
            validar_municipio = 1;
        }else{
          validar_municipio = 0;  
        }

    });


   $("#sel-documento").change(function(){

    var valor = $(this).val();
    if(valor > 0){

        $("#documento").removeAttr("disabled");
    }else{
        $("#documento").attr("disabled","disabled");
    }
});

	$("#enviar-peticion-contacto").click(function() {

		if($("#nombre_contacto").val().length > 0 && $("#consulta").val().length > 0 && $("#documento").val().length > 0 && $("#telefono").val().length > 0 && $("#correo").val().length > 0 && validar_municipio > 0){

        $(this).attr("type","submit");


        }else{
            alert("Por Favor Diligencie Toda La información");
        }
	});
	
	

});