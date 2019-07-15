<?php
/**
*
*/
include_once('modelos/modelo_persona.php');

class Catleta extends Cpersona
{
	private $trayecto, $año_ingreso,$dir_planilla, $dir_carnet,
            $estatura, $peso, $tipo_sangre, $info_alergias,
            $contacto_emergencia, $tel_contacto, $info_discapacidad,
            $observaciones,$talla_franela, $talla_pantalon, $talla_short,
            $talla_zapato,$talla_gorra, $talla_chaqueta, $status;
	private $tabla;
	public function __construct()
	{
		$this->tabla="T_atleta";
        parent::__construct($this->tabla);
	}
	public function getTrayecto() {
            return $this->trayecto;
        }

        public function getAño_ingreso() {
            return $this->año_ingreso;
        }

        public function getDir_planilla() {
            return $this->dir_planilla;
        }

        public function getDir_carnet() {
            return $this->dir_carnet;
        }

        public function getEstatura() {
            return $this->estatura;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function getTipo_sangre() {
            return $this->tipo_sangre;
        }

        public function getInfo_alergias() {
            return $this->info_alergias;
        }

        public function getContacto_emergencia() {
            return $this->contacto_emergencia;
        }

        public function getTel_contacto() {
            return $this->tel_contacto;
        }

        public function getInfo_discapacidad() {
            return $this->info_discapacidad;
        }

        public function getObservaciones() {
            return $this->observaciones;
        }

        public function getTalla_franela() {
            return $this->talla_franela;
        }

        public function getTalla_pantalon() {
            return $this->talla_pantalon;
        }

        public function getTalla_short() {
            return $this->talla_short;
        }

        public function getTalla_zapato() {
            return $this->talla_zapato;
        }
        public function getTalla_gorra() {
            return $this->talla_gorra;
        }

        public function getTalla_chaqueta() {
            return $this->talla_chaqueta;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getSta() {
            return $this->sta;
        }
        public function setTrayecto($trayecto) {
            $this->trayecto = $trayecto;
        }

        public function setAño_ingreso($año_ingreso) {
            $this->año_ingreso = $año_ingreso;
        }

        public function setDir_planilla($dir_planilla) {
            $this->dir_planilla = $dir_planilla;
        }

        public function setDir_carnet($dir_carnet) {
            $this->dir_carnet = $dir_carnet;
        }

        public function setEstatura($estatura) {
            $this->estatura = $estatura;
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }

        public function setTipo_sangre($tipo_sangre) {
            $this->tipo_sangre = $tipo_sangre;
        }

        public function setInfo_alergias($info_alergias) {
            $this->info_alergias = $info_alergias;
        }

        public function setContacto_emergencia($contacto_emergencia) {
            $this->contacto_emergencia = $contacto_emergencia;
        }

        public function setTel_contacto($tel_contacto) {
            $this->tel_contacto = $tel_contacto;
        }

        public function setInfo_discapacidad($info_discapacidad) {
            $this->info_discapacidad = $info_discapacidad;
        }

        public function setObservaciones($observaciones) {
            $this->observaciones = $observaciones;
        }

        public function setTalla_franela($talla_franela) {
            $this->talla_franela = $talla_franela;
        }

        public function setTalla_pantalon($talla_pantalon) {
            $this->talla_pantalon = $talla_pantalon;
        }

        public function setTalla_short($talla_short) {
            $this->talla_short = $talla_short;
        }

        public function setTalla_zapato($talla_zapato) {
            $this->talla_zapato = $talla_zapato;
        }
        public function setTalla_gorra($talla_gorra) {
            $this->talla_gorra = $talla_gorra;
        }

        public function setTalla_chaqueta($talla_chaqueta) {
            $this->talla_chaqueta = $talla_chaqueta;
        }

        public function setStatus($status){
            $this->status = $status;
        }
        public function setSta($sta){
            $this->sta = $sta;
        }
        public function consultarTodos(){
            $sql= 'SELECT * FROM "T_atleta" ORDER BY cedula_atleta DESC';
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


        public function borrarAtleta($cedula){
            try {
            $sql= 'UPDATE "T_atleta" SET status = 0 WHERE cedula_atleta=?';
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $cedula);
            $resultado=$query->execute();

            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        }

        public function consultarDatos($cedula){
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

        public function registrarAtleta() {
            try {
                //datos personales
                $sql ='INSERT   INTO "T_atleta" (cedula_atleta, nombres, apellidos,
                                                fecha_nacimiento,direccion,tel_movil,
                                                tel_fijo, correo,sexo,dir_foto,dir_cedula)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            	$db = $this->db();
            	$query = $db->prepare($sql);

            	$query->bindParam(1, parent::getCedula());
                $query->bindParam(2, parent::getNombres());
                $query->bindParam(3, parent::getApellidos());
                $query->bindParam(4, parent::getFecha_nacimiento());
                $query->bindParam(5, parent::getDireccion());
                $query->bindParam(6, parent::getTel_movil());
                $query->bindParam(7, parent::getTel_fijo());
                $query->bindParam(8, parent::getCorreo());
                $query->bindParam(9, parent::getSexo());
                $query->bindParam(10, parent::getDir_foto());
                $query->bindParam(11, parent::getDir_cedula());
            	$query->execute();

                //datos academicos
                $sql1 ='INSERT  INTO "T_atleta_academico" (cedula_atleta,trayecto,año_ingreso,
                                                            dir_planilla,dir_carnet,id_pnf)
                                VALUES (?,?,?,?,?,?)';
                $query1 = $db->prepare($sql1);

                $query1->bindParam(1, parent::getCedula());
                $query1->bindParam(2, $this->trayecto);
                $query1->bindParam(3, $this->año_ingreso);
                $query1->bindParam(4, $this->dir_planilla);
                $query1->bindParam(5, $this->dir_carnet);
                $query1->bindParam(6, parent::getPnf());
                $query1->execute();

                //datos medicos
                $sql2 ='INSERT  INTO "T_atleta_medico" (cedula_atleta,estatura,peso,tipo_sangre,
                                                        info_alergias, contacto_emergencia, tel_contacto,
                                                        info_discapacidad, observaciones)
                                VALUES (?,?,?,?,?,?,?,?,?)';
                $query2 = $db->prepare($sql2);

                $query2->bindParam(1, parent::getCedula());
                $query2->bindParam(2, $this->estatura);
                $query2->bindParam(3, $this->peso);
                $query2->bindParam(4, $this->tipo_sangre);
                $query2->bindParam(5, $this->info_alergias);
                $query2->bindParam(6, $this->contacto_emergencia);
                $query2->bindParam(7, $this->tel_contacto);
                $query2->bindParam(8, $this->info_discapacidad);
                $query2->bindParam(9, $this->observaciones);
                $query2->execute();
                //datos de uniformes

                $sql3 = 'INSERT INTO "T_atleta_uniforme" (cedula_atleta,talla_franela,talla_pantalon,
                                                          talla_short,talla_zapato,talla_gorra,talla_chaqueta)
                                VALUES(?,?,?,?,?,?,?)';

                $query3 = $db->prepare($sql3);
                $query3->bindParam(1, parent::getCedula());
                $query3->bindParam(2, $this->talla_franela);
                $query3->bindParam(3, $this->talla_pantalon);
                $query3->bindParam(4, $this->talla_short);
                $query3->bindParam(5, $this->talla_zapato);
                $query3->bindParam(6, $this->talla_gorra);
                $query3->bindParam(7, $this->talla_chaqueta);
                $query3->execute();
        	} catch (PDOException $e) {
                    echo $e->getMessage();
                    exit;
        	}
        }

