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
    } else if (isset($_POST['Submit']) or isset($_GET['id_prueba'])) {
        if (isset($_POST['id_prueba'])) {
            $id_prueba = $_POST['id_prueba'];
        } else if (isset($_GET['id_prueba'])) {
            $id_prueba = $_GET['id_prueba'];
        }
        include_once('modelos/modelo_pruebas.php');
        require_once ('modelos/modelo_bitacora.php');
        require_once ('modelos/modelo_usuario.php');
        $Obitacora=new Cbitacora();
        $Ousuario=new usuario();
        $username=$_SESSION['username'];
        $t_usuario=$Ousuario->getbyuser($username);
        $id_usuario=$t_usuario['id_usuario'];
        $fecha=date('d/m/y');
        $hora=date('h:i:s');
        $actividad="Modifico una Prueba";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Obitacora->registrarbitacora();
        $Oprueba = new Cprueba();
       $todos=$Oprueba->consultarTodosp();
         
        if(isset($_POST['id_prueba'])){
            $id_pruebaa=(substr($_POST['tipo_prueba'], 0,3).substr($_POST['unidad'], 0,3).substr($_POST['nombre'], 0,5));
                    $id_prueba= $_POST['id_prueba'];
                    $result = $Oprueba->consultarid($id_pruebaa);
                    if ($result > 0 && $result['id_prueba'] != $id_prueba) {
                        $existe = 1;
                        require('vistas/vista_modificarpruebas.php');
                    } 
                    else { 
                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $tipo_prueba=$_POST['tipo_prueba'];
                $objetivo=$_POST['objetivo'];
                $unidad=$_POST['unidad'];
                $condicion=$_POST['condicion'];
                $rango1=$_POST['rango1'];
                $rango2=$_POST['rango2'];
                $rango3=$_POST['rango3'];
                $rango4=$_POST['rango4'];
                $Oprueba->setid_prueba($id_prueba);
                $Oprueba->setnombre($nombre);
                $Oprueba->setdescripcion($descripcion);
                $Oprueba->settipo_prueba($tipo_prueba);
                $Oprueba->setobjetivo($objetivo);
                $Oprueba->setunidad($unidad);
                $Oprueba->setcondicion($condicion);
                $Oprueba->setrango1($rango1);
                $Oprueba->setrango2($rango2);
                $Oprueba->setrango3($rango3);
                $Oprueba->setrango4($rango4);
                    //aca  guardar en la base de datos
                    	       				
                        $Oprueba->actualizarprueba();
                         
                        $actualizo = 1;
                       
                        $todos=$Oprueba->consultarTodosp();
                        require_once('vistas/vista_consultarPruebas.php');
                    }
        }    
        else{
            require('vistas/vista_modificarPruebas.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  