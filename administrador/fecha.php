<div class="div-fecha" style="color:black">
    <span style="float:right; background: none; border:none; color:white; font-weight: bolder; text-decoration: underline; font-style: oblique; font-size: 9px; " ><span class="dia"><?php echo date("N"); ?></span><span class="dia-mes"><?php echo date("j")." De "; ?></span><span class="mes"><?php echo date("m");?></span><span class="year"><?php echo " 20".date("y");?></span></span>
</div>
	<script src="plantilla_front/librerias/js/jquery.min.js" ></script>
<script>
    $(document).ready(function(){var e=$(".dia").text();"1"==e&&$(".dia").text("Lunes,"),"2"==e&&$(".dia").text("Martes,"),"3"==e&&$(".dia").text("Miercoles,"),"4"==e&&$(".dia").text("Jueves,"),"5"==e&&$(".dia").text("Viernes,"),"6"==e&&$(".dia").text("Sabado,"),"7"==e&&$(".dia").text("Domingo,"),"12"==$(".mes").text()&&$(".mes").text("Diciembre De")});
</script>