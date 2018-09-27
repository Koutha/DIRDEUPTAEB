<?php 
	class db {
		private 
				$host_db = "b915mj1agx05hlp-postgresql.services.clever-cloud.com",
				$user_db = "ulcfizzz3pgben6ktefs",
				$pass_db = "WCBfcc0qWhOEzatXODoy",
				$db_name = "b915mj1agx05hlp",
				$db_port = 5432;
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
