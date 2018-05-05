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
        include_once('modelos/modelo_disciplina.php');
        $Odisciplina= new Cdisciplina();
        if (isset($_GET['id_disciplina'])) {
            $id_disciplina=$_GET['id_disciplina'];
            $Odisciplina->setid_disciplina($id_disciplina);
            $Odisciplina->borrarDisciplina();
            $borrado = 1;
        }
        $todos=$Odisciplina->consultarTodos(); 
        require('vistas/vista_consultarDisciplina.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  