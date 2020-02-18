<?php 

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['usu_usuario']) and 
		isset($_POST['usu_fecha']) and 
			isset($_POST['usu_hora']) and 
				isset($_POST['params'])){

		$db = new DbOperations();

		$usu_usuario=$_POST['usu_usuario'];
		$usu_fecha=$_POST['usu_fecha'];
		$usu_hora=$_POST['usu_hora'];
		$obj = json_decode($_POST['params']);

		foreach ($obj as $k=>$v){
			$usu_usuario_interaccion = $db->getUserPorId($k);
			if($v == 'TRUE'){
				$usu_que_hizo="Acepto a Usuario:";
				$db->crearMovimiento($usu_usuario,$usu_que_hizo,$usu_fecha,$usu_hora,$usu_usuario_interaccion);
				$db->enabledUser($k);
			}else{
				$usu_que_hizo="Rechazo a Usuario:";
				$db->crearMovimiento($usu_usuario,$usu_que_hizo,$usu_fecha,$usu_hora,$usu_usuario_interaccion);
				$db->deleteUser($k);
			}
		}
		$response['error'] = false;
		$response['message'] = "Se ha aplicado correctamente.";
	}else{
		$response['error'] = true;
		$response['message'] = "required fields are missing";	
	}	
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
?>
 
       



