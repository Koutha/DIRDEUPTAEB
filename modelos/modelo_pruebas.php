
<?php 
	include_once('modelos/modelo_base.php');

	/**
	* 
	*/
	class Cprueba extends modelobase
	{
		private $tabla;

		public function __construct()
		{
			$this->tabla= "T_prueba";
			parent::__construct($this->tabla);	
		}

		public function registrarprueba($nombre,$descripcion,$tipo_prueba,
                                        $objetivo,$unidad,$rango1,
                                        $rango2,$rango3,$rango4)
        {
            try {
 
                $sql='INSERT INTO "T_prueba" (nombre,descripcion,tipo_prueba,objetivo,unidad,rango1,rango2,
                                                    rango3,rango4)
                                            VALUES (?,?,?,?,?,?,?,?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
 
                $query->bindParam(1, $nombre);
                $query->bindParam(2, $descripcion);
                $query->bindParam(3, $tipo_prueba);
                $query->bindParam(4, $objetivo);
                $query->bindParam(5, $unidad);
                $query->bindParam(6, $rango1);
                $query->bindParam(7, $rango2);
                $query->bindParam(8, $rango3);
                $query->bindParam(9, $rango4);
 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

        public function actualizarprueba($id_prueba, $nombre, $descripcion, $tipo_prueba, 
                                          $objetivo, $unidad, $rango1, $rango2, 
                                          $rango3,$rango4) {
        
        try {
            $sql='UPDATE "T_prueba" SET nombre=?, descripcion=?, tipo_prueba=?, objetivo=?, unidad=?, rango1=?, rango2=?, rango3=?, rango4=? WHERE id_prueba=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$nombre);
            $query->bindParam(2,$descripcion);
            $query->bindParam(3,$tipo_prueba);
            $query->bindParam(4,$objetivo);
            $query->bindParam(5,$unidad);
            $query->bindParam(6,$rango1);
            $query->bindParam(7,$rango2);
            $query->bindParam(8,$rango3);
            $query->bindParam(9,$rango4);
            $query->bindParam(10,$id_prueba);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
    public function consultarTodos(){
        $sql= 'SELECT * FROM "T_prueba" ';
        $query = $this->db()->query($sql);
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado[] = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }

    }public function consultarTodosa(){
        $sql= 'SELECT * FROM "T_atleta_prueba" ';
        $query = $this->db()->query($sql);
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
    public function getbyid_p($id){
        $sql = 'SELECT * FROM "T_prueba" WHERE id_prueba=?';

        $db  = $this->db();

        $query=$db->prepare($sql);
        $query->bindParam(1,$id);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }else{
            return 0;
        }
            
        
    }

    public function consultar($nombre){
        $sql = 'SELECT * FROM "T_prueba" WHERE nombre=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }
    public function registrarapliprueba($fecha,$medicion,
                                        $cedula_atleta,$id_prueba)
        {
            try {
 
                $sql='INSERT INTO "T_atleta_prueba" (fecha,medicion,cedula_atleta,id_prueba)
                                            VALUES (?,?,?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $fecha);
                $query->bindParam(2, $medicion);
                $query->bindParam(3, $cedula_atleta);
                $query->bindParam(4, $id_prueba);
               

 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

        public function actualizarapliprueba($id_atleta_prueba,$id_prueba,$fecha,$medicion,
                                        $cedula_atleta) {
        
        try {
            $sql='UPDATE "T_atleta_prueba" SET id_prueba=?, fecha=?, medicion=?, cedula_atleta=? WHERE id_atleta_prueba=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$id_prueba);
            $query->bindParam(2,$fecha);
            $query->bindParam(3,$medicion);
            $query->bindParam(4,$cedula_atleta);
            $query->bindParam(5,$id_atleta_prueba);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
       
        
    public function cantidadpersonas(){
        $sql ="SELECT COUNT(*) FROM $this->tabla ";
        $db = $this->db();
        $query=$db->query($sql);
        $cantidad= $query->fetchColumn();
        return $cantidad;

    }
    
        
    }
 ?>
