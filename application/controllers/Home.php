<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("LoginModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{
		 
        $this->load->view('vistas/home');   
	}
public function pdf()
	{
		 
        $this->load->view('vistas/tabla');   
	}
	
}
