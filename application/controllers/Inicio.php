<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("LoginModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		 $info['usuario'] = "Usuario_front";
      header('Location: index.php/Home');
	}

	
}
