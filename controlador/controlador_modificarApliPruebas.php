<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if (isset($_POST['Submit']) or isset($_GET['id_atleta_prueba'])) {
        if (isset($_POST['id_atleta_prueba'])) {
            $id_atleta_prueba = $_POST['id_atleta_prueba'];
        } else if (isset($_GET['id_atleta_prueba'])) {
            $id_atleta_prueba = $_GET['id_atleta_prueba'];
        }

        include_once('modelos/modelo_pruebas.php');
        $Oprueba = new Cprueba();
        $todosp=$Oprueba->consultarTodos();
        $todos=$Oprueba->consultarTodosa();
        if(isset($_POST['cedula_atleta'])){
          $nomb=($_POST['cedula_atleta']);
                if ($Oprueba->consultar($nomb)) {
               //si el atleta existe
                 $existe= 1;
                 }
            else{$existe=0;}
            if ($existe=='1') {          
                    
                     //aca  guardar en la base de datos
                    	       				
                        $Oprueba->actualizarapliprueba($_POST['id_atleta_prueba'], $_POST['id_prueba'], $_POST['fecha'], $_POST['medicion'], $_POST['cedula_atleta']);
                         
                        $actualizo = 1;
                       
                        
                        require_once('vistas/vista_consultarAplipruebas.php');
                    } 
                     require('vistas/vista_modificarAplipruebas.php');   
        }    
        else{
            require('vistas/vista_modificarAplipruebas.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  