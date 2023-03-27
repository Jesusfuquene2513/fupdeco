<?php

class LoginModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

    public function registrar_usuario($usuario , $clave , $nombre_usuario){

        //Insert
   return  $this-> db -> insert("usuarios" , ["nombre_completo" => $nombre_usuario,"usuario" => $usuario , "clave" => $clave]);

    }

}