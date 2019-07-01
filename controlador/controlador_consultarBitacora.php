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
        require_once ('modelos/modelo_bitacora.php');
        require_once ('modelos/modelo_usuario.php');
        $Obitacora=new Cbitacora();
        $Ousuario=new usuario();  
        $todos=$Obitacora->consultarTodosb();
        $todosu=$Ousuario->listarAdm();
        $todos=$Obitacora->consultarTodosb();
        require_once('vistas/vista_consultarBitacora.php');
       
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>