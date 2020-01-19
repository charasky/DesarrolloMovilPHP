<?php
error_reporting(E_ALL ^ E_NOTICE);
$hostname='localhost';
$database='datos';
$username='test';
$password='password';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "El sitio web está experimentado problemas";
}
?>
