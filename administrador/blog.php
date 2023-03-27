<!DOCTYPE html>
<html lang="es">
<head>
    	<link rel="icon" href="ico.ico"  type="image/icon type">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="plantilla_front/librerias/boostrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="plantilla_front/css/colores.css">
  <link rel="stylesheet" href="plantilla_front/css/tamano.css">
  <link rel="stylesheet" href="plantilla_front/css/letras.css">
  <link rel="stylesheet" href="plantilla_front/css/hr.css">
   <link rel="stylesheet" href="plantilla_front/css/team.css">
     <link rel="stylesheet" href="plantilla_front/css/servicio.css">
     <link rel="stylesheet" href="plantilla_front/css/wasap.css">
      <link rel="stylesheet" href="plantilla_front/css/cer.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Redepyme</title>
  <style type="text/css">
      .formulario-campos .form-control{
    height: 40px;
}
.elemento-blog{
height: 350px;
}
  </style>

</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12 p-0 contenedor-main" id="menu">
      <?php 
include_once("partials/header.php");
      ?>
    </div>









        <div class="col-xl-12 contenedor-servicios card p-1" style="margin-top: 115px;">

          <div class="row">

             <div class="col-xl-12 col-lg-12 col-md-12 m-auto p-0" style="display:table" >

             <div class="container-fluid m-auto">
               <div class="row m-auto">
                 

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 m-auto d-flex  mt-5 mb-5" id="publicaciones-dinamicas">
        
        
        

        
        
      

        
        
        
      </div>
    
               </div>
             </div>

            </div>
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-2 container-fluid" style="background: #242c5c;">
        <div class="row">
           <?php
include_once "partials/footer.html";
          ?>

        </div>

      </div>
          </div>








  </div>

</div>
<div class="" id="contenedor-wasap">

  <div class="logo" style="text-align: right;" id="btn-wasap">
    <img src="plantilla_front/img/wasap.png" alt="" class="mt-2 mb-2">

  </div>
  <div class="formulario-wasap card p-0 m-auto" style="width: 95%;  ">
   <div class="card-header text-center" style="background: #242c5c;  position:relative;">
     <span class="text-light" style="font-weight:bolder; font-style: oblique; text-decoration: underline; ">Nuestro Whatsapp</span>
     <i class="fa fa-close" style="color:white; position:absolute; right: 0; margin-right: 15px; font-size: 25px; cursor:pointer" title="CERRAR" id="btn-cerrar-wasap"></i>
   </div>
   <div class="card-body" style="">
     <div class="input-group">



<span style="font-weight:bolder" class="mb-2">Nombre completo</span>


</div>
      <div class="input-group">



  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Nombre completo" style="border:solid 1px #242c5c">
</div>
<div class="input-group text-center" style="width: 100%;  display:flex; align-items: center">


<a href="#" id="enlace-wasap" target="_blank"><button class="btn btn-primary mt-3" style="color:white; font-weight: bolder; margin: auto; background: #c3141c; border:none">Contactar</button></a>
</div>
   </div>

  </div>



      </div>

<script src="plantilla_front/librerias/js/jquery.min.js" ></script>
<script src="plantilla_front/librerias/boostrap/js/bootstrap.bundle.min.js"></script>
<script src="plantilla_front/js/wasap.js"></script>
<script src="plantilla_front/js/redes_sociales.js"></script>
<script src="plantilla_front/js/cer.js"></script>
<script src="plantilla_front/js/blog_master.js"></script>
<script src="plantilla_front/js/fecha.js"></script>
<script>
    
    $(document).ready(function(){
        $(".contador-relativvo").remove();
    });
    
</script>

</body>
</html>
