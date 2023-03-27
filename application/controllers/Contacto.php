<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("ContactoModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		
        $this->load->view('vistas/contacto');   
	}

    public function procesar_contacto_index(){
        extract($_POST);
        //print_r($_POST);
        $resultado = $this-> ContactoModel -> consultar_departamento($departamento);
        foreach($resultado as $departamento){

            $dep = $departamento->departamento;
        }

        $resultado2 = $this-> ContactoModel -> consultar_municipio($municipio);
        foreach($resultado2 as $municipio){

         $mun = $municipio->municipio;
        }
        $resultado = $this -> ContactoModel -> procesar_contacto_index($nombre_contacto , $tipo_documento , $numero_identificacion, $telefono, $dep , $mun ,$correo , $consulta);

        $instancia = new Contacto();
        $peticion = $instancia -> generar_pdf_usuario($nombre_contacto , $tipo_documento , $numero_identificacion, $telefono, $dep , $mun ,$correo , $consulta);



    }

    public function generar_pdf_usuario($nombre_contacto , $tipo_documento , $numero_identificacion, $telefono, $dep , $mun ,$correo , $consulta){
        $_SESSION['email']  = $correo;
        $_SESSION['user']  = $nombre_contacto;
        $_SESSION['consulta']  = $consulta;
        $_SESSION['dep']  = $dep;
        $_SESSION['mun']  = $mun;
        $_SESSION['CC'] = $numero_identificacion;
        $_SESSION['telefono'] = $telefono;
        
        $this->load->view('vistas/pdf3');   
    
    }

    public function confirmacion_formulario_contacto(){
        $this->load->view('vistas/confirmacion_formulario'); 
    }

	
}
