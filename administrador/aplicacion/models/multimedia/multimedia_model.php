<?php
include_once "../../models/conexion/conexion.php";
class Multimedia_model
{

    public function subir_imagen_interna($nombre_elemento, $ruta_bd, $tipo_elemento)
    {
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO multimedia (nombre_archivo_multimedia , fecha_subida , ruta_bd , tipo_elemento) VALUES ( :elemento ,now() , :ruta , :tipo_elemento)");
        $sentencia->bindParam(':elemento', $nombre_elemento);
        $sentencia->bindParam(':ruta', $ruta_bd);
        $sentencia->bindParam(':tipo_elemento', $tipo_elemento);

        $sentencia->execute();

    }

    public function listar_archivos_multimedia()
    {
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $query = "SELECT * FROM `multimedia`";

        $statement = $pdo->prepare($query);

        $statement->execute();
        
        return $statement;
    }

    public function subir_imagen_externa($nombre_elemento, $ruta_externa, $tipo_elemento){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();

        $sentencia = $pdo->prepare("INSERT INTO multimedia (nombre_archivo_multimedia , fecha_subida , ruta_bd , tipo_elemento) VALUES ( :elemento ,now() , :ruta , :tipo_elemento)");
        $sentencia->bindParam(':elemento', $nombre_elemento);
        $sentencia->bindParam(':ruta', $ruta_externa);
        $sentencia->bindParam(':tipo_elemento', $tipo_elemento);

        $sentencia->execute();   
    }

    public function subir_video_externo($nombre_elemento, $ruta_externa, $tipo_elemento){
        $instancia = new Conexion();
        $pdo = $instancia->establecer_conexion();
        $sentencia = $pdo->prepare("INSERT INTO multimedia (nombre_archivo_multimedia , fecha_subida , ruta_bd , tipo_elemento) VALUES ( :elemento ,now() , :ruta , :tipo_elemento)");
        $sentencia->bindParam(':elemento', $nombre_elemento);
        $sentencia->bindParam(':ruta', $ruta_externa);
        $sentencia->bindParam(':tipo_elemento', $tipo_elemento);

        $sentencia->execute();      
    }

}
