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
        include_once('modelos/modelo_personal.php');
        include_once('modelos/modelo_disciplina.php');
        $Opersonal= new Cpersonal();
        $Odisciplina= new Cdisciplina();
        if (isset($_GET['cedula_et'])) {
            $cedula_et=$_GET['cedula_et'];
            $Opersonal->borrarPersonal($cedula_et);
            $borrado = 1;
        }
        $todos=$Opersonal->consultarTodos(); 
        require('vistas/vista_consultarPersonal.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  