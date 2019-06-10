<!DOCTYPE html>
<html >
<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de Registro</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
     <link href="assets/css/fontawesome-all.min.css" rel="stylesheet" />
    
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/stepform.css" rel="stylesheet" type="text/css" >
     <!-- GOOGLE FONTS-->
   <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CALENDAR-->
    <link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' /> 
    <style type="text/css">
    .contenedor{   
        border:2px solid #FF0000;  
    }  
    .cabecera{    
        height:20%;  
    }  
    .menu{  
        text-align: center;
        font-size: 14pt;
        font-weight: bold;
        height:10%;  
    }  
    .foto{  
        height:50%; 
        float:left;  
        width:20%;  
    }  
    .izquierda{  
        height:50%;  
        background-color:#DAF7E2;  
        float:left;  
        width:50%;  
    } 
    .derecha{
        height:50%;  
        background-color:#5AAF23;  
        float:right;  
        width:40%; 
    }
    .pie{  
        height:20%;  
        background-color:#D3D1C1;  
        clear:both;  
    }
    .datos{
        
    }
    </style>
   
</head>
<body>

        <!--<div class ="contenedor">  
            <div class ="cabecera">
                <img style="height: 47px;width: 100%;" src="assets/img/membrete.png">
            </div>  
            <div class ="menu">DIRECCIÓN DE DEPORTES</div>  
            <div class ="foto">
                <img style="height: 200px" src="assets/img/img_foto_atleta/203500272017-08-27-1310.jpg">
            </div>  
            <div class ="izquierda">
                <p>Cedula: <span>V-</span>20350027</p>
            </div>  
            <div class ="izquierda">
                <p>Nombres: Alvaro Sofi</p>
            </div>
            <div class ="izquierda">
                <p>Apellidos: Tirado Gil</p>
            </div> 
            <div class ="izquierda">
                <p>Fecha de nacimiento: 1992-24-04</p>
            </div>  
            <div class ="pie">
                <p style="text-align: center;">PIEEEEEEEEEE</p>
            </div>  
        </div>  
      
 
    <button id="gpdf">Generate PDF</button> -->


<!--  EJEMPLO IMPRIMIR PDF SENCILLO
<style media="print">
        #sidebar, .header, .site-footer, .invoice-btn, #titulo {
            display: none;
        }
        #contenido_DIV {
            display:block;
        }
    </style>

<a onclick="javascript:javascript:window.print();" >Print</a>
-->    
<form action="" method="post" enctype="multipart/form-data">

<div  class="container">
    <div class="row">
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' >
                    <input type='text' id='datetimepicker1' class="form-control" name="fecha_inicio" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' >
                    <input type='text' id='datetimepicker2' class="form-control" name="fecha_fin" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
    </div>
</div>


        
<input type="submit" value="test" name="submit">
</form>
<?php

class StreamSteganography{
 
    var $img_path;
    var $img_object = null;
 
    function StreamSteganography( $img_path , $w = 640 , $h = 480 )
    {
        if ( !is_file( $img_path ) )
        {
            if ( is_writable($img_path) )
                die("nThe image path is not writable");
            $this->img_object = imagecreatetruecolor($w,$h);
            imagepng($this->img_object, $img_path  );
        }
        else
        {
            $inf = @getimagesize($img_path);
            if ( $inf == null )
                die("nThe image is not valid");
 
            if ( !  ( $inf["mime"] == "image/jpeg"  OR $inf["mime"] == "image/png" OR $inf["mime"] == "image/gif" ) )
                die("nThe image must be jpeg/png/gif");
 
            if ( $inf["mime"] == "image/gif"  )
                $this->img_object = imagecreatefromgif( $img_path );
            if ( $inf["mime"] == "image/jpeg"   )
                $this->img_object = imagecreatefromjpeg( $img_path );
            if ( $inf["mime"] == "image/png"  )
                $this->img_object = imagecreatefrompng( $img_path );     
 
        }
        $this->img_path = $img_path;
    }
    
