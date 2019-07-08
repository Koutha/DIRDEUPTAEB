<?php 

include_once('modelos/modelo_base.php');

class usuario extends modelobase
{	
	private $tabla,$nombre_usuario, $password, $correo; 
	public function __construct()
	{	
		$this->tabla="usuarios";
        parent::__construct($this->tabla);
	}

    public function setnombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setpassword($password){
        $this->password= $password;
    }

    public function setCorreo($correo){
        $this->correo= $correo;
    }

    public function getnombre_usuario()
    {
        return $this->nombre_usuario;
    }

    public function getpassword(){
        return $this->password;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function borrar_user($id){
		try {
			$sql= "UPDATE $this->tabla SET status = 0 WHERE id_usuario=?";
			$db=$this->db();
			$query=$db->prepare($sql);

			$query->bindParam(1, $id);
			$resultado=$query->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return 0;
	}

    public function getbyuser($username){
        try {
            $sql="SELECT * FROM $this->tabla WHERE nombre_usuario=?";
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $username);
            $query->execute();
            if($fila=$query->fetch(PDO::FETCH_ASSOC)){
                $resultado=$fila;
                return $resultado;
            }else{
                return 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
     
    public function getbycedula($cedula){
        $sql = 'SELECT * FROM "usuarios" WHERE cedula=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $cedula);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }

    public function actualizarUsuario($id,$nombre_usuario, $correo, $cedula) {
        try {
            $sql="UPDATE $this->tabla SET nombre_usuario=?,correo=?,cedula=? WHERE id_usuario=?";
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$nombre_usuario);
            $query->bindParam(2,$correo);
            $query->bindParam(3,$cedula);
            $query->bindParam(4,$id);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
    public function actualizarContrasena($nombre_usuario, $password) {
        try {
            $sql="UPDATE $this->tabla SET password=? WHERE nombre_usuario=?";
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$password);
            $query->bindParam(2,$nombre_usuario);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
    public function activarUsuario($nombre_usuario, $password) {
        try {
            $sql="UPDATE $this->tabla SET status = 1, password=? WHERE nombre_usuario=?";
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$password);
            $query->bindParam(2,$nombre_usuario);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }

    public function ingresarUsuario($nombre_usuario, $password, $correo, $cedula, $secret_key, $img_select) {

        try {

            $sql ="INSERT INTO $this->tabla (nombre_usuario,password,correo,cedula, secret_key, img_select) 
                            VALUES (?,?,?,?,?,?)";

            $db = $this->db();

            $query = $db->prepare($sql);

            $query->bindParam(1, $nombre_usuario);
            $query->bindParam(2, $password);
            $query->bindParam(3, $correo);
            $query->bindParam(4, $cedula);
            $query->bindParam(5, $secret_key);
            $query->bindParam(6, $img_select);

            $resultado = $query->execute();


        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return 0;
    }
    public function consultarTodosPermisos(){
        $sql= 'SELECT * FROM "T_permisos" ';
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
    
   
}
 ?>