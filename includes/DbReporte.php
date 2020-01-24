<?php
	class DbReporte{
		private $con2;
		
		function __construct(){
			
			require_once dirname(__FILE__).'/DbConnect2.php';
		
			$db2 = new DbConnect2();
			
			$this->con2 = $db2->connect2();
		}
	

		public function getReportesPor($usu_asamblea){
			$stmt = $this->con2->query("SELECT * FROM `reporte` WHERE `r_asamblea` LIKE '$usu_asamblea'");
			$datos= array();

			while($resultado = $stmt->fetch_assoc()){
				$datos[] = $resultado; 
			}
 		   	return $datos;
		}

		public function getReportes(){
			$stmt = $this->con2->query("SELECT * FROM reporte");
			$datos= array();

			while($resultado = $stmt->fetch_assoc()){
				$datos[] = $resultado; 
			}
 		   	return $datos;
		}
	}
?>
