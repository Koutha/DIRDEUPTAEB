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
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarDisciplina') {
           
            include_once('modelos/modelo_disciplina.php');
            $Odisciplina= new Cdisciplina();
            $nomb=$_POST['nombre'];
            if ($Odisciplina->consultar($nomb)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarDisciplina.php');
            }
            else{
                 $nombre=$_POST['nombre'];
                $tipo_disciplina=$_POST['tipo_disciplina'];
                $Odisciplina->setnombre($nombre);
                $Odisciplina->settipo_disciplina($tipo_disciplina);
                //registrarlo
                $Odisciplina->registrarDisciplina();
               $registro= 1;
               require('vistas/vista_registrarDisciplina.php');
            }
    
        }
        else{
            require('vistas/vista_registrarDisciplina.php');
        }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
