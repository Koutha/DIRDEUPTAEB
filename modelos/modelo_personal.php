<?php
/**
*
*/
include_once('modelos/modelo_persona.php');

class Cpersonal extends Cpersona
{
	private $cargo, $status;
	private $tabla;
	public function __construct()
	{
		$this->tabla="T_equipo_tecnico";
        parent::__construct($this->tabla);
	}
	     
        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function consultarTodos(){
            $sql= 'SELECT * FROM "T_equipo_tecnico" ORDER BY cedula_et DESC';
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

        public function borrarPersonal($cedula){
            try {
            $sql= 'UPDATE "T_equipo_tecnico" SET status = 0 WHERE cedula_et=?';
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $cedula);
            $resultado=$query->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
            return 0;
        }

        public function consultarDatos($cedula){

	        	$sql ='SELECT  ta.cedula_et,ta.nombres,ta.apellidos,ta.tel_movil,ta.correo, 
                               ta.cargo,ta.dir_foto,ta.dir_cedula
                            
		               FROM "T_equipo_tecnico" ta
		               WHERE ta.cedula_et=?';
	        $db=$this->db();
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

        public function registrarPersonal() {
            try {
                //datos personales
                $sql ='INSERT   INTO "T_equipo_tecnico" (cedula_et, nombres, apellidos,
                                                tel_movil,correo,cargo,dir_foto,dir_cedula)
                                VALUES (?,?,?,?,?,?,?,?)';
            	$db = $this->db();
            	$query = $db->prepare($sql);

            	$query->bindParam(1, parent::getCedula());
                $query->bindParam(2, parent::getNombres());
                $query->bindParam(3, parent::getApellidos());
                $query->bindParam(4, parent::getTel_movil());
                $query->bindParam(5, parent::getCorreo());
                $query->bindParam(6, $this->cargo);
                $query->bindParam(7, parent::getDir_foto());
                $query->bindParam(8, parent::getDir_cedula());
            	$query->execute();               
        	} catch (PDOException $e) {
                    echo $e->getMessage();
                    exit;
        	}
        }

        public function modificarPersonal($cedula){
            try {
                //datos personales
               
 $sql ='UPDATE "T_equipo_tecnico" SET    cedula_et=?, nombres=?, apellidos=?,
                                                tel_movil=?,correo=?,cargo=?,dir_foto=?,dir_cedula=?
                                        WHERE cedula_et=?';
                $db = $this->db();
                $query = $db->prepare($sql);

                $query->bindParam(1, parent::getCedula());
                $query->bindParam(2, parent::getNombres());
                $query->bindParam(3, parent::getApellidos());
                $query->bindParam(4, parent::getCorreo());
                $query->bindParam(5, $this->cargo);
                $query->bindParam(6, parent::getDir_foto());
                $query->bindParam(7, parent::getDir_cedula());
                $query->bindParam(8, parent::getDir_cedula());
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }
        public function getTotalPersonas(){
            $sql='SELECT COUNT(*) FROM "T_equipo_tecnico" WHERE status=1';
            $db=$this->db();
            $query=$db->query($sql);
            $cantidad=$query->fetchColumn();
            return $cantidad;
        }


        public function asignarDisciplina($id_disciplina){
            try {
                $sql= 'INSERT INTO "T_equipo_tecnico_disciplina"(cedula_et,id_disciplina)
                          VALUES (?,?)';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, parent::getCedula());
                $query->bindParam(2, $id_disciplina);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }

        }

        public function borrarDisciplinas($cedula){
             try {
                $sql= 'DELETE FROM "T_equipo_tecnico_disciplina" WHERE cedula_et=?';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, $cedula);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }
}
 ?>
