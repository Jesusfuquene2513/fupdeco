<?php
include_once "../../models/conexion/conexion.php";
class Login_model{
    public function login($usuario , $clave){
$instancia = new Conexion();
$pdo = $instancia -> establecer_conexion();

$query = "SELECT * FROM `usuarios` WHERE usuario='".$usuario."' AND clave='".$clave."'  ";

$statement = $pdo->prepare($query);

$statement->execute();

$usuario_existente = $statement->fetchColumn();

if ($usuario_existente > 0) {
 $respuesta = 1;   
} else {
   $respuesta = 0;
}
return $respuesta;

    }
}
?>