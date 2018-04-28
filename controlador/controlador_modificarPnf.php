<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if (isset($_POST['submit']) or isset($_GET['id_pnf'])) {
        if (isset($_POST['id_pnf'])) {
            $id_pnf = $_POST['id_pnf'];
        } else if (isset($_GET['id_pnf'])) {
            $id_pnf = $_GET['id_pnf'];
        }
        include_once('modelos/modelo_Pnf.php');
        $Opnf = new Cpnf();
        $user = $Opnf->getbyid_Pnf($id_pnf);
		$todos=$Opnf->consultaTodo();
        if(isset($_POST['coordinador'])){
                    $coordinador= $_POST['coordinador'];
                    $result = $Opnf->consulta($coordinador);
                    if ($result > 0 && $user['nombre'] != $nombre) {
                        $existe = 1;
                        require('vistas/vista_modificarPnf.php');
                    } 
                    else { //aca  guardar en la base de datos
                        $Opnf->actualizarpnf($id_pnf, $_POST['nombre'], $_POST['coordinador']);
                         
                        $actualizo = 1;
                       
                        $todos=$Opnf->consultaTodo(); 
                        require_once('vistas/vista_consultarPnf.php');
                    }
        }    
        else{
            require('vistas/vista_modificarPnf.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
