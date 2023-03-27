<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("ServiciosModel");
		$this-> load->model("ContadorModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function cargar_servicios()
	{
		
		$resultado = $this -> ServiciosModel -> consultar_servicios();
		foreach($resultado as $row){
			
			echo '<button class="btn btn-servicio parrafo" data-bs-toggle="modal" data-bs-target="#exampleModal" rel="50000" title="'.$row->nombre_programa.'">'.$row->nombre_programa.'</button>';

		}
		

	}

	public function cargar_servicios_select()
	{
		extract($_POST);
		print_r($_POST);
		$resultado = $this -> ServiciosModel -> consultar_id_asesor($asesor);
		
		foreach ($resultado as $id_asesor) {

			$id = $id_asesor->asesor_id;
			
		}
		$resultado = $this -> ServiciosModel -> consultar_servicios($id);
		echo "<option value='0'>Seleccione un servicio</option>";
		foreach($resultado as $row){
			
			echo '<option value="'.$row->servicio.'">'.$row->servicio.'</option>';

		}
		

	}

	public function cargar_municipios()
	{

extract($_POST);
		
		$resultado = $this -> FooterModel -> consultar_municipios($departamento);
		echo "<option value='0'>Seleccione un municipio</option>";
		foreach($resultado as $row){
			echo "<option value='".$row->id_municipio."'>".$row->municipio."</option>";

		}

	}


	public function cargar_servicios_globales()
	{
		
		$resultado = $this -> ServiciosModel -> consultar_servicios_globales();
		
		foreach($resultado as $row){
			
			echo '<button class="btn servicio-normal" style="margin-top:5px; margin:bottom:5px; background-color:#337ab7; margin-right:5px; margin-bottom:5px; font-weight:bolder" type="button" id="'.$row->programa_id.'">'.$row->nombre_programa.'</button>';

		}
		

	}


	public function cargar_servicios_cliente()
	{
		
		$resultado = $this -> ServiciosModel -> consultar_servicios_cliente();
		foreach($resultado as $row){

			$ruta = $row->portada_programa;
                
                 
                 
                 if (strpos($ruta, 'http') !== false) {
                      $ruta_nueva = $ruta;
   
}else{
                  $ruta_nueva = "../administrador/".$ruta;    
                 }
			
			echo '<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;  text-align: justify;">
                    <div class="service-item rounded overflow-hidden" style="background:white">
                        <img class="img-fluid" src="'.$ruta_nueva.'" alt="">
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                                <img src="http://localhost/fupdeco/plantilla_front/img/marca.png" style="width:90%">
                            </div>
                            <h4 class="mb-3" style="border-left:10px solid #e3221c; padding-left: 3px;
                             ">'.$row ->nombre_programa.'</h4>
                            <p style="color:black;  text-align: justify;">'.$row ->contenido_programa.'</p>
                            <a class="small fw-medium" href="">Ver Programa<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>';

		}
		

	}
	public function cargar_servicios_cliente_select()
	{
		
		$resultado = $this -> ServiciosModel -> consultar_servicios_cliente();
		foreach($resultado as $row){
			
			echo '<option value="'.$row->nombre_programa.'" class="parrafo">'.$row->nombre_programa.'</option>';

		}
		

	}


	public function actualizar_precios(){
extract($_POST);
		$resultado = $this -> ServiciosModel -> actualizar_precio($programa);
		foreach($resultado as $precio){

			echo $precio ->precio;
		}

	}


	public function buscador(){
		extract($_POST);
		

		$resultado = $this -> ServiciosModel ->buscador($busqueda);
		foreach($resultado as $programa){

				echo '<div class="col-lg-4" style="margin-top:5px; margin-bottom:5px">
						<div class="single-icon-box icon-box-img-3 programa" style="background-image: url('.$programa->portada_programa.');">
							<div class="icon-box-content">
								<h6 class="iconbox-content-heading">
									<i class="fa fa-briefcase"></i>'.$programa->nombre_programa.'</h6>
								<div class="iconbox-content-body">
									<p>Organización del departamento contable
	Determinación de funciones de los auxiliares contables
	Contabilidad sistematizada.
	Manejo y liquidación de nómina.
	Facturación y pagos.
	Conciliaciones bancarias.
	</p>
									<a class="btn btn-inline read-more-btn" href="Reserva?codigo_reserva='.$programa->nombre_programa.'&&price='.$programa->precio.'" style="font-size:18px; background:#2ea3f2; padding:10px;">
										<i class="fa fa-shopping-cart"></i> Reservar</a>
								</div>
							</div>
						</div>
                      
					</div>';

		}
	}



    public function exportar_servicios(){

        $this->load->view('vistas/listado_servicios_pdf');   
    }
	
	
	

	
}
