<?php
include_once "../../models/aliados/aliado_model.php";
class Aliado_controller{

	public function crear_aliado($aliado , $portada){
$instancia = new Aliado_model();
$peticion = $instancia -> crear_aliado($aliado , $portada);
	}

	public function listar_aliados(){
		$instancia = new Aliado_model();
		$peticion = $instancia -> listar_aliados();
		return $peticion;
	}

	public function consultar_aliado_edicion($aliado_id){
	$instancia = new Aliado_model();
	$peticion = $instancia -> consultar_aliado_edicion($aliado_id);	
	return $peticion;
	}

	public function editar_aliado($aliado , $portada , $aliado_id){
		$instancia = new Aliado_model();
		$peticion = $instancia -> editar_aliado($aliado , $portada , $aliado_id);
	}

	public function eliminar_aliado($aliado_id){
		$instancia = new Aliado_model();
		$peticion = $instancia -> eliminar_aliado($aliado_id);	
	}
}
?>