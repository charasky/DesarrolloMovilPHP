<?php
include 'conexion.php';
//$usu_usuario=$_POST['usuario'];
$usu_usuario="test";
$resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usu_usuario = $usu_usuario");
while($consulta = mysqli_fetch_array($resultado))
{
	echo $consulta['usu_validacion'];
}
$conexion->close();
?>

