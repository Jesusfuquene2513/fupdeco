<?php
include_once "../../models/conexion/conexion.php";
class Blog_model{
    public function crear_blog($titulo , $contenido , $portada , $tipo_archivo_sel){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO blog (titulo , contenido , portada , fecha_creacion , tipo_elemento) VALUES (:titulo , :contenido , :portada , now() , :tipo_archivo_sel)");
       
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':contenido', $contenido);
        $sentencia->bindParam(':portada', $portada);
        $sentencia->bindParam(':tipo_archivo_sel', $tipo_archivo_sel);
       

        $sentencia->execute();
    }

    public function listar_publicaciones(){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `blog`";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;
    }

    public function consultar_publicacion_editar($publicacion_id){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `blog` WHERE blog_id = '".$publicacion_id."' ";

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement;  
    }

    public function editar_publicacion($titulo , $contenido , $portada , $blog_id , $tipo_archivo_sel){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("UPDATE blog SET titulo=:titulo , contenido=:contenido , portada=:portada , fecha_creacion=now() , tipo_elemento = :tipo_archivo_sel WHERE blog_id = :blog_id ");
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':contenido', $contenido);
        $sentencia->bindParam(':portada', $portada);
        $sentencia->bindParam(':tipo_archivo_sel', $tipo_archivo_sel);
        $sentencia->bindParam(':blog_id', $blog_id);

        $sentencia->execute();
    }

    public function eliminar_publicacion($blog_id){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();   
        $sentencia = $pdo->prepare("DELETE FROM blog WHERE blog_id = :blog_id");
       
        $sentencia->bindParam(':blog_id', $blog_id);  
        $sentencia->execute(); 
    }
}
?>