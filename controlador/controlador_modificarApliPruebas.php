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
    } else if (isset($_POST['Submit']) or isset($_GET['id_ap'])) {
        if (isset($_POST['id_ap'])) {
            $id_ap = $_POST['id_ap'];
        } else if (isset($_GET['id_ap'])) {
            $id_ap = $_GET['id_ap'];
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
        $actividad="Modifico la Aplicacion de una Prueba";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Obitacora->registrarbitacora();
        $Oprueba = new Cprueba();
        $todosp=$Oprueba->consultarTodosp();
        $todos=$Oprueba->consultarTodosap();
        if(isset($_POST['cedula_atleta'])){
          $cedula=($_POST['cedula_atleta']);
                if ($Oprueba->consultarDatos($cedula)) {
               //si el atleta existe
                 $existe= 1;
                 }
            else{$existe=0;}
            if ($existe=='1') {          
                $id_prueba=$_POST['id_prueba'];
                $fecha=$_POST['fecha'];
                $medicion=$_POST['medicion'];
                $Oprueba->setid_prueba($id_prueba);
                $Oprueba->setmedicion($medicion);
                $Oprueba->setCedula($cedula);
                $Oprueba->setfecha($fecha);
                $Oprueba->setid_ap($id_ap);
                     //aca  guardar en la base de datos
                    	       				
                        $Oprueba->actualizarapliprueba();
                         
                        $actualizo = 1;
                       
                        $todosp=$Oprueba->consultarTodosp();
                        $todosa=$Oprueba->consultarTodos();
                        $todos=$Oprueba->consultarTodosap();
                        require_once('vistas/vista_consultarApliPruebas.php');
                    } 
                     require('vistas/vista_modificarApliPruebas.php');   
        }    
        else{
            require('vistas/vista_modificarApliPruebas.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  