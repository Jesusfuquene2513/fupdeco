<?php

class ClienteModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   
   public function consultar_identificacion($identificacion){
    $this->db->select('*');
   

    $this->db->from('clientes_registrados');

    $this->db->where('identificacion_cliente', $identificacion);
     


    $query = $this->db->get();
 return $query-> result();
   }
    
    public function consultar_identificacion_reserva($identificacion){
    $this->db->select('*');
   

    $this->db->from('cliente');

    $this->db->where('identificacion_cliente', $identificacion);
     


    $query = $this->db->get();
 return $query-> result();
   }
    
    public function consultar_identificacion_tipo_cliente($identificacion){
    $this->db->select('tipo_cliente');
   

    $this->db->from('cliente');

    $this->db->where('identificacion_cliente', $identificacion);
     


    $query = $this->db->get();
 return $query-> result();
   }


public function ultimo_cliente(){
	$query = $this->db->query("SELECT cliente_id FROM cliente");
		$registro = $query->num_rows();
		
		if ($registro == 0) {

			echo 0;
			
		}else{
			$this->db->select_max('cliente_id');
			$this->db->from('cliente');
			$query = $this->db->get();
			return $r=$query->result();	
		}
}
    

   public function consultar_id_definido($documento){
   	 $this->db->select('cliente_id');
   

    $this->db->from('cliente');

    $this->db->where('identificacion_cliente', $documento);
     


    $query = $this->db->get();
 return $query-> result();
   }
    
    
    public function crear_cliente_login( $cliente, $identificacion, $correo, $telefono , $clave ){
        
        $cliente_tipo = "Registrado";
       $this-> db -> insert("clientes_registrados" , ["cliente_nombre" => $cliente , "identificacion_cliente" => $identificacion , "correo"=> $correo , "telefono"=>$telefono , "tipo_cliente" => $cliente_tipo , "clave"=>$clave]);  
    }
    
    
    public function validar_login_cliente($usuario , $clave){
     
		$this->db->select('*');
   

    $this->db->from('clientes_registrados');

    $this->db->where('correo', $usuario);
        
         $this->db->where('clave', $clave);
     


    $query = $this->db->get();
 return $query-> result();
		  
        
    }
    
    
    public function Consultar_documento($usuario , $clave){
      $this->db->select('*');
   

    $this->db->from('clientes_registrados');

    $this->db->where('correo', $usuario);
        
         $this->db->where('clave', $clave);
     


    $query = $this->db->get();
 return $query-> result();  
    }
    
    
    

    

 

 

    

}