<?php
if(isset($_SESSION['cliente'])){
    
}else{
   $_SESSION['cliente'] = 1;
    contadorvisitas();
  
}
$_SESSION['user']= 1;
if(!isset($_SESSION['user'])){// Esta logeado?.
 header("Location: logout.php"); 
}
// La variable $_SESSION['usuario'] es un ejemplo.

//Verifico el tiempo si esta seteado, caso contrario lo seteo.
if(isset($_SESSION['time'])){
 $tiempo = $_SESSION['time'];
}else{
 $tiempo = strtotime(date("Y-m-d H:i:s"));
}

$inactividad =100;   //Exprecion en segundos.

$actual =  strtotime(date("Y-m-d H:i:s"));

if( ($actual-$tiempo) >= $inactividad){
 contadorvisitas();
 // En caso que este sea mayor del tiempo seteado lo deslogea.
}else{
 $_SESSION['time'] =$actual;
}



//contadorvisitas();
function contadorvisitas()
    {
       
     $ruta_archivo = 'contadorvisitas.txt';
    $path = 'application/contador/'.$ruta_archivo;
  $archivo = file_get_contents($path);
  $suma = $archivo + 1;
  
    
    $archivo2 = file_get_contents($path);
$fp = fopen($path, 'w');
fwrite($fp, $suma ); 
    $_SESSION["visitantes"] = $suma;
    fclose($fp);  
       
    }
$direccion = "Direccion Fupdeco";
$_SESSION["direccion"]=$direccion;

$telefono = "Telefono Fupdeco";
$_SESSION["telefono"] = $telefono;



$dia = date('d');

$mes = date('m');

switch ($mes) {
    case '01':
       $mes = "Enero";
        break;
    
   case '02':
       $mes = "Febrero";
       break;
       case '03':
           $mes = "Marzo";
           break;

           case '04':
               $mes = "Abril";
               break;
               case '05':
                   $mes = "Mayo";
                   break;
                   case '06':
                       $mes = "Junio";
                       break;
                       case '07':
                           $mes = "Julio";
                           break;
                           case '08':
                               $mes = "Agosto";
                               break;
                               case '09':
                                   $mes = "Septiembre";
                                   break;
                                   case '10':
                                       $mes = "Octubre";
                                       break;
                                       case '11':
                                           $mes = "Noviembre";
                                           break;
                                           case '12':
                                               $mes = "Diciembre";
                                               break;

                                               
}
$year = date('Y');
?>
<div class="container-fluid p-0" style="position:fixed; z-index: 2000">
    <!-- Topbar Start -->
    <div class="container-fluid  p-0 cinta-superior">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt  me-2"></small>
                    <small><?php echo $_SESSION["direccion"] ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock  me-2"></small>
                    <small id="hora"></small>
                </div>

                 <div class="h-100 d-inline-flex align-items-center" style="position:relative; left:5px">
                    <small class="far fa-clock  me-2"></small>
                    <small id="fecha"><?php echo $dia."-".$mes."-".$year ?></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt  me-2"></small>
                    <small><?php echo  $_SESSION["telefono"]; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-link rounded-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-1">
        <a href="../index.php/Home" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <img src="../plantilla/assets/img/logo.png" alt="" class="logotipo">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php/Home" class="nav-item nav-link active color-primary" style="color: #162e70; font-weight:bolder ">Inicio</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: #162e70; font-weight:bolder ">Nosotros</a>
                    <div class="dropdown-menu bg-light m-0" style="color: #162e70; font-weight:bolder ">
                        <a href="../index.php/About" class="dropdown-item" style="color: #162e70; font-weight:bolder ">Conozcanos</a>
                         <a href="../index.php/Team" class="dropdown-item" style="color: #162e70; font-weight:bolder ">Talento</a>
                        
                    </div>
                </div>
                <a href="../index.php/Portafolio" class="nav-item nav-link" style="color: #162e70; font-weight:bolder ">Programas</a>
                <a href="../index.php/Blog" class="nav-item nav-link" style="color: #162e70; font-weight:bolder ">Galería</a>
                <a href="../index.php/Publicaciones" class="nav-item nav-link" style="color: #162e70; font-weight:bolder ">Blog</a>

                <a href="../index.php/Contacto" class="nav-item nav-link" style="color: #162e70; font-weight:bolder ">Contactanos</a>
            </div>

        </div>
    </nav>
    
</div>