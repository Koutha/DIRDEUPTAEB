<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require('modelos/modelo_usuario.php');
    $Ousuario=new usuario();
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Reporte de la Aplicación de las Pruebas",$_SESSION['id_usuario'])){
        include_once('modelos/modelo_pruebas.php');
        $Oprueba = new Cprueba();
        $cedula_atleta=$_GET['cedula_atleta'];
        $todosa=$Oprueba->consultarDatosa($cedula_atleta);
        $todosap=$Oprueba->ca($cedula_atleta);
        $todosp=$Oprueba->consultarTodosp(); 
        $fecha=strtotime(date('Y/m/d'));
        $fecha1=date('d/m/Y');
        $fase=strtotime(date('Y/6/1'));
        
        require_once('vistas/vista_generar_pdf_aplicacion.php');
    }
    else{
        header('Location:?action=sindex');
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>