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
        include_once('modelos/modelo_atleta.php');
        include_once('modelos/modelo_disciplina.php'); 
        $Oatleta= new Catleta();
        $Odisciplina= new Cdisciplina();
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $Oatleta->borrarAtleta($id);
            $borrado = 1;
        }
        $todos=$Oatleta->consultarTodos(); 
        require('vistas/vista_consultarAtleta.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  