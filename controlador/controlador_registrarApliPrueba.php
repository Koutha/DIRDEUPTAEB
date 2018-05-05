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
    else if (isset($_POST['submit']) && $_POST['prue']=='1') {
                     //registrarlo
              include_once('modelos/modelo_pruebas.php');
              $Oprueba= new Cprueba();
              $todos=$Oprueba->consultarTodosp();
              $id_prueba=($_POST['id_prueba']);
              $prueba=$Oprueba->consultarDatosa($_POST['cedula_atleta']);
              if (isset($_POST['limpiar'])) {
                $buscar= '1';
                $nombr=$_POST['id_prueba'];
                require('vistas/vista_registrarApliPrueba.php');
              }
              if ($Oprueba->consultarDatosa($_POST['cedula_atleta'])) {
                $cedula=($_POST['cedula_atleta']);
                //si el atleta existe
                $existe='1';
              }
              else{$existe=0;}
              if ( $existe=='1'){
                if (isset($_POST['medicion'])) {
                  $medicion=($_POST['medicion']);
                  $fecha=$_POST['fecha'];
                  $Oprueba->setid_prueba($id_prueba);
                  $Oprueba->setmedicion($medicion);
                  $Oprueba->setCedula($cedula);
                  $Oprueba->setfecha($fecha);
                  //registrar la aplicacion de la prueba
                  $Oprueba->registrarapliprueba();
                  $registro= 1;
                  $cedula_atleta=$cedula;
                  $nombresA=$prueba['nombres'];
                  $apellidosA=$prueba['apellidos'];
                  $nombr=($_POST['id_prueba']);                           
                  require('vistas/vista_registrarApliPrueba.php');
                }
                $cedula_atleta=$cedula;
                $nombresA=$prueba['nombres'];
                $apellidosA=$prueba['apellidos'];
                $nombr=($_POST['id_prueba']);
                $siguiente='1';
                require('vistas/vista_registrarApliPrueba.php');
              }
              $buscar= '1';
              $nombr=$_POST['id_prueba'];
              require('vistas/vista_registrarApliPrueba.php');
            
    }

    else if (isset($_GET['id_prueba'])) {
      include_once('modelos/modelo_pruebas.php');
      $Oprueba= new Cprueba();
      $todos=$Oprueba->consultarTodosp(); 
      $nombr=$_GET['id_prueba'];
      $buscar= '1';
      require('vistas/vista_registrarApliPrueba.php');    }
    else{
      include_once('modelos/modelo_pruebas.php');
      $Oprueba= new Cprueba();
      $todos=$Oprueba->consultarTodosp(); 
      $nombr=$_POST['id_prueba'];
      $buscar= '1';
      require('vistas/vista_registrarApliPrueba.php');
    }
  } 
  else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
  }

?>
