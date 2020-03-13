<?php

require_once '../includes/DbReporte.php';
require_once '../includes/DbOperations.php';
$response = [];

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['usu_usuario']) and
		isset($_POST['id'])){

			$id = $_POST['id'];
			$usuario = $_POST['usu_usuario'];

			$db = new DbReporte();
			$db1 = new DbOperations();


			if($db1->isUserExist($usuario)){
				$response = $db->traerTodoReporte($id);
			}else{
				$response = "usuario no valido";
			}
	}else{
		$response = "falta dato";
	}
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}


echo( json_encode([
  'data' => $response
], JSON_UNESCAPED_UNICODE) );

echo json_encode($response, JSON_FORCE_OBJECT);

echo json_encode(utf8ize($response), JSON_FORCE_OBJECT);

echo "todos putos :v 2 ";


?>
