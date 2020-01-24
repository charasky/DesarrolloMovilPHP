
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['usu_usuario']) and 
			isset($_POST['usu_password']) and 
				isset($_POST['usu_nombres']) and 
					isset($_POST['usu_apellidos']) and 
						isset($_POST['usu_asamblea']))
		{
		//operate the data further 

		$db = new DbOperations();
		
		$result = $db->createUser(	$_POST['usu_usuario'],
						$_POST['usu_password'],
						$_POST['usu_nombres'],
						$_POST['usu_apellidos'],
						$_POST['usu_asamblea']
					);
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
