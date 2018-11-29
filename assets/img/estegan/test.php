<?php
// Esta función cogerá las componentes RGB del pixel situado en
// $x, $y
function getcolor($img, $x, $y)
{
  $rgb = imagecolorat($img, $x, $y);
  $r = ($rgb >> 16) & 0xFF;
  $g = ($rgb >> 8) & 0xFF;
  $b = $rgb & 0xFF;
 
  return array($r, $g, $b);
}

// Convierte una cadena de unos y ceros a ASCII, cogiendo de 8 en 8
function _bin2asc($str)
{
  $len = strlen($str);
 
  for ($i=0;$i<$len;$i+=8)
  {
    $ch=bindec(substr($str,$i,8));
    $data[]=$ch;
  }
  return $data;
}

// Extrae los datos de los LSB de cada componente
function decod($i)
{
  $tx=imagesx($i);
  $ty=imagesy($i);
  // Eliminar la línea de abajo para extraer información de toda la imagen
  $ty=1;

  $data='';
  for ($y=0; $y<$ty; $y++)
    {
      for ($x=0; $x<$tx; $x++)
    {
      $cdat=getcolor($i, $x, $y);

      $data.=($cdat[0]&1).($cdat[1]&1).($cdat[2]&1);
    }
    }
  return $data;
}

$img=imagecreatefrompng($tnam);

$d=decod ($img);
echo $d;
?>