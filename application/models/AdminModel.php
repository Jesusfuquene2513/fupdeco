<?php

class AdminModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

    public function validar_login($usuario , $clave ){

 $this->db->select('*');
   

    $this->db->from('usuarios');

    $this->db->where('usuario', $usuario);
      $this->db->where('clave', $clave);


    $query = $this->db->get();
 return $query-> result();
    



    }

}