<?php
include_once "../../models/slider/slider_model.php";
class Slider_controller{
    public function crear_banner($nombre_banner , $portada , $encabezado , $cuerpo){
        $instancia = new Slider_model();
        $peticion = $instancia -> crear_banner($nombre_banner , $portada , $encabezado , $cuerpo);

    }

    public function listar_banners(){
        $instancia = new Slider_model();
        $peticion = $instancia -> listar_banners(); 
        return $peticion;  
    }

    public function consulta_banner_edicion($banner_id){
        $instancia = new Slider_model(); 
        $peticion = $instancia -> consulta_banner_edicion($banner_id);  
        return $peticion;
    }

    public function editar_banner($nombre_banner, $portada , $slider_id , $encabezado , $cuerpo){
        $instancia = new Slider_model();
        $peticion = $instancia -> editar_banner($nombre_banner , $portada , $slider_id , $encabezado , $cuerpo);
    }

    public function eliminar_banner($slider_id){
       $instancia = new Slider_model();
       $peticion = $instancia -> eliminar_banner($slider_id); 
    }
}
?>