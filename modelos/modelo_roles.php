<?php

include_once('modelos/modelo_base.php');

class roles extends modelobase {

    private $tabla;

    public function __construct() {
        $this->tabla = "roles";
        parent::__construct($this->tabla);
    }
    

    public function getRol($iduser) {
        $sql="SELECT id_rol FROM $this->tabla WHERE id_usuario='$iduser'";
        $db=$this->db();
        $query=$db->query($sql);
        if($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $resultado = $fila;
        }
        return $resultado;
    }


    public function actualizarRol($idrol,$iduser) {
    	
    	try {
    		$sql= "UPDATE $this->tabla SET id_rol=? WHERE id_usuario=?";
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
            $sql="INSERT INTO $this->tabla (id_rol,id_usuario) VALUES (?,?)";

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



}

?>
