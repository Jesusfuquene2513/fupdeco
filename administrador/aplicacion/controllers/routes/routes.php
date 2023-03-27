<?php
session_start();
error_reporting(1);
include_once "../login/login_controller.php";
include_once "../multimedia/multimedia_controller.php";
include_once "../funcionario/funcionario_controller.php";
include_once "../blog/blog_controller.php";
include_once "../programas/programa_controller.php";
include_once "../slider/slider_controller.php";
include_once "../contacto/contacto_controller.php";
include_once "../aliados/aliado_controller.php";
include_once "../galeria/galeria_controller.php";

extract($_POST);
extract($_GET);

switch ($peticion) {

    case '1':
        $instancia = new Login_controller();
        $peticion_login = $instancia->login_validation($usuario, $clave);
        
        break;

    case '2':
        $instancia = new Multimedia_controller();

        //Si se quiere subir una imagen
        if (isset($_POST['subir'])) {

            //print_r($_POST);
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['archivo']['name'];
            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {
                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];
                $temp = $_FILES['archivo']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000))) {
                    echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    if (move_uploaded_file($temp, '../../biblioteca/multimedia/' . $archivo)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('../../biblioteca/multimedia/' . $archivo, 0777);
                        $ruta_bd = "../../biblioteca/multimedia/" . $archivo;
                        $instancia = new Multimedia_controller();
                        $peticion = $instancia->subir_imagen_interna($nombre_elemento, $ruta_bd, $tipo_elemento);
                        //Mostramos el mensaje de que se ha subido co éxito

                        echo "<script>
             alert('Imagen interna subida correctamente');
             window.location.href = '../../../dashboard.php?window=2';
             </script>";

                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            }
        }

        break;

    case '3':
        $instancia = new Multimedia_controller();
        $peticion = $instancia->listar_archivos_multimedia();
        foreach ($peticion as $archivo) {
            echo '<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 mt-2 mb-2 archivo-multimedia">
         <img src="' . $archivo['ruta_bd'] . '" alt=""
             style="width:100%; height:100%" class="imagen-archivo" id="' . $archivo['tipo_elemento'] . '">

     </div>

     ';

        }
        break;

    case '4':
        $instancia = new Multimedia_controller();
        $tipo_elemento = 2;
        $peticion = $instancia->subir_imagen_interna($nombre_elemento, $ruta_externa, $tipo_elemento);

        echo "<script>
             alert('Imagen externa subida correctamente');
             window.location.href = '../../../dashboard.php?window=2';
             </script>";

        break;

    case '5':
        $instancia = new Multimedia_controller();
        $tipo_elemento = 3;
        $peticion = $instancia->subir_video_externo($nombre_elemento, $ruta_externa, $tipo_elemento);
        echo "<script>
             alert('Video externo subido Correctamente');
             window.location.href = '../../../dashboard.php?window=2';
             </script>";
        break;

    case '6':
        $instancia = new Multimedia_controller();
        $peticion = $instancia->listar_archivos_multimedia();
        foreach ($peticion as $archivo) {
            echo '<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 mt-2 mb-2 item-carga-imagen" style="position:relative">
                <img src="' . $archivo['ruta_bd'] . '"
                    alt="" style="width:100%; height:100%" class="imagen-archivo" id="' . $archivo['tipo_elemento'] . '">
                   <div style="height:100%; position:absolute; top:0;" class="capa"></div>
            </div>';

        }
        break;

    case '7':
      
        $instancia = new Funcionario_controller();
        $peticion = $instancia->crear_funcionario($nombre_funcionario, $cargo, $foto_perfil , $orden);
        echo "<script>
             alert('Funcionario Creado Correctamente');
             window.location.href = '../../../dashboard.php?window=4';
             </script>";

        break;

    case '8':

        $instancia = new Funcionario_controller();
        $peticion = $instancia->listar_funcionarios();
        foreach ($peticion as $funcionario) {

            echo ' <tr >
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $funcionario['orden'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $funcionario['nombre_funcionario'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $funcionario['cargo'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $funcionario['fecha_creacion'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $funcionario['foto_perfil'] . '"  class="img-tabla"></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-funcionario" title="' . $funcionario['funcionario_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal" data-bs-whatever="@getbootstrap">Editar</button></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-funcionario" title="' . $funcionario['funcionario_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar">Eliminar</button></td>
            </tr>';

        }

        break;

    case '9':
        $instancia = new Funcionario_controller();
        $peticion = $instancia->consultar_funcionario_editar($funcionario_id);
        foreach ($peticion as $funcionario) {

            echo "<span id='funcionario_id'>" . $funcionario['funcionario_id'] . "</span>";
            echo "<span id='nombre_funcionario'>" . $funcionario['nombre_funcionario'] . "</span>";
            echo "<span id='cargoo'>" . $funcionario['cargo'] . "</span>";
            echo "<span id='foto_perfil'>" . $funcionario['foto_perfil'] . "</span>";
            echo "<span id='orden_funcionario'>" . $funcionario['orden'] . "</span>";

        }
        echo '<script>
                var id_funcionario = $("#funcionario_id").text();
                var nombre_funcionario = $("#nombre_funcionario").text();
                var cargo = $("#cargoo").text();
                var foto_perfil = $("#foto_perfil").text();
                var orden = $("#orden_funcionario").text();

                $("#nombre").val(nombre_funcionario);
                $("#cargo").val(cargo);
                $("#id").val(id_funcionario);
                $(".foto-sel , #ruta-visible").val(foto_perfil);
                $("#orden").val(orden);
                </script>';
        break;

    case '10':
      
        $instancia = new Funcionario_controller();
        $peticion = $instancia->editar_funcionario($nombre_funcionario, $cargo, $foto_perfil, $funcionario_id , $orden);
        echo "<script>
             alert('Funcionario Editado Correctamente');
            window.location.href = '../../../dashboard.php?window=4';
            </script>";
        break;

    case '11':
       
        $instancia = new Funcionario_controller();
        $peticion = $instancia->eliminar_funcionario($funcionario_id);
        echo "<script>
             alert('Funcionario Eliminado Correctamente');
            window.location.href = '../../../dashboard.php?window=4';
            </script>";

        break;

    case '12':
     

        $instancia = new Blog_controller();
        $peticion = $instancia->crear_blog($titulo, $contenido, $portada, $tipo_archivo_sel);
        echo "<script>
             alert('Publicación creada correctamente');
            window.location.href = '../../../dashboard.php?window=6';
            </script>";
        break;

    case '13':
        $instancia = new Blog_controller();
        $peticion = $instancia->listar_publicaciones();
        foreach ($peticion as $publicacion) {
            echo ' <tr >
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $publicacion['blog_id'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $publicacion['titulo'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><textarea class="form-control m-auto" style="width:100%; height:130px; resize:none" disabled>' . $publicacion['contenido'] . '</textarea></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $publicacion['portada'] . '"  class="img-tabla " id="' . $publicacion['tipo_elemento'] . '"></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $publicacion['fecha_creacion'] . '</td>

                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-publicacion" title="' . $publicacion['blog_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-editar-publicacion" data-bs-whatever="@getbootstrap">Editar</button></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-publicacion" title="' . $publicacion['blog_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar-publicacion">Eliminar</button></td>
            </tr>';

        }

        break;

    case '14':
        $instancia = new Blog_controller();
        $peticion = $instancia->consultar_publicacion_editar($publicacion_id);
        foreach ($peticion as $publicacion) {

            echo '<span id="blog_id">' . $publicacion['blog_id'] . '</span>';
            echo '<span id="titulo_blog">' . $publicacion['titulo'] . '</span>';
            echo '<span id="contenido_blog">' . $publicacion['contenido'] . '</span>';
            echo '<span id="portada_blog">' . $publicacion['portada'] . '</span>';
            echo '<span id="tipo_archivo">' . $publicacion['tipo_elemento'] . '</span>';
        }

        echo '<script>

        var id_blog = $("#blog_id").text();
        $("#blog-id").val(id_blog);

        var titulo_blog = $("#titulo_blog").text();
        $("#titulo-blog").val(titulo_blog);

        var contenido_blog = $("#contenido_blog").text();
        $("#contenido-blog").text(contenido_blog);

        var portada_blog = $("#portada_blog").text();

        $("#ruta-seleccionada , #ruta-visible").val(portada_blog);

        var tipo_elemento_publicacion = $("#tipo_archivo").text();
        $(".tipo-archivo-sel").val(tipo_elemento_publicacion);



        </script>';
        break;

    case '15':

        
        $instancia = new Blog_controller();
        $peticion = $instancia->editar_publicacion($titulo, $contenido, $portada, $blog_id, $tipo_archivo_sel);
        echo "<script>
            alert('Publicación Editada correctamente');
           window.location.href = '../../../dashboard.php?window=6';
           </script>";

        break;

    case '16':
        print_r($_POST);
        $instancia = new Blog_controller();
        $peticion = $instancia->eliminar_publicacion($blog_id);
        echo "<script>
                alert('Publicación Eliminada correctamente');
               window.location.href = '../../../dashboard.php?window=6';
               </script>";
        break;

    case '17':
     

        $instancia = new Programa_controller();
        $peticion = $instancia->crear_programa($nombre_programa, $contenido_programa, $portada_programa , $precio , $enlace_pago);
        echo "<script>
                alert('Programa creado correctamente');
               window.location.href = '../../../dashboard.php?window=8';
               </script>";

        break;

    case '18':
        $instancia = new Programa_controller();
        $peticion = $instancia->listar_programas();
        foreach ($peticion as $programa) {
            echo ' <tr >
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $programa['programa_id'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $programa['nombre_programa'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><textarea class="form-control m-auto" style="width:100%; height:130px; resize:none" disabled>' . $programa['contenido_programa'] . '</textarea></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $programa['portada_programa'] . '"  class="img-tabla "></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $programa['fecha_creacion'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">$ ' . $programa['precio'] . '</td>
                                <td class="text-center btn-payu" style="vertical-align: middle; border:solid 0.5px gray">' . $programa['enlace_pago'] . '</td>

                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-programa" title="' . $programa['programa_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-editar-programa" data-bs-whatever="@getbootstrap">Editar</button></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-programa" title="' . $programa['programa_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar-programa">Eliminar</button></td>
                            </tr>';

        }

        break;

    case '19':

      
        $instancia = new Programa_controller();
        $peticion = $instancia->listar_programa_edicion($programa_id);
        foreach ($peticion as $programa) {

            echo '<span id="programa-id">' . $programa['programa_id'] . '</span>';
            echo '<span id="programa-nombre">' . $programa['nombre_programa'] . '</span>';
            echo '<span id="programa-contenido">' . $programa['contenido_programa'] . '</span>';
            echo '<span id="programa-portada">' . $programa['portada_programa'] . '</span>';
            echo '<span id="precio">' . $programa['precio'] . '</span>';

            echo '<span id="enlace-payu">' . $programa['enlace_pago'] . '</span>';

        }

        echo '<script>
                            var id_programa = $("#programa-id").text();
                            $("#id-programa").val(id_programa);

                            var nombre_programa = $("#programa-nombre").text();
                            $("#nombre-programa").val(nombre_programa);

                            var contenido_programa = $("#programa-contenido").text();
                            $("#contenido-programa").text(contenido_programa);

                            var portada_programa = $("#programa-portada").text();

                            $("#ruta-seleccionada , #ruta-visible").val(portada_programa);

                            var price = $("#precio").text();
                            $("#precio-producto").val(price);

                            var pago = $("#enlace-payu").html();
                            $("#payu").val(pago);
                       
                          


                            </script>';
        break;

    case '20':
        $instancia = new Programa_controller();
      
        $peticion = $instancia->editar_programa($nombre_programa, $contenido_programa, $portada_programa, $programa_id , $precio , $enlace_pago);
        echo "<script>
                                alert('Programa Editado correctamente');
                               window.location.href = '../../../dashboard.php?window=8';
                               </script>";
        break;

    case '21':
      
        $instancia = new Programa_controller();
        $peticion = $instancia->eliminar_programa($programa_id);
        echo "<script>
                                    alert('Programa Eliminado correctamente');
                                   window.location.href = '../../../dashboard.php?window=8';
                                   </script>";
        break;

    case '22':

      

        $instancia = new Slider_controller();
        $peticion = $instancia->crear_banner($nombre_banner, $portada , $encabezado , $cuerpo);
        echo "<script>
                                        alert('Banner creado correctamente');
                                        window.location.href = '../../../dashboard.php?window=10';
                                        </script>";

        break;
    case '23':

        $instancia = new Slider_controller();
        $peticion = $instancia->listar_banners();
        foreach ($peticion as $banner) {
            echo ' <tr >
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $banner['slider_id'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $banner['slider_nombre'] . '</td>
                               
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $banner['slider_imagen'] . '"  class="img-tabla "></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $banner['fecha_creacion'] . '</td>

                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-banner" title="' . $banner['slider_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-editar-banner" data-bs-whatever="@getbootstrap">Editar</button></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-banner" title="' . $banner['slider_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar-banner">Eliminar</button></td>
                            </tr>';

        }

        break;
        case '24':
            $instancia = new Slider_controller();
            $peticion = $instancia -> consulta_banner_edicion($banner_id);
            foreach($peticion as $banner){
                
                echo '<span id="codigo-slider">'.$banner['slider_id'].'</span>';
                echo '<span id="nombre-banner">'.$banner['slider_nombre'].'</span>';
                echo '<span id="imagen-slider">'.$banner['slider_imagen'].'</span>';
                echo '<span id="encabezado">'.$banner['encabezado'].'</span>';
                echo '<span id="cuerpo">'.$banner['cuerpo'].'</span>';

            }

            echo '<script>
            var id_banner = $("#codigo-slider").text();
            $("#id-sli").val(id_banner);

            var nombre_banner = $("#nombre-banner").text();
            $("#banner-nom").val(nombre_banner);

            var imagen_banner = $("#imagen-slider").text();
            $("#ruta-seleccionada , #ruta-visible").val(imagen_banner);


            var encabezado_slider = $("#encabezado").text();

            $("#encabezado-slider").val(encabezado_slider);

            var cuerpo_slider = $("#cuerpo").text();

            $("#cuerpo-slider").val(cuerpo_slider);
            </script>';
            break;

            case '25':
               
                $instancia = new Slider_controller();
                $peticion = $instancia->editar_banner($nombre_banner, $portada , $slider_id , $encabezado , $cuerpo);

                echo "<script>
                alert('Banner editado correctamente');
                window.location.href = '../../../dashboard.php?window=10';
                </script>";
              
                
                break;

                case '26':

                    $instancia = new Contacto_controller();
                    $peticion = $instancia -> listar_departamentos();
                    echo "<option value='0' selected>Seleccione un Departamento</option>";
                    foreach($peticion as $departamento){
                        echo '<option value="'.$departamento['id_departamento'].'">'.$departamento['departamento'].'</option>';
                    }
                    break;

                    case '27':
                        $instancia = new Contacto_controller();
                        $peticion = $instancia -> listar_municipios($departamento); 
                        echo "<option value='0' selected>Seleccione un Municipio</option>";
                        foreach($peticion as $municipio){
                            echo '<option value="'.$municipio['id_municipio'].'">'.$municipio['municipio'].'</option>';
                        }
                        break;

                        case '28':
                         

                            $instancia = new Contacto_controller();
                            $peticion = $instancia -> crear_contacto($nombre_contacto , $tipo_documento , $numero_identificacion , $telefono , $correo , $departamento , $municipio , $consulta );
                            echo "<script>
                alert('Contacto Creado Correctamente');
                window.location.href = '../../../dashboard.php?window=12';
                </script>";
                            break;

                            case '29':
                               
                                $instancia = new Contacto_controller();
                                $peticion = $instancia -> listar_contactos();
                                foreach($peticion as $contacto){
echo '<tr>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['contacto_id'] . '</td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['nombre_contacto'] . '</td>
<td class="text-center doc" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['tipo_documento'] . '</td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['numero_idemtificacion'] . '</td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['telefono'] . '</td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['correo'] . '</td>
<td class="text-center dep" style="vertical-align: middle; border:solid 0.5px gray" id="dep-'.$contacto['departamento'].'">' . $contacto['departamento'] . '</td>
<td class="text-center mun" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['municipio'] . '</td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><textarea class="form-control" style="width:90%; height: 130px; resize:none" disabled>' . $contacto['consulta'] . '</textarea></td>
<td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $contacto['fecha_creacion'] . '</td>
</tr>';
                                }


                               
                                break;
                                case '30':
                                   
                                    $instancia = new Contacto_controller();
                                    $peticion = $instancia -> data_departamento($departamento_id);
                                    foreach($peticion as $departamento){

                                        echo '<span class="dep-con" style="display:block">'.$departamento['departamento'].'</span>';

                                    }

                                    
                                    break;

                                    case '31':
                                   
                                           $instancia = new Slider_controller();
                                           $peticion = $instancia->listar_banners();

                                    foreach($peticion as $slider){

                                        echo ' <div class="carousel-item img-car ">
      <img src="'.$slider['slider_imagen'].'" class="d-block w-100 " alt="...">
    </div>';

                                    }

                                    
                                    break;

                                     case '32':
                                   
                                           $instancia = new Funcionario_controller();
        $peticion = $instancia->listar_funcionarios();

                                    foreach($peticion as $funcionario){

                                        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 p-1 m-auto" style="float:left">
    <div class="card p-1">
      <img src="'.$funcionario['foto_perfil'].'" alt="Jane" style="width:100%" class="img-team">
      <div class="container p-0">
        <h4 class="nombre">'.$funcionario['nombre_funcionario'].'</h4>
        <p class=" cargo">'.$funcionario['cargo'].'</p>
       
      </div>
    </div>
  </div> ';

                                    }

                                    
                                    break;

                                    case '33':
                                   
                                          $instancia = new Programa_controller();
        $peticion = $instancia->listar_programas();

                                    foreach($peticion as $programa){

                                        echo '<div class="row col-xl-10 col-lg-10 col-md-11 m-auto servicio">
            <div class="col-xl-6 col-lg-6 col-md-6 img-servicio-contenedor p-0" style="position:relative">
              <img src="'.$programa['portada_programa'].'" alt="" class=" img-servicio">
              <div class="publicidad" style="width:100%;  align-items: center; display: table; position:absolute; top:0; background:#c3141c; color:white; font-style: oblique; font-weight:bolder; padding-left:3px;">
                <span class="c" style="margin:auto; color:white">PROGRAMA DE FORTALECIMIENTO EMPRESARIAL</span>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 servicio-informacion-contenedor">
              <span class="nombre-servicio">'.$programa['nombre_programa'].'</span>
              <br>
              <p class="parrafo-servicio">
               '.$programa['contenido_programa'].'
              </p>
              <hr style="color:white">
              <button type="button" id="'.$programa['nombre_programa'].'" style="display:inline" class="btn btn-primary btn-solicitar">Solicitar</button>
            </div>
          </div>
          <br>';

                                    }

                                    
                                    break;


                                    case '34':
                                   
                                         $instancia = new Blog_controller();
        $peticion = $instancia->listar_publicaciones();

                                    foreach($peticion as $publicacion){

                                        echo '<div class="col" >
          <div class="card shadow-sm">
            <img src="'.$publicacion['portada'].'" class="img-fluid elemento-blog" title="'.$publicacion['tipo_elemento'].'">

            <div class="card-body" style="max-height:400px; overflow-y: scroll">
            <h4 style="color:black">'.$publicacion['titulo'].'</h4>
              <p class="card-text parrafo">'.$publicacion['contenido'].'</p>
              <div class="d-flex justify-content-between align-items-center">
                
                <small class="text-light p-1" style="background:rgba(195,20,28,1); color:white">'.$publicacion['fecha_creacion'].'</small>
              </div>
            </div>
          </div>
        </div>';

                                    }

                                    
                                    break;


                                    case '35':
                            //print_r($_POST);

                            $instancia = new Contacto_controller();
                            $peticion = $instancia -> crear_contacto($nombre_contacto , $tipo_documento , $numero_identificacion , $telefono , $correo , $departamento , $municipio , $consulta );
                            echo "<script>
                alert('Pronto nos comunicaremos contigo');
               window.location.href = '../../../home.php';
                </script>";
                            break;

                            case '36':

                           // print_r($_POST);

                            $instancia = new Aliado_controller();
                            $peticion = $instancia -> crear_aliado($aliado , $portada);
                              echo "<script>
                alert('Aliado Creado Correctamente');
                window.location.href = '../../../dashboard.php?window=14';
                </script>";

                            break;

                            case '37':
 $instancia = new Aliado_controller();
        $peticion = $instancia->listar_aliados();
        foreach ($peticion as $aliado) {
            echo ' <tr >
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $aliado['aliado_id'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $aliado['aliado'] . '</td>
                               
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $aliado['portada'] . '"  class="img-tabla "></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $aliado['fecha_creacion'] . '</td>

                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-aliado" title="' . $aliado['aliado_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-editar-aliado" data-bs-whatever="@getbootstrap">Editar</button></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-aliado" title="' . $aliado['aliado_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar-aliado">Eliminar</button></td>
                            </tr>';

        }
        break;

        case '38':
 $instancia = new Aliado_controller();
 $peticion = $instancia -> consultar_aliado_edicion($aliado_id);
 foreach($peticion as $aliado){

    echo '<span id="codigo-aliado">'.$aliado['aliado_id'].'</span>';
    echo '<span id="nombre-aliado">'.$aliado['aliado'].'</span>';
    echo '<span id="portada-aliado">'.$aliado['portada'].'</span>';

 }

 echo '<script>
var aliado_id = $("#codigo-aliado").text();
var aliado = $("#nombre-aliado").text();
var portada_aliado = $("#portada-aliado").text();

$("#id-ali").val(aliado_id);
$("#aliado-nom").val(aliado);
$("#ruta-seleccionada , #ruta-visible").val(portada_aliado);
 </script>';

        break;

        case '39':


                            $instancia = new Aliado_controller();
                            $peticion = $instancia -> editar_aliado($aliado , $portada , $aliado_id );
                            echo "<script>
                alert('Aliado Modificado Correctamente');
                window.location.href = '../../../dashboard.php?window=14';
                </script>";
        break;

        case '40':
      

        $instancia = new Aliado_controller();
        $peticion = $instancia -> eliminar_aliado($aliado_id);

         echo "<script>
                alert('Aliado Eliminado Correctamente');
                window.location.href = '../../../dashboard.php?window=14';
                </script>";
        break;

        case '41':

        print_r($_POST);
$instancia = new Slider_controller();
$peticion = $instancia -> eliminar_banner($slider_id);

echo "<script>
                                        alert('Banner Eliminado correctamente');
                                        window.location.href = '../../../dashboard.php?window=10';
                                        </script>";
        break;

        case '42':

        $instancia = new Aliado_controller();
        $peticion = $instancia->listar_aliados();
        foreach($peticion as $aliado){

            echo ' <div class="slide">
          <img src="'.$aliado['portada'].'">
          
        </div>';

        }
        break;

        case '43':

$instancia = new Galeria_controller();
$peticion = $instancia -> crear_album($nombre_album , $portada , $descripcion);
echo "<script>
                                        alert('Album Creado correctamente');
                                       window.location.href = '../../../dashboard.php?window=16';
                                        </script>";
        break;

        case '44':
        $instancia = new Galeria_controller();
        $peticion = $instancia -> listar_albumnes();

         foreach ($peticion as $album) {
            echo ' <tr >
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $album['album_id'] . '</td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $album['nombre_album'] . '</td>
                               
                               
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $album['fecha_creacion'] . '</td>

                                 <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-success btn-visor" title="' . $album['album_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-visor" data-bs-whatever="@getbootstrap" id="'.$album['nombre_album'].'"><i class="fa fa-eye"></i></button></td>

                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-album" title="' . $album['album_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-editar-album" data-bs-whatever="@getbootstrap">Editar</button></td>
                                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-album" title="' . $album['album_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar-album">Eliminar</button></td>
                            </tr>';

        }

        break;

        case '45':

       // print_r($_POST);

        $instancia = new Galeria_controller();
        $peticion = $instancia -> consultar_data_album($album_id);
        foreach($peticion as $album){

            echo '<span id="album-nom1">'.$album['nombre_album'].'</span>';
            echo '<span id="id-al">'.$album['album_id'].'</span>';
            echo '<span id="contenido-album">'.$album['contenido'].'</span>';
            echo '<span id="portada">'.$album['portada'].'</span>';

        }

        echo '<script>
var album_nombre = $("#album-nom1").text();
$("#album-nombre").val(album_nombre);


var id_al = $("#id-al").text();
$("#id-album").val(id_al);


var contenido = $("#contenido-album").text();
$("#contenido").val(contenido);

var portada = $("#portada").text();

$("#ruta-seleccionada , #ruta-visible").val(portada);





        </script>';
        break;

        case '46':

//print_r($_POST);

$instancia = new Galeria_controller();
$peticion = $instancia -> editar_album($nombre_album , $album_id , $descripcion , $portada);
echo "<script>
                                        alert('Album Editado correctamente');
                                        window.location.href = '../../../dashboard.php?window=16';
                                        </script>";
        break;

        case '47':
           $instancia = new Galeria_controller();
        $peticion = $instancia -> listar_albumnes();
        echo '<option value="0" selected>Seleccione un album de destino</option>';
foreach($peticion as $album){

    echo '<option value="'.$album['album_id'].'">'.$album['nombre_album'].'</option>';

}
        break;

        case '48':
     //   print_r($_POST);
 $instancia = new Galeria_controller();

 $peticion = $instancia -> crear_alemento_album($elemento_nombre , $album_id , $portada);

 echo "<script>
                                        alert('Elemento de galeria agregado correctamente');
                                        window.location.href = '../../../dashboard.php?window=18';
                                        </script>";
        break;

        case '49':
 $instancia = new Galeria_controller();
        $peticion = $instancia->listar_elementos_galeria();
        foreach ($peticion as $galeria_elemento) {
$album = $galeria_elemento['album_id'];
            $peticion2 = $instancia -> consultar_album_nombre($album);
            foreach($peticion2 as $nombre_album){

            }
            

            echo ' <tr >
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $galeria_elemento['elemento_id'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $galeria_elemento['elemento_nombre'] . '</td>




                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $nombre_album['nombre_album'] . '</td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><img src="' . $galeria_elemento['portada'] . '"  class="img-tabla"></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray">' . $galeria_elemento['fecha_creacion'] . '</td>
                
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-warning btn-editar-elemento" title="' . $galeria_elemento['elemento_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-elemento" data-bs-whatever="@getbootstrap">Editar</button></td>
                <td class="text-center" style="vertical-align: middle; border:solid 0.5px gray"><button class="btn btn-danger btn-eliminar-elemento" title="' . $galeria_elemento['elemento_id'] . '" style="font-size:12px" data-toggle="modal" data-target="#exampleModal-eliminar">Eliminar</button></td>
            </tr>';

        }

        break;


        case '50':
//print_r($_POST);
$instancia = new Galeria_controller();
$peticion = $instancia -> consultar_data_elementos_galeria($elemento_id);

foreach($peticion as $data_elemento_album){

    echo '<span id="elemento2-id">'.$data_elemento_album['elemento_id'].'</span>';
    echo '<span id="elemento2-album">'.$data_elemento_album['album_id'].'</span>';
    echo '<span id="elemento2-nombre">'.$data_elemento_album['elemento_nombre'].'</span>';
    echo '<span id="elemento2-portada">'.$data_elemento_album['portada'].'</span>';

}

echo '<script>
var id_elemento2 = $("#elemento2-id").text();
$("#id-elemento2").val(id_elemento2);

var origen = $("#elemento2-album").text();

$("#sel-albumnes option[value="+ origen +"]").attr("selected",true);

var ruta_portada = $("#elemento2-portada").text();

$("#ruta-seleccionada , #ruta-visible").val(ruta_portada);

var nom_ele_ga = $("#elemento2-nombre").text();
$("#elemento-imagen-imagen").val(nom_ele_ga);










</script>';
        break;

        case '51':

        
        $instancia = new Galeria_controller();

        $peticion = $instancia -> editar_elemento_galeria_album($elemento_id , $album_id , $elemento_nombre , $portada);

         echo "<script>
                                        alert('Elemento de galeria Editado correctamente');
                                        window.location.href = '../../../dashboard.php?window=18';
                                        </script>";
        break;

        case '52':
        print_r($_POST);
        $instancia = new Galeria_controller();
        $peticion = $instancia -> eliminar_elemento_galeria($elemento_id);
        echo "<script>
                                        alert('Elemento de galeria Eliminado correctamente');
                                        window.location.href = '../../../dashboard.php?window=18';
                                        </script>";
        break;


        case '53':

$instancia = new Galeria_controller();
$peticion1 = $instancia -> eliminar_elementos_album_primario($album_id);
echo "<script>
                                        alert('Album Eliminado Correctamente');
                                        window.location.href = '../../../dashboard.php?window=16';
                                        </script>";
        break;

        case '54':
       // print_r($_POST);
        $instancia = new Galeria_controller();
        $peticion = $instancia -> listar_elementos_album_visor($album_id);
        foreach($peticion as $elementos_album_visor){
 echo '<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 mt-2 mb-2 item-carga-imagen p-1" style="position:relative; float:left">
                <img src="' . $elementos_album_visor['portada'] . '"
                    alt="" style="width:100%; height:100%" class="imagen-archivo">
                  
            </div>';
        }


        break;

        case '55':

      
        $instancia = new Galeria_controller();
        $peticion = $instancia -> listar_albumnes_front_page($album_id);
        foreach($peticion as $album){
            echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 card" style="float:left;" >
          <a href="'.$album['portada'].'" class="swipebox" title="'.$album['elemento_nombre'].'" rel="gallery">
            <img src="'.$album['portada'].'" alt="image" class="img-fluid img-galery" style="width:100%" >
          </a>
        </div>';

        }
        break;

        case '56':

      
        $instancia = new Galeria_controller();
        $peticion = $instancia -> listar_elementos_galeria_front_page($filtro);
        foreach($peticion as $album){





           echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 p-1 "  style="display:table" >
<div style="width:100%; height:100%; background-color: black" id="'.$album['album_id'].'" class="album-random">
<center><span style="color:white">'.$album['album_id'].'</span></center>
</div>

<div class="res" style="color:white; width:100%; height:200px"></div>
           </div>';


        

        }

        echo '<script>
         var valor;
$(".album-random").each(function(index){


   
var id = $(this).attr("id");


$(this).attr("id",index);

$.ajax({
            type: "POST",  // Envío con método POST
            url: "aplicacion/controllers/routes/routes.php",  // Fichero destino (el PHP que trata los datos)
            data: { peticion: 57 , album_id:id
             } // Datos que se envían
        }).done(function (msg2) {  // Función que se ejecuta si todo ha ido bien

           // $(this).next().html(msg);  // Escribimos en el div consola el mensaje devuelto

            
var elemento = document.getElementById(index);

$(elemento).html("<h1>"+msg2+"</h1>");

   






           





           



        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
           // $("#listado-archivos-multimedia").html("The following error occured: " + textStatus + " " + errorThrown);


        });



 


    });

  
        </script>';

        break;

       


        case '57':

      //print_r($_POST);
        $instancia = new Galeria_controller();
       $peticion = $instancia -> elemento_random_album($album_id);

       $acumulador = 0;

        foreach($peticion as $album){


            $acumulador = $acumulador +1;

            echo '<a href="visor.php?album_id='.$album['album_id'].'"><img class="num-random d-none dup" style="display:block; color:white; height:250px; width:100%" title="'.$album['album_id'].'" src="'.$album['portada'].'" id="'.$album['album_id'].'" ></a>';



        }


        echo '
<script>

   
  var albumnes=[];

  $(".num-random").each(function(index){

          id=$(this).attr("id");


          
          albumnes.push(id);

     });

var quitar =  _.uniq(albumnes);

var html = 0;

$.each(quitar, function(indice, value){
     html = value;
  var elemento = document.getElementById(html);
  var id3 = $(elemento).attr("id");

 

 elemento2 = document.getElementById(html);

  $(elemento2).removeClass("d-none");
  $(elemento2).removeClass("d-block");
 

     
     


    });












 


 
</script>
        ';


        

       

        
       

        break;

}
