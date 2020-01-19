<?php
error_reporting(E_ALL ^ E_NOTICE);
$hostname='localhost';

$database='usuarios';

$username='test';

$password='password';



$conexion=new mysqli($hostname,$username,$password,$database);

if($conexion->connect_errno){

    echo "Problemas con el servidor principal intente mas tarde";

}

?>
