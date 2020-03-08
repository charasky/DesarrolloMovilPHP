<?php 

require_once '../includes/DbReporte.php';
$validate =true;
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['fechaReporteCreacion']) and 
		isset($_POST['horaReporteCreacion']) and 
			isset($_POST['reporteAnonimo'])){

		$fecha=$_POST['fechaReporteAnonimo'];
		$hora=$_POST['horaReporteAnonimo'];
		$obj = json_decode($_POST['reporteAnonimo']);
		$db = new DbReporte();

		$db->crearReporteAnonimo($obj->{'usu_email_anonimo'}, $obj->{'usu_celular_anonimo'}, $obj->{'usu_barrio_anonimo'}, $obj->{'usu_provincia_anonimo'}, $obj->{'usu_pais_anonimo'}, $obj->{'usu_detalle_anonimo'}, $obj->{'usu_fecha_hecho_anonimo'}, $obj->{'usu_hora_hecho_anonimo'});
		
		$response['error'] = false;
		$response['message'] = "Se ha guardado correctamente.";
		$response['validate'] = true;
		
	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";	
	}	
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
?>