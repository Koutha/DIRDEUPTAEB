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
    } else if (isset($_POST['Submit']) or isset($_GET['id_disciplina'])) {
        if (isset($_POST['id_disciplina'])) {
            $id_disciplina = $_POST['id_disciplina'];
        } else if (isset($_GET['id_disciplina'])) {
            $id_disciplina = $_GET['id_disciplina'];
        }
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
        $actividad="Modifico una Disciplina";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Obitacora->registrarbitacora();
        $Odisciplina = new Cdisciplina();
        $Odisciplina->setid_disciplina($id_disciplina);
        $user = $Odisciplina->consultarid();
		$todos=$Odisciplina->consultarTodos();
        if(isset($_POST['nombre'])){
                    $nombre= $_POST['nombre'];
                    $Odisciplina->setnombre($nombre);
                    $result = $Odisciplina->consultar();
                    if ($result > 0 && $user['nombre'] != $nombre) {
                        $existe = 1;
                        require('vistas/vista_modificarDisciplina.php');
                    } 
                    else { 
                        $tipo_disciplina=$_POST['tipo_disciplina'];
                        $Odisciplina->settipo_disciplina($tipo_disciplina);
                    //aca  guardar en la base de datos
                        $Odisciplina->actualizarDisciplina();
                         
                        $actualizo = 1;
                       
                        $todos=$Odisciplina->consultarTodos(); 
                        require_once('vistas/vista_consultarDisciplina.php');
                    }
        }    
        else{
            require('vistas/vista_modificarDisciplina.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  