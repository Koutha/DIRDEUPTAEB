<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if (isset($_POST['Submit']) or isset($_GET['id_prueba'])) {
        if (isset($_POST['id_prueba'])) {
            $id_prueba = $_POST['id_prueba'];
        } else if (isset($_GET['id_prueba'])) {
            $id_prueba = $_GET['id_prueba'];
        }
        include_once('modelos/modelo_pruebas.php');
        $Oprueba = new Cprueba();
        $user = $Oprueba->getbyid_p($id_prueba);
       $todos=$Oprueba->consultarTodos();
         
        if(isset($_POST['nombre'])){
                    $nombre= $_POST['nombre'];
                    $result = $Oprueba->consultar($nombre);
                    if ($result > 0 && $user['nombre'] != $nombre) {
                        $existe = 1;
                        require('vistas/vista_modificarpruebas.php');
                    } 
                    else { //aca  guardar en la base de datos
                    	       				
                        $Oprueba->actualizarprueba($id_prueba, $_POST['nombre'], $_POST['descripcion'], $_POST['tipo_prueba'], $_POST['objetivo'], $_POST['unidad'], $_POST['rango1'], 
                                                    $_POST['rango2'], $_POST['rango3'], $_POST['rango4']);
                         
                        $actualizo = 1;
                       
                        
                        require_once('vistas/vista_consultarPruebas.php');
                    }
        }    
        else{
            require('vistas/vista_modificarPruebas.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  