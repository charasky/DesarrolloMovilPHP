<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if($_POST['usu_usuario']){
		$db = new DbOperations(); 
		$response = $db->movimientos();
	}else{
		$response = "falta dato";
	}
}

echo json_encode(array("Movimientos" => $response));
?>
