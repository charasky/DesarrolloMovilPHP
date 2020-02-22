<?php
	class DbOperations{
		private $con;
		private $con2;
		
		function __construct(){
			
			require_once dirname(__FILE__).'/DbConnect.php';
			require_once dirname(__FILE__).'/DbConnect2.php';
		
			$db = new DbConnect();
			$db2 = new DbConnect2();
			
			$this->con = $db->connect();
			$this->con2 = $db2->connect2();
		}
		
		/*CRUD -> C -> CREATE */
		
		public function createUser($usu_usuario, $usu_pass, $usu_nombres, $usu_apellidos, $usu_asamblea){
			if($this->isUserExist($usu_usuario)){
				return 0;
			}else{
				if($this->getExisteAsamblea($usu_asamblea)){
					$usu_password = md5($usu_pass);
					$stmt = $this->con->prepare("INSERT INTO `usuarios` (`id`, `usu_usuario`, `usu_password`, `usu_nombres`, `usu_apellidos`, `usu_asamblea`, `usu_validacion`, `usu_administrador`) VALUES (NULL, ?, ?, ?, ?, ?, 'FALSE', 'FALSE');");
					$stmt->bind_param("sssss",$usu_usuario,$usu_password,$usu_nombres,$usu_apellidos,$usu_asamblea);
				
					if($stmt->execute()){
						return 1; 
					}else{
						return 2; 
					}
				}else{
					return 3;
				}
			}
		}

		public function userLogin($usu_usuario, $usu_pass){
			$usu_password = md5($usu_pass);
			$stmt = $this->con->prepare("SELECT id FROM usuarios WHERE usu_usuario = ? AND usu_password = ?");
			$stmt->bind_param("ss",$usu_usuario,$usu_password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}

		public function getUserByUsuario($usu_usuario){
			$stmt = $this->con->prepare("SELECT * FROM usuarios WHERE usu_usuario = ?");
			$stmt->bind_param("s",$usu_usuario);
			$stmt->execute();
			return $stmt->get_result()->fetch_assoc();
		}

		public function isUserExist($usu_usuario){
			$stmt = $this->con->prepare("SELECT id FROM usuarios WHERE usu_usuario = ?");
			$stmt->bind_param("s",$usu_usuario);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;		
		}

		public function getExisteAsamblea($usu_asamblea){
			$stmt = $this->con2->prepare("SELECT id FROM asamblea WHERE usu_asamblea = ?");
			$stmt->bind_param("s",$usu_asamblea);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;	
		}

		public function getDisabledUsers(){
			$stmt = $this->con->query("SELECT `id`, `usu_usuario`, `usu_nombres`, `usu_apellidos`, `usu_asamblea` FROM `usuarios` WHERE `usu_validacion` LIKE 'FALSE'");
			$disabledDatos= array();

			while($resultado = $stmt->fetch_assoc()){
				$disabledDatos[] = $resultado; 
			}
 		   	return $disabledDatos;
		}

		public function restorePassword($usu_usuario, $usu_pass){
			if(!$this->isUserExist($usu_usuario)){
				return 0;
			}else{
				$usu_password = md5($usu_pass);
				$id = $this->getIdUser($usu_usuario);
				$stmt = $this->con->prepare("UPDATE `usuarios` SET `usu_password` = '$usu_password' WHERE `usuarios`.`id` = $id");
				$stmt->execute();	
				return 1;	
			}	
		}

		private function getIdUser($usu_usuario){
			$stmt = $this->con->prepare("SELECT `id` FROM `usuarios` WHERE `usu_usuario` LIKE '$usu_usuario'");
			$stmt->execute();
			$id = $stmt->get_result()->fetch_assoc();
			return $id['id'];
		}

		public function blockUser($usu_usuario){
			$id = $this->getIdUser($usu_usuario);
			$stmt = $this->con->prepare("UPDATE `usuarios` SET `usu_validacion` = 'FALSE' WHERE `usuarios`.`id` = $id");
			$stmt->execute();	
			return 1;
		}
		
		//nuevo .v.
		public function enabledUser($id){
			$stmt = $this->con->prepare("UPDATE `usuarios` SET `usu_validacion` = 'TRUE' WHERE `usuarios`.`id` = $id");
			$stmt->execute();
		}

		public function deleteUser($id){
			$stmt = $this->con->prepare("DELETE FROM `usuarios` WHERE `usuarios`.`id` = $id");
			$stmt->execute();
		}
		
		public function movimientos(){
			$stmt = $this->con2->query("SELECT `usu_usuario`, `usu_que_hizo`, `usu_fecha`, `usu_hora`, `usu_usuario_interaccion` FROM `movimiento`");
			$movimientos= array();

			while($resultado = $stmt->fetch_assoc()){
				$movimientos[] = $resultado; 
			}
 		   	return $movimientos;
		}
			
		public function crearMovimiento($usu_usuario, $usu_que_hizo, $usu_fecha, $usu_hora, $usu_usuario_interaccion){
			$stmt = $this->con2->prepare("INSERT INTO `movimiento` (`id`, `usu_usuario`, `usu_que_hizo`, `usu_fecha`, `usu_hora`, `usu_usuario_interaccion`) VALUES (NULL, ?, ?, ?, ?, ?);");	
			$stmt->bind_param("sssss",$usu_usuario,$usu_que_hizo,$usu_fecha,$usu_hora,$usu_usuario_interaccion);
			$stmt->execute();	
		}

		//devuelve el email del usuario por id
		public function getUserPorId($id){
			$stmt = $this->con->prepare("SELECT `usu_usuario` FROM `usuarios` WHERE `id` = $id");
			$stmt->execute();
			$user = $stmt->get_result()->fetch_assoc();
			return $user['usu_usuario'];
		}
}



	
