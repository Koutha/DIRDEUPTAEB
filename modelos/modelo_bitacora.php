
<?php 
	include_once('modelos/modelo_base.php');

	/**
	* 
	*/
    class Cbitacora extends modelobase
	{
		private $id_usuarios,$fecha,$hora,$actividad;
       
    public function __construct()
    {   
        $this->tabla="T_bitacora";
        parent::__construct($this->tabla);
    }
    public function getid_usuarios() {
            return $this->id_usuarios;
        }

    public function getfecha() {
            return $this->fecha;
        }

    public function gethora() {
            return $this->hora;
        }

    public function getactividad() {
            return $this->actividad;
        }


        public function setid_usuarios($id_usuarios) {
            $this->id_usuarios = $id_usuarios;
        }
        public function setfecha($fecha) {
            $this->fecha = $fecha;
        }
        public function sethora($hora) {
            $this->hora = $hora;
        }
        public function setactividad($actividad) {
            $this->actividad = $actividad;
        }
		public function registrarbitacora()
        {
            try {
 
                $sql='INSERT INTO "T_bitacora" (id_usuarios,fecha,hora,actividad)
                                            VALUES (?,?,?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $this->id_usuarios);
                $query->bindParam(2, $this->fecha);
                $query->bindParam(3, $this->hora);
                $query->bindParam(4, $this->actividad);
                
                
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }
         public function consultarTodosb(){
                $sql= 'SELECT * FROM "T_bitacora" ';
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
