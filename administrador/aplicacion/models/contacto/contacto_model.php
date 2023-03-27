<?php
include_once "../../models/conexion/conexion.php";
class Contacto_model{

    public function listar_departamentos(){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `departamentos`";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;
    }

    public function listar_municipios($departamento){

        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `municipios` WHERE departamento_id = '".$departamento."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement; 
    }
    public function data_contacto_departamento($departamento){
      $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT departamento FROM `departamentos` WHERE id_departamento = '".$departamento."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;   
    }

    public function data_contacto_municipio($municipio){
     $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT municipio FROM `municipios` WHERE id_municipio = '".$municipio."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;    
    }

    public function crear_contacto($nombre_contacto , $tipo_documento , $numero_identificacion , $telefono , $correo , $departamento , $municipio , $consulta ){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO contacto (nombre_contacto , tipo_documento , numero_idemtificacion , telefono , correo , departamento , municipio , consulta , fecha_creacion) VALUES ( :nombre_contacto , :tipo_documento , :numero_identificacion , :telefono , :correo , :departamento , :municipio , :consulta , now() )");
        $sentencia->bindParam(':nombre_contacto', $nombre_contacto);
        $sentencia->bindParam(':tipo_documento', $tipo_documento);
        $sentencia->bindParam(':numero_identificacion', $numero_identificacion);
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':correo', $correo);
        $sentencia->bindParam(':departamento', $departamento);
        $sentencia->bindParam(':municipio', $municipio);
        $sentencia->bindParam(':consulta', $consulta);
      
       

        $sentencia->execute();
    }

    public function listar_contactos(){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `contacto`";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;    
    }

    public function data_departamento($departamento_id){

        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT departamento FROM `departamentos` WHERE id_departamento = '".$departamento_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement; 

    }

}
    

?>