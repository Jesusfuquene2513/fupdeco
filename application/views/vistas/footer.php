    
       <div class="container-fluid  text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s" style="background:#162e70" id="footer">
       <center>
           <h1 class="mb-0" data-toggle="counter-up" style="color:white;"><?php echo $_SESSION["visitantes"]; ?></h1>
           <h3 style="color:white">Visitas</h3>
       </center>
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4"><?php echo  $_SESSION["direccion"] ?></h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $_SESSION["direccion"] ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $_SESSION["telefono"]; ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Mapa del Sitio</h5>
                    <a class="btn btn-link" href="">Inicio</a>
                    
                    <a class="btn btn-link" href="">Programas</a>
                    <a class="btn btn-link" href="">Galería</a>
                    <a class="btn btn-link" href="">Blog</a>
                     <a class="btn btn-link" href="">Contactos</a>
                </div>
                
                <div class="col-lg-6 col-md-12">
                      <h5 class="text-white mb-4">Nuestra Ubicación</h5>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.662999052456!2d-76.54279238476781!3d3.431946952304928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a7673b6d8c77%3A0x97cfd3d57b3d0e70!2sCorporaci%C3%B3n%20Empresarial%20Internacional%20Redepyme!5e0!3m2!1ses!2sco!4v1679925983659!5m2!1ses!2sco" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-12">
                    <?php $this->load->view('vistas/formulario.php'); ?>
                </div>
            </div>
        </div>
       
    </div>
