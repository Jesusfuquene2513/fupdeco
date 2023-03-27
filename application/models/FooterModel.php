<?php

class FooterModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

    public function consultar_departamentos(){

 $query = $this -> db -> get('departamentos');
 return $query-> result();



    }

    public function consultar_municipios($departamento){

 $this->db->select('*');
   

    $this->db->from('municipios');

    $this->db->where('departamento_id', $departamento );


    $query = $this->db->get();
 return $query-> result();
    



    }

}