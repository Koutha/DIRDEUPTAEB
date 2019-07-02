<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if (isset($_GET['id'])) { 
            $id = $_GET['id'];
            include_once('modelos/modelo_personal.php');
            include_once('modelos/modelo_disciplina.php');
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            $Opersonal = new Cpersonal();
            $Odisciplina = new Cdisciplina();
            $personal = $Opersonal->consultarDatos($id);
            $personalDisciplinas=$Odisciplina->getDisciplinasPorPersonal($personal['cedula_et']);
            
        require('vistas/vista_detallePersonal.php');
    }
        
} 
else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  