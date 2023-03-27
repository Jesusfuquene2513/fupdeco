<?php

class ServiciosModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

    public function consultar_servicios_globales(){



 $this->db->select('*');
   

    $this->db->from('programas');

   
     


    $query = $this->db->get();
 return $query-> result();



    }
    
    
	public function consultar_id_asesor($asesor)
	{
		$this->db->select('asesor_id');


		$this->db->from('asesor');

		$this->db->where('usuario', $asesor);



		$query = $this->db->get();
		return $query-> result();
    }

    public function consultar_servicios($asesor){



 $this->db->select('*');
   

    $this->db->from('asesor_servicios');

    $this->db->where('asesor_id', $asesor);
     


    $query = $this->db->get();
 return $query-> result();



    }


    public function consultar_servicios_cliente(){



      $this->db->select('*');
        
     
         $this->db->from('programas');
     
       
          
     
     
         $query = $this->db->get();
      return $query-> result();
     
     
     
         }


         public function consultar_servicios_cliente_select(){



            $this->db->select('*');
              
           
               $this->db->from('programas');
           
             
                
           
           
               $query = $this->db->get();
            return $query-> result();
           
           
           
               }

               public function actualizar_precio($programa_id){
                  $this->db->from('programas');

                  $this->db->where('nombre_programa', $programa_id);
                   
              
              
                  $query = $this->db->get();
               return $query-> result();

               }
               

               public function buscador($busqueda){
$this->db->select('*');
        
     
         $this->db->from('programas');

          

           $this->db->like('nombre_programa', $busqueda , 'after');
     
       
          
     
     
         $query = $this->db->get();
      return $query-> result();
               }
               
			   
   

}