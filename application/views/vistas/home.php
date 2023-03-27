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
$this->load->view('vistas/header.php');
	?>
		
	</section>
	<section>
	<div class="container-fluid p-0" style="position:relative;top:0px;">
            <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner" id="dinamico" style="position:relative; top:80px; margin-bottom:80px" >
    
    
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
       </div>
	</section>
	<section id="footernd">
	<?php
$this->load->view('vistas/footer.php');
	?>	
	</section>
<section id="scripts">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../plantilla/globales/js/global.js"></script>
    <script src="../plantilla_front/js/slider.js"></script>
    <script src="../plantilla_front/js/footer_original.js"></script>
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