<?php
include_once "../../models/funcionario/funcionario_model.php";
class Funcionario_controller {

   public function crear_funcionario($nombre_funcionario , $cargo , $foto_perfil , $orden){
    $instancia = new Funcionario_model();
    $peticion = $instancia -> crear_funcionario($nombre_funcionario , $cargo , $foto_perfil , $orden);
   }

   public function listar_funcionarios(){
      $instancia = new Funcionario_model();
      $peticion = $instancia -> listar_funcionarios();  
      return $peticion;
   }

   public function consultar_funcionario_editar($funcionario_id){
      $instancia = new Funcionario_model();
     $peticion = $instancia -> consultar_funcionario_editar($funcionario_id);  
     return $peticion;  
   }


   public function editar_funcionario($nombre_funcionario , $cargo , $foto_perfil , $funcionario_id , $orden){
      $instancia = new Funcionario_model();
      $peticion = $instancia -> editar_funcionario($nombre_funcionario , $cargo , $foto_perfil , $funcionario_id , $orden);
     }

     public function eliminar_funcionario($funcionario_id){
      $instancia = new Funcionario_model();
      $peticion = $instancia -> eliminar_funcionario($funcionario_id);
     }
}
?>