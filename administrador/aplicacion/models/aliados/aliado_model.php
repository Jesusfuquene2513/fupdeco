<?php
include_once "../../models/conexion/conexion.php";
class Aliado_model{
	public function crear_aliado($aliado , $portada){
$instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO aliados (aliado , portada , fecha_creacion) VALUES (:aliado ,  :portada , now())");
       
        $sentencia->bindParam(':aliado', $aliado);
        $sentencia->bindParam(':portada', $portada);
        
        
       

        $sentencia->execute();
	}

	public function listar_aliados(){
		 $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `aliados`";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;
	}


	public function consultar_aliado_edicion($aliado_id){
		$instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `aliados` WHERE aliado_id = '".$aliado_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement; 
	}

	public function editar_aliado($aliado , $portada , $aliado_id){
		$instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

       
        $sentencia = $pdo->prepare("UPDATE aliados SET aliado=:aliado ,  portada=:portada , fecha_creacion=now()  WHERE aliado_id = :aliado_id ");
        $sentencia->bindParam(':aliado', $aliado);
        
        $sentencia->bindParam(':portada', $portada); 
        $sentencia->bindParam(':aliado_id', $aliado_id);  
        
        $sentencia->execute();
	}

	public function eliminar_aliado($aliado_id){
		$instancia = new Conexion();
        $pdo = $instancia->establecer_conexion(); 
        $sentencia = $pdo->prepare("DELETE FROM aliados WHERE aliado_id = :aliado_id");
       
        $sentencia->bindParam(':aliado_id', $aliado_id);  
        $sentencia->execute(); 
	}
}
?>