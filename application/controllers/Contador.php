<?php

session_start();

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Contador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this-> load->model( "ContadorModel" );
        $this-> load-> helper( array( 'form', 'url' ) );
    }

    public function login()
    {

        $this->load->view( 'vistas/login_contador' );

    }

    public function validar_login() {
        $usuario = $this -> input-> post( "correo" );
        $clave = $this -> input-> post( "clave" );

        $resultado = $this -> ContadorModel -> validar_login( $usuario, $clave );

        if ( $resultado ) {

            $_SESSION['contador']  = $usuario;

            $_SESSION['clave']  = $clave;

            echo "<script>
alert('Bienvenido');
	window.location.href = 'dashboard_contador';
    	</script>";

        } else {
            echo '<script>alert("No existe este usuario");
    	window.location.href = "../Contador"</script>';

        }

    }

    public function dashboard_contador()
    {

        $this->load->view( 'vistas/panel_contador' );

    }

    public function listar_reservas() {
        extract( $_POST );

        $resultado = $this -> ContadorModel -> listar_reservas();

       

        foreach ( $resultado as $reserva ) {
            
            echo '<tr>';
          
            echo '<td class="cliente3">'.$reserva->cliente.'</td>';
            echo '<td class="cod">'.$reserva->identificacion.'</td>';
            echo '<td class="cod">'.$reserva->reserva_codigo.'</td>';
            echo '<td >'.$reserva->fecha_reservacion.'</td>';
          
             echo '<td ><a class="btn" href="ver_comprobante?codigo_reserva='.$reserva->reserva_codigo.'" target="_blank">Ver Comprobante Reserva</a></td>';
             echo '<td  class="estado">'.$reserva->estado.'</td>';
             
             echo '<td ><div class="custom-input-file col-md-6 col-sm-6 col-xs-6" style="width:100%">
             <input type="button" id="'.$reserva->identificacion.'" class="input-file btn-liberar" value="" title="'.$reserva->reserva_codigo.'" rel="'.$reserva->reserva_final.'">
             Confirmar Pago
             </div></td>';

            echo '</tr>';
            

        }
        
       

    }

    public function ver_comprobante(){
        extract($_GET);
        //print_r($_GET);
      
      

       $this->load->view( 'vistas/comprobante' );
    }

    public function validar_token() {
        extract( $_POST );

        $resultado2 = $this -> ContadorModel -> validar_token( $token_arg );

        $estado_token = $resultado2;

        if ( $estado_token == 0 ) {

            echo 1;

        } else {

            echo 0;

        }

    }

    public function generar_reserva() {
        //print_r( $_POST );
        extract( $_POST );

        $asesor_arg = "Por Definirse";

        $resultado = $this -> ContadorModel -> generar_reserva( $servicio_arg, $costo_arg, $asesor_arg, $nombre_arg, $tipo_documento_arg, $documento_arg, $correo_arg, $telefono_arg, $codigo_master_reserva, $master );

    }

    public function crear_cliente() {

       // print_r( $_POST );
        extract( $_POST );

      echo  $resultado = $this -> ContadorModel -> crear_cliente( $cliente, $identificacion, $correo, $telefono , $cliente_tipo );
        
      

    }
    
    public function generar_combo_servicios (){
        
        extract($_POST);
        //print_r($_POST);
        $resultado = $this -> ContadorModel -> crear_paquete_servicios( $master , $cc , $cliente );
        $_SESSION['email']  = $email;
        $_SESSION['codigo']  = $master;

        $ruta_pdf = "https://www.redepyme.org/index.php/pdf2?codigo_reserva=".$master."&&cliente=".$cliente."&&correo=".$email."&&telefono=".$tel."&&cedula=".$cc."";


           $instancia = new Contador();
        $peticion = $instancia -> descargar_pdf($ruta_pdf);
        



        
        
        //Load Composer's autoloader
       
            
           

      
        
      
            


        
    }


    public function descargar_pdf($ruta_pdf){

  echo '<script>window.location.href="'.$ruta_pdf.'"</script>';
  
   
    }


    public function consultar_clave_tesoreria(){
extract($_POST);
$contador = 0;
        $resultado = $this -> ContadorModel -> consultar_clave_tesoreria($password);
        foreach ($resultado as $usuario) {
            $contador = $contador + 1;
            //echo $usuario->clave;
        }

        if($contador > 0){

            echo "1";
        }else{
        echo "0";
        }
        
    }
    
    
    public function liberar_reservacion(){
    extract($_POST);
$cedula = $cc;
    $resultado = $this -> ContadorModel -> liberar_reservacion_update($codigo , $reserva_id , $cedula);
    $instancia = new Contador();
    
       
        
        
    }

    public function notificar_moderador(){
  extract($_GET);
  //print_r($_GET);


   $resultado2 = $this -> ContadorModel -> buscar_cliente($documento);
   foreach($resultado2 as $cliente){

    $cliente_arg = $cliente->cliente_nombre;
  $cliente_correo = $cliente->correo;
   $cliente_telefono =$cliente->Telefono;
$cliente_documento = $cliente->identificacion_cliente;


$resultado = $this -> ContadorModel -> crear_moderacion($codigo , $cliente_arg , $cliente_documento , $cliente_telefono , $cliente_correo);

}
   
    




    }

    public function buscador_reservas(){
    extract($_POST);
  //print_r($_POST);
    if($filtro == 1 || $filtro == 2 || $filtro == 3 ){
        $resultado = $this -> ContadorModel -> buscador_reservas($filtro , $busqueda);

        foreach ( $resultado as $reserva ) {
           
            echo '<tr>';
            echo '<td class="cliente3">'.$reserva->cliente.'</td>';
            echo '<td class="id">'.$reserva->identificacion.'</td>';
            echo '<td class="cod">'.$reserva->reserva_codigo.'</td>';
            echo '<td >'.$reserva->fecha_reservacion.'</td>';
          
             echo '<td ><a class="btn" href="ver_comprobante?codigo_reserva='.$reserva->reserva_codigo.'" target="_blank">Ver Comprobante Reserva</a></td>';
             echo '<td  class="estado">'.$reserva->estado.'</td>';
             
             
             echo "<td ><button id='".$reserva->identificacion."' title='".$reserva->reserva_codigo."'  rel='".$reserva->reserva_final."' class='btn input-file btn-liberar' style='width:100%; background:#f3545d; color:white; font-weight:bolder'>Listo</button></td>";
    
            echo '</tr>';
            
    
        }
    }

    
    }


    public function generar_pdf_moderacion(){
    
    $this->load->view( 'vistas/crear_comprobante_moderacion' );
    }


    public function cerrar_sesion(){
        session_destroy();
        header('Location: login');
    }


   

   
    

}