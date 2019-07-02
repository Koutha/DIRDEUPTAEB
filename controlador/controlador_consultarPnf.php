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
        include_once('modelos/modelo_Pnf.php');
        $Cpnf= new Cpnf();
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $todos=$Cpnf->consultaTodo();
        require('vistas/vista_consultarPnf.php');

    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}
