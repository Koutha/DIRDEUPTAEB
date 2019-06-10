<?php
session_start();
date_default_timezone_set('America/caracas');
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
            require_once ('modelos/modelo_bitacora.php');
            require_once ('modelos/modelo_usuario.php');
            $Obitacora=new Cbitacora();
            $Ousuario=new usuario();
            $username=$_SESSION['username'];
            $t_usuario=$Ousuario->getbyuser($username);
            $id_usuario=$t_usuario['id_usuario'];
            $fecha=date('d/m/y');
            $hora=date('h:i:s');
            $actividad="registro una Disciplina";
            $Obitacora->setid_usuarios($id_usuario);
            $Obitacora->setfecha($fecha);
            $Obitacora->sethora($hora);
            $Obitacora->setactividad($actividad);
            $Obitacora->registrarbitacora();
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
