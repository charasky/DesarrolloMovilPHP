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

			var_dump($response);
		
			if($db1->isUserExist($usuario)){
				var_dump($response);
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
				$response[] = $db->getEntrevistador($id);
				var_dump($response);
			}else{
				$response = "usuario no valido";
				var_dump($response);
			}
	}else{
		var_dump($response);
		$response = "falta dato";
	}
}

echo json_encode(array("Reporte" => $response));

?>
