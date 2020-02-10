<?php
	
	class DbConnect3{
		private $con3;
		
		function __construct(){
		}
	
		function connect3(){
			include_once dirname(__FILE__)  . '/Constants3.php';

			$this->con3 = new mysqli(Hostname, Username, Password, Userbase);

			if(mysqli_connect_errno()){
				echo "El servidor está experimentado problemas" . mysqli_connect_err();
			}
			
			return $this->con3;
		}
	}
