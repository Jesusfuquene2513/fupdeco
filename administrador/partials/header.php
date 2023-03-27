<?php
session_start();



 


if (isset($_SESSION['visitante'])) 

  {

    $_SESSION['visitante'];
    echo "<script>
      //alert('Variable definida');


    </script>";

    $file3 = fopen("partials/visitantes.txt", "r");

while(!feof($file3)) {

$contador2 = fgets($file3);

}
echo '<script>
//alert('.$contador2.')
</script>';

fclose($file3);

  } else{

echo "<script>
//alert('Variable No definida');
</script>";

$_SESSION['visitante'] = 1;
 


$file = fopen("partials/visitantes.txt", "r");

while(!feof($file)) {

$contador = fgets($file);

}




$new_visitante = $contador+1;



fclose($file);




//Ejemplo aprenderaprogramar.com, archivo escribir.php

$file2 = fopen("partials/visitantes.txt", "w");

fwrite($file2, "".$new_visitante);



fclose($file2);

echo '<script>
//alert('.$new_visitante.');
</script>';




  }




//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 150;//2min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            //session_destroy();              
            //Redirigimos pagina.
            $_SESSION['administrador'] = 1;
            header("Location: home.php");

            exit();
        } else {  // si no ha caducado la sesion, actualizamos
            $_SESSION['tiempo'] = time();
        }


} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}



 $file4 = fopen("partials/visitantes.txt", "r");

while(!feof($file4)) {

$contador3 = fgets($file4);

}




?>
<div class="row p-0" id="menu-dinamico">

				<div class="col-xl-12 m-auto fixed-top p-0" style="background: white; border-bottom: solid 2px #242c5c">
					<div class="cinta container-fluid" id="<?php echo $contador3;?>">

      <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 m-auto" style="height: 100%; display: flex; align-items: center; position:relative">
          <button class="red2"><i class="fa fa-facebook-official"></i></button>
                  <button class="red2"><i class="fa fa-linkedin"></i></button>
                    <button class="red2"><i class="fa fa-youtube"></i></button>
                      <button class="red2"><i class="fa fa-twitter"></i></button>
                       <div class="fecha2" style="margin-top:-8px">
                            <span style="float:right; background: none; border:none; color:white; font-weight: bolder; text-decoration: underline; font-style: oblique; font-size: 9px; position: absolute; right: 0;" ><span class="dia" style=""><?php echo date("N"); ?></span><span class="dia-mes" style=""><?php echo date("j"); ?></span><span class="mes" style=""><?php echo date("m");?></span><span class="year" style=""><?php echo " 20".date("y");?></span></span>
                       </div>

      </div>

					</div>
					<nav class="navbar navbar-expand-lg   barra col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 m-auto">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="plantilla_front/img/logo.png" alt="" class="img-fluid img-logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#about">NOSOTROS</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="#services">PROGRAMAS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SOCIAL
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="proyectos.php">PROYECTOS</a></li>
            <li><a class="dropdown-item" href="cer.php">C.E.R</a></li>
          </ul>
         
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contactanos.php">CONTACTANOS</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="blog.php">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="galeria.php">GALERÍA</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
				</div>
			</div>

