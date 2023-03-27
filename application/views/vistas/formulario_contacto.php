<form action="Contacto/procesar_contacto_index" method="post">
<div class="row container m-auto   card  p-1" id="footer" style="background: rgb(255 , 255 , 255 , 0.9); ">
   
            <div class="row m-auto" style="color:black">
            
                <div class="col-xl-12 col-lg-11 col-md-12 " style="margin-top:170px">
<div class="row">
   
    <div class="col-xl-12 form-group formulario-campos p-1 mt-1 mb-1" style="text-align: center">   
                <h1  style="color:black" >Formulario de Contacto</h1>
<div class="row">    <div class="form-group col-xl-4 col-lg-6  col-md-4 p-1 mt-1 mb-1 formulario-campos">
                        <label for="" style="">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto">
                        <input type="text" name="peticion" value="35" class="d-none">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-4  p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Tipo Identificación</label>
                        <select name="tipo_documento" id="sel-documento" class="form-control" style="cursor:pointer">
                            <option value="0">Seleccione tipo de identificación</option>
                            <option value="1">Cedula de ciudadania</option>
                            <option value="2">Cedula extranjera</option>
                            <option value="3">Pasaporte</option>
                            <option value="4">NIT</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6  col-md-4 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Numéro de identificación</label>
                        <input type="text" name="numero_identificacion" class="form-control" disabled id="documento">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                   
                     <div class="form-group col-xl-6 col-lg-4 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Seleccione Departamento</label>
                        <select class="form-control" id="sel-departamento" style="cursor:pointer" name="departamento">

                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-lg-4 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Seleccione Municipio</label>
                        <select name="municipio" class="form-control" id="sel-municipio" disabled="disabled" style="cursor:pointer">

                        </select>
                    </div>
                     <div class="form-group col-xl-6 col-lg-4 col-md-6  p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Correo electronico</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <textarea name="consulta" id="consulta" rows="3" class="form-control"
                        style="resize:none; height:150px"></textarea>
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <center>
                            <input type="button" class="btn btn-primary" value="Enviar" id="enviar-peticion-contacto">
                        </center>
                    </div>

                </div>
            </div>
                    
</div>
                    
                </div>
            </div>


        </div>
        <div class="container-fluid p-5 formulario py-5" style="background:#162e70; margin-top: 150px; ">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4"><?php echo  $_SESSION["direccion"] ?></h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $_SESSION["direccion"] ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $_SESSION["telefono"]; ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@fupdeco.org</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href="" style="display:flex; align-items: center"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="" style="display:flex; align-items: center"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="" style="display:flex; align-items: center"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="" style="display:flex; align-items: center"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Mapa del Sitio</h5>
                    <a class="btn btn-link" href="../index.php/Home">Inicio</a>
                    
                    <a class="btn btn-link" href="../index.php/Portafolio">Programas</a>
                    <a class="btn btn-link" href="../index.php/Blog">Galería</a>
                    <a class="btn btn-link" href="../index.php/Publicaciones">Blog</a>
                     <a class="btn btn-link" href="../index.php/Contacto">Contactos</a>
                </div>
                
                <div class="col-lg-6 col-md-12">
                      <h5 class="text-white mb-4">Nuestra Ubicación</h5>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.662999052456!2d-76.54279238476781!3d3.431946952304928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a7673b6d8c77%3A0x97cfd3d57b3d0e70!2sCorporaci%C3%B3n%20Empresarial%20Internacional%20Redepyme!5e0!3m2!1ses!2sco!4v1679925983659!5m2!1ses!2sco" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
            </div>
        </div>
        </form>