<?php
session_start();

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
        $Odisciplina = new Cdisciplina();
        $user = $Odisciplina->getbyid_d($id_disciplina);
		$todos=$Odisciplina->consultarTodos();
        if(isset($_POST['nombre'])){
                    $nombre= $_POST['nombre'];
                    $result = $Odisciplina->consultar($nombre);
                    if ($result > 0 && $user['nombre'] != $nombre) {
                        $existe = 1;
                        require('vistas/vista_modificarDisciplina.php');
                    } 
                    else { //aca  guardar en la base de datos
                        $Odisciplina->actualizarDisciplina($id_disciplina, $_POST['nombre'], $_POST['tipo_disciplina']);
                         
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
  