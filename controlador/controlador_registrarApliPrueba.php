<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }
   
    else if (isset($_POST['Submit']) && $_POST['prue']=='1') {
                     //registrarlo
               include_once('modelos/modelo_pruebas.php');
               $Oprueba= new Cprueba();
               $todos=$Oprueba->consultarTodos();
               $id_prueba=($_POST['id_prueba']);
               $medicion=($_POST['medicion']);
               $nomb=($_POST['cedula_atleta']);
                if ($Oprueba->consultar($nomb)) {
               //si el atleta existe
                 $existe= 1;
                 }
            else{$existe=0;}
            if ($existe=='1') {
               
                
                //registrar la aplicacion de la prueba
                $Oprueba->registrarapliprueba($_POST['id_prueba'], $_POST['fecha'], $_POST['medicion'], 
                                        $_POST['cedula_atleta']);
               $registro= 1;
               
                    $nomb=($_POST['id_prueba']);                            
               require('vistas/vista_registrarApliPrueba.php');
            }
               require('vistas/vista_registrarApliPrueba.php');
            
        }

        else{
            include_once('modelos/modelo_pruebas.php');
            $Oprueba= new Cprueba();
                $todos=$Oprueba->consultarTodos(); 
            $nomb=$_POST['nombre'];
            $prueba=$Oprueba->consultar($nomb);
                //si el nombre existe
                
               
            
            require('vistas/vista_registrarApliPrueba.php');
        }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
