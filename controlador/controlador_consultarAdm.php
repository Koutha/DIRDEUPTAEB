<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        include_once('modelos/modelo_usuario.php');
        $usuario= new usuario();
        
        $allusers=$usuario->listarAdm();
    	require('vistas/vista_consultarAdm.php');
    }else{
        header('Location:?action=sindex');
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  