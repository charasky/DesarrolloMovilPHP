<?php 

require_once '../includes/DbOperations.php';

//falta poner issert

//$response = array(); 
if($_SERVER['REQUEST_METHOD']=='POST'){
	$usu_usuario=$_POST['usu_usuario'];
	$usu_fecha=$_POST['usu_fecha'];
	$usu_hora=$_POST['usu_hora'];
	$obj = json_decode($_POST['params']);

	$db = new DbOperations();
    foreach ($obj as $k=>$v){
		$usu_usuario_interaccion = $db->getUserPorId($k);
		echo $usu_usuario_interaccion;
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
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

//echo json_encode($response);

 
       



