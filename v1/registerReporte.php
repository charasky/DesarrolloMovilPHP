<?php 

require_once '../includes/DbReporte.php';
$validate =true;
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['fechaReporte']) and 
		isset($_POST['horaReporte']) and 
			isset($_POST['reporte'])){

		$fecha=$_POST['fechaReporte'];
		$hora=$_POST['horaReporte'];
		$obj = json_decode($_POST['reporte']);
		$validateHoraFecha = true;
		$db = new DbReporte();

		//echo $obj->{'0'};
		/*
		foreach( $obj as $key => $val ){
			if(empty($val)){
				$validate = false;
			}
		}

		if($validate){ */
			$db->registrarReporte($obj->{'usu_pais_hecho'}, $obj->{'usu_provincia_hecho'}, $fecha, $obj->{'usu_nombre_victima'}, $obj->{'usu_apellido_victima'}, $obj->{'usu_asamblea'}, $hora);
			$db->allanamiento($obj->{'usu_orden_allanamiento'}, $obj->{'usu_agresion_allanamiento'}, $obj->{'usu_pertenencias_allanamiento'}, $obj->{'usu_omision_pertenencias'}, $obj->{'usu_detenidos_allanamiento'}, $obj->{'usu_duracion_allanamiento'}, $obj->{'usu_esposados'}, $obj->{'usu_posicion_allanamiento'});
			$db->prodecimiento($obj->{'usu_motivo_procedimiento'}, $obj->{'usu_maltratos'}, $obj->{'usu_lesiones'});
			$db->entrevistado($obj->{'usu_parentesco_entrevistado'});
			$db->entrevistador($obj->{'usu_nombre'}, $obj->{'usu_apellido'}, $obj->{'usu_asamblea'}, $obj->{'usu_fecha'});
			$db->fuerzasIntervinientes($obj->{'usu_fuerzas_intervinientes'}, $obj->{'usu_cantidad_agentes'},$obj->{'usu_nombres_agentes'}, $obj->{'usu_apodos'}, $obj->{'usu_cantidad_vehiculos'}, $obj->{'usu_num_movil'}, $obj->{'usu_dominio'}, $obj->{'usu_conducta_agentes'});
			$db->hechoPolicial($obj->{'usu_dia_hecho'}, $obj->{'usu_hora_hecho'}, $obj->{'usu_cuantos_acompañan'}, $obj->{'usu_cual_lugar'}, $obj->{'usu_provincia_hecho'}, $obj->{'usu_pais_hecho'},$obj->{'usu_direccion_hecho'}, $obj->{'usu_barrio_hecho'});
			$db->modalidadDetencion($obj->{'usu_posicion_detenido'}, $obj->{'usu_tiempo_detenido'});
			$db->omisionActuar($obj->{'usu_medios_de_asistencia'}, $obj->{'usu_a_quien_asistencia'}, $obj->{'usu_denuncia_rechazada'}, $obj->{'usu_violentado'}, $obj->{'usu_denuncia_final'});
			$db->resultadoInvestigacion($obj->{'usu_resultado_investigacion'}, $obj->{'usu_trabajan_los_oficiales'});	
			$db->traslado($obj->{'usu_traslado'}, $obj->{'usu_comisaria'}, $obj->{'usu_esposado'});
			$db->victima($obj->{'usu_nombre_victima'}, $obj->{'usu_apellido_victima'}, $obj->{'usu_genero_victima'}, $obj->{'usu_edad_victima'}, $obj->{'usu_nacionalidad_victima'}, $obj->{'usu_documento_victima'}, $obj->{'usu_direccion_victima'}, $obj->{'usu_barrio_victima'}, $obj->{'usu_telefono_victima'});
			
			$response['error'] = false;
			$response['message'] = "Se ha guardado correctamente.";
			$response['validate'] = true;
		/*
		}else{
			$response['error'] = false;
			$response['message'] = "Verifique campos";
			$response['validate'] = false;
		} */
	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";	
	}	
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
?>