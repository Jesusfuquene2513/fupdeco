<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("BlogModel");
		
        $this-> load-> helper(array('form','url'));
    }
	public function index()
	{
		$this->load->view('vistas/publicacion');
	}
    
    
    public function cargar_publicaciones(){
       
        $resultado = $this -> BlogModel -> cargar_publicaciones_blog();
        
        foreach($resultado as $blog){
            
           echo '<div class="col-md-6 col-lg-6 wow fadeInUp publicacion album" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;" id="13">
                    <div class="service-item rounded overflow-hidden" style="background:white">
                        <img class="img-fluid imagen-archivo" src="'.$blog->portada.'" alt="" id="'.$blog->tipo_elemento.'">
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                               <img src="http://localhost/fup/plantilla_front/img/marca.png" style="width:90%">
                            </div>
                            <h4 class="mb-3" style="border-left:10px solid #e3221c; padding-left: 3px;
                             ">'.$blog->titulo.'</h4>
                            <p style=" text-align: justify; color:black; line-height:30px; font-weight:bolder">'.$blog->contenido.'</p>
                            <h6 class="mb-3" style="border-left:10px solid #e3221c; padding-left: 3px;
                             ">'.$blog->fecha_creacion.'</h6>
                          
                        </div>
                    </div>
                </div>'; 
        }
        
    }

	
}