    function readImg(){
        return $this->img_object;
    }

    function Write($data)
    {
        $bits=$this->_asc2bin($data);
        $lenbit=strlen($bits);
        $nx=imagesx($this->img_object);
        $ny=imagesy($this->img_object);
        for($x=0,$bit=0; $x<$nx; $x++)
        {
            for($y=0; $y<$ny; $y++)
            {
                $pix=$this->_getcolor($this->img_object,$x,$y);
                foreach(array('R','G','B') as $C)
                    $col[$C]=$bit<$lenbit?($pix[$C]|$bits[$bit])&(254|$bits[$bit++]):$pix[$C];
                imagesetpixel($this->img_object,$x,$y,$this->_setcolor($this->img_object,$col['R'],$col['G'],$col['B']));
            }
        }
        //imagepng($this->img_object, $path);
    }
 
    function Read()
    {
        $nx=imagesx($this->img_object);
        $ny=imagesy($this->img_object);
        $data='';
        for($x=0; $x<$nx; $x++ )
        {
            for($y=0; $y<$ny; $y++)
            {
                $pix=$this->_getcolor($this->img_object,$x,$y);
                $data.=($pix['R']&1).($pix['G']&1).($pix['B']&1);
            }
        }
        return $this->_bin2asc($data);
    }
 
    function _bin2asc($str)
    {
        $len = strlen($str);
        $data='';
        for ($i=0;$i<$len;$i+=8){ 
            $ch=chr(bindec(substr($str,$i,8))); 
            if(!ord($ch))break; $data.=$ch; 
        }
        return $data;
    }
 
    function _asc2bin($str)
    {
        $len = strlen($str);
        $data='';
        for($i=0;$i<$len;$i++)
            $data.=str_pad(decbin(ord($str[$i])),8,'0',STR_PAD_LEFT);
        return $data.'00000000';
    }
 
    function _getcolor($img,$x,$y)
    {
        $color = imagecolorat($img,$x,$y);
        return array('R'=>($color>>16)&0xFF,'G'=>($color>>8)&0xFF,'B'=>$color&0xFF);
    } 
 
    function _setcolor($img,$r,$g,$b)
    {
        $c=imagecolorexact($img,$r,$g,$b); if($c!=-1)return $c;
        $c=imagecolorallocate($img,$r,$g,$b); if($c!=-1)return $c;
        return imagecolorclosest($img,$r,$g,$b);
    } 
 
}
/*$imgtest = 'assets/img/estegan/img1/test1';
$ss = new StreamSteganography($imgtest.'.png');
$fimg = $ss->readImg();
var_dump($fimg);
echo '<br>';
echo '<br>';
ob_start(); // Let's start output buffering.
imagepng($fimg);//This will normally output the image, but because of ob_start(), it won't.
$contents = ob_get_contents(); // read from buffer //Instead, output above is saved to $contents
ob_end_clean(); //End the output buffer.
$sd = base64_encode($contents);
//$z = gzcompress($sd, 9);
echo 'string md5 de imagen sin secreto';
echo '<br>';
$md5 = md5($sd);
var_dump($md5);
echo '<br>';
echo '<br>';

echo 'string md5 de imagen con el secreto dentro';
echo '<br>';
$ss1 = new StreamSteganography($imgtest.'.png');

$secreto = 'hola soy el secreto';
$ss1->Write($secreto);
$fimg1 = $ss1->readImg();
ob_start(); // Let's start output buffering.
imagepng($fimg1);//This will normally output the image, but because of ob_start(), it won't.
$contents1 = ob_get_contents(); // read from buffer //Instead, output above is saved to $contents
ob_end_clean(); //End the output buffer.
$sd1 = base64_encode($contents1);
$md51 = md5($sd1);
var_dump($md51);
*/
$token = bin2hex(random_bytes(16));
var_dump($token);

mail('alvarot027@gmail.com', 'hola estoy es prueba', 'mensaje de prueba');

