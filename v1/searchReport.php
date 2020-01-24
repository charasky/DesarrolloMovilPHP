<?php

require_once '../includes/DbReporte.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(isset($_POST['usu_asamblea']) && $_POST['usu_administrador']=='TRUE'){
		$db = new DbReporte(); 
		$response = $db->getReportes();
	}elseif(isset($_POST['usu_asamblea']) && $_POST['usu_administrador']=='FALSE'){
		$db = new DbReporte(); 		
		$response = $db->getReportesPor($_POST['usu_asamblea']);
	}else{
		$response = "falta dato";
	}
}

echo json_encode(array("Reportes" => $response));
?>
