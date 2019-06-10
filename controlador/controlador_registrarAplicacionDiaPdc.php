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
    }else {
        include_once('modelos/modelo_pdc.php');
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
        $actividad="Registro la Aplicacion de un Pdc por Dia";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Obitacora->registrarbitacora();
        $Opdc= new Cpdc();
        $Odisciplina= new Cdisciplina();
        $disciplinas=$Odisciplina->consultarTodos();
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $pdc=$Opdc->consultarAplicacionDiaTodosNoAsignados($id);
            if ($pdc==0) { //ya estan asignados todos los dias
                $_SESSION['msg']=1;
                $pdc_tmp=$Opdc->consultarAplicacionDiaTodos($id);
                $nombre= $pdc_tmp[0]['nombre_pdc'];
                //var_dump($pdc_tmp);
                header('Location:?action=registrarAplicacionPdc&id='.$nombre);
            }else{ //hay dias sin asignar todavia
                require('vistas/vista_registrarAplicacionDiaPdc.php');
            }
        }else{
            $pdc=$Opdc->consultarTodos();
            require('vistas/vista_registrarAplicacionTodosPdc.php');
        }
    }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  