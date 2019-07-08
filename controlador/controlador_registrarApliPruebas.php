<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else{
    require('modelos/modelo_usuario.php');
    $Ousuario=new usuario();
    if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar Aplicación de Pruebas",$_SESSION['id_usuario'])) {
        include_once('modelos/modelo_pruebas.php');
        include_once('modelos/modelo_disciplina.php');
        $Oprueba= new Cprueba();
        $Odisciplina= new Cdisciplina();
        $todos=$Oprueba->consultarTodosp(); 
        $todosd=$Odisciplina->consultarTodos();  
        $todosad=$Odisciplina->consultarTodosad();

        require('vistas/vista_registrarApliPruebas.php');
    }else{
        header('Location:?action=sindex');
    }
    
}
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
