<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if($_POST['usu_administrador']){
		$db = new DbOperations(); 
		$response = $db->getDisabledUsers();
	}else{
		$response = "falta dato";
	}
}

echo json_encode(array("Users" => $response));
?>