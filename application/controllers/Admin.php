<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
       $this-> load->model("AdminModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		
		$this->load->view('vistas/login_Admin');

	}

	public function validar_login(){
	 $usuario = $this -> input-> post("correo");
    $clave = $this -> input-> post("clave");

    $resultado = $this -> AdminModel -> validar_login($usuario , $clave );

	if ($resultado) {

		$_SESSION['admin'] = $usuario;

    	echo "<script>
alert('Bienvenido');
	window.location.href = 'dashboard';
    	</script>";

    } else{
    	echo '<script>alert("No existe este usuario");
    	window.location.href = "../Admin"</script>';

    }

	}

	public function dashboard(){
		$this->load->view('vistas/dashboard');	

	}

	

	
}
