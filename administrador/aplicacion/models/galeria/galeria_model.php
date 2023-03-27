<?php
include_once "../../models/conexion/conexion.php";
class Galeria_model{

	public function crear_album($nombre_album , $portada , $descripcion){

		 $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO album (nombre_album , contenido ,  portada ,  fecha_creacion)  VALUES (:album , :descripcion , :portada , now())");
       
        $sentencia->bindParam(':album', $nombre_album);
        $sentencia->bindParam(':portada', $portada);
        $sentencia->bindParam(':descripcion', $descripcion);
       
       

        $sentencia->execute();

	}

	public function listar_albumnes(){
		  $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `album`";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;
	}

	public function consultar_data_album($album_id){
		 $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `album` WHERE album_id = '".$album_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement; 
	}

	public function editar_album($nombre_album , $album_id ,$descripcion , $portada){
		 $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("UPDATE album SET nombre_album=:nombre_album , contenido=:contenido , portada=:portada ,   fecha_creacion=now() WHERE album_id = :album_id ");
        $sentencia->bindParam(':nombre_album', $nombre_album);
        $sentencia->bindParam(':album_id', $album_id);
        $sentencia->bindParam(':contenido', $descripcion);
        $sentencia->bindParam(':portada', $portada);
       

        $sentencia->execute();
	}


        public function crear_alemento_album($elemento_nombre , $album_id , $portada){
           $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO elementos_galeria (album_id , elemento_nombre , portada ,  fecha_creacion)  VALUES (:album_id , :elemento_nombre , :portada , now())");
       
        $sentencia->bindParam(':elemento_nombre', $elemento_nombre);
        $sentencia->bindParam(':album_id', $album_id);
         $sentencia->bindParam(':portada', $portada);
       
       

        $sentencia->execute();      
        }


        public function listar_elementos_galeria(){
           $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM elementos_galeria";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  
        }

        public function consultar_album_nombre($album){
         $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT nombre_album FROM `album` WHERE album_id = '".$album."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;     
        }

        public function consultar_data_elementos_galeria($elemento_id){
          $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `elementos_galeria` WHERE elemento_id = '".$elemento_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;    
        }

        public function editar_elemento_galeria_album($elemento_id , $album_id , $elemento_nombre , $portada){
         $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("UPDATE elementos_galeria SET  album_id=:album_id ,   elemento_nombre=:elemento_nombre , portada=:portada ,   fecha_creacion=now() WHERE elemento_id = :elemento_id ");
        $sentencia->bindParam(':elemento_nombre', $elemento_nombre);
        $sentencia->bindParam(':album_id', $album_id);
            $sentencia->bindParam(':elemento_id', $elemento_id);
             $sentencia->bindParam(':portada', $portada);
       

        $sentencia->execute();   
        }

        public function eliminar_elemento_galeria($elemento_id){
             $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();   
        $sentencia = $pdo->prepare("DELETE FROM elementos_galeria WHERE elemento_id = :elemento_id");
       
        $sentencia->bindParam(':elemento_id', $elemento_id);  
        $sentencia->execute(); 
        }

        public function eliminar_elemento_galeria_primario($album_id){
$instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();   
        $sentencia = $pdo->prepare("DELETE FROM elementos_galeria WHERE album_id = :album_id");
       
        $sentencia->bindParam(':album_id', $album_id);  
        $sentencia->execute();
        }

        public function eliminar_album($album_id){
          $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();   
        $sentencia = $pdo->prepare("DELETE FROM album WHERE album_id = :album_id");
       
        $sentencia->bindParam(':album_id', $album_id);  
        $sentencia->execute();  
        }

        public function listar_elementos_album_visor($album_id){
         $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `elementos_galeria` WHERE album_id = '".$album_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;   
        }

        public function listar_albumnes_front_page($album_id){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        
        $query = "SELECT * FROM `elementos_galeria` WHERE album_id = '".$album_id."'  ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  
        }

         public function listar_elementos_galeria_front_page($filtro){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        
        
        if($filtro == 1){

            $query = "SELECT * FROM `album` ORDER BY album_id asc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }

        if($filtro == 2){

            $query = "SELECT * FROM `album` ORDER BY album_id asc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }

        if($filtro == 3){

            $query = "SELECT * FROM `album` ORDER BY album_id desc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }

        if($filtro == 4){

            $query = "SELECT * FROM `album` ORDER BY album_id desc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }

         if($filtro == 5){

            $query = "SELECT * FROM `album` ORDER BY album_id asc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }

        if($filtro == 6){

            $query = "SELECT * FROM `album` ORDER BY album_id desc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  

        }
        }

        public function elemento_random_album($id_album){
          $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        
        $query = "SELECT * FROM `elementos_galeria` WHERE album_id = '".$id_album."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;    
        }
}
?>