<?php
include 'conexion.php';

$usu_usuario=$_POST['usu_usuario'];
$usu_password=$_POST['usu_password'];
$usu_nombres=$_POST['usu_nombres'];
$usu_apellidos=$_POST['usu_apellidos'];
$usu_asamblea=$_POST['usu_asamblea'];
$usu_validacion=$_POST['usu_validacion'];
$usu_administrador=$_POST['usu_administrador'];

$insertar="insert into usuarios values('".$usu_usuario."','".$usu_password."','".$usu_nombres."','".$usu_apellidos."','".$usu_asamblea."','".$usu_validacion."','".$usu_administrador."')";
mysqli_query($conexion,$insertar) or die ("Problemas con el servidor intente registrarse luego".mysqli_error($conexion));
echo "Nueva cuenta con exito";
mysqli_close($conexion);

?>

