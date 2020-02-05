<?php
$hostname='localhost';

$database='usuarios';

$username='test';

$password='password';



$conexion=new mysqli($hostname,$username,$password,$database);

if($conexion->connect_errno){

    echo "Problemas con el servidor principal intente mas tarde";

}

?>
