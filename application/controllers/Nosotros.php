<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	public function __construct(){
        parent::__construct();
      
        $this-> load-> helper(array('form','url'));
    }
	
public function index(){
	$this->load->view('vistas/nosotros');	
	}

	public function sociedades_civiles_afiliadas(){
	$this->load->view('vistas/sociedad_civil_afiliadas');	
	}

	public function sociedades_civiles_asesoradas(){
	$this->load->view('vistas/sociedad_civil_asesoradas');	
	}

	public function acompanamiento(){
	$this->load->view('vistas/acompanamiento');	
	}

		public function creadas(){
	$this->load->view('vistas/creadas');	
	}

	public function proyectos(){
	$this->load->view('vistas/proyectos');	
	}

	public function programas(){
	$this->load->view('vistas/programas');	
	}



	
}
