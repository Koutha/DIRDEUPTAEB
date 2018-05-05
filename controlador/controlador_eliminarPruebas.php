<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else {
        include_once('modelos/modelo_pruebas.php');
        $Oprueba= new Cprueba();
        if (isset($_GET['id_prueba'])) {
            $id_prueba=$_GET['id_prueba'];
            $Oprueba->setid_prueba($id_prueba);
            $Oprueba->borrarPrueba();
            $borrado = 1;
        }
        $todos=$Oprueba->consultarTodosp(); 
        require('vistas/vista_consultarPruebas.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  