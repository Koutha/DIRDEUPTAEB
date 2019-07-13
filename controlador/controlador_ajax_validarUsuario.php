<?php 
	class db {
		private 
				$host_db = "localhost",
				$user_db = "postgres",
				$pass_db = "123456",
				$db_name = "DIRDEUPTAEB",
				$db_port = 5432;

		public function conexion(){
			try {
				$conexion = new PDO("pgsql:host=$this->host_db;port=$this->db_port;dbname=$this->db_name",$this->user_db,$this->pass_db);
			} catch (Exception $e) {
				echo "Fallo la conexion". $e->getMessage();
			}
			return $conexion;
		}

		}

	class modelobase {
	private $tabla,$db,$conectar;
	function __construct()
	{
		$this->conectar=new db();
		$this->db=$this->conectar->conexion();
	}

	public function db (){
		return $this->db;
	}
		
	}

	function getbyuser($username){
        try {
            $sql="SELECT * FROM usuarios WHERE nombre_usuario=?";
            $md = new modelobase();
            $db=$md->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $username);
            $query->execute();
            if($fila=$query->fetch(PDO::FETCH_ASSOC)){
                $resultado=$fila;
                return $resultado;
            }else{
                return 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    
	if (getbyuser(htmlspecialchars($_POST['username'],ENT_QUOTES))) {
		echo json_encode(true);
	}else{
		echo json_encode(false);
	}
 ?>
