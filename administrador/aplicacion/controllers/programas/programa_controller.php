<?php
include_once "../../models/programa/programa_model.php";
class Programa_controller
{
    public function crear_programa($nombre_programa, $contenido_programa, $portada_programa , $precio , $enlace_pago)
    {
        $instancia = new Programa_model();
        $peticion = $instancia->crear_programa($nombre_programa, $contenido_programa, $portada_programa , $precio , $enlace_pago);
    }

    public function listar_programas(){
        $instancia = new Programa_model();
        $peticion = $instancia -> listar_programas();  
        return $peticion; 
    }

    public function listar_programa_edicion($programa_id){
        $instancia = new Programa_model();
        $peticion = $instancia -> listar_programa_edicion($programa_id);  
        return $peticion;  
    }

    public function editar_programa($nombre_programa , $contenido_programa , $portada_programa , $programa_id , $precio , $enlace_pago){
        $instancia = new Programa_model();
        $peticion = $instancia->editar_programa($nombre_programa, $contenido_programa, $portada_programa , $programa_id , $precio , $enlace_pago);     
    }

    public function eliminar_programa($programa_id){
        $instancia = new Programa_model();
        $peticion = $instancia->eliminar_programa($programa_id);     
    }
}
