<?php
class DbReporte{
	private $con3;
	private $con2;

	function __construct(){

		require_once dirname(__FILE__) . '/DbConnect3.php';
		require_once dirname(__FILE__) . '/DbConnect2.php';

		$db2 = new DbConnect2();
		$db3 = new DbConnect3();
		//revisar reporte
		$this->con3 = $db3->connect3();
		$this->con2 = $db2->connect2();
	}

	//devuelve todos los reportes por asamblea de usuario normal
	public function getReportesPor($usu_asamblea){
		$stmt = $this->con2->query("SELECT * FROM `reporte` WHERE `r_asamblea` LIKE '$usu_asamblea'");
		$datos = array();

		while ($resultado = $stmt->fetch_assoc()) {
			$datos[] = $resultado;
		}
		return $datos;
	}

	//devuelve todos los reportes, solo a usuarios administradores
	public function getReportes(){
		$stmt = $this->con2->query("SELECT * FROM reporte");
		$datos = array();

		while ($resultado = $stmt->fetch_assoc()) {
			$datos[] = $resultado;
		}
		return $datos;
	}

	//guardar reporte
	public function allanamiento($usu_orden_allanamiento, $usu_agresion_allanamiento, $usu_pertenencias_allanamiento, $usu_omision_pertenencias, $usu_detenidos_allanamiento, $usu_duracion_allanamiento, $usu_esposados, $usu_posicion_allanamiento){
		$insert_allanamiento = "insert into allanamiento values(NULL,'" . $usu_orden_allanamiento . "','" . $usu_agresion_allanamiento . "','" . $usu_pertenencias_allanamiento . "','" . $usu_omision_pertenencias . "','" . $usu_detenidos_allanamiento . "','" . $usu_duracion_allanamiento . "','" . $usu_esposados . "','" . $usu_posicion_allanamiento . "')";
		mysqli_query($this->con3, $insert_allanamiento) or die(mysqli_error($this->con3));
	}

	public function prodecimiento($usu_motivo_procedimiento, $usu_maltratos, $usu_lesiones){
		$insert_caracteristicas_procedimiento = "insert into caracteristicas_procedimiento values(NULL,'" . $usu_motivo_procedimiento . "','" . $usu_maltratos . "','" . $usu_lesiones . "')";
		mysqli_query($this->con3, $insert_caracteristicas_procedimiento) or die(mysqli_error($this->con3));
	}

	public function entrevistado($usu_parentesco_entrevistado){
		$insert_entrevistado = "insert into entrevistado values(NULL,'" . $usu_parentesco_entrevistado . "')";
		mysqli_query($this->con3, $insert_entrevistado) or die(mysqli_error($this->con3));
	}

	public function entrevistador($usu_nombre, $usu_apellido, $usu_asamblea, $usu_fecha){
		$insert_entrevistador = "insert into entrevistador values(NULL,'" . $usu_nombre . "','" . $usu_apellido . "','" . $usu_asamblea . "','" . $usu_fecha . "')";
		mysqli_query($this->con3, $insert_entrevistador) or die(mysqli_error($this->con3));
	}

	public function fuerzasIntervinientes($usu_fuerzas_intervinientes, $usu_cantidad_agentes, $usu_nombres_agentes, $usu_apodos, $usu_cantidad_vehiculos, $usu_num_movil, $usu_dominio, $usu_conducta_agentes){
		$insert_fuerzas_intervinientes = "insert into fuerzas_intervinientes values(NULL,'" . $usu_fuerzas_intervinientes . "','" . $usu_cantidad_agentes . "','" . $usu_nombres_agentes . "','" . $usu_apodos . "','" . $usu_cantidad_vehiculos . "','" . $usu_num_movil . "','" . $usu_dominio . "','" . $usu_conducta_agentes . "')";
		mysqli_query($this->con3, $insert_fuerzas_intervinientes) or die(mysqli_error($this->con3));
	}

	public function hechoPolicial($usu_dia_hecho, $usu_hora_hecho, $usu_cuantos_acompanian, $usu_cual_lugar, $usu_provincia_hecho, $usu_pais_hecho, $usu_direccion_hecho, $usu_barrio_hecho){
		$insert_hecho_policial = "insert into hecho_policial values(NULL,'" . $usu_dia_hecho . "','" . $usu_hora_hecho . "','" . $usu_cuantos_acompanian . "','" . $usu_cual_lugar . "','" . $usu_provincia_hecho . "','" . $usu_pais_hecho . "','" . $usu_direccion_hecho . "','" . $usu_barrio_hecho . "')";
		mysqli_query($this->con3, $insert_hecho_policial) or die(mysqli_error($this->con3));
	}

