<?php
require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['registracion_usuario'])){

		$db = new DbOperations();
		$obj = json_decode($_POST['registracion_usuario']);

		$result = $db->createUser($obj->{'usu_usuario'},
					$obj->{'usu_password'},
					ucwords(strtolower($obj->{'usu_nombres'})),
					ucwords(strtolower($obj->{'usu_apellidos'})),
					$obj->{'usu_asamblea'});
		if($result == 1){
			$response['error'] = false;
			$response['message'] = "Registro exitoso.";
		}elseif($result == 2){
			$response['error'] = true;
			$response['message'] = "Algun error ocurrio intente denuevo.";
		}elseif($result == 3){
			$response['error'] = true;
			$response['message'] = "La Asamblea ingresada no existe.";
			$response['existe'] = "asamblea";
		}elseif($result == 0){
			$response['error'] = true;
			$response['message'] = "El email ingresado ya existe, ingrese otro.";
			$response['existe'] = "email";
		}
	}else{
		$response['error'] = true;
		$response['message'] = "required fields are missing";
	}
}else{
	$response['error'] = true;
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
