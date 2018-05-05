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
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarPnf') {
           
            include_once('modelos/modelo_Pnf.php');
            $Opnf= new Cpnf();
            $nombr=$_POST['nombre'];
            if ($Opnf->consulta($nombr)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarPnf.php');
            }
            else{
                $nombre=$_POST['nombre'];
                $coordinador=$_POST['coordinador'];
                $Opnf->setnombre($nombre);
                $Opnf->setcoordinador($coordinador);
                //registrarlo
                $Opnf->registrarPnf();
               $registro= 1;
               require('vistas/vista_registrarPnf.php');
            }
    
        }
        else{
            require('vistas/vista_registrarPnf.php');
        }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
