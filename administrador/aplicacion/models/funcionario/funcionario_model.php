<?php
include_once "../../models/conexion/conexion.php";
class Funcionario_model
{

    public function crear_funcionario($nombre_funcionario, $cargo, $foto_perfil , $orden)
    {
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO funcionarios (nombre_funcionario , cargo , foto_perfil , fecha_creacion , orden) VALUES ( :nombre_funcionario , :cargo , :foto_perfil ,  now() , :orden)");
        $sentencia->bindParam(':nombre_funcionario', $nombre_funcionario);
        $sentencia->bindParam(':cargo', $cargo);
        $sentencia->bindParam(':foto_perfil', $foto_perfil);
        $sentencia->bindParam(':orden', $orden);

        $sentencia->execute();
    }

    public function listar_funcionarios()
    {
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `funcionarios`  ORDER BY orden asc";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;
    }

    public function consultar_funcionario_editar($funcionario_id){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `funcionarios` WHERE funcionario_id = '".$funcionario_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;   
    }

    public function editar_funcionario($nombre_funcionario, $cargo, $foto_perfil , $funcionario_id , $orden)
    {
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("UPDATE funcionarios SET nombre_funcionario=:nombre_funcionario , cargo=:cargo , foto_perfil=:foto_perfil , fecha_creacion=now() , orden = :orden WHERE funcionario_id = :funcionario_id ");
        $sentencia->bindParam(':nombre_funcionario', $nombre_funcionario);
        $sentencia->bindParam(':cargo', $cargo);
        $sentencia->bindParam(':foto_perfil', $foto_perfil);
        $sentencia->bindParam(':funcionario_id', $funcionario_id);
        $sentencia->bindParam(':orden', $orden);

        $sentencia->execute();
    }

    public function  eliminar_funcionario($funcionario_id){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion(); 
        $sentencia = $pdo->prepare("DELETE FROM funcionarios WHERE funcionario_id = :funcionario_id");
       
        $sentencia->bindParam(':funcionario_id', $funcionario_id);  
        $sentencia->execute(); 
    }

}
