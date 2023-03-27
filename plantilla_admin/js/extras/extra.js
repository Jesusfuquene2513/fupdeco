
	$(document).ready(function() {
		
		setInterval(refrescar_id_ultimo, 600);
		
		refrescar_id_ultimo();
		function refrescar_id_ultimo(){
			
		
			
			var natalia = $(".natalia").text();
			
			if (natalia == "") {

				
				
			}
			var usuario = $(".admin-name").text();


			$.ajax({
				type: "POST",
				url: "../Asesor/consultar_ultimo_registro_evento",
				data: {

				}
			}).done(function(n) {
				$(".natalia").html(n);
				











			}).fail(function(n, t, i) {
				//$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)





			})
		}
		
		
		

	});
	