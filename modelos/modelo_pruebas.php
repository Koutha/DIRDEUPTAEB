
<?php 
	include_once('modelos/modelo_atleta.php');

	/**
	* 
	*/
	class Cprueba extends Catleta
	{
		private $id_prueba,$nombre,$descripcion,$tipo_prueba,
                                        $objetivo,$unidad,$condicion,$rango1,
                                        $rango2,$rango3,$rango4,$fecha,$medicion,$id_ap;
        private $tabla;

		public function __construct()
		{
			$this->tabla= "T_prueba";
			parent::__construct($this->tabla);	
		}

    public function getid_prueba() {
            return $this->id_prueba;
        }

    public function getnombre() {
            return $this->nombre;
        }

    public function getdescripcion() {
            return $this->descripcion;
        }

    public function gettipo_prueba() {
            return $this->tipo_prueba;
        }

    public function getobjetivo() {
            return $this->objetivo;
        }

    public function getunidad() {
            return $this->unidad;
        }

    public function getcondicion() {
            return $this->condicion;
        }

    public function getrango1() {
            return $this->rango1;
        }

    public function getrango2() {
            return $this->rango2;
        }

    public function getrango3() {
            return $this->rango3;
        }

    public function getrango4() {
            return $this->rango4;
        }

    public function getfecha() {
            return $this->fecha;
        }

    public function getmedicion() {
            return $this->medicion;
        }

    public function getid_ap() {
            return $this->id_ap;
        }

        public function setid_prueba($id_prueba) {
            $this->id_prueba = $id_prueba;
        }
        public function setnombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setdescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function settipo_prueba($tipo_prueba) {
            $this->tipo_prueba = $tipo_prueba;
        }
        public function setobjetivo($objetivo) {
            $this->objetivo = $objetivo;
        }
        public function setunidad($unidad) {
            $this->unidad = $unidad;
        }
        public function setcondicion($condicion) {
            $this->condicion = $condicion;
        }
        public function setrango1($rango1) {
            $this->rango1 = $rango1;
        }
        public function setrango2($rango2) {
            $this->rango2 = $rango2;
        }
        public function setrango3($rango3) {
            $this->rango3 = $rango3;
        }

        public function setrango4($rango4) {
            $this->rango4 = $rango4;
        }

        public function setfecha($fecha) {
            $this->fecha = $fecha;
        }

        public function setmedicion($medicion) {
            $this->medicion = $medicion;
        }

        public function setid_ap($id_ap) {
            $this->id_ap = $id_ap;
        }

		public function registrarprueba()
        {
            try {
 
                $sql='INSERT INTO "T_prueba" (id_prueba,nombre,descripcion,tipo_prueba,objetivo,unidad,condicion,rango1,rango2,
                                                    rango3,rango4)
                                            VALUES (?,?,?,?,?,?,?,?,?,?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $this->id_prueba);
                $query->bindParam(2, $this->nombre);
                $query->bindParam(3, $this->descripcion);
                $query->bindParam(4, $this->tipo_prueba);
                $query->bindParam(5, $this->objetivo);
                $query->bindParam(6, $this->unidad);
                $query->bindParam(7, $this->condicion);
                $query->bindParam(8, $this->rango1);
                $query->bindParam(9, $this->rango2);
                $query->bindParam(10, $this->rango3);
                $query->bindParam(11, $this->rango4);
 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

        public function actualizarprueba() {
        
        try {
            $sql='UPDATE "T_prueba" SET nombre=?, descripcion=?, tipo_prueba=?, objetivo=?, unidad=?, condicion=?, rango1=?, rango2=?, rango3=?, rango4=? WHERE id_prueba=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);

            $query->bindParam(1, $this->nombre);
            $query->bindParam(2, $this->descripcion);
            $query->bindParam(3, $this->tipo_prueba);
            $query->bindParam(4, $this->objetivo);
            $query->bindParam(5, $this->unidad);
            $query->bindParam(6, $this->condicion);
            $query->bindParam(7, $this->rango1);
            $query->bindParam(8, $this->rango2);
            $query->bindParam(9, $this->rango3);
            $query->bindParam(10, $this->rango4);
            $query->bindParam(11, $this->id_prueba);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
    public function consultarTodosp(){
        $sql= 'SELECT * FROM "T_prueba" ';
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
        

    public function consultarTodosap(){
        $sql= 'SELECT * FROM "T_atleta_prueba" ';
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

    public function cta(){
        $sql= 'SELECT DISTINCT cedula_atleta FROM "T_atleta_prueba" ';
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

    public function ca($id_prueba){
        $sql = 'SELECT * FROM "T_atleta_prueba" WHERE cedula_atleta=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $id_prueba);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }
   

    public function consultarid($id_prueba){
        $sql = 'SELECT * FROM "T_prueba" WHERE id_prueba=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $id_prueba);
        $query->execute();
        if($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $resultado=$fila;
            return $resultado;
        }
        else{
            return 0;
        }   
    }
     public function consultarDatosa($cedula){
        $sql = 'SELECT * FROM "T_atleta" WHERE cedula_atleta=?';
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
    public function registrarapliprueba()
        {
            try {
 
                $sql='INSERT INTO "T_atleta_prueba" (fecha,medicion,cedula_atleta,id_prueba)
                                            VALUES (?,?,?,?)';
               
                $db = $this->db();
                $query = $db->prepare($sql);
                $query->bindParam(1, $this->fecha);
                $query->bindParam(2, $this->medicion);
                $query->bindParam(3, parent::getCedula());
                $query->bindParam(4, $this->id_prueba);
               

 
                $resultado = $query->execute();
 
            } catch (PDOException $e) {
 
                echo $e->getMessage();
                exit;
               
            }
            return 0;
        }

        public function actualizarapliprueba() {
        
        try {
            $sql='UPDATE "T_atleta_prueba" SET fecha=?, medicion=?, cedula_atleta=?, id_prueba=? WHERE id_ap=?';
            
            $db=$this->db();

            $query=$db->prepare($sql);
            $query->bindParam(1, $this->fecha);
            $query->bindParam(2, $this->medicion);
            $query->bindParam(3, parent::getCedula());
            $query->bindParam(4, $this->id_prueba);
            $query->bindParam(5, $this->id_ap);

            $resultado=$query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return 0;


    }
    
    public function borrarPrueba(){
            try {
            $sql= 'UPDATE "T_prueba" SET status = 0 WHERE id_prueba=?';
            $db=$this->db();
            $query=$db->prepare($sql);

            $query->bindParam(1, $this->id_prueba);
            $resultado=$query->execute();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
            return 0;
    }   
        

        
    }
 ?>
