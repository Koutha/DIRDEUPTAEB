<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else if (isset($_GET['cedula_atleta'])){
        include_once('modelos/modelo_pruebas.php');
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $Oprueba = new Cprueba();
        $cedula_atleta=$_GET['cedula_atleta'];
        $todos=$Oprueba->consultarTodosap();
        $todosa=$Oprueba->consultarDatosa($cedula_atleta);
        $todosp=$Oprueba->consultarTodosp();
        
        require_once('vistas/vista_consultarApliPruebas.php');
        }
        else{
            
            if (isset($_POST['cedula_atleta'])) {
                $cedula_atleta=$_POST['cedula_atleta'];
            }
        require_once('modelos/modelo_pruebas.php');
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $Oprueba=new Cprueba();
        $todos=$Oprueba->cta();
        require_once('vistas/vista_consultarAplicacionPruebas.php');
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