echo '<br>';
echo '<br>';
echo '<br>';
 
echo '<br>';
echo '<br>';
$secretKey = bin2hex(random_bytes(5));

$ska = base64_encode($secretKey);
echo '<br>';
var_dump($ska);

echo '<br>';
echo $ska;
echo '<br>';
echo '<br>';

require_once('modelos/modelo_pruebas.php');
$Opruebas=new Cprueba();
$tods=$Opruebas->cta();
foreach ($tods as $key) {
    $atleta=$Opruebas->ca($key['cedula_atleta']);
    echo $atleta['cedula_atleta'];
    echo '<br>';
}
//join para lista de atletas en la tabla ejecucion
$sql5= 'SELECT tbla.* 
FROM (SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
FROM "T_atleta" ta 
JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina)tbla
RIGHT JOIN
(SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos
FROM "T_atleta" ta 
JOIN "T_atleta_ejecucion_pdc" taep ON ta.cedula_atleta=taep.cedula_atleta 
JOIN "T_dia_pdc" tdp ON tdp.id_dp=taep.id_dp
JOIN "T_pdc" tpdc ON tpdc.id_pdc=tdp.id_pdc
WHERE tpdc.id_pdc=17)as arg
ON arg.cedula_atleta=tbla.cedula_atleta
WHERE tbla.id_disciplina=16';

//join para lista atletas exceptuando a los que ya estan registrados en la ejecucion
$sql4= 'SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
FROM "T_atleta" ta 
JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina
LEFT JOIN
(SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos
FROM "T_atleta" ta 
JOIN "T_atleta_ejecucion_pdc" taep ON ta.cedula_atleta=taep.cedula_atleta 
JOIN "T_dia_pdc" tdp ON tdp.id_dp=taep.id_dp
JOIN "T_pdc" tpdc ON tpdc.id_pdc=tdp.id_pdc
WHERE tpdc.id_pdc=17)as arg
ON arg.cedula_atleta=ta.cedula_atleta
WHERE tpdc.id_disciplina=16 AND arg.cedula_atleta IS NULL';

//atletas en tabla ejecucion por pdc
$sql3= 'SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos
FROM "T_atleta" ta 
JOIN "T_atleta_ejecucion_pdc" taep ON ta.cedula_atleta=taep.cedula_atleta 
JOIN "T_dia_pdc" tdp ON tdp.id_dp=taep.id_dp
JOIN "T_pdc" tpdc ON tpdc.id_pdc=tdp.id_pdc

WHERE tpdc.id_pdc=17';

//atletas por disciplina por pdc
$sql= 'SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
FROM "T_atleta" ta 
JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina
WHERE tpdc.id_disciplina=18';
//WHERE td.nombre='Ajedrez Masculino';

//atletas por disciplina 
$sql2 ='SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, td.id_disciplina, td.nombre
FROM "T_atleta" ta 
JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
WHERE td.id_disciplina=18';
//WHERE td.nombre='Ajedrez Masculino';

include_once('modelos/modelo_atleta.php');
include_once('modelos/modelo_disciplina.php');
include_once('modelos/modelo_pdc.php');

$Oatleta= new Catleta();
$Opdc= new Cpdc();
var_dump($Opdc->consultarADP2(17,16));
$dia_pdc=$Opdc->consultarAplicacion($_POST['fecha_inicio'],17);
echo 'test';
echo '<br>';
var_dump($dia_pdc);
echo '<br>';
 $atpd= $Oatleta->consultarAtletasPorDisciplina(18);
 $adp= $Opdc->consultarADP(18);
 var_dump($atpd);

 echo '<br>';
 var_dump($adp);
 echo '<br>';
 //var_dump($Opdc->consultarADP($id=16)); consultar atleta por disciplina por pdc
