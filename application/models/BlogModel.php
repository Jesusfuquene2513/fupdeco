<?php

class BlogModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

    

   


     public function cargar_publicaciones($inferior , $superior){

 $this->db->select('*');
   

    $this->db->from('album');

   
       $this->db->limit(2 , $inferior-1);


    $query = $this->db->get();

 return $query-> result();
    



    }


    public function cargar_publicacion_unica($id){

 $this->db->select('*');
   

    $this->db->from('blog');

   
        $this->db->limit(1,$id);


    $query = $this->db->get();

 return $query-> result();
    



    }


    public function total_publicaciones(){
    	 $this->db->select('*');
    	$this->db->from('album');
$query = $this->db->get();
echo count($query->result()); 
    }


    public function consultar_galeria($album){
        $this->db->select('*');
   

    $this->db->from('elementos_galeria');

    $this->db->where('album_id', $album);
     


    $query = $this->db->get();
 return $query-> result();
    }


    public function consultar_titulo($album){

$this->db->select('nombre_album');
   

    $this->db->from('album');

    $this->db->where('album_id', $album);
     


    $query = $this->db->get();
 return $query-> result();


    }
    
    
    
    
    public function cargar_publicaciones_blog(){
        
     $this->db->select('*');
   

    $this->db->from('blog');

   
     


    $query = $this->db->get();
 return $query-> result();   
    }

  

 

 

    

}