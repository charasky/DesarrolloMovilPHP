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
	}



	
