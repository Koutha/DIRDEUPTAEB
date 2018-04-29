<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if (isset($_POST['Submit']) or isset($_GET['id_ap'])) {
        if (isset($_POST['id_ap'])) {
            $id_ap = $_POST['id_ap'];
        } else if (isset($_GET['id_ap'])) {
            $id_ap = $_GET['id_ap'];
        }

        include_once('modelos/modelo_pruebas.php');
        $Oprueba = new Cprueba();
        $todosp=$Oprueba->consultarTodos();
        $todos=$Oprueba->consultarTodosap();
        if(isset($_POST['cedula_atleta'])){
          $cedula_atleta=($_POST['cedula_atleta']);
                if ($Oprueba->consultara($cedula_atleta)) {
               //si el atleta existe
                 $existe= 1;
                 }
            else{$existe=0;}
            if ($existe=='1') {          
                    
                     //aca  guardar en la base de datos
                    	       				
                        $Oprueba->actualizarapliprueba($_POST['fecha'], $_POST['medicion'], $_POST['cedula_atleta'], $_POST['id_prueba'], $_POST['id_ap']);
                         
                        $actualizo = 1;
                       
                        $todosp=$Oprueba->consultarTodos();
                        $todosa=$Oprueba->consultarTodosa();
                        $todos=$Oprueba->consultarTodosap();
                        require_once('vistas/vista_consultarApliPruebas.php');
                    } 
                     require('vistas/vista_modificarApliPruebas.php');   
        }    
        else{
            require('vistas/vista_modificarApliPruebas.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  