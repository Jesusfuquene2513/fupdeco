<?php
error_reporting(0);
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct(){
        parent::__construct();
       $this-> load->model("ClienteModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function consultar_identificacion()
	{
		extract($_POST);
		$resultado = $this -> ClienteModel -> consultar_identificacion($identificacion);
		$contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;

			echo "<span id='nombre_cli'>".$cliente->cliente_nombre."</span>";
			echo "<span id='correo_cli'>".$cliente->correo."</span>";
			echo "<span id='telefono_cli'>".$cliente->Telefono."</span>";



		}
		

		if($contador == 1){

			echo '<script>
              $("#documento").attr("disabled","disabled");
              $("#nombre , #correo , #telefono").attr("disabled","disabled");
              var nombre_cliente = $("#nombre_cli").text();
$("#nombre").val(nombre_cliente);
$("#nombre").css("border","solid 2px green");


var correo_cliente = $("#correo_cli").text();
$("#correo").val(correo_cliente);
$("#correo").css("border","solid 2px green");


var telefono_cliente = $("#telefono_cli").text();
$("#telefono").val(telefono_cliente);
$("#telefono").css("border","solid 2px green");

$("#cedula").css("display","block");
$("#cedula").text("1");

			</script>';

		}

		
		

	}
    
    
    public function consultar_identificacion_reserva()
	{
		extract($_POST);
		$resultado = $this -> ClienteModel -> consultar_identificacion_reserva($identificacion);
		$contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;

			echo "<span id='nombre_cli'>".$cliente->cliente_nombre."</span>";
			echo "<span id='correo_cli'>".$cliente->correo."</span>";
			echo "<span id='telefono_cli'>".$cliente->Telefono."</span>";



		}
		

		if($contador == 1){

			echo '<script>
              $("#documento").attr("disabled","disabled");
              $("#nombre , #correo , #telefono , #sel-tipo-documento").attr("disabled","disabled");
              var nombre_cliente = $("#nombre_cli").text();
$("#nombre").val(nombre_cliente);
$("#nombre").css("border","solid 2px green");


var correo_cliente = $("#correo_cli").text();
$("#correo").val(correo_cliente);
$("#correo").css("border","solid 2px green");


var telefono_cliente = $("#telefono_cli").text();
$("#telefono").val(telefono_cliente);
$("#telefono").css("border","solid 2px green");

$("#cedula").css("display","block");
$("#cedula").text("1");

			</script>';

		}

		
		

	}
    
    
    public function consultar_identificacion_login()
	{
		extract($_POST);
		$resultado = $this -> ClienteModel -> consultar_identificacion($identificacion);
		$contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;
            //echo $contador;

			



		}
        
        
		

		if($contador == 1){

			echo "El Cliente con Cedula '".$identificacion."' ya se encuentra registrado";
            echo "<script>
            $('.alert-danger').css('display','block');
            $('#documento , #nombre , #telefono , #correo , #c').val('');
            $('#cedula').text('0');
            </script>";

		}else{
            
        }

		
		

	}
    
    public function consultar_identificacion_tipo_cliente()
	{
		extract($_POST);
		$resultado = $this -> ClienteModel -> consultar_identificacion_tipo_cliente($identificacion);
		$contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;
            echo $cliente ->tipo_cliente;

			



		}
        
        
		

		if($contador == 1){

			

		}else{
         echo "Invitado";   
        }

		
		

	}


	public function consultar_ultimo_cliente(){
		$resultado = $this -> ClienteModel -> ultimo_cliente();
		foreach ($resultado as $ultimo_id) {

		echo $ultimo_id -> cliente_id+1;
		
	}

		
	}
	


	public function consultar_id_definido(){
		extract($_POST);
		$resultado = $this -> ClienteModel -> consultar_id_definido($documento);
		foreach($resultado as $id_cliente){

			echo $id_cliente->cliente_id;

		}
        
        
       
	}
    
     public function crear_cliente(){
        $this->load->view('vistas/crear_cliente_login');  
        }
    
    
    public function login(){
      $this->load->view('vistas/cliente_login');     
    }
    
    public function login_home(){
      $this->load->view('vistas/login_home');     
    }
    
    public function validar_login_cliente(){
        extract($_POST);
        print_r($_POST);
        $resultado = $this -> ClienteModel -> validar_login_cliente($usuario , $clave);
        
        $contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;
         

			



		}
        
        
		

		if($contador == 1){
            
             $resultado2 = $this -> ClienteModel -> Consultar_documento($usuario , $clave);
            foreach($resultado2 as $documento){
               $cedula = $documento->identificacion_cliente; 
                $cliente = $documento->cliente_nombre; 
                $_SESSION["cliente"]=$cliente;
            }
            

			echo "<script>
           window.location.href= '../Reserva/reserva_login?codigo_reserva=".$servicio."&&price=".$precio."&&cc=".$cedula."';
            </script>";

		}else{
          
        echo "<script>
        alert('Este Usuario No existe');
        window.location.href= 'login?codigo_reserva=".$servicio."&&price=".$precio."';
        </script>";
        }
    }
    
    public function validar_login_cliente_home(){
        extract($_POST);
        print_r($_POST);
        $resultado = $this -> ClienteModel -> validar_login_cliente($usuario , $clave);
        
        $contador = 0;
		foreach($resultado as $cliente){

			$contador = $contador + 1;
         

			



		}
        
        
		

		if($contador == 1){
            
             $resultado2 = $this -> ClienteModel -> Consultar_documento($usuario , $clave);
            foreach($resultado2 as $documento){
               $cedula = $documento->identificacion_cliente; 
                $cliente = $documento->cliente_nombre; 
                $_SESSION["cliente"]=$cliente;
            }
            

			echo "<script>
           window.location.href= '../Home';
            </script>";

		}else{
          
        echo "<script>
        alert('Este Usuario No existe');
        //window.location.href= 'login?codigo_reserva=".$servicio."&&price=".$precio."';
        </script>";
        }
    }
    
    public function crear_cliente_login(){
        extract($_POST);
        print_r($_POST);
         $resultado = $this -> ClienteModel -> crear_cliente_login( $cliente, $identificacion, $correo, $telefono , $clave ); 
    }


	

	

	

	

	

	

    

















}
