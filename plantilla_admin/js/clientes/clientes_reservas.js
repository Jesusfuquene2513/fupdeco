$(document).ready(function() {
	var user = $(".admin-name").text();
	
	$.ajax({
		type: "POST",
		url: "../Asesor/listar_clientes",
		data: {
			asesor: user

		}
	}).done(function(n) {
		$("#sel-cliente").html(n)

		//location.reload();
	}).fail(function(n, t, i) {
		$("#sel-cliente").html("The following error occured: " + t + " " + i)
	})

});