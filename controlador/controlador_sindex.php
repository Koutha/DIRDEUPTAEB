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
        require('modelos/modelo_atleta.php');
        require('modelos/modelo_personal.php');
        require('modelos/modelo_disciplina.php');
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $Oatleta=new Catleta();
        $Odisciplina=new Cdisciplina();
        $Opersonal=new Cpersonal();
        $totalA= $Oatleta->getTotalAtletasActivos();
        $totalD= $Odisciplina->getTotalDisciplinas();
        $totalP= $Opersonal->getTotalPersonas();
    	require('vistas/vista_sindex.php');
        
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>

  