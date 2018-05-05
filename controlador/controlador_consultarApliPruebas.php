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
        $Oprueba = new Cprueba();
        $todos=$Oprueba->consultarTodosap();
        $todosa=$Oprueba->consultarTodos();
        $todosp=$Oprueba->consultarTodosp();
        
        require_once('vistas/vista_consultarApliPruebas.php');
        /*$allusers=$usuario->listarAdm();
    	require('vistas/vista_consultar.php');*/
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>