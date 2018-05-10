<?php 
    include_once('modelos/modelo_base.php');

    /**
    * 
    */
    class Cdisciplina extends modelobase
    {
        private $nombre,$tipo_disciplina,$id_disciplina;
        private $tabla;

        public function __construct()
        {
            $this->tabla= "T_disciplina";
            parent::__construct($this->tabla);  
        }

    public function getnombre() {
            return $this->nombre;
        }

    public function gettipo_disciplina() {
            return $this->tipo_disciplina;
        }

    public function getid_disciplina() {
            return $this->id_disciplina;
        }

        public function setnombre($nombre) {
            $this->nombre = $nombre;
        }

        public function settipo_disciplina($tipo_disciplina) {
            $this->tipo_disciplina = $tipo_disciplina;
        }

        public function setid_disciplina($id_disciplina) {
            $this->id_disciplina = $id_disciplina;
        }

        public function registrarDisciplina()
        {
            try {
 
                $sql='INSERT INTO "T_disciplina" (nombre,tipo_disciplina)
                                            VALUES (?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
 
                $query->bindParam(1, $this->nombre);
                $query->bindParam(2, $this->tipo_disciplina);
                
 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

        public function actualizarDisciplina() {
        
        try {
            $sql='UPDATE "T_disciplina" SET nombre=?, tipo_disciplina=? WHERE id_disciplina=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1, $this->nombre);
            $query->bindParam(2, $this->tipo_disciplina);
            $query->bindParam(3, $this->id_disciplina);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }

    public function consultarTodos(){
        $sql= 'SELECT * FROM "T_disciplina" ';
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
    

    public function consultar(){
        $sql = 'SELECT * FROM "T_disciplina" WHERE nombre=?';
        $db=$this->db();
        $query = $db->prepare($sql);
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
    public function consultarid(){
        $sql = 'SELECT * FROM "T_disciplina" WHERE id_disciplina=?';
        $db=$this->db();
        $query = $db->prepare($sql);
        $query->bindParam(1, $this->id_disciplina);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }
    public function consultarTodosad(){
        $sql= 'SELECT * FROM "T_atleta_disciplina" ';
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
     public function borrarDisciplina(){
            try {
            $sql= 'UPDATE "T_disciplina" SET status = 0 WHERE id_disciplina=?';
            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1, $this->id_disciplina);
            $resultado=$query->execute();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
            return 0;
        }

    public function getTotalDisciplinas() {
        $sql = 'SELECT COUNT(*) FROM "T_disciplina"';
        $db = $this->db();
        $query = $db->query($sql);
        $cantidad = $query->fetchColumn();
        return $cantidad;
    }

    public function getDisciplinasPorAtleta($cedula) {
        try {
            $sql = 'SELECT tad.id_disciplina, td.nombre 
                    FROM "T_atleta_disciplina" tad 
                    JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                    WHERE tad.cedula_atleta=?';
            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $cedula);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
     public function getDisciplinasPorPersonal($cedula) {
        try {
            $sql = 'SELECT tad.id_disciplina, td.nombre 
                    FROM "T_equipo_tecnico_disciplina" tad 
                    JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                    WHERE tad.cedula_et=?';
            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $cedula);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

}

?>
