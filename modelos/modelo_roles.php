<?php

include_once('modelos/modelo_base.php');

class roles extends modelobase {

    private $tabla;

    public function __construct() {
        $this->tabla = "roles";
        parent::__construct($this->tabla);
    }
    

    public function getRol($iduser) {
        $sql="SELECT id_rol FROM roles WHERE id_usuario='$iduser'";
        $db=$this->db();
        $query=$db->query($sql);
        if($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado = $fila;
        }
        return $resultado;
    }


    public function actualizarRol($idrol,$iduser) {
    	
    	try {
    		$sql= "UPDATE roles SET id_rol=? WHERE id_usuario=?";
    		$db=$this->db();

    		$query=$db->prepare($sql);
    		$query->bindParam(1,$idrol);
    		$query->bindParam(2,$iduser);

    		$result=$query->execute();
    	} catch (PDOException $e) {
    		echo $e->getMessage();
    		exit;
    	}
        return 0;


    }

    public function asignarRol($idrol, $iduser) {
        /*$query=$this->db->query("INSERT INTO $this->tabla (id,idrol,iduser) VALUES (NULL,?,?)");
        
        return 0; */
        try {
            $sql="INSERT INTO roles (id_rol,id_usuario) VALUES (?,?)";

            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1,$idrol);
            $query->bindParam(2,$iduser);

            $result=$query->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return 0;
    }
    public function asignarPermisos($permisos, $id_usuario) {
        /*$query=$this->db->query("INSERT INTO $this->tabla (id,idrol,iduser) VALUES (NULL,?,?)");
        
        return 0; */
        try {
            $sql='INSERT INTO "T_permisos" (permisos,id_usuario) VALUES (?,?)';

            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1,$permisos);
            $query->bindParam(2,$id_usuario);

            $result=$query->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return 0;
    }
    public function borrarPermisos($id_usuario){
             try {
                $sql= 'DELETE FROM "T_permisos" WHERE id_usuario=?';
                $db=$this->db();
                $query=$db->prepare($sql);
                $query->bindParam(1, $id_usuario);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }

}

?>
