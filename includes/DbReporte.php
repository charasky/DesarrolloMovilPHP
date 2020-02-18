<?php
	class DbReporte{
		private $con3;
		private $con2;
		
		function __construct(){
			
			require_once dirname(__FILE__).'/DbConnect3.php';
			require_once dirname(__FILE__).'/DbConnect2.php';			

			$db2 = new DbConnect2();
			$db3 = new DbConnect3();
			//revisar reporte
			$this->con3 = $db3->connect3();
			$this->con2 = $db2->connect2();
		}
	
		//devuelve todos los reportes por asamblea de usuario normal
		public function getReportesPor($usu_asamblea){
			$stmt = $this->con2->query("SELECT * FROM `reporte` WHERE `r_asamblea` LIKE '$usu_asamblea'");
			$datos= array();

			while($resultado = $stmt->fetch_assoc()){
				$datos[] = $resultado; 
			}
 		   	return $datos;
		}

		//devuelve todos los reportes, solo a usuarios administradores
		public function getReportes(){
			$stmt = $this->con2->query("SELECT * FROM reporte");
			$datos= array();

			while($resultado = $stmt->fetch_assoc()){
				$datos[] = $resultado; 
			}
 		   	return $datos;
		}

		public function allanamiento($allanamiento1, $allanamiento2, $allanamiento3, $allanamiento4, $allanamiento5, $allanamiento6, $allanamiento7, $allanamiento8){
			$stmt = $this->con3->prepare("INSERT INTO `allanamiento` (`id`, `usu_orden_allanamiento`, `usu_agresion_allanamiento`, `usu_pertenencias_allanamiento`, `usu_omision_pertenencias`, `usu_detenidos_allanamiento`, `usu_duracion_allanamiento`, `usu_esposados`, `usu_posicion_allanamiento`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("ssssssss",$allanamiento1, $allanamiento2, $allanamiento3, $allanamiento4, $allanamiento5, $allanamiento6, $allanamiento7, $allanamiento8);
			$stmt->execute();	
		}

		public function prodecimiento($procedimiento1, $procedimiento2, $procedimiento3){
			$stmt = $this->con3->prepare("INSERT INTO `caracteristicas_procedimiento` (`id`, `usu_motivo_procedimiento`, `usu_maltratos`, `usu_lesiones`) VALUES (NULL, ?, ?, ?);");	
			$stmt->bind_param("sss",$procedimiento1, $procedimiento2, $procedimiento3);
			$stmt->execute();	
		}

		public function entrevistado($parentesco1){
			$stmt = $this->con3->prepare("INSERT INTO `entrevistado` (`id`, `usu_parentesco_entrevistado`) VALUES (NULL, ?);");	
			$stmt->bind_param("s",$parentesco1);
			$stmt->execute();	
		}

		public function entrevistador($entrevistador1, $entrevistador2, $entrevistador3, $entrevistador4){
			$stmt = $this->con3->prepare("INSERT INTO `entrevistador` (`id`, `usu_nombre`, `usu_apellido`, `usu_asamblea`, `usu_fecha`) VALUES (NULL, ?, ?, ?, ?);");	
			$stmt->bind_param("ssss",$entrevistador1, $entrevistador2, $entrevistador3, $entrevistador4);
			$stmt->execute();	
		}

		public function fuerzasIntervinientes($fuerzas1, $fuerzas2, $fuerzas3, $fuerzas4, $fuerzas5, $fuerzas6, $fuerzas7, $fuerzas8){
			$stmt = $this->con3->prepare("INSERT INTO `fuerzas_intervinientes` (`id`, `usu_fuerzas_intervinientes`, `usu_cantidad_agentes`, `usu_nombres_agentes`, `usu_apodos`, `usu_cantidad_vehiculos`, `usu_num_movil`, `usu_dominio`, `usu_conducta_agentes`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("ssssssss",$fuerzas1, $fuerzas2, $fuerzas3, $fuerzas4, $fuerzas5, $fuerzas6, $fuerzas7, $fuerzas8);
			$stmt->execute();	
		}

		public function hechoPolicial($hecho1, $hecho2, $hecho3, $hecho4, $hecho5, $hecho6, $hecho7){
			$stmt = $this->con3->prepare("INSERT INTO `hecho_policial` (`id`, `usu_dia_hecho`, `usu_fecha_hecho`, `usu_ubicacion_hecho`, `usu_cuantos_acompañan`, `usu_cual_lugar`, `usu_provincia_hecho`, `usu_pais_hecho`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("sssssss",$hecho1, $hecho2, $hecho3, $hecho4, $hecho5, $hecho6, $hecho7);
			$stmt->execute();	
		}

		public function modalidadDetencion($modalidad1, $modalidad2){
			$stmt = $this->con3->prepare("INSERT INTO `modalidad_detencion` (`id`, `usu_posicion_detenido`, `usu_tiempo_detenido`) VALUES (NULL, ?, ?);");	
			$stmt->bind_param("ss",$modalidad1, $modalidad2);
			$stmt->execute();	
		}

		public function omisionActuar($omision1, $omision2, $omision3, $omision4, $omision5){
			$stmt = $this->con3->prepare("INSERT INTO `omision_actuar` (`id`, `usu_medios_de_asistencia`, `usu_a_quien_asistencia`, `usu_denuncia_rechazada`, `usu_violentado`, `usu_denuncia_final`) VALUES (NULL, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("sssss",$omision1, $omision2, $omision3, $omision4, $omision5);
			$stmt->execute();	
		}

		public function resultadoInvestigacion($resultado1, $resultado2){
			$stmt = $this->con3->prepare("INSERT INTO `resultado_investigacion` (`id`, `usu_resultado_investigacion`, `usu_trabajan_los_oficiales`) VALUES (NULL, ?, ?);");	
			$stmt->bind_param("ss",$resultado1, $resultado2);
			$stmt->execute();	
		}

		public function traslado($traslado1, $traslado2, $traslado3){
			$stmt = $this->con3->prepare("INSERT INTO `traslado` (`id`, `usu_traslado`, `usu_comisaria`, `usu_esposado`) VALUES (NULL, ?, ?, ?);");	
			$stmt->bind_param("sss",$traslado1, $traslado2, $traslado3);
			$stmt->execute();	
		}

		public function victima($victima1, $victima2, $victima3, $victima4, $victima5, $victima6, $victima7, $victima8, $victima9){
			$stmt = $this->con3->prepare("INSERT INTO `victima` (`id`, `usu_nombre_victima`, `usu_apellido_victima`, `usu_genero_victima`, `usu_edad_victima`, `usu_nacionalidad_victima`, `usu_documento_victima`, `usu_direccion_victima`, `usu_barrio_victima`, `usu_telefono_victima`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("sssssssss",$victima1, $victima2, $victima3, $victima4, $victima5, $victima6, $victima7, $victima8, $victima9);
			$stmt->execute();	
		}

		//para que pueda verse en buscar

		public function registrarReporte($registrar1, $registrar2, $registrar3, $registrar4, $registrar5, $registrar6){
			$stmt = $this->con2->prepare("INSERT INTO `reporte` (`id`, `r_pais`, `r_ciudad`, `fecha`, `vic_nombre`, `vic_apellido`, `r_asamblea`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
			$stmt->bind_param("ssssss",$registrar1, $registrar2, $registrar3, $registrar4, $registrar5, $registrar6);
			$stmt->execute();
		}


	}
?>
