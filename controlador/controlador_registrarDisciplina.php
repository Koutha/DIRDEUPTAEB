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
    else if (isset($_POST['Submit']) && $_POST['Submit']=='registrarDisciplina') {
           
            include_once('modelos/modelo_disciplina.php');
            $Cdisciplina= new Cdisciplina();
            $nomb=$_POST['nombre'];
            if ($Cdisciplina->consultar($nomb)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarDisciplina.php');
            }
            else{
                //registrarlo
                $Cdisciplina->registrarDisciplina($_POST['nombre'], $_POST['tipo_disciplina']);
               $registro= 1;
               echo 'entre en registrar';
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
