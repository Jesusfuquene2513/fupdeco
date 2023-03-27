<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Talento extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("TalentoModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function index()
	{

               
               
		
        $this->load->view('vistas/talento');   
	}


        


        public function cargar_talentos(){

             $resultado = $this -> TalentoModel -> cargar_talentos();

             foreach($resultado as $funcionario){
 echo ' <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded overflow-hidden card">
                        <div class="d-flex">
                            <img class="img-fluid w-75 talento" src="'.$funcionario->foto_perfil.'" alt="">
                            <div class="team-social w-25">
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="" style="background:#2f7522; color:white; border:none"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="" style="background:#e4201d; color:white; border:none"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="" style="background:#ffde18; color:white; border:none"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5>'.$funcionario->nombre_funcionario.'</h5>
                            <span style="font-style:oblique; color: black">'.$funcionario->cargo.'</span>
                        </div>
                    </div>
                </div>';
             }

        }

	
}