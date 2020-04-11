<?php
require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['usu_usuario']) and isset($_POST['usu_password'])){
		$db = new DbOperations();
		$numero = $_POST['contador'];
		if($db->userLogin($_POST['usu_usuario'], $_POST['usu_password'])){
			$user = $db->getUserByUsuario($_POST['usu_usuario']);
			$response['error'] = false;
			$response['usu_asamblea'] = $user['usu_asamblea'];
			$response['usu_usuario'] = $user['usu_usuario'];
			$response['usu_nombres'] = $user['usu_nombres'];
			$response['usu_apellidos'] = $user['usu_apellidos'];
			$response['usu_validacion'] = $user['usu_validacion'];
			$response['usu_administrador'] = $user['usu_administrador'];
    }else{
			if($numero <= 5){
				$response['error'] = true;
				$response['message'] = "Usuario o Contraseña incorrectos.";
			}else{
				$response['error'] = true;
				$response['message'] = "El usuario ha sido bloquiado.";
				$db->blockUser($_POST['usu_usuario']);
			}
    }
  }else{
		$response['error'] = true;
    $response['message'] = "Required field are missing";
  }
}

echo json_encode($response);
