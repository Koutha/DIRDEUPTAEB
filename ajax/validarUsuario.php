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

    function consultarDatos($cedula){
            $sql ='SELECT  ta.cedula_atleta, ta.nombres, ta.apellidos, ta.fecha_nacimiento,
	                       ta.direccion, ta.tel_movil, ta.tel_fijo, ta.correo, ta.sexo,
	                       ta.dir_foto, ta.dir_cedula, ta.status, taa.trayecto,
	                       taa.año_ingreso, taa.dir_planilla, taa.dir_carnet, taa.id_pnf,
	                       tam.estatura, tam.peso, tam.tipo_sangre, tam.contacto_emergencia,
	                       tam.tel_contacto, tam.info_discapacidad, tam.observaciones,
	                       tam.info_alergias, tau.talla_franela, tau.talla_pantalon,
	                       tau.talla_short, tau.talla_zapato, tau.talla_gorra, tau.talla_chaqueta
                    FROM "T_atleta" ta
                    JOIN "T_atleta_academico"  taa ON ta.cedula_atleta=taa.cedula_atleta
                    JOIN "T_atleta_medico"     tam ON ta.cedula_atleta=tam.cedula_atleta
                    JOIN "T_atleta_uniforme"   tau ON ta.cedula_atleta=tau.cedula_atleta
                    WHERE ta.cedula_atleta=?';
            $md = new modelobase();        
            $db= $md->db();
	        $query=$db->prepare($sql);
	        $query->bindParam(1, $cedula);
	        $query->execute();
	        while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
            	$resultado=$fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }

     }

    function consultarDatosPT($cedula){
	        	$sql ='SELECT  ta.cedula_et,ta.nombres,ta.apellidos,ta.tel_movil,ta.correo, 
                               ta.cargo,ta.dir_foto,ta.dir_cedula
                            
		               FROM "T_equipo_tecnico" ta
		               WHERE ta.cedula_et=?';
		    $md = new modelobase();
	        $db= $md->db();
	        $query=$db->prepare($sql);
	        $query->bindParam(1, $cedula);
	        $query->execute();
	        while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
            	$resultado=$fila;
        	}
        	if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }

    }

    if (isset($_POST['username'])) {
    	if (getbyuser(htmlspecialchars($_POST['username'],ENT_QUOTES))) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
    }else if(isset($_POST['cedula'])){
    	if (consultarDatos(htmlspecialchars($_POST['cedula'],ENT_QUOTES))) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
    }else if(isset($_POST['cedula_et'])){
    	if (consultarDatosPT(htmlspecialchars($_POST['cedula_et'],ENT_QUOTES))) {
    		echo json_encode(true);
    	}else {
    		echo json_encode(false);
    	}
    }
	
 ?>
