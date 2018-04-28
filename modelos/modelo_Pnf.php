<?php 
include_once('modelos/modelo_base.php');
	/**
	* 
	*/
	class Cpnf extends modelobase
	{
		private $id_pnf;
        private $tabla;

		public function __construct()
		{
			$this->tabla= "T_pnf";
			parent::__construct($this->tabla);	
		}

        public function getId_pnf(){
            return $this->id_pnf;
        }

        public function setId_pnf($id_pnf){
            $this->id_pnf=$id_pnf;
        }

		public function registrarPnf($nombre,$coordinador)
        {
            try {
 
                $sql='INSERT INTO "T_pnf" (nombre,coordinador)
                                            VALUES (?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $nombre);
                $query->bindParam(2, $coordinador);
                
 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

       public function actualizarpnf($id_pnf,$nombre,$coordinador) {
        
        try {
            $sql='UPDATE "T_pnf" SET nombre=?, coordinador=? WHERE id_pnf=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$nombre);
            $query->bindParam(2,$coordinador);
            $query->bindParam(3,$id_pnf);

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
    public function getbyid_Pnf($id){
        $sql = 'SELECT * FROM "T_pnf" WHERE id_pnf=?';

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

    public function consulta($nombre){
        $sql = 'SELECT * FROM "T_pnf" WHERE nombre=?';
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
     public function borrarDisciplina($id_disciplina){
            try {
            $sql= 'UPDATE "T_disciplina" SET status = 0 WHERE id_disciplina=?';
            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1, $id_disciplina);
            $resultado=$query->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            return 0;
        }
        public function totalDisciplinas(){
            $sql='SELECT COUNT(*) FROM "T_disciplina"';
            $db=$this->db();
            $query=$db->query($sql);
            $cantidad=$query->fetchColumn();
            return $cantidad;
        }

        public function atletaDisciplinas($cedula){
            try {
                $sql='SELECT id_disciplina FROM "T_atleta_disciplina" WHERE cedula_atleta=?';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, $cedula);
                $query->execute();
                while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                    $resultado[] = $fila;
                }
                if (!empty($resultado)) {
                    return $resultado;
                }
                else{
                    return 0;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
            
        }
 
    }
 ?>