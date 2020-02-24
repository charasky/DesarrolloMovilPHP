<?php
include 'conexion.php';
$usu_usuario=$_GET['usuario'];
$consulta="SELECT usu_administrador FROM usuarios WHERE usu_usuario = '$usu_usuario'";
$resultado = $conexion -> query($consulta);
while($fila=resultados -> fetch_array()){
    $admin[] = array_map("utf8_encode",$fila);
}
echo json_encode($admin);
$resultado -> close();
?>
