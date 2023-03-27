<?php

class TalentoModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

    public function cargar_talentos(){

 $this->db->select('*');
   

    $this->db->from('funcionarios');

    


    $query = $this->db->get();
 return $query-> result();
    



    }

    public function listar_reservas(){
       $this->db->select('*');
   

    $this->db->from('reserva');

    


    $query = $this->db->get();
 return $query-> result(); 
    }

    

 

    

}