        public function modificarAtleta($cedula){
            try {
                //datos personales
                $sql ='UPDATE "T_atleta" SET    cedula_atleta=?, nombres=?, apellidos=?,
                                                fecha_nacimiento=?,direccion=?,tel_movil=?,
                                                tel_fijo=?, correo=?,sexo=?,dir_foto=?,dir_cedula=?
                                        WHERE cedula_atleta=?';
                $db = $this->db();
                $query = $db->prepare($sql);

                $query->bindParam(1, parent::getCedula());
                $query->bindParam(2, parent::getNombres());
                $query->bindParam(3, parent::getApellidos());
                $query->bindParam(4, parent::getFecha_nacimiento());
                $query->bindParam(5, parent::getDireccion());
                $query->bindParam(6, parent::getTel_movil());
                $query->bindParam(7, parent::getTel_fijo());
                $query->bindParam(8, parent::getCorreo());
                $query->bindParam(9, parent::getSexo());
                $query->bindParam(10, parent::getDir_foto());
                $query->bindParam(11, parent::getDir_cedula());
                $query->bindParam(12, $cedula);
                $query->execute();

                //datos academicos
                $sql1 ='UPDATE "T_atleta_academico" SET trayecto=?,año_ingreso=?,
                                                        dir_planilla=?,dir_carnet=?,id_pnf=?
                                                    WHERE cedula_atleta=?';
                $query1 = $db->prepare($sql1);
                $query1->bindParam(1, $this->trayecto);
                $query1->bindParam(2, $this->año_ingreso);
                $query1->bindParam(3, $this->dir_planilla);
                $query1->bindParam(4, $this->dir_carnet);
                $query1->bindParam(5, parent::getPnf());
                $query1->bindParam(6, parent::getCedula());
                $query1->execute();

                //datos medicos
                $sql2 ='UPDATE "T_atleta_medico" SET    estatura=?,peso=?,tipo_sangre=?,
                                                        info_alergias=?, contacto_emergencia=?, tel_contacto=?,
                                                        info_discapacidad=?, observaciones=?
                                                WHERE   cedula_atleta=?';
                $query2 = $db->prepare($sql2);
                $query2->bindParam(1, $this->estatura);
                $query2->bindParam(2, $this->peso);
                $query2->bindParam(3, $this->tipo_sangre);
                $query2->bindParam(4, $this->info_alergias);
                $query2->bindParam(5, $this->contacto_emergencia);
                $query2->bindParam(6, $this->tel_contacto);
                $query2->bindParam(7, $this->info_discapacidad);
                $query2->bindParam(8, $this->observaciones);
                $query2->bindParam(9, parent::getCedula());
                $query2->execute();
                //datos de uniformes

                $sql3 = 'UPDATE "T_atleta_uniforme" SET talla_franela=?,talla_pantalon=?,talla_short=?,
                                                            talla_zapato=?, talla_gorra=?, talla_chaqueta=?
                                WHERE cedula_atleta=?';
                $query3 = $db->prepare($sql3);
                $query3->bindParam(1, $this->talla_franela);
                $query3->bindParam(2, $this->talla_pantalon);
                $query3->bindParam(3, $this->talla_short);
                $query3->bindParam(4, $this->talla_zapato);
                $query3->bindParam(5, $this->talla_gorra);
                $query3->bindParam(6, $this->talla_chaqueta);
                $query3->bindParam(7, parent::getCedula());
                $query3->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }

        public function getTotalAtletasActivos(){
            $sql='SELECT COUNT(*) FROM "T_atleta" WHERE status=1';
            $db=$this->db();
            $query=$db->query($sql);
            $cantidad=$query->fetchColumn();
            return $cantidad;
        }

        public function asignarDisciplina($id_disciplina){
            try {
                $sql= 'INSERT INTO "T_atleta_disciplina"(cedula_atleta,id_disciplina)
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
                $sql= 'DELETE FROM "T_atleta_disciplina" WHERE cedula_atleta=?';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, $cedula);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }

        public function consultarAtletasPorDisciplina($id_disciplina){
            try {
                $sql='  SELECT ta.cedula_atleta, ta.nombres, ta.apellidos, td.id_disciplina, td.nombre
                        FROM "T_atleta" ta 
                        JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
                        JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                        WHERE td.id_disciplina=:id_disciplina';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(':id_disciplina', $id_disciplina);
                $query->execute();
                while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
                    $resultado[]=$fila;
                }
                if (!empty($resultado)) {
                    return $resultado;
                }
                else{
                    return 0;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }

        }

            public function consultarAtletaMedico(){
            $sql = 'SELECT * FROM "T_atleta_medico" WHERE info_discapacidad!=?';
            $db=$this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $this->info_discapacidad);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                    $resultado[] = $fila;
                }
                if (!empty($resultado)) {
                    return $resultado;
                } else {
                    return 0;
                }  
            }

            public function consultarAtletaTallaPeso($estaturamin,$estaturamax,$pesomin,$pesomax){
                $sql ='SELECT  cedula_atleta, estatura, peso FROM "T_atleta_medico" WHERE estatura>=? and estatura<=? and peso>=? and peso<=?';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, $estaturamin);
                $query->bindParam(2, $estaturamax);
                $query->bindParam(3, $pesomin);
                $query->bindParam(4, $pesomax);
                $query->execute();
                while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[]=$fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }

        }
        public function consultarAtletasPorDisciplinamedicos($id_disciplina){
            try {
                $sql='  SELECT ta.cedula_atleta, ta.nombres, ta.apellidos, td.id_disciplina, td.nombre, tam.info_discapacidad
                        FROM "T_atleta" ta 
                        JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
                        JOIN "T_atleta_medico" tam ON ta.cedula_atleta=tam.cedula_atleta 
                        JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                        WHERE td.id_disciplina=:id_disciplina and tam.info_discapacidad!=:info_discapacidad and ta.status=1';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(':id_disciplina', $id_disciplina);
                $query->bindParam(':info_discapacidad', $this->info_discapacidad);
                $query->execute();
                while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
                    $resultado[]=$fila;
                }
                if (!empty($resultado)) {
                    return $resultado;
                }
                else{
                    return 0;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }

        }

        public function consultarAtletasPorDisciplinapnf($id_disciplina,$id_pnf){
            try {
                $sql='  SELECT ta.cedula_atleta, ta.nombres, ta.apellidos, taa.trayecto
                        FROM "T_atleta" ta 
                        JOIN "T_atleta_academico" taa ON taa.cedula_atleta=ta.cedula_atleta
                        JOIN "T_atleta_disciplina" tad ON tad.cedula_atleta=ta.cedula_atleta
                        WHERE tad.id_disciplina=:id_disciplina and taa.id_pnf=:id_pnf and ta.status=1';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(':id_disciplina', $id_disciplina);
                $query->bindParam(':id_pnf', $id_pnf);
                $query->execute();
                while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
                    $resultado[]=$fila;
                }
                if (!empty($resultado)) {
                    return $resultado;
                }
                else{
                    return 0;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }

        }


        public function consultarTodoszapato(){
            $sql= 'SELECT DISTINCT talla_zapato FROM "T_atleta_uniforme"';
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

        public function consultartallazapatos($talla_zapato){
            $sql='SELECT count(talla_zapato) FROM "T_atleta_uniforme" WHERE talla_zapato=?';
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $talla_zapato);
            $query->execute();
            $cantidad=$query->fetchColumn();
            return $cantidad;
        }
}
 ?>
