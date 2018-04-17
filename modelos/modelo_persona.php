<?php 
/**
* 
*/
include_once('modelos/modelo_base.php');

abstract class Cpersona extends modelobase
{
	private $cedula,$nombres,$apellidos,$fecha_nacimiento,
            $direccion, $tel_movil, $tel_fijo, $correo,
            $sexo,$dir_foto, $dir_cedula, $pnf;
	private $tabla;
	public function __construct($tbl)
	{
		$this->tabla=$tbl;
        parent::__construct($this->tabla);
	}
        public function &getCedula() {
            return $this->cedula;
        }

        public function &getNombres() {
            return $this->nombres;
        }

        public function &getApellidos() {
            return $this->apellidos;
        }

        public function &getFecha_nacimiento() {
            return $this->fecha_nacimiento;
        }

        public function &getDireccion() {
            return $this->direccion;
        }

        public function &getTel_movil() {
            return $this->tel_movil;
        }

        public function &getTel_fijo() {
            return $this->tel_fijo;
        }

        public function &getCorreo() {
            return $this->correo;
        }

        public function &getSexo() {
            return $this->sexo;
        }

        public function &getDir_foto() {
            return $this->dir_foto;
        }

        public function &getDir_cedula() {
            return $this->dir_cedula;
        }

        public function &getPnf() {
            return $this->pnf;
        }

        public function setCedula($cedula) {
            $this->cedula = $cedula;
        }

        public function setNombres($nombres) {
            $this->nombres = $nombres;
        }

        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        public function setFecha_nacimiento($fecha_nacimiento) {
            $this->fecha_nacimiento = $fecha_nacimiento;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function setTel_movil($tel_movil) {
            $this->tel_movil = $tel_movil;
        }

        public function setTel_fijo($tel_fijo) {
            $this->tel_fijo = $tel_fijo;
        }

        public function setCorreo($correo) {
            $this->correo = $correo;
        }

        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }

        public function setDir_foto($dir_foto) {
            $this->dir_foto = $dir_foto;
        }

        public function setDir_cedula($dir_cedula) {
            $this->dir_cedula = $dir_cedula;
        }

        public function setPnf($pnf) {
            $this->pnf = $pnf;
        }


}
 ?>