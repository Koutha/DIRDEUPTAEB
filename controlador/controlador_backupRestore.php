<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//estan la sesion iniciada
    if ($now > $_SESSION['expire']) { //la sesion ya expiro
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='backupRestore') {
            require_once ('modelos/modelo_bitacora.php');
            require_once ('modelos/modelo_usuario.php');
            $Obitacora=new Cbitacora();
            $Ousuario=new usuario();
            $username=$_SESSION['username'];
            $t_usuario=$Ousuario->getbyuser($username);
            $id_usuario=$t_usuario['id_usuario'];
            $fecha=date('d/m/y');
            $hora=date('H:i:s');
            $Obitacora->setid_usuarios($id_usuario);
            $Obitacora->setfecha($fecha);
            $Obitacora->sethora($hora);
            if (isset($_POST['exportFormat'])) {//validacion para exportar
                if ($_POST['exportFormat']==".backup") { //formato .backup
                    $fecha = date('Y-m-d_H-i-s'); //fecha para el nombre del archivo
                    $name = 'db-backup'.$fecha;
                    $actividad="Exporto la Base de datos .BACKUP"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora(); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
                    //backup encriptado
                    exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -C -p 5432 -F c DIRDEUPTAEB | E:\laragon\bin\apache\httpd-2.4.35-win64-VC15\bin\openssl.exe smime -encrypt -aes256 -binary -outform DEM -out E:/laragon/www/DIRDEUPTAEB/db_backup/db-backup'.$fecha.'.backup.ssl E:\laragon\www\DIRDEUPTAEB\core\db_backup_key.pem.pub 2>&1');
                    //exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -C -p 5432 -F c DIRDEUPTAEB > db_backup\db-backup'.$fecha.'.backup 2>&1');
                    $path = 'db_backup/';
                    $filepath = $path.$name.'.backup.ssl';
                    $fp = @fopen($filepath, 'rb');
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$filepath.'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: '.filesize($filepath));
                    ob_end_clean();//required here or large files will not work
                    fpassthru($fp);
                    fclose($fp); 
                }else{ //formato .sql
                    $fecha = date('Y-m-d_H-i-s'); //fecha para el nombre del archivo
                    $name = 'db-backup'.$fecha;
                    $actividad="Exporto la Base de datos .SQL"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora(); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
                    exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -C -p 5432 DIRDEUPTAEB > db_backup\db-backup'.$fecha.'.sql 2>&1');
                    $path = 'db_backup/';
                    $filepath = $path.$name.'.sql';
                    $fp = @fopen($filepath, 'rb');
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$filepath.'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: '.filesize($filepath));
                    ob_end_clean();//required here or large files will not work
                    fpassthru($fp);
                    fclose($fp); 
                }
                require('vistas/vista_backupRestore.php');
            }else if(isset($_FILES['restoreFile'])){//validacion para importar/restauracion
                    unset($Obitacora);
                    unset($Ousuario); //para desconectar las estancias de la base de datos 
                    $file = $_FILES['restoreFile']['tmp_name'];
                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\dropdb.exe -U postgres DIRDEUPTAEB'); //borrar base de datos
                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\createdb.exe -U postgres -E UTF8 -O postgres DIRDEUPTAEB'); //crear base de datos
                    //echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_restore.exe -h localhost -p 5432 -U postgres -C -d DIRDEUPTAEB '.$file);
                    //decifrado
                    echo exec('E:\laragon\bin\apache\httpd-2.4.35-win64-VC15\bin\openssl.exe smime -decrypt -in '.$file.' -binary -inform DEM -inkey E:\laragon\www\DIRDEUPTAEB\core\db_backup_key.pem -out E:\laragon\www\DIRDEUPTAEB\decrypted.backup 2>&1');
                    //restore
                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_restore.exe -h localhost -p 5432 -U postgres -C -d DIRDEUPTAEB E:\laragon\www\DIRDEUPTAEB\decrypted.backup');
                    //eliminar el archivo desencriptado
                    $myFile = "E:\laragon\www\DIRDEUPTAEB\decrypted.backup";
                    $myFileLink = fopen($myFile, 'w') or die("can't open file");
                    fclose($myFileLink);
                    $myFile = "E:\laragon\www\DIRDEUPTAEB\decrypted.backup";
                    unlink($myFile) or die("Couldn't delete file");
                    $Obitacora=new Cbitacora();
                    $Ousuario=new usuario();
                    $username=$_SESSION['username'];
                    $t_usuario=$Ousuario->getbyuser($username);
                    $id_usuario=$t_usuario['id_usuario'];
                    $fecha=date('d/m/y');
                    $hora=date('H:i:s');
                    $Obitacora->setid_usuarios($id_usuario);
                    $Obitacora->setfecha($fecha);
                    $Obitacora->sethora($hora);
                    $actividad="Realizo una restauracion de Base de datos"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora();
                    $_SESSION['restore'] = 1 ;
                    require('vistas/vista_backupRestore.php');
                }
        }
        else if (isset($_SESSION['imgCorrect'])&& $_SESSION['imgCorrect'] ==1) { //entrada despues de validacion de usuario se puede agregar variable de tiempo
            require('modelos/modelo_usuario.php');
            $Ousuario=new usuario();
            //unset($_SESSION['imgCorrect']); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
            require('vistas/vista_backupRestore.php');
            }else if (isset($_SESSION['restoring'])&& $_SESSION['restoring']== 1){
                //agregar aqui el codigo para restaurar la bd
                $backupInfo = unserialize($_GET['id']);
                var_dump($backupInfo);
                $file = $backupInfo['file_path'];
                echo $file;
                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\dropdb.exe -U postgres DIRDEUPTAEB'); //borrar base de datos
                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\createdb.exe -U postgres -E UTF8 -O postgres DIRDEUPTAEB'); //crear base de datos
                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_restore.exe -h localhost -p 5432 -U postgres -C -d DIRDEUPTAEB '.$file);
                unset($_SESSION['restoring']);
                $_SESSION['restored'] = 1 ;
                header('Location:?action=restoreAutoSave');
            }else{//entrada por enlace o get
            header('Location:?action=sindex');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}
?>