date_default_timezone_set('America/Caracas');
setlocale(LC_ALL, "es_VE.utf8");

 if (isset($_POST['fecha_inicio'])) {
    $inicio=$_POST['fecha_inicio'];
    $fin= $_POST['fecha_fin'];

$end= new DateTime($inicio);
$end->add(new DateInterval('PT10H'));
echo 'prueba '.$end->format('Y-m-d H:i:s');
echo '<br>';

    foreach ($Opdc->determinarPeriodoPorDias($inicio,$fin) as $dia) {
        echo " {$dia['begin']->format('Y-m-d H:i:s')} | {$dia['end']->format('Y-m-d H:i:s')}"."<br>";  
    }

    
    echo 'sin hora <br>';
    foreach ($Opdc->determinarPeriodoPorDias($inicio,$fin) as $dia) {
        echo "Fecha: "."{$dia['begin']->format('Y-m-d')}"." Dia: "." {$dia['begin']->format('l')}"."<br>";
        echo $fecha=$dia['begin']->format('l')."<br>";
         //$fecha."<br>";
    }
echo '<br>';
$periodo=$Opdc->determinarPeriodoPorDias($inicio,$fin);
foreach ($periodo as $dia) {
    echo $dia['begin']->format('Y-m-d');
    echo '<br>';
}

//var_dump($periodo);
echo '<br>';
 }


if (isset($_POST['submit'])){
echo "Fecha inicio: ".$_POST['fecha_inicio'];
echo '<br>';
echo "Fecha fin: ". $_POST['fecha_fin'];
echo '<br>';

$fecha_inicio = date_create($_POST['fecha_inicio']);
$fecha_fin = date_create($_POST['fecha_fin']);
   
$interval = date_diff($fecha_inicio, $fecha_fin);
$differenceFormat= '%a';
$resultado= $interval->format($differenceFormat)+1;
  
echo $resultado." dias de Planificacion".'<br>';
$fisico_dias = 40*$resultado/100; //en caso de 40 %
//$fisico= (int)$fisico;
echo $fisico_dias." dias para fisico".'<br>';
$fisico_horas = (40*$resultado/100)*24; //(porcentaje * resultado / 100 ) * 24 horas de un dia= total de horas
//$fisico= (int)$fisico;
echo $fisico_horas." horas para fisico".'<br>';

$tactica_dias=20*$resultado/100; //en caso de 20%
//$tactica= (int)$tactica;
echo $tactica_dias." dias para tactica".'<br>';
$tactica_horas = (20*$resultado/100)*24; //(porcentaje * resultado / 100 ) * 24 horas de un dia= total de horas
//$fisico= (int)$fisico;
echo $tactica_horas." horas para tactica".'<br>';

$tecnica_dias= 20*$resultado/100; //en caso de 20%
//$tecnica= (int)$tecnica;
echo $tecnica_dias." dias para tecnica".'<br>';
$tecnica_horas= (20*$resultado/100)*24; //(porcentaje * resultado / 100 ) * 24 horas de un dia= total de horas
//$tecnica= (int)$tecnica;
echo $tecnica_horas." horas para tecnica".'<br>';

$psicologico_dias= 5*$resultado/100; //en caso de 5%
//$psicologico= (int)$psicologico;
echo $psicologico_dias."dias para psicologico".'<br>';
$psicologico_horas= (5*$resultado/100)*24; //(porcentaje * resultado / 100 ) * 24 horas de un dia= total de horas
//$psicologico= (int)$psicologico;
echo $psicologico_horas."horas para psicologico".'<br>';

$velocidad_dias=15*$resultado/100; // caso para 15% en velocidad
//$velocidad= (int)$velocidad;
echo $velocidad_dias." dias para velocidad".'<br>';
$velocidad_horas=(15*$resultado/100)*24; // caso para 15% en velocidad
//$velocidad= (int)$velocidad;
echo $velocidad_horas." horas para velocidad".'<br>';


if($_POST['fecha_inicio']>=$_POST['fecha_fin']){
//periodo invalido
echo 'periodo de fechas no valido';
                    
}
echo '<br>';


echo 'total semanas: '.$Opdc->datediffer('ww', $_POST['fecha_inicio'], $_POST['fecha_fin'], false);
echo '<br>';
echo 'Dias habiles : '.$Opdc->datediffer('w', $_POST['fecha_inicio'], $_POST['fecha_fin'], false);
echo '<br>';
$a=$_POST['fecha_inicio'];
$b=$_POST['fecha_fin'];
echo ($a<=$b)?$a.'es menor que '.$b:$a.'es mayor que'.$b; 
echo '<br>';
if ($a<=$b) {
    echo 'es menor';
}else{
    echo 'es mayor';
}
echo '<br>';
}
echo '<br>';
$Oatleta= new Catleta();
$Odisciplina= new Cdisciplina();
$disciplinas=$Odisciplina->consultarTodos();
$atleta = $Oatleta->consultarDatos('20350027');
$atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);

