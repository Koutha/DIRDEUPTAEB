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
            include_once('modelos/modelo_atleta.php');
            include_once('modelos/modelo_disciplina.php');
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            $Oatleta = new Catleta();
            $Odisciplina= new Cdisciplina();
            $atleta = $Oatleta->consultarDatos($id);
            $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
            switch ($atleta['id_pnf']) {
                case '1':
                    $pnf=' Administracion';
                    break;
                case '2':
                    $pnf=' Ciencias de la Información';
                    break;
                case '3':
                    $pnf=' Contaduría Publica';
                    break;
                case '4':
                    $pnf=' Turismo';
                    break;
                case '5':
                    $pnf=' Agroalimentación';
                    break;
                case '6':
                    $pnf=' Higiene y seguridad laboral';
                    break;
                case '7':
                    $pnf=' Informática';
                    break;
                case '8':
                    $pnf=' Sistemas de calidad y ambiente';
                    break;
                case '9':
                    $pnf=' Deportes';
                    break;
            }
            $validacion  = 0; 
            foreach ($_SESSION['permisos'] as $key => $value) {
                if ($value == "Modificar Atleta") {
                     $validacion = 1 ; 
                }
                    
            }
                
        require('vistas/vista_detalleAtleta.php');
    }
        
} 
else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  