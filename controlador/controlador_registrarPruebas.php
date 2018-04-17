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
    else if (isset($_POST['Submit']) && $_POST['Submit']=='registrarPruebas') {
           
            include_once('modelos/modelo_pruebas.php');
            $Oprueba= new Cprueba();
            $nombre=$_POST['nombre'];
            if ($Oprueba->consultar($nombre)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarPruebas.php');
            }
            else{
                //registrarlo
                $Oprueba->registrarprueba($_POST['nombre'], $_POST['descripcion'], $_POST['tipo_prueba'], 
                                        $_POST['objetivo'], $_POST['unidad'], $_POST['rango1'], 
                                        $_POST['rango2'], $_POST['rango3'], $_POST['rango4']);
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

?>
