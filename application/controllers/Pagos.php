<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {

	public function __construct(){
        parent::__construct();
       $this-> load->model("PagoModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		
		$this->load->view('vistas/formas_pago');

	}

	public function crear_ahorro(){
		extract($_POST);
		print_r($_POST);
	}


	public function actualizar_enlace_pago(){

		extract($_POST);
		$resultado = $this -> PagoModel -> actualizar_enlace_pago($servicio_arg);

		foreach($resultado as $boton_servicio){

			echo "<center>".$boton_servicio->enlace_pago."</center>";

			echo "<script>
			$('#payu-btn').children('center').children('a').attr('title','Paga con Payu ".$servicio_arg."');
			</script>";
		}
	}


	

	

	

    

















}
