<?php

class ContadorModel extends CI_model{

    public function __construct(){

        $this-> load ->database();
    }

   

    public function validar_login($usuario , $clave ){

 $this->db->select('*');
   

    $this->db->from('contador');

    $this->db->where('usuario', $usuario);
      $this->db->where('clave', $clave);


    $query = $this->db->get();
 return $query-> result();
    



    }


    public function generar_reporte_reserva($reserva
    ){
       $this->db->select('*');
   

    $this->db->from('reserva');

    $this->db->where('codigo_agrupacion', $reserva);
      
     


    $query = $this->db->get();
 return $query-> result();  
    }

    public function listar_reservas(){
       $this->db->select('*');
   

    $this->db->from('reserva_final');

    

    


    $query = $this->db->get();
 return $query-> result(); 
    }

   


    public function validar_token($token_arg){

      $_SESSION["token"]=$token_arg;

$this->db->where('codigo =',  $_SESSION["token"]);
$consulta = $this->db->get('codigos');
return $consulta->num_rows();

   

     



     


    

  
    
     
    }

    

 public function generar_reserva($servicio_arg , $costo_arg , $asesor_arg , $nombre_arg , $tipo_documento_arg , $documento_arg , $correo_arg , $telefono_arg , $codigo_master_reserva , $master){
$detalle = "Poner explicacòn por que se quiere el servicio";
$estado = 0;
$realizacion = "No pago - No agendamiento";
$asesor = 0;








  

   $this-> db -> insert("reserva" , ["nombre_cliente" => $nombre_arg,"identificacion" => $documento_arg , "telefono" => $telefono_arg , "correo" => $correo_arg , "detalle_consulta" => $detalle , "servicio"=> $servicio_arg , "costo"=> $costo_arg ,  "estado"=>$estado , "estado_realizacion"=> $realizacion , "cliente_id" => $codigo_master_reserva , "codigo_agrupacion" => $master , "encargado"=> $asesor]);

    


 }


 public function crear_cliente($cliente , $identificacion , $correo , $telefono , $cliente_tipo){
  $this-> db -> insert("cliente" , ["cliente_nombre" => $cliente , "identificacion_cliente" => $identificacion , "correo"=> $correo , "telefono"=>$telefono , "tipo_cliente" => $cliente_tipo]);
     
     if($this){
         
        //echo 1;
         
     }
 }
    
    public function crear_paquete_servicios( $master , $cc , $cliente ){
         $fecha_actual = getdate();
       
        
        $fecha = $fecha_actual['mday']."/".$fecha_actual['mon']."/".$fecha_actual['year'];
        $estado_inicial = 0;
       
     $this-> db -> insert("reserva_final" , ["reserva_codigo" => $master , "fecha_reservacion"=>$fecha , "estado"=>$estado_inicial , "identificacion"=>$cc , "cliente"=>$cliente]);  
    }



    public function consultar_clave_tesoreria($password){
        $this->db->select('*');
   

        $this->db->from('contador');
    
        
          $this->db->where('clave', $password);
    
    
        $query = $this->db->get();
     return $query-> result();
    }

    public function liberar_reservacion_update($codigo , $reserva_id , $cedula){
    
        $estado = 1;
        $this->db->where('reserva_final', $reserva_id);
        $this->db->where('reserva_codigo', $codigo);
    $this->db->set('estado', $estado);
   $res =  $this->db->update('reserva_final');

   if($res){

    echo "<script>
        alert('Liberastes esta reservación');
       window.location.href = 'notificar_moderador?documento=".$cedula."&&codigo=".$codigo."';
        </script>";
}


    
    }

    

    public function buscar_cliente($cc){
        $this->db->select('*');
   

        $this->db->from('cliente');
    
        
          $this->db->where('identificacion_cliente', $cc);
    
    
        $query = $this->db->get();
     return $query-> result();
    }

    public function buscador_reservas($filtro , $busqueda){
        if($filtro == 1){

            $this->db->select('*');
        
     
        $this->db->from('reserva_final');

         

          $this->db->like('identificacion', $busqueda , 'after');
    
      
         
    
    
        $query = $this->db->get();
     return $query-> result();
        
        }

        if($filtro == 2){
echo "Por aqui";
            $this->db->select('*');
        
     
        $this->db->from('reserva_final');

         

          $this->db->like('reserva_codigo', $busqueda);
    
      
         
    
    
       $query = $this->db->get();
     return $query-> result();
        
        }


        if($filtro == 3){
            echo "Por aqui";
                        $this->db->select('*');
                    
                 
                    $this->db->from('reserva_final');
            
                     
            
                      $this->db->like('cliente', $busqueda);
                
                  
                     
                
                
                   $query = $this->db->get();
                 return $query-> result();
                
                    
                    }


       


    }


    public function listar_cliente($documento){
        $this->db->select('*');
   

        $this->db->from('cliente');
    
        
          $this->db->where('identificacion_cliente', $documento);
    
    
        $query = $this->db->get();
     return $query-> result();
    }


    public function crear_moderacion($codigo , $cliente_arg , $cliente_documento , $cliente_telefono , $cliente_correo){
        $fecha_actual = getdate();
       
        
        $fecha = $fecha_actual['mday']."/".$fecha_actual['mon']."/".$fecha_actual['year'];
    $estado = 0;
      $resultado =   $this-> db -> insert("moderacion" , ["codigo_reserva"=>$codigo , "cliente"=>$cliente_arg , "documento"=>$cliente_documento,"telefono"=>$cliente_telefono, "correo"=>$cliente_correo, "fecha"=>$fecha , "estado"=> $estado]);  

      $estado = 1;
        $this->db->where('codigo_agrupacion', $codigo);
        
    $this->db->set('estado', $estado);
   $res =  $this->db->update('reserva');

      if($resultado){
        echo "<script>
        alert('Liberastes esta reservación');
       window.location.href = 'generar_pdf_moderacion?codigo_reserva=".$codigo."&&cliente=".$cliente_arg."&&documento=".$cliente_documento."&&telefono=".$cliente_telefono."&&correo=".$cliente_correo."&&fecha=".$fecha."';


        </script>";

    }
    }


 public function generar_servicios_facturados($codigo_reserva){
    $this->db->select('*');
   

    $this->db->from('reserva');

    
      $this->db->where('codigo_agrupacion', $codigo_reserva);


    $query = $this->db->get();
 return $query-> result();

}


public function listar_servicios_pdf(){
    $this->db->select('*');
   

    $this->db->from('programas');

    
    


    $query = $this->db->get();
 return $query-> result();
}

    

}