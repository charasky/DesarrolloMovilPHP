<?php

require_once '../includes/DbReporte.php';
require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(isset($_POST['usu_usuario']) and 
		isset($_POST['id'])){
			
			$id = $_POST['id'];
			$usuario = $_POST['usu_usuario'];

			$db = new DbReporte(); 
			$db1 = new DbOperations();

		
			if($db1->isUserExist($usuario)){

				$response = $db->getObtenerReporte($id);
				/*
				$response[] = $db->getVictima($id);
				$response[] = $db->getTraslado($id);
				$response[] = $db->getResultadoInvestigacion($id);
				$response[] = $db->getOmisionActuar($id);
				$response[] = $db->getModalidadDetencion($id);
				$response[] = $db->getHechoPolicial($id);
				$response[] = $db->getFuerzasIntervinientes($id);
				$response[] = $db->getCaracteristicasProcedimiento($id);
				$response[] = $db->getAllanamiento($id);
				$response[] = $db->getEntrevistado($id);
				$response[] = $db->getEntrevistador($id);*/
			}else{
				$response = "usuario no valido";
			}
	}else{
		$response = "falta dato";
	}
}

print_r(json_encode(array("Reporte" => $response)));
//echo json_encode(array("Reporte" => $response));

?>