/* informacion de sesion
date_default_timezone_set('America/Caracas');
setlocale(LC_ALL, "ES");
echo 'La sesion inicio a las: '.strftime((date("h:i:s",$_SESSION['start'])) ).'<br>';
echo 'La hora actual es: '.strftime((date("H:i:s",$now)) ).'<br>';
echo 'La sesion expira a las: '.strftime((date("H:i:s",$_SESSION['expire'])) ).'<br>';
$timeleft = $_SESSION['expire']-$now;
echo 'La sesion expira en: '.strftime((date("i",$timeleft)) ).' minutos'.'<br>'; 
*/


date_default_timezone_set('America/Caracas');   //solo para setear hora dentro del script, 
                                                //no afecta la hora por defecto del servidor (vuelve a suhora normal despues).
setlocale(LC_ALL, "ES"); //sirve para cambiar el idioma en el script para las funciones de time()

//formato para RSS
echo date(DATE_RSS).'<br>';
//formato para COOKIES
echo date(DATE_COOKIE).'<br>';
//formato W3C
echo date(DATE_W3C).'<br>';
//formato para ATOM
echo date(DATE_ATOM).'<br>';

echo strftime("%A %d de %B de %Y").'<br>';  //Ej: lunes 02 de abril de 2018
echo strftime( "%Y-%m-%d-%H-%M-%S", time() ).'<br>'; //ej: 2018-04-02-14-29-11
echo strftime((date("H:i",time())) ).'<br>'; //ej: 15:24
echo date_default_timezone_get().'<br>'; //zona horaria ej: America/Caracas

echo date('l jS \of F Y h:i:s A').'<br>'; //(servidor)ej: Monday 2nd of April 2018 02:29:11 PM

echo date('Y.m.d - H:i:s e').'<br>'; //ej: 2018.04.02 - 14:29:11 America/Caracas

echo '<time datetime="'.date('c').'">'.date('Y-m-d').'</time>'.'<br>'; //ej: 2018-04-02

echo date("Y-m-d").'<br>'; //ej: 2018-04-02


/*var_dump($atletaDisciplinas);
echo '<br><br>';
print_r($atletaDisciplinas);
echo '<br><br>';
var_dump($atleta); */

