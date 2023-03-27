<?php
include_once "../../models/galeria/galeria_model.php";
class Galeria_controller{

	public function crear_album($nombre_album , $portada , $descripcion){

$instancia = new Galeria_model();
$peticion = $instancia -> crear_album($nombre_album , $portada , $descripcion);


	}

	public function listar_albumnes(){
		$instancia = new Galeria_model();
		$peticion = $instancia -> listar_albumnes();
		return $peticion;
	}

	public function consultar_data_album($album_id){
$instancia = new Galeria_model();
$peticion = $instancia -> consultar_data_album($album_id);
return $peticion;
	}

	public function editar_album($nombre_album , $album_id , $descripcion , $portada){
	$instancia = new Galeria_model();	
	$peticion = $instancia -> editar_album($nombre_album , $album_id , $descripcion , $portada);
	}

	public function crear_alemento_album($elemento_nombre , $album_id , $portada){
		$instancia = new Galeria_model();
		$peticion = $instancia -> crear_alemento_album($elemento_nombre , $album_id , $portada);
	}


	public function listar_elementos_galeria(){
		$instancia = new Galeria_model();
		$peticion = $instancia -> listar_elementos_galeria();
		return $peticion;	
	}

	public function consultar_album_nombre($album){
		$instancia = new Galeria_model();
		$peticion = $instancia -> consultar_album_nombre($album);
		return $peticion;
	}

	public function consultar_data_elementos_galeria($elemento_id){
	$instancia = new Galeria_model();
	$peticion = $instancia -> 	consultar_data_elementos_galeria($elemento_id);
	return $peticion;
	}

	public function editar_elemento_galeria_album($elemento_id , $album_id , $elemento_nombre , $portada){
		$instancia = new Galeria_model();
		$peticion = $instancia -> editar_elemento_galeria_album($elemento_id , $album_id , $elemento_nombre , $portada);
	}

	public function eliminar_elemento_galeria($elemento_id){
		$instancia = new Galeria_model();
		$peticion = $instancia -> eliminar_elemento_galeria($elemento_id);
	}

	public function eliminar_elementos_album_primario($album_id){
$instancia = new Galeria_model();
$peticion = $instancia -> eliminar_elemento_galeria_primario($album_id);
$peticion2 = $instancia -> eliminar_album($album_id);

	}

	public function listar_elementos_album_visor($album_id){
		$instancia = new Galeria_model();
		$peticion = $instancia -> listar_elementos_album_visor($album_id);
		return $peticion;
	}

	public function listar_albumnes_front_page($album_id){
		$instancia = new Galeria_model();
		$peticion = $instancia -> listar_albumnes_front_page($album_id);
		return $peticion;
	}

	public function listar_elementos_galeria_front_page($filtro){
		$instancia = new Galeria_model();
		$peticion = $instancia -> listar_elementos_galeria_front_page($filtro);
		return $peticion;
	}

	public function elemento_random_album($id_album){
		$instancia = new Galeria_model();
		$peticion = $instancia -> elemento_random_album($id_album);
		return $peticion;
		
	}
}
?>