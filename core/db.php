<?php 
	class db {
		private 
				$host_db = "localhost",
				$user_db = "postgres",
				$pass_db = "1",
				$db_name = "DIRDEUPTAEB",
				$db_port = 5433;
				//$tbl_name = "usuarios";


		public function conexion(){
			/*$conexion = new mysqli($this->host_db, $this->user_db, $this->pass_db, $this->db_name);
			if ($conexion->connect_error) {
 				die("La conexion falló: " . $conexion->connect_error);
			}
			return $conexion;*/
			try {
				$conexion = new PDO("pgsql:host=$this->host_db;port=$this->db_port;dbname=$this->db_name",$this->user_db,$this->pass_db);
	
			} catch (Exception $e) {
				echo "Fallo la conexion". $e->getMessage();
		
			}
			return $conexion;
		}

	}
 ?>
