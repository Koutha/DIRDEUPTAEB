<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarPruebas') {
           
            include_once('modelos/modelo_pruebas.php');
            $Oprueba= new Cprueba();
            $id_prueba=(substr($_POST['tipo_prueba'], 0,3).substr($_POST['unidad'], 0,3).substr($_POST['nombre'], 0,5));
            if ($Oprueba->consultarid($id_prueba)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarPruebas.php');
            }
            else{

                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $tipo_prueba=$_POST['tipo_prueba'];
                $objetivo=$_POST['objetivo'];
                $unidad=$_POST['unidad'];
                $condicion=$_POST['condicion'];
                $rango1=$_POST['rango1'];
                $rango2=$_POST['rango2'];
                $rango3=$_POST['rango3'];
                $rango4=$_POST['rango4'];
                $Oprueba->setid_prueba($id_prueba);
                $Oprueba->setnombre($nombre);
                $Oprueba->setdescripcion($descripcion);
                $Oprueba->settipo_prueba($tipo_prueba);
                $Oprueba->setobjetivo($objetivo);
                $Oprueba->setunidad($unidad);
                $Oprueba->setcondicion($condicion);
                $Oprueba->setrango1($rango1);
                $Oprueba->setrango2($rango2);
                $Oprueba->setrango3($rango3);
                $Oprueba->setrango4($rango4);
                //registrarlo                
                $Oprueba->registrarprueba();
    	       $registro= 1;
               require('vistas/vista_registrarPruebas.php');
            }
    
        }
        else{
            require('vistas/vista_registrarPruebas.php');
        }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

/*?>

<?php
$rest = substr("abcdef", -1);    // devuelve "f"
$rest = substr("abcdef", -2);    // devuelve "ef"
$rest = substr("abcdef", -3, 1); // devuelve "d"
?>*/

