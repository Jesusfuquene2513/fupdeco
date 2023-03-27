$(document).ready(function(){
	var user = $(".admin-name").text();
$.ajax({
		type: "POST",
		url: "../Asesor/listar_eventos_asesor",
		data: {
			asesor: user

		}
	}).done(function(n) {
		$("#tabla-eventos-asesor").html(n)

		//location.reload();
	}).fail(function(n, t, i) {
		$("#tabla-eventos-asesor").html("The following error occured: " + t + " " + i)
	})
	
});