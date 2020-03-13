<?php

require_once '../includes/DbReporte.php';
require_once '../includes/DbOperations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['usu_usuario']) and
		isset($_POST['id'])){

			$id = $_POST['id'];
			$usuario = $_POST['usu_usuario'];

			$db = new DbReporte();
			$db1 = new DbOperations();


			if($db1->isUserExist($usuario)){
				$response = mysqli_fetch_assoc($db->traerTodoReporte($id));
			}else{
				$response = "usuario no valido";
			}
	}else{
		$response = "falta dato";
	}
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

echo "todos putos :v 4 ";


?>
