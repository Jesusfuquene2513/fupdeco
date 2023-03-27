<?php

class SliderModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

    public function cargar_slider(){

 $this->db->select('*');
   

    $this->db->from('slider');

    


    $query = $this->db->get();
 return $query-> result();
    



    }

  

    

 

    

}