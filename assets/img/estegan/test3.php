<?php
function getcolor($img,$x,$y) 
{ 	$color = imagecolorat($img,$x,$y);
	return array('R'=>($color>>16)&0xFF,'G'=>($color>>8)&0xFF,'B'=>$color&0xFF);
} 
function bin2asc ($str)
{ 
	$len = strlen($str);
	$data='';
  	for ($i=0;$i<$len;$i+=8){ $ch=chr(bindec(substr($str,$i,8))); if(!ord($ch))break; $data.=$ch; }
  	return $data; 
} 
function asc2bin($str)
{  $len = strlen($str);
   for($i=0;$i<$len;$i++)$data.=str_pad(decbin(ord($str[$i])),8,'0',STR_PAD_LEFT);	  
   return $data.'00000000';
}
function setcolor($img,$r,$g,$b) 
{  $c=imagecolorexact($img,$r,$g,$b); if($c!=-1)return $c;
   $c=imagecolorallocate($img,$r,$g,$b); if($c!=-1)return $c;
   return imagecolorclosest($img,$r,$g,$b); 
} 
function decode($img)
{ 
	$nx=imagesx($img);	
	$ny=imagesy($img);
	$data='';
  for($x=0; $x<$nx; $x++ )
  { 
  	for($y=0; $y<$ny; $y++)
	 { 	
	 	$pix=getcolor($img,$x,$y);		
		$data.=($pix['R']&1).($pix['G']&1).($pix['B']&1);
	 }
  }
  //return $data;
  return bin2asc($data);
}
function encode(&$img,$str)
{	$bits=asc2bin($str); 
	$lenbit=strlen($bits);
	$nx=imagesx($img);	 
	$ny=imagesy($img);
	for($x=0,$bit=0; $x<$nx; $x++)
	{ for($y=0; $y<$ny; $y++)
		{ $pix=getcolor($img,$x,$y);
		  foreach(array('R','G','B') as $C)
		  	$col[$C]=$bit<$lenbit?($pix[$C]|$bits[$bit])&(254|$bits[$bit++]):$pix[$C];
		  imagesetpixel($img,$x,$y,setcolor($img,$col['R'],$col['G'],$col['B']));
		}
	}
}
 

 /*Generar la imagen con el mensaje
----------------------------------------
$img = imagecreatefrompng('img/test7.png');
encode($img,file_get_contents('llave.txt'));
header("Content-type: image/png");
imagepng($img); 

imagedestroy($img); */
/*Recuperar el mesaje de la imagen
--------------------------------------*/
$img = imagecreatefrompng('img/test7.png');
echo decode($img);
imagedestroy($img);
exit;
/**/


?>