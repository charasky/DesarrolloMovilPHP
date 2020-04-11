<?php

require_once '../includes/DbReporte.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['info'])){

		$db = new DbReporte();

		$obj = json_decode($_POST['info']);

		$db->editReporte($obj->{'id'},$obj->{'tabla'},$obj->{'fila'},$obj->{'valor'});

		$response['error'] = false;
		$response['message'] = "Modificado.";
	}else{
		$response['error'] = true;
		$response['message'] = "Problemas en la red";
	}
}else{
	$response['error'] = true;
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
?>
