<?php

class ContactoModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

   

    public function consultar_departamento($departamento){
        $this->db->select('*');
   

        $this->db->from('departamentos');
    
        $this->db->where('id_departamento', $departamento);
         
    
    
        $query = $this->db->get();
     return $query-> result();
    }


    public function consultar_municipio($municipio){
        $this->db->select('*');
   

        $this->db->from('municipios');
    
        $this->db->where('id_municipio', $municipio);
         
    
    
        $query = $this->db->get();
     return $query-> result();
    }

    public function procesar_contacto_index($nombre_contacto , $tipo_documento , $numero_identificacion, $telefono, $dep , $mun ,$correo , $consulta){
       $dia = date("d");
       $mes = date("m");
        $year = date("y");

      $fecha = $dia."-".$mes."-20".$year;
     
    	$this-> db -> insert("contacto" , ["nombre_contacto" => $nombre_contacto,"tipo_documento" => $tipo_documento , "numero_idemtificacion" => $numero_identificacion , "telefono" => $telefono , "correo" => $correo , "departamento"=> $dep , "municipio" => $mun , "consulta" => $consulta , "fecha_creacion"=>$fecha]);
    }

}