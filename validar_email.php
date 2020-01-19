<?php
include 'conexion.php';
$usu_usuario=$_POST['usuario'];
//$usu_usuario="test";
//$usu_usuario="nano";
$sentencia=$conexion->prepare("SELECT usu_usuario FROM usuarios WHERE usu_usuario=?");
$sentencia->bind_param('s',$usu_usuario);
$sentencia->execute();
$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}

$sentencia->close();
$conexion->close();
?>
