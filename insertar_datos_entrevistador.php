<?php
include 'conexion_datos.php';

$usu_nombre=$_POST['usu_nombre'];
$usu_apellido=$_POST['usu_apellido'];
$usu_asamblea=$_POST['usu_asamblea'];
$usu_fecha=$_POST['usu_fecha'];

//$usu_usuario="aroncal@gmail.com";
//$usu_password="12345678";

$consulta="insert into persona_entrevistadora values('".$usu_nombre."','".$usu_apellido."','".$usu_asamblea."','".$usu_fecha."')";
mysqli_query($conexion,$consulta) or die (mysqli_error());
mysqli_close($conexion);

?>

