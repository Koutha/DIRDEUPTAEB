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
        $sql="SELECT * FROM $this->tabla WHERE nombre_usuario='$username'";
        $db=$this->db();
        $query=$db->query($sql);
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }else{
            return 0;
        }
    }

    public function actualizarUsuario($id,$nombre_usuario, $password, $correo) {
        try {
            $sql="UPDATE $this->tabla SET nombre_usuario=?, password=?,correo=? WHERE id_usuario=?";
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1,$nombre_usuario);
            $query->bindParam(2,$password);
            $query->bindParam(3,$correo);
            $query->bindParam(4,$id);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }

    public function ingresarUsuario($nombre_usuario, $password, $correo) {

        try {

            $sql ="INSERT INTO $this->tabla (nombre_usuario,password,correo) VALUES (?,?,?)";

            $db = $this->db();

            $query = $db->prepare($sql);

            $query->bindParam(1, $nombre_usuario);
            $query->bindParam(2, $password);
            $query->bindParam(3, $correo);

            $resultado = $query->execute();


        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return 0;
    }

   
   
}
 ?>