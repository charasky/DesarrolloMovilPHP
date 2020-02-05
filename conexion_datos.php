<?php
$hostname='localhost';
$database='datos';
$username='test';
$password='password';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "El sitio web está experimentado problemas";
}
?>
