<?php
include_once "../../models/contacto/contacto_model.php";
class Contacto_controller
{
    public function listar_departamentos()
    {
        $instancia = new Contacto_model();
        $peticion = $instancia->listar_departamentos();
        return $peticion;
    }

    public function listar_municipios($departamento){
        $instancia = new Contacto_model();
        $peticion = $instancia -> listar_municipios($departamento);  
        return $peticion; 
    }

    public function crear_contacto($nombre_contacto , $tipo_documento , $numero_identificacion , $telefono , $correo , $departamento , $municipio , $consulta ){
        $instancia = new Contacto_model();   
        $peticion_data = $instancia -> data_contacto_departamento($departamento);
        
        
        
        
        foreach($peticion_data as $dep){
            $departamento = $dep['departamento'];

        }
        $peticion_data2 = $instancia -> data_contacto_municipio($municipio);
        foreach($peticion_data2 as $mun){
            $municipio = $mun['municipio'];

        }
        $peticion = $instancia ->crear_contacto($nombre_contacto , $tipo_documento , $numero_identificacion , $telefono , $correo , $departamento , $municipio , $consulta );
        
        if($tipo_documento == 1){
            
            $tipo_documento = "CC";
            
            
        }
        
        
      $destinatario = "info@redepyme.org"; 
$asunto = "Peticion Formulario de contacto"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Formulario de Contacto</title> 
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head> 
<body> 
<h1>Buenos Dias Redepyme!</h1> 

<p> 
<b>Requiero Informacion sobre " '.$consulta.' " ,

Mis datos personales Son los siguientes:

<p>Nombre Completo: '.utf8_encode($nombre_contacto).'</p>
<p>Tipo de Documento: '.utf8_encode($tipo_documento).'</p>
<p># de Identificaciòn: '.utf8_encode($nombre_contacto).'</p>
<p>Telefono: '.$telefono.'</p>
<p>Correo: '.$correo.'</p>
<p>Departamento: '.utf8_encode($departamento).'</p>
<p>Municipio: '.utf8_encode($municipio).'</p>

</p> 
<img src="http://www.redepyme.org/logo.png" style="width:50%">
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: $correo"; 












mail($destinatario,$asunto,$cuerpo,$headers) ;




$asunto2 = "Recibimiento de informacion"; 
$cuerpo2 = ' 
<html> 
<head> 
   <title>Confirmacion envio de datos</title> 
</head> 
<body> 
<h1>Buenos Dias Usuario Redepyme!</h1> 
Hemos recibido sus requerimientos esperamos darle pronta respuesta a su solicitud Atentamente Redepyme
<p> 


</p> 
<img src="http://www.redepyme.org/redepyme/matriz/plantilla_front/img/logo.png" style="width:50%">
<br>
<span style="color:black; display:block">Corporación Internacional Redepyme</span>
<span style="color:black; display:block">Corporación Internacional Redepyme</span>
<span style="color:black; display:block">Telefonos: 6023738580  -  3226425722  -  3046020005</span>
<span style="color:black; display:block">Correo Electronico info@redepyme.org</span>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers2 = "MIME-Version: 1.0\r\n"; 
$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers2 .= "From: $destinatario"; 









mail($correo,$asunto2,$cuerpo2,$headers2) ;
        
        
        
        
    }

    public function listar_contactos(){
        $instancia = new Contacto_model();
        $peticion = $instancia -> listar_contactos();
        return $peticion;
    }

    public function data_departamento($departamento_id){
        $instancia = new Contacto_model();   
        $peticion = $instancia -> data_departamento($departamento_id);
        return $peticion;
    }
}
