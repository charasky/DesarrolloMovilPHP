<?php
include 'conexion_datos.php';
//Entrevistador 
$usu_nombre=$_POST['usu_nombre'];
$usu_apellido=$_POST['usu_apellido'];
$usu_asamblea=$_POST['usu_asamblea'];
$usu_fecha=$_POST['usu_fecha'];
//Entrevistado
$usu_parentesco_entrevistado=$_POST['usu_parentesco_entrevistado'];

//Victima
$usu_nombre_victima=$_POST['usu_nombre_victima'];
$usu_apellido_victima=$_POST['usu_apellido_victima'];
$usu_genero_victima=$_POST['usu_genero_victima'];
$usu_edad_victima=$_POST['usu_edad_victima'];
$usu_nacionalidad_victima=$_POST['usu_nacionalidad_victima'];
$usu_documento_victima=$_POST['usu_documento_victima'];
$usu_direccion_victima=$_POST['usu_direccion_victima'];
$usu_barrio_victima=$_POST['usu_barrio_victima'];
$usu_telefono_victima=$_POST['usu_telefono_victima'];
//Hecho policial
$usu_dia_hecho=$_POST['usu_dia_hecho'];
$usu_hora_hecho=$_POST['usu_hora_hecho'];
$usu_ubicacion_hecho=$_POST['usu_ubicacion_hecho'];
$usu_cuantos_acompañan=$_POST['usu_cuantos_acompañan'];
$usu_cual_lugar=$_POST['usu_cual_lugar'];
//Fuerzas Intervinientes
$usu_fuerzas_intervinientes=$_POST['usu_fuerzas_intervinientes'];
//Agentes
$usu_cantidad_agentes=$_POST['usu_cantidad_agentes'];
$usu_nombres_agentes=$_POST['usu_nombres_agentes'];
$usu_apodos=$_POST['usu_apodos'];
//Vehiculos
$usu_cantidad_vehiculos=$_POST['usu_cantidad_vehiculos'];
$usu_num_movil=$_POST['usu_num_movil'];
$usu_dominio=$_POST['usu_dominio'];
$usu_conducta_agentes=$_POST['usu_conducta_agentes'];
//Caracteristicas del procedimiento
$usu_motivo_procedimiento=$_POST['usu_motivo_procedimiento'];
$usu_maltratos=$_POST['usu_maltratos'];
$usu_lesiones=$_POST['usu_lesiones'];
//Modalidad de detencion

$usu_posicion_detenido=$_POST['usu_posicion_detenido'];
$usu_tiempo_detenido=$_POST['usu_tiempo_detenido'];
//Traslado
$usu_traslado=$_POST['usu_traslado'];
$usu_comisaria=$_POST['usu_comisaria'];
$usu_esposado=$_POST['usu_esposado'];
//Allanamiento
$usu_orden_allanamiento=$_POST['usu_orden_allanamiento'];
$usu_agresion_allanamiento=$_POST['usu_agresion_allanamiento'];
$usu_pertenencias_allanamiento=$_POST['usu_pertenencias_allanamiento'];
$usu_omision_pertenencias=$_POST['usu_omision_pertenencias'];
$usu_detenidos_allanamiento=$_POST['usu_detenidos_allanamiento'];
$usu_duracion_allanamiento=$_POST['usu_duracion_allanamiento'];
$usu_esposados=$_POST['usu_esposados'];
//Omision al actuar 
$usu_medios_de_asistencia=$_POST['usu_medios_de_asistencia'];
$usu_a_quien_asistencia=$_POST['usu_a_quien_asistencia'];
$usu_denuncia_rechazada=$_POST['usu_denuncia_rechazada'];
$usu_violentado=$_POST['usu_violentado'];
$usu_denuncia_final=$_POST['usu_denuncia_final'];
//Resultado investigacion 
$usu_resultado_de_investigacion=$_POST['usu_resultado_de_investigacion'];
$usu_trabajan_los_oficiales=$_POST['usu_trabajan_los_oficiales'];


$insert_entrevistador="insert into entrevistador values(NULL,'".$usu_nombre."','".$usu_apellido."','".$usu_asamblea."','".$usu_fecha."')";
mysqli_query($conexion,$insert_entrevistador) or die (mysqli_error($conexion));

$insert_entrevistado="insert into entrevistado values(NULL,'".$usu_parentesco_entrevistado."')";
mysqli_query($conexion,$insert_entrevistado) or die (mysqli_error($conexion));

$insert_victima="insert into victima values(NULL,'".$usu_nombre_victima."','".$usu_apellido_victima."','".$usu_genero_victima."','".$usu_edad_victima."','".$usu_nacionalidad_victima."','".$usu_documento_victima."','".$usu_direccion_victima."','".$usu_barrio_victima."','".$usu_telefono_victima."')";
mysqli_query($conexion,$insert_victima) or die (mysqli_error($conexion));

$insert_hecho_policial="insert into hecho_policial values(NULL,'".$usu_dia_hecho."','".$usu_hora_hecho."','".$usu_ubicacion_hecho."','".$usu_cuantos_acompañan."','".$usu_cual_lugar."')";
mysqli_query($conexion,$insert_hecho_policial) or die (mysqli_error($conexion));

$insert_fuerzas_intervinientes="insert into fuerzas_intervinientes values(NULL,'".$usu_fuerzas_intervinientes."','".$usu_cantidad_agentes."','".$usu_nombres_agentes."','".$usu_apodos."','".$usu_cantidad_vehiculos."','".$usu_num_movil."','".$usu_dominio."','".$usu_conducta_agentes."')";
mysqli_query($conexion,$insert_fuerzas_intervinientes) or die (mysqli_error($conexion));

$insert_caracteristicas_procedimiento="insert into caracteristicas_procedimiento values(NULL,'".$usu_motivo_procedimiento."','".$usu_maltratos."','".$usu_lesiones."')";
mysqli_query($conexion,$insert_caracteristicas_procedimiento) or die (mysqli_error($conexion));

$insert_modalidad_de_detencion="insert into modalidad_de_detencion values(NULL,'".$usu_posicion_detenido."','".$usu_tiempo_detenido."')";
mysqli_query($conexion,$insert_de_modalidad_detencion) or die (mysqli_error($conexion));

$insert_traslado="insert into traslado values(NULL,'".$usu_traslado."','".$usu_comisaria."','".$usu_esposado."')";
mysqli_query($conexion,$insert_traslado) or die (mysqli_error($conexion));

$insert_allanamiento="insert into allanamiento values(NULL,'".$usu_orden_allanamiento."','".$usu_agresion_allanamiento."','".$usu_pertenencias_allanamiento."','".$usu_omision_pertenencias."','".$usu_detenidos_allanamiento."','".$usu_duracion_allanamiento."','".$usu_esposados."')";
mysqli_query($conexion,$insert_allanamiento) or die (mysqli_error($conexion));

$insert_omision_actuar="insert into omision_actuar values(NULL,'".$usu_medios_de_asistencia."','".$usu_a_quien_asistencia."','".$usu_denuncia_rechazada."','".$usu_violentado."','".$usu_denuncia_final."')";
mysqli_query($conexion,$insert_omision_actuar) or die (mysqli_error($conexion));

$insert_resultado_investigacion="insert into resultado_investigacion values(NULL,'".$usu_resultado_investigacion."','".$usu_trabajan_los_oficiales."')";
mysqli_query($conexion,$insert_resultado_investigacion) or die (mysqli_error($conexion));

mysqli_close($conexion);

?>


