<?php
//en proceso
require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['usu_usuario'])){
        $db = new DbOperations(); 
        
		if($db->isUserExist($_POST['usu_usuario'])){
			$response['error'] = false;
			$response['message'] = "Verifique su email.";
			$response['existe'] = "1";
		}else{
			$response['error'] = false;
			$response['message'] = "El email no existe.";
			$response['existe'] = "0";
		}
    }
}

echo json_encode($response);