	public function modalidadDetencion($usu_posicion_detenido, $usu_tiempo_detenido){
		$insert_modalidad_detencion = "insert into modalidad_detencion values(NULL,'" . $usu_posicion_detenido . "','" . $usu_tiempo_detenido . "')";
		mysqli_query($this->con3, $insert_modalidad_detencion) or die(mysqli_error($this->con3));
	}

	public function omisionActuar($usu_medios_de_asistencia, $usu_a_quien_asistencia, $usu_denuncia_rechazada, $usu_violentado, $usu_denuncia_final){
		$insert_omision_actuar = "insert into omision_actuar values(NULL,'" . $usu_medios_de_asistencia . "','" . $usu_a_quien_asistencia . "','" . $usu_denuncia_rechazada . "','" . $usu_violentado . "','" . $usu_denuncia_final . "')";
		mysqli_query($this->con3, $insert_omision_actuar) or die(mysqli_error($this->con3));
	}

	public function resultadoInvestigacion($usu_resultado_investigacion, $usu_trabajan_los_oficiales){
		$insert_resultado_investigacion = "insert into resultado_investigacion values(NULL,'" . $usu_resultado_investigacion . "','" . $usu_trabajan_los_oficiales . "')";
		mysqli_query($this->con3, $insert_resultado_investigacion) or die(mysqli_error($this->con3));
	}

	public function traslado($usu_traslado, $usu_comisaria, $usu_esposado){
		$insert_traslado = "insert into traslado values(NULL,'" . $usu_traslado . "','" . $usu_comisaria . "','" . $usu_esposado . "')";
		mysqli_query($this->con3, $insert_traslado) or die(mysqli_error($this->con3));
	}

	public function victima($usu_nombre_victima, $usu_apellido_victima, $usu_genero_victima, $usu_edad_victima, $usu_nacionalidad_victima, $usu_documento_victima, $usu_direccion_victima, $usu_barrio_victima, $usu_telefono_victima){
		$insert_victima = "insert into victima values(NULL,'" . $usu_nombre_victima . "','" . $usu_apellido_victima . "','" . $usu_genero_victima . "','" . $usu_edad_victima . "','" . $usu_nacionalidad_victima . "','" . $usu_documento_victima . "','" . $usu_direccion_victima . "','" . $usu_barrio_victima . "','" . $usu_telefono_victima . "')";
		mysqli_query($this->con3, $insert_victima) or die(mysqli_error($this->con3));
	}


	public function registrarReporte($registrar1, $registrar2, $registrar3, $registrar4, $registrar5, $registrar6, $registrar7){
		$stmt = $this->con2->prepare("INSERT INTO `reporte` (`id`, `r_pais`, `r_ciudad`, `fecha`, `vic_nombre`, `vic_apellido`, `r_asamblea`, `r_hora`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("sssssss", $registrar1, $registrar2, $registrar3, $registrar4, $registrar5, $registrar6, $registrar7);
		$stmt->execute();
	}

	public function crearReporteAnonimo($usu_email_anonimo, $usu_celular_anonimo, $usu_barrio_anonimo, $usu_provincia_anonimo, $usu_pais_anonimo, $usu_detalle_anonimo, $usu_fecha_hecho_anonimo, $usu_hora_hecho_anonimo, $fecha_reporte_anonimo_creacion, $hora_reporte_anonimo_creacion){
		$insert_reporte_anonimo = "insert into reporteAnonimo values(NULL,'" . $usu_email_anonimo . "','" . $usu_celular_anonimo . "','" . $usu_barrio_anonimo . "','" . $usu_provincia_anonimo . "','" . $usu_pais_anonimo . "','" . $usu_detalle_anonimo . "','" . $usu_fecha_hecho_anonimo . "','" . $usu_hora_hecho_anonimo . "','" . $fecha_reporte_anonimo_creacion . "','" . $hora_reporte_anonimo_creacion . "')";
		mysqli_query($this->con2, $insert_reporte_anonimo) or die(mysqli_error($this->con2));
	}

	//traer la informacion del reporte por id
	public function traerTodoReporte($id){
		$stmt = $this->con3->prepare("SELECT * from allanamiento, caracteristicas_procedimiento , entrevistado,entrevistador , fuerzas_intervinientes , hecho_policial , modalidad_detencion , omision_actuar , resultado_investigacion , traslado , victima where allanamiento.id =$id");
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}

	public function editReporte($id, $dbTable, $dbSet, $valorSet){
		$stmt = $this->con3->prepare("UPDATE $dbTable SET $dbSet = '$valorSet' WHERE $dbTable.id = $id");
		$stmt->execute();
	}

}
