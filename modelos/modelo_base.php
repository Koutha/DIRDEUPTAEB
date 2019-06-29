<?php 
/**
* 
*/
class modelobase
{
	private $tabla,$db,$conectar;

	function __construct($tbl)
	{
		$this->tabla= $tbl;
		require_once ('core/db.php');
		$this->conectar=new db();
		$this->db=$this->conectar->conexion();
	}

	public function getconectar(){
		return $this->conectar;
	}

	public function db (){
		return $this->db;
	}

	

	public function getbyid($id){
		$sql = "SELECT * FROM $this->tabla WHERE id='$id'";
		$db  = $this->db();
		$query=$db->query($sql);
		if($fila=$query->fetch(PDO::FETCH_ASSOC)){
			$resultado=$fila;
		}
			
		return $resultado;
	}

	public function getbyci($ci){
		$sql = "SELECT * FROM $this->tabla WHERE cedula='$ci'";
		$db  = $this->db();
		$query=$db->query($sql);
		if($fila=$query->fetch(PDO::FETCH_ASSOC)){
			$resultado=$fila;
			return $resultado;
		}
		else{
			return 0;
		}	
		
	}

	public function getbynumviv($numviv){
		$sql = "SELECT * FROM $this->tabla WHERE numero_vivienda='$numviv'";
		$db  = $this->db();
		$query=$db->query($sql);
		if($fila=$query->fetch(PDO::FETCH_ASSOC)){
			$resultado=$fila;
			return $resultado;
		}
		else{
			return 0;
		}	
		
	}

	public function getby($columna, $valor){
		$sql ="SELECT * FROM $this->tabla WHERE $columna='$valor'";
		$query=$this->db->query($sql);
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

	public function borrar($id){
		try {
			$sql= "DELETE FROM $this->tabla WHERE id=?";
			$db=$this->db();
			$query=$db->prepare($sql);

			$query->bindParam(1, $id);
			$resultado=$query->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return 0;
	}

	public function borrarpor($columna,$valor){
		$query=$this->db->query("DELETE FROM $this->tabla WHERE $columna='$valor'");
		return $query;
	}

	public function listarAdm(){
		$sql = "SELECT us.id_usuario, nombre_usuario, correo, rol, status FROM usuarios AS us, roles AS r, rol AS ro WHERE us.id_usuario=r.id_usuario AND r.id_rol=ro.id_rol";
		$query=$this->db->query($sql);

		while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
			$resultado[]=$fila;
		}
		return $resultado;
	}

	public function getAutoSaves(){
		$sql= 'SELECT   *
                FROM "db_backup_autosave"';
        $query = $this->db->query($sql);
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
             $resultado[] = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }
	}

	
}

?>