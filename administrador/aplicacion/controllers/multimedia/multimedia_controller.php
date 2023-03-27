<?php
include_once "../../models/multimedia/multimedia_model.php";
class Multimedia_controller{

    public function subir_imagen_interna($nombre_elemento , $ruta_bd , $tipo_elemento){
        $instancia = new Multimedia_model();
        $peticion = $instancia -> subir_imagen_interna($nombre_elemento,$ruta_bd , $tipo_elemento);
     
     
       
    }

    public function listar_archivos_multimedia(){
        $instancia = new Multimedia_model();
        $peticion = $instancia ->listar_archivos_multimedia();  
        return $peticion;
    }

    public function subir_imagen_externa($nombre_elemento, $ruta_externa, $tipo_elemento){
        $instancia = new Multimedia_model();
        $peticion = $instancia ->subir_imagen_externa($nombre_elemento, $ruta_externa, $tipo_elemento);  
        return $peticion;  
    }

    public function subir_video_externo($nombre_elemento, $ruta_externa, $tipo_elemento){
        $instancia = new Multimedia_model();
        $peticion = $instancia ->subir_video_externo($nombre_elemento, $ruta_externa, $tipo_elemento);  
        return $peticion;    
    }

    
}
?>