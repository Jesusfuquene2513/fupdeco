<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Asesor extends CI_Controller {

	public function __construct(){
        parent::__construct();
       $this-> load->model("AsesorModel");
        $this-> load-> helper(array('form','url'));
    }
	

	public function login()
	{
		
		$this->load->view('vistas/login_Asesor');

	}

	public function validar_login(){
	 $usuario = $this -> input-> post("correo");
    $clave = $this -> input-> post("clave");

    $resultado = $this -> AsesorModel -> validar_login($usuario , $clave );

    if($resultado){



$_SESSION['asesor']  = $usuario;

$_SESSION['clave']  = $clave;


    	echo "<script>
alert('Bienvenido');
	window.location.href = 'dashboard';
    	</script>";

    } else{
    	echo '<script>alert("No existe este usuario");
    	window.location.href = "../Asesor/login"</script>';

    }

	}

	public function dashboard(){
		$this->load->view('vistas/panel_asesor');	

	}

    public function citas(){
		$this->load->view('vistas/citas');	

	}

	public function cargar_asesor(){
extract($_POST);
$resultado = $this -> AsesorModel -> cargar_asesor($usuario , $clave );
foreach($resultado as $asesor){

	echo "<span style='display:none' class='asesor_nombre'>".$asesor->usuario."</span>";

}

echo "<script>
var nom = $('.asesor_nombre').text();

$('#asesor').val(nom);
</script>";
    	

    }


    public function cargar_eventos_asesor(){
extract($_POST);
print_r($_POST);

$resultado = $this -> AsesorModel -> cargar_eventos_asesor($usuario);




foreach($resultado as $evento){

	echo '<span style="display:block; font-weight:bolder;  display:block" class="nd" title="'.$evento->faltantes.'" id="'.$evento->agenda_id.'">'.$evento->codigo.',</span>';

}



	

	
}

public function ver_citas_asesor(){

extract($_POST);

//Generar archivo de calendario





	




//$archivo = "ftp://redepyme2023@redepyme.org:redeadmin2023@ftp.redepyme.org/public_html/plantilla_admin/js/calendar/".$_SESSION['asesor']."agenda.js";
//$context = stream_context_create(['ftp' => ['overwrite' => true]]);
//$fh = fopen($archivo, 'w', false, $context); 



$file_name2 = $_SESSION['asesor']."/agenda.js";




  $file_name = "ftp://redepyme2023@redepyme.org:redeadmin2023@ftp.redepyme.org/public_html/plantilla_admin/js/calendar/".$file_name2;
  $context = stream_context_create(['ftp' => ['overwrite' => true]]);
$fp = fopen ( $file_name, 'w' , false, $context );


fwrite ( $fp, $agenda );
fclose ( $fp );






}


public function crear_asesor(){
	print_r($_POST);
	extract($_POST);
		$result = mkdir($_SERVER['DOCUMENT_ROOT']."/corporacion/plantilla_admin/js/calendar/".$user);

		 $fh = fopen($_SERVER['DOCUMENT_ROOT']."/corporacion/plantilla_admin/js/calendar/".$user."/agenda.js", 'w') or die("Se produjo un error al crear el archivo");

		 $resultado = $this -> AsesorModel -> crear_asesor($asesor , $user , $password);


		 $resultado = $this -> AsesorModel -> obtener_id_asesor($user);

		 foreach($resultado as $id){
echo "<span id='codigo-asesor'>".$id->asesor_id."</span>";
		 }

		 echo "<script>
var codigo_asesor = $('#codigo-asesor').text();


$('.confirmacion3').text(codigo_asesor);
		 </script>";

	
}

public function crear_servicios_asesor(){
	print_r($_POST);
	extract($_POST);

	$resultado = $this -> AsesorModel -> crear_servios_asesor($asesor_identificador , $servicio_param);




}


public function consultar_ultimo_registro_evento ()
{
	//print_r($_POST);
	$resultado = $this -> AsesorModel -> consultar_ultimo_registro_evento();
	
	foreach ($resultado as $ultimo_id) {

		echo $ultimo_id -> agenda_id;
		
	}
	
	
	
	
	
	
	
}


public function listado_citas (){
	$this->load->view('vistas/listado_citas');	
}

public function listar_eventos_asesor(){
	extract($_POST);
	
	$resultado = $this -> AsesorModel -> listar_eventos_asesor($asesor);
	
	foreach ($resultado as $evento) {

		$reserva = $evento->reserva_id;
		
		$resultado2 = $this -> AsesorModel -> consultar_cliente_reserva($reserva);
		
				foreach ($resultado2 as $cliente) {



					echo '<tr class="text-center" >
			<td > '.$evento->agenda_id.' </td>
			
			<td>'.$cliente->nombre_cliente.'</td>
			<td>'.$cliente->identificacion.'</td>
			
			<td>'.$cliente->telefono.'</td>
			
			<td>'.$cliente->correo.'</td>
			
			<td>'.$cliente->departamento.'</td>

			<td>'.$cliente->municipio.'</td>
			
			
			
			
			
			<td> '.$evento->evento_nombre.' </td>
			<td> '.$evento->fecha_Asignada.' </td>
			<td> '.$evento->hora.' </td>
			<td> <textarea class="form-control" style="resize:none; min-height:100px; background:none; color:black" disabled="disabled"> '.$cliente->detalle_consulta.' </textarea> </td>
		</tr>';
		
	}
		
	}
}

public function listar_clientes(){
	
	extract($_POST);
	$resultado = $this -> AsesorModel -> listar_clientes($asesor);
	echo "<option selected value='0'>Seleccione un cliente</option>";
	foreach ($resultado as $cliente) {

		echo '<option value="'.$cliente->reserva_id.'">'.$cliente->nombre_cliente.'</option>';
		
	}
	
}


public function listar_servicios_asesor(){

	extract($_POST);

	$resultado = $this -> AsesorModel -> listar_servicios_asesor($asesor);
	echo "<option value='0'>Seleccione un servicio</option>";
	foreach($resultado as $servicio){

		echo "<option value='".$servicio->servicio."'>".$servicio->servicio."</option>";
	}
}


public function listar_id_asesor(){

	extract($_POST);
	$resultado = $this -> AsesorModel -> listar_id_asesor($asesor);

	foreach($resultado as $asesor){

		echo $asesor-> asesor_id;
	}
}


public function cargar_asesor_reserva(){
	extract($_POST);
	$resultado = $this -> AsesorModel -> cargar_asesor_reserva($programa);

	echo "<option value='0'>Seleccione Asesor</option>";

	foreach($resultado as $asesor){

		$info_asesor = $asesor-> asesor_id;

		$resultado2 = $this -> AsesorModel -> info_Asesor($info_asesor);

		
	foreach($resultado2 as $info_Asesor){

		echo "<option>".$info_Asesor -> nombre_asesor."</option>";
	}

		
	}

	

}


public function consultar_asignaciones(){
    extract($_POST);
$resultado = $this -> AsesorModel -> consultar_asignaciones($asesor);
foreach($resultado as $asignacion){
    echo "<tr class='padre'>
    <td class='text-center'>".$asignacion-> reserva_id."</td>
    <td class='text-center'>".$asignacion-> codigo_agrupacion."</td>
    <td>".$asignacion-> nombre_cliente."</td>
    <td>".$asignacion-> identificacion."</td>
    <td>".$asignacion-> telefono."</td>
    <td>".$asignacion-> correo."</td>
    <td>".$asignacion-> servicio."</td>
    <td>".$asignacion-> detalle_consulta."</td>
    <td>".$asignacion-> estado."</td>
    <td><button rel='".$asignacion->reserva_id."' class='btn btn-primary btn-agendar-servicios' style='font-weight:bolder' id='".$asignacion->reserva_id."'>Agendar</button></td>
    </tr>";
}
}

public function agendamiento(){
    $this->load->view('vistas/agenda');	
}

public function cerrar_sesion(){
    session_destroy();
    header('Location: login');
}


public function calendario(){
    $this->load->view('vistas/calendario');	
}


public function consultar_citas(){
extract($_POST);
$resultado = $this -> AsesorModel -> consultar_citas($asesor_arg);
foreach($resultado as $cita){
    $codigo = $cita-> codigo_agrupacion;
    $resultado2 = $this -> AsesorModel -> consultar_fecha($codigo);
    echo "<tr class='padre'>";
    echo "<td>".$cita-> reserva_id."</td>";
    echo "<td>".$cita-> codigo_agrupacion."</td>";
    echo "<td>".$cita-> nombre_cliente."</td>";
    echo "<td>".$cita-> identificacion."</td>";
    echo "<td>".$cita-> telefono."</td>";
    echo "<td>".$cita-> correo."</td>";
    echo "<td>".$cita-> servicio."</td>";
  
    foreach($resultado2 as $fecha){
        echo "<td>".$fecha -> fecha_reservacion."</td>";
    }
   
    
    echo "<td>".$cita-> detalle_consulta."</td>";
    echo "<td class='estado' rel='".$cita -> codigo_agrupacion."' id='".$cita -> servicio."'>".$cita-> estado."</td>";
    echo "<td><button class='btn btn-primary btn-reportar-servicio' id='".$cita-> reserva_id."'>Reportar Servicio</button></td>";
    echo "</tr>";

}
}


public function tomar_servicio_reportar(){
extract($_POST);
$resultado = $this -> AsesorModel -> tomar_servicio_reportar($id_arg);
echo '<script>alert("Has cambiado el estado a Servicio Ejecutado");
window.location.href = "../Asesor/dashboard"</script>';
}


public function consultar_fecha_agendamiento(){
extract($_POST);
$resultado = $this -> AsesorModel -> consultar_fecha_agendamiento($cod , $servicio);
foreach($resultado as $fecha){

    echo $fecha -> fecha_Asignada;

}
}
}