if (isset($_POST['submit']) && $_POST['submit']=='registrarAtleta'){
include_once('modelos/modelo_atleta.php');
            $Oatleta= new Catleta();
            $cedula=$_POST['cedula'];
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $fecha_nacimiento=$_POST['fecha_nacimiento'];
            $direccion=$_POST['direccion'];
            $tel_movil=$_POST['tel_movil'];
            $tel_fijo=$_POST['tel_fijo'];
            $correo=$_POST['correo'];
            $sexo=$_POST['sexo'];
            //$dir_foto=$_POST['dir_foto'];
            //$dir_cedula=$_POST['dir_cedula'];
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
                $target_file_foto = $target_dir . basename($_FILES["dir_foto"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_foto,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_foto"]["tmp_name"], $target_file_foto);
                $Oatleta->setDir_foto($target_file_foto);
                // cargar cedula
                $target_dir = "assets/img/img_ced_atleta/";
                $target_file_cedula = $target_dir . basename($_FILES["dir_cedula"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_cedula,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_cedula"]["tmp_name"], $target_file_cedula);
                $Oatleta->setDir_cedula($target_file_cedula);
                $Oatleta->registrarDatos_personales();
                
                
 }
 ?>
<div id="PDFcontent">
<form action="" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Datos Personales</h3>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Cedula del Atleta</label>
                                    <input type="text" name="cedula" maxlength="8" required="required" class="form-control" placeholder="Ejemplo:26556987" onkeypress="return numero(event);">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Nombres</label>
                                    <input type="text" name="nombres" maxlength="20" required="required" class="form-control" placeholder="Primer y segundo nombre"  onkeypress="return letra(event);">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Apellidos</label>
                                    <input type="text" name="apellidos" maxlength="20" required="required" class="form-control" placeholder="apellidos" onkeypress="return letra(event);">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Direccion</label>
                                    <textarea name="direccion" required="required" maxlength="35" class="form-control" placeholder="Direccion donde vive"></textarea>
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Telefono movil</label>
                                    <input type="text" name="tel_movil" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 04168987745">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Telefono fijo</label>
                                    <input type="text" name="tel_fijo" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 02515648897">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Correo electronico</label>
                                    <input type="email" name="correo" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Sexo</label>
                                    <select name="sexo" class="form-control" required="required">
                                        <option value="">Seleccione...</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenimo</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label label-default="" class="control-label label-default">Cargar Foto</label>
                                    <input name="dir_foto" type="file" required="required" class="form-control-file" onchange="preview_image_foto(event)" >
                                </div>
                                <div class="form-group"> 
                                    <img class="img-rounded" id="output_image_foto" style="max-width:300px"/>
                                </div>
                                <div class="form-group">
                                    <label label-default="" class="control-label label-default">Cargar Cedula</label>
                                    <input name="dir_cedula" type="file" required="required" class="form-control-file" onchange="preview_image_cedula(event)" >
                                </div>
                                <div class="form-group">
                                    <img class="img-rounded" id="output_image_cedula" style="max-width:300px" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button name="submit" type="submit" value="registrarAtleta" class="btn btn-success btn-lg pull-right" >Submit</button>

                </form>
               </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- script para validaciones -->
    <script src="assets/js/valida.js" type="text/javascript" ></script>
    <!-- CALENDAR -->
    <script src='assets/js/moment.min.js'></script>
    <script src='assets/js/fullcalendar.min.js'></script>
    <script src='assets/locale/es.js'></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript" ></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
   <!-- previsualizacion de imagenes -->
    <script src="assets/js/img-preview.js" type='text/javascript'></script>
    
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD h:mm A'
            });
            $('#datetimepicker2').datetimepicker({
                useCurrent: false,
                format: 'YYYY-MM-DD h:mm A'
            });
            $("#datetimepicker1").on("dp.change", function (e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date.add(3, 'weeks'));
            });
            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date.subtract(3, 'weeks'));
            });
        });
    </script>
    <script src="assets/js/jspdf.min.js" type="text/javascript"></script>
    <script src="assets/js/html2canvas.js" type="text/javascript"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#gpdf").click(function(){
                var pdfdoc = new jsPDF(
                    {
                         orientation: 'p',
                         unit: 'cm',
                         format: 'a4',
                         hotfixes: [] // an array of hotfix strings to enable
                    }
                );
                var specialElementHandlers = {
                    '#ignoreContent': function (element, renderer) {
                    return true;
                    }
                };
                pdfdoc.fromHTML($('#PDFcontent').html(), 2, 2, {
                    'width': 900,
                    'elementHandlers': specialElementHandlers
                });
            var d = new Date();
            pdfdoc.output('dataurlnewwindow');
            //pdfdoc.save('doc'+d.toLocaleString()+'.pdf'); //nombre + fecha + formato
            });
        });
    </script>
</body>
</html>