<?php
	
	class DbConnect2{
		private $con2;
		
		function __construct(){
		}
	
		function connect2(){
			include_once dirname(__FILE__)  . '/Constants2.php';

			$this->con = new mysqli(hostname, username, password, userbase);

			if(mysqli_connect_errno()){
				echo "El servidor está experimentado problemas" . mysqli_connect_err();
			}
			
			return $this->con;
		}
	}
