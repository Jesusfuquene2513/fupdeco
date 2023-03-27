<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("LoginModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		 
        $this->load->view('vistas/panel');   
	}

    public function notificacion(){
        $this->load->view('vistas/notificacion');  
    }

	
}
