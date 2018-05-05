<?php 
include_once('modelos/modelo_base.php');
	/**
	* 
	*/
	class Cpnf extends modelobase
	{
		private $id_pnf,$nombre,$coordinador;
        private $tabla;

		public function __construct()
		{
			$this->tabla= "T_pnf";
			parent::__construct($this->tabla);	
		}

        public function getid_pnf(){
            return $this->id_pnf;
        }

        public function getnombre(){
            return $this->nombre;
        }

        public function getcoordinador(){
            return $this->coordinador;
        }

        public function setid_pnf($id_pnf){
            $this->id_pnf=$id_pnf;
        }

        public function setnombre($nombre){
            $this->nombre=$nombre;
        }

        public function setcoordinador($coordinador){
            $this->coordinador=$coordinador;
        }

		public function registrarPnf()
        {
            try {
 
                $sql='INSERT INTO "T_pnf" (nombre,coordinador)
                                            VALUES (?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $this->nombre);
                $query->bindParam(2, $this->coordinador);
                
 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

       public function actualizarpnf() {
        
        try {
            $sql='UPDATE "T_pnf" SET nombre=?, coordinador=? WHERE id_pnf=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1, $this->nombre);
            $query->bindParam(2, $this->coordinador);
            $query->bindParam(3, $this->id_pnf);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }


    public function consultaTodo(){
        $sql= 'SELECT * FROM "T_pnf" ';
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
    public function consultarid_Pnf(){
        $sql = 'SELECT * FROM "T_pnf" WHERE id_pnf=?';

        $db  = $this->db();

        $query=$db->prepare($sql);
        $query->bindParam(1,$this->id_pnf);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }else{
            return 0;
        }
            
        
    }

    public function consulta(){
        $sql = 'SELECT * FROM "T_pnf" WHERE nombre=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $this->nombre);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }
     public function borrarpnf(){
            try {
            $sql= 'UPDATE "T_pnf" SET status = 0 WHERE id_pnf=?';
            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1, $this->id_pnf);
            $resultado=$query->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            return 0;
        }
 
    }
 ?>