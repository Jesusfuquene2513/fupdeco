<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this-> load->model("SliderModel");
        $this-> load-> helper(array('form','url'));
    }
	

	


        


        public function cargar_slider(){

             $resultado = $this -> SliderModel -> cargar_slider();

             foreach($resultado as $slider){
            
echo '	<div class="carousel-item">
      <img  src="'.$slider->slider_imagen.'" class="d-block w-100 natalia" alt="...">
    </div>';

 
             }

        }

	
}