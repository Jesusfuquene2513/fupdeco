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
    border: solid 1px gray;
}
.elemento-blog{
height: 350px;
}
label{
font-weight: bolder;
}
body{
background-image: url("https://www.todofondos.net/wp-content/uploads/fondo-de-pantalla-de-girasol-amarillo-1024x683.jpg");
background-size: cover;
background-attachment: fixed;
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









        <div class="col-xl-10 col-lg-10 col-md-11 col-sm-11 col-11 m-auto card  p-1" style="background: rgb(255, 255, 255, 0.8);" >

          
<div class="card-body">
     <form action="aplicacion/controllers/routes/routes.php" method="post" class="p-0" style="margin-top:150px">
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos">
                        <label for="">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto">
                        <input type="text" name="peticion" value="35" class="d-none">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Tipo Identificación</label>
                        <select name="tipo_documento" id="sel-documento" class="form-control" style="cursor:pointer">
                            <option value="0">Seleccione tipo de identificación</option>
                            <option value="1">Cedula de ciudadania</option>
                            <option value="2">Cedula extranjera</option>
                            <option value="3">Pasaporte</option>
                            <option value="4">NIT</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Numéro de identificación</label>
                        <input type="text" name="numero_identificacion" class="form-control" disabled id="documento">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Correo electronico</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Seleccione Departamento</label>
                        <select class="form-control" id="sel-departamento" style="cursor:pointer" name="departamento">

                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="">Seleccione Municipio</label>
                        <select name="municipio" class="form-control" id="sel-municipio" style="cursor:pointer">

                        </select>
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <textarea name="consulta" id="consulta" rows="3" class="form-control"
                        style="resize:none; height:150px"></textarea>
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <center>
                            <input type="button" class="btn btn-primary" style="background:rgba(195,20,28,1); border:none" value="Enviar" id="enviar-peticion-contacto">
                        </center>
                    </div>
                </form>
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
<script src="plantilla_front/js/master_contacto.js"></script>
<script src="plantilla_front/js/fecha.js"></script>


</body>
</html>
