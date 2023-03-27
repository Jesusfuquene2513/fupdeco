<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function __construct(){
        parent::__construct();
       $this-> load->model("ContadorModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{


		
		$this->load->view('vistas/pdf');

		

	}


	












}
