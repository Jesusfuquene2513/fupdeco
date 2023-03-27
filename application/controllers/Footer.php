<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("FooterModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function cargar_departamentos()
	{
		
		$resultado = $this -> FooterModel -> consultar_departamentos();
		echo "<option value='0'>Seleccione un departamento</option>";
		foreach($resultado as $row){
			echo "<option value='".$row->id_departamento."'>".$row->departamento."</option>";

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

	
}
