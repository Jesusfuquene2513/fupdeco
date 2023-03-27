<?php
session_start();
extract($_GET);
if(isset($_SESSION['administrador'])){

}else{

    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DASHBOARD - FUPDECO</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="plantilla/assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="plantilla/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['plantilla/assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        .item-carga-imagen img{
    cursor:pointer
}
select{
    cursor:pointer
}
.video-multimedia{
    width: 100%;
}

.capa{
    background-color: rgb(255, 255, 255 , 0.1);
    cursor:pointer
}
@media only screen and (max-width: 600px) {
    .item-carga-imagen , .archivo-multimedia , .video-multimedia{
        height: 330px;
    }
    .img-tabla{
        width: 100%;
        height: 50px;
    }

    .capa{
        width: 95%;
        height: 330px; 
    }
    
}
@media only screen and (min-width: 600px) {
    .item-carga-imagen , .archivo-multimedia , .video-multimedia{
        height: 130px;
    }
    .img-tabla{
        width: 100%;
        height: 80px;
    }
    .capa{
        width: 90%;
        height: 130px; 
    }
}
@media only screen and (min-width: 768px) {
    .item-carga-imagen , .archivo-multimedia , .video-multimedia{
        height: 130px;
    }
    .img-tabla{
        width: 80%;
        height: 100px;
    }
    .capa{
        width: 90%;
        height: 130px; 
    }
}
@media only screen and (min-width: 992px) {
    .item-carga-imagen , .archivo-multimedia , .video-multimedia{
        height: 130px;
    }
    .img-tabla{
        width: 80%;
        height: 150px;
    }

    .capa{
        width: 90%;
        height: 130px; 
    }
}
@media only screen and (min-width: 1200px) {
    .item-carga-imagen , .archivo-multimedia , .video-multimedia{
        height: 130px;
    }
    #contenedor-carga{
        height: 400px;
        overflow-y: scroll;
    }
    .img-tabla{
        width: 80%;
        height: 150px;
    }
    .capa{
        width: 90%;
        height: 130px; 
    }
    .video-tabla{
        width: 80%;
    }
}
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="plantilla/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="plantilla/assets/css/azzara.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="plantilla/assets/css/demo.css">
</head>
<body class="user" id="<?php echo $window ?>">
    <div class="wrapper">
        <!--
                Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
        -->
        <div class="main-header" style="background:#283b62">
            <!-- Logo Header -->
            <div class="logo-header" style="background:white; border-bottom:1px solid #283b62">
                
                <a href="index.html" class="logo">
                    <img src="http://localhost/fupdeco/plantilla/globales/img/logo.png" alt="navbar brand" class="navbar-brand" style="width:170px">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">
                
                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        
                    </div>
                    
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner" style="background:#283b62; color:white">
                <div class="sidebar-content">
                    <div class="user">
                        
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                   
                                    <span class="user-level" style="color:white"><?php echo $_SESSION['administrador']; ?></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                   
                                    <li>
                                        <a href="logout.php">
                                            <span class="link-collapse">Salir</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav">
                       
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Administrador</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Multimedia</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-multimedia" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear elemento</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-multimedia" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Listar Elementos</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Programas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-programa" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Programas</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-programas" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Listar Programas</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Funcionarios</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-funcionario" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Funcionario</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-funcionarios" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver Funcionarios</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Aliados</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-aliado" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear aliado</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-aliados" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver aliados</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Publicaciones</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-publicacion" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Publicación</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-publicaciones" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver publicaiones</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Galería</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-galeria" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Album</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-albumnes" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver Albumnes</span>
                                        </a>
                                    </li>

                                    <li id="btn-crear-imagen-galeria" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Foto</span>
                                        </a>
                                    </li>

                                     <li id="btn-listar-imagen-galeria" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver Fotos</span>
                                        </a>
                                    </li>
                                    
                                                                   </ul>
                            </div>
                        </li>


                         <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Slider</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-slider" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Banner</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-slider" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver Banners</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a data-toggle="collapse" href="" class="modulo">
                                <i class="fas fa-layer-group"></i>
                                <p>Contactos</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li id="btn-crear-solicitud" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Crear Contacto</span>
                                        </a>
                                    </li>
                                    <li id="btn-listar-solicitud" style="list-style: none">
                                        <a href="#" disabled>
                                            <span class="sub-item">Ver Contactos</span>
                                        </a>
                                    </li>
                                                                   </ul>
                            </div>
                        </li>
                        
                       
                       
                        
                        
                        
                        
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">PANEL DE ADMINISTRACIÓN</h4>
                    </div>
                    <div class="page-category" id="contenedor-dinamico">Starter Description</div>
                </div>
            </div>
            
        </div>
        
    </div>
    <!--   Core JS Files   -->
    <script src="plantilla/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="plantilla/assets/js/core/popper.min.js"></script>
    <script src="plantilla/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="plantilla/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="plantilla/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="plantilla/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="plantilla/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="plantilla/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="plantilla/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="plantilla/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="plantilla/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="plantilla/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="plantilla/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="plantilla/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="plantilla/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="plantilla/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="plantilla/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Azzara JS -->
    <script src="plantilla/assets/js/ready.min.js"></script>
    <script src="plantilla/js/enrutador.js"></script>
    <script>
        
    </script>
</body>
</html>