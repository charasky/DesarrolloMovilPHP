
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['usu_usuario']) and isset($_POST['usu_password'])){

		$db = new DbOperations();
		$result = $db->restorePassword($_POST['usu_usuario'],$_POST['usu_password']);
		if($result > 0){
			$response['error'] = false;
			$response['message'] = "Cambio con exito";
		}elseif($result == 0){
			$response['error'] = true;
			$response['message'] = "El email ingresado no existe";
			$response['revisar'] = "email";
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

?>
