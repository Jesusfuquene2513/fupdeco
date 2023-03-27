<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FUPDECO</title>
	 <link rel="icon" href="../plantilla/assets/img/icon.ico" type="image/x-icon"/>
	 <link href="../plantilla/css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	    <link href="../plantilla/css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="../plantilla/globales/css/colores.css">
    <link rel="stylesheet" href="../plantilla/globales/css/tamanos.css">
       <link rel="stylesheet" href="../plantilla/globales/css/slider.css">
</head>
<body>

	<section id="header">

		<?php
$this->load->view('vistas/header');
	?>
		
	</section>
	<section style=" display:table; width:100%; ">
	<?php
$this->load->view('vistas/formulario_contacto');
	?>
	</section>
	
<section id="scripts">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../plantilla/globales/js/global.js"></script>
   <script src="../plantilla_front/js/programas.js"></script>
    <script src="../plantilla_front/js/footer_original.js"></script>
 <script>
        $(".formulario label").css("font-weight","bolder");
   $(".formulario a").css("color","white");
    $(".formulario a").css("display","block");
    $(".formulario a").css("float","left");
    $(".formulario p").css("color","white");
$(".footer").css("margin-top","50px");
      
           
          
           $(".form-control").css("border","solid 2px  #162e70 ");

             $(".formulario label").css("color","#162e70");
         
          $(".btn-social").css("display","flex");
         
      
          
          
          
          
       </script>
	
</section>	
</body>
</html>