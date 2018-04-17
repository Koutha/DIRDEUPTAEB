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
    else if (isset($_POST['submit']) or isset($_GET['id'])) {
            if (isset($_POST['id'])) {
            $id = $_POST['id'];
            } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            }
            include_once('modelos/modelo_atleta.php');
            include_once('modelos/modelo_disciplina.php');
            $Oatleta= new Catleta();
            $Odisciplina= new Cdisciplina();
            $atleta = $Oatleta->consultarDatos($id);
            //entra por post
            if (isset($_POST['cedula'])) {
                $cedula=$_POST['cedula'];
                $atleta_tmp = $Oatleta->consultarDatos($cedula);
                
                //validacion
                if($atleta_tmp>0 && $atleta['cedula_atleta']!=$cedula){
                    $existe= 1;
                    echo 'entre por existe';
                    $disciplinas=$Odisciplina->consultarTodos();
                    $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
                    require('vistas/vista_modificarAtleta.php');
                }
                else{
                    
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
                    if (isset($_FILES["dir_foto"]["name"]) && !empty($_FILES["dir_foto"]["name"])) {
                        //cargar Foto
                        unlink($atleta['dir_foto']);
                        $target_dir = "assets/img/img_foto_atleta/";
                        $target_file_foto = $target_dir .$cedula. basename($_FILES["dir_foto"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_foto,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_foto"]["tmp_name"], $target_file_foto);
                        $Oatleta->setDir_foto($target_file_foto);
                    
                    }else{
                        //no se modifico
                        $Oatleta->setDir_foto($atleta['dir_foto']);
                    }

                    if (isset($_FILES["dir_cedula"]["name"])&& !empty($_FILES["dir_cedula"]["name"])) {
                        // cargar cedula
                        unlink($atleta['dir_cedula']);
                        $target_dir = "assets/img/img_ced_atleta/";
                        $target_file_cedula = $target_dir .$cedula. basename($_FILES["dir_cedula"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_cedula,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_cedula"]["tmp_name"], $target_file_cedula);
                        $Oatleta->setDir_cedula($target_file_cedula);
                    }else{
                        //no se modifico
                        $Oatleta->setDir_cedula($atleta['dir_cedula']);
                    }
                    $Oatleta->setPnf($pnf);
                    $Oatleta->setTrayecto($trayecto);
                    $Oatleta->setAño_ingreso($año_ingreso);
                    if (isset($_FILES["dir_carnet"]["name"]) && !empty($_FILES["dir_carnet"]["name"])) {
                        //cargar carnet
                        unlink($atleta['dir_carnet']);
                        $target_dir = "assets/img/img_carnet_atleta/";
                        $target_file_carnet = $target_dir .$cedula. basename($_FILES["dir_carnet"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_carnet,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_carnet"]["tmp_name"], $target_file_carnet);
                        $Oatleta->setDir_carnet($target_file_carnet);
                    } else {
                        //no se modifico
                        $Oatleta->setDir_carnet($atleta['dir_carnet']);
                    }
                    if (isset($_FILES["dir_planilla"]["name"]) && !empty($_FILES["dir_planilla"]["name"])) {
                        // cargar planilla
                        unlink($atleta['dir_planilla']);
                        $target_dir = "assets/img/img_planilla_atleta/";
                        $target_file_planilla = $target_dir .$cedula. basename($_FILES["dir_planilla"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_planilla,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_planilla"]["tmp_name"], $target_file_planilla);
                        $Oatleta->setDir_planilla($target_file_planilla);
                    } else{
                        //no se modifico
                        $Oatleta->setDir_planilla($atleta['dir_planilla']);
                    }
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
                    $Oatleta->modificarAtleta($atleta['cedula_atleta']);
                    $Oatleta->borrarDisciplinas($cedula);
                    if(!empty($_POST['id_disciplina'])){
                        foreach ($_POST['id_disciplina'] as $key => $value) {
                            $Oatleta->asignarDisciplina($value);
                        }
                    }
                    $id=$Oatleta->getCedula();
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
                    $registro= 1;
                    } // switch
                    header('Location:?action=detalleAtleta&id='.$id);
                  // require('vistas/vista_detalleAtleta.php');
                } //else linea 31 validacion
            }//if de la entrada por post linea 22
            else {
                //entra por get
                $Odisciplina= new Cdisciplina();
                $disciplinas=$Odisciplina->consultarTodos();
                $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($id);
                require('vistas/vista_modificarAtleta.php');
            } //else del get linea 169
        }//else linea 12
} //if linea 5 validacion de sesion
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
