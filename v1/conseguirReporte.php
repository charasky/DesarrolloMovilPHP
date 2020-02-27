<?php

require_once '../includes/DbReporte.php';
require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(isset($_POST['usu_usuario']) and 
		isset($_POST['id'])){

			$db = new DbReporte(); 
			$db1 = new DbOperations();
		
			if($db1->isUserExist($_POST['usu_usuario'])){
				$response = $db->getObtenerReporte($_POST['id']);
			}else{
				$response = "usuario no valido";
			} 

			//array_push($response,$db->getAllanamiento($id),$db->getCaracteristicasProcedimiento($id));
	}else{
		$response = "falta dato";
	}
}

echo json_encode(array("Reporte" => $response));

?>
