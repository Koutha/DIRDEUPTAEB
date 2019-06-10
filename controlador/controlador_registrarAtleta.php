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
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarAtleta') { 
            include_once('modelos/modelo_atleta.php');
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
            $actividad="registro un Atleta";
            $Obitacora->setid_usuarios($id_usuario);
            $Obitacora->setfecha($fecha);
            $Obitacora->sethora($hora);
            $Obitacora->setactividad($actividad);
            $Obitacora->registrarbitacora();
            $Oatleta= new Catleta();
            $Odisciplina= new Cdisciplina();
            $cedula=$_POST['cedula'];
            $atleta= $Oatleta->consultarDatos($cedula);
            if ($atleta>0) {
                $existe=1;
                //echo 'entre por existe';
                $disciplinas=$Odisciplina->consultarTodos();
                require('vistas/vista_registrarAtleta.php');
            }else{
                $nombres=$_POST['nombres'];
                $apellidos=$_POST['apellidos'];
                $fecha_nacimiento=$_POST['fecha_nacimiento'];
                $direccion=$_POST['direccion'];
                $tel_movil=$_POST['tel_movil'];
                $tel_fijo=$_POST['tel_fijo'];
                $correo=$_POST['correo'];
                $sexo=$_POST['sexo'];
                $pnf=$_POST['pnf'];
                $trayecto= $_POST['trayecto'];
                $año_ingreso=$_POST['año_ingreso'];
                $estatura=  $_POST['estatura'];
                $peso= $_POST['peso'];
                $tipo_sangre= $_POST['tipo_sangre'];
                $info_alergias=$_POST['info_alergias'];
                $contacto_emergencia=$_POST['contacto_emergencia'];
                $tel_contacto=$_POST['tel_contacto'];
                $info_discapacidad=$_POST['info_discapacidad'];
                $observaciones=$_POST['observaciones'];
                $talla_franela=$_POST['talla_franela'];
                $talla_pantalon=$_POST['talla_pantalon'];
                $talla_short=$_POST['talla_short'];
                $talla_zapato=$_POST['talla_zapato'];
                $talla_gorra=$_POST['talla_gorra'];
                $talla_chaqueta=$_POST['talla_chaqueta'];
                $Oatleta->setCedula($cedula);
                $Oatleta->setNombres($nombres);
                $Oatleta->setApellidos($apellidos);
                $Oatleta->setFecha_nacimiento($fecha_nacimiento);
                $Oatleta->setDireccion($direccion);
                $Oatleta->setTel_movil($tel_movil);
                $Oatleta->setTel_fijo($tel_fijo);
                $Oatleta->setCorreo($correo);
                $Oatleta->setSexo($sexo);
                //cargar Foto
                $target_dir = "assets/img/img_foto_atleta/";
                $target_file_foto = $target_dir .$cedula. basename($_FILES["dir_foto"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_foto,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_foto"]["tmp_name"], $target_file_foto);
                $Oatleta->setDir_foto($target_file_foto);
                // cargar cedula
                $target_dir = "assets/img/img_ced_atleta/";
                $target_file_cedula = $target_dir .$cedula. basename($_FILES["dir_cedula"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_cedula,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_cedula"]["tmp_name"], $target_file_cedula);
                $Oatleta->setDir_cedula($target_file_cedula);
                $Oatleta->setPnf($pnf);
                $Oatleta->setTrayecto($trayecto);
                $Oatleta->setAño_ingreso($año_ingreso);
                //cargar carnet
                $target_dir = "assets/img/img_carnet_atleta/";
                $target_file_carnet = $target_dir .$cedula. basename($_FILES["dir_carnet"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_carnet,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_carnet"]["tmp_name"], $target_file_carnet);
                $Oatleta->setDir_carnet($target_file_carnet);
                // cargar planilla
                $target_dir = "assets/img/img_planilla_atleta/";
                $target_file_planilla = $target_dir .$cedula. basename($_FILES["dir_planilla"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_planilla,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_planilla"]["tmp_name"], $target_file_planilla);
                $Oatleta->setDir_planilla($target_file_planilla);
                $Oatleta->setEstatura($estatura);
                $Oatleta->setPeso($peso);
                $Oatleta->setTipo_sangre($tipo_sangre);
                $Oatleta->setInfo_alergias($info_alergias);
                $Oatleta->setContacto_emergencia($contacto_emergencia);
                $Oatleta->setTel_contacto($tel_contacto);
                $Oatleta->setInfo_discapacidad($info_discapacidad);
                $Oatleta->setObservaciones($observaciones);
                $Oatleta->setTalla_franela($talla_franela);
                $Oatleta->setTalla_pantalon($talla_pantalon);
                $Oatleta->setTalla_short($talla_short);
                $Oatleta->setTalla_zapato($talla_zapato);
                $Oatleta->setTalla_gorra($talla_gorra);
                $Oatleta->setTalla_chaqueta($talla_chaqueta);
                $Oatleta->registrarAtleta();
                if(!empty($_POST['id_disciplina'])){
                    foreach ($_POST['id_disciplina'] as $key => $value) {
                        $Oatleta->asignarDisciplina($value);
                    }
                }
                //$registro= 1;
                //echo 'registre';
                //require('vistas/vista_registrarAtleta.php');
                $_SESSION['registro']= 1;
                header('Location:?action=registrarAtleta');
            }
        }
        else{
            include_once('modelos/modelo_disciplina.php');
            $Odisciplina= new Cdisciplina();
            $disciplinas=$Odisciplina->consultarTodos();
            require('vistas/vista_registrarAtleta.php');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
