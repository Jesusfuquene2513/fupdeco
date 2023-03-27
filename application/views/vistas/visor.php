<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FUPDECO</title>
	 <link rel="icon" href="../../plantilla/assets/img/icon.ico" type="image/x-icon"/>
	 <link href="../../plantilla/css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	    <link href="../../plantilla/css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="../../plantilla/globales/css/colores.css">
    <link rel="stylesheet" href="../../plantilla/globales/css/tamanos.css">
       <link rel="stylesheet" href="../../plantilla/globales/css/slider.css">
       <link href="../../plantilla/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
</head>
<body id='<?php echo $_SESSION["album"]; ?>'>

	<section id="header">

		<?php
$this->load->view('vistas/header2');
	?>
		
	</section>
	<section style="background:rgb(255 , 255 , 255 , 0.9); display:table; width:100%; ">
	<?php
$this->load->view('vistas/fotos');
	?>
	</section>
	<section id="footernd">
	<?php
$this->load->view('vistas/footer2');
	?>	
	</section>
<section id="scripts">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../../plantilla/globales/js/global2.js"></script>
   <script src="../../plantilla_front/js/galeria.js"></script>
    <script src="../../plantilla_front/js/footer_original2.js"></script>
    <script src="../../plantilla/lib/lightbox/js/lightbox.min.js"></script>
 <script>
        $(".footer label").css("color","white");
    $(".footer a").css("color","white");
$(".footer").css("margin-top","50px");
        $(".footer p").css("color","white");
           
          
           $(".footer .form-control").css("border","solid 1px  black ");
         
          
         
      
          
          
          
          
       </script>
	
</section>	
</body>
</html>