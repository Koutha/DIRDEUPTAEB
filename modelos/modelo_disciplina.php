<?php
/**
 * 
 */
include_once('modelos/modelo_base.php');

class Cdisciplina extends modelobase {

    private $id_disciplina;
    private $tabla;

    public function __construct() {
        $this->tabla = "T_disciplina";
        parent::__construct($this->tabla);
    }

    public function getId_disciplina() {
        return $this->id_disciplina;
    }

    public function setId_disciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

    public function registrarDisciplina($nombre, $tipo) {
        try {

            $sql = 'INSERT  INTO "T_disciplina" (nombre,tipo_disciplina)
                            VALUES (?,?)';
            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $tipo);
            $resultado = $query->execute();
        } catch (PDOException $e) {

            echo $e->getMessage();
            exit;
        }
        return 0;
    }

    public function actualizarDisciplina($id_disciplina, $nombre, $tipo_disciplina) {

        try {
            $sql = 'UPDATE "T_disciplina"   SET nombre=?, tipo_disciplina=? 
                                            WHERE id_disciplina=?';
            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $tipo_disciplina);
            $query->bindParam(3, $id_disciplina);
            $resultado = $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return 0;
    }

    public function consultarTodos() {
        $sql = 'SELECT * FROM "T_disciplina" ';
        $query = $this->db()->query($sql);
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado[] = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        } else {
            return 0;
        }
    }

    public function getbyid_d($id) {
        $sql = 'SELECT * FROM "T_disciplina" WHERE id_disciplina=?';
        $db = $this->db();
        $query = $db->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();
        if ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado = $fila;
            return $resultado;
        } else {
            return 0;
        }
    }

    public function consultar($nombre) {
        $sql = 'SELECT * FROM "T_disciplina" WHERE nombre=?';
        $db = $this->db();
        $query = $db->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->execute();
        if ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado = $fila;
            return $resultado;
        } else {
            return 0;
        }
    }

    public function borrarDisciplina($id_disciplina) {
        try {
            $sql = 'UPDATE "T_disciplina" SET status = 0 WHERE id_disciplina=?';
            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $id_disciplina);
            $resultado = $query->execute();
        } catch (PDOException $e) {
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

}

?>
