<?php
 
/**
 * Steganography in PHP
 *
 * This class lets you write and read string in the least significant bit of an image, making "hide" information in an image.
 *
 * @package StreamSteganography
 * @author Pedro Vargas (deer@deerme.org) http://deerme.org
 * @version 0.1
 * @licence GNU General Public License (GPL)
 */
 
class StreamSteganography
{
 
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
 
    function Write( $data )
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
        imagepng($this->img_object,$this->img_path);
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
 
// New Image

$ss = new StreamSteganography("img/test7.png");
$secret = "Este es el mensaje secreto ".date("Y-m-d H:i:s")."- Me gusta comer empanadas de pabellón";
$ss->Write($secret);
// Read in Image


print $ss->Read();
echo '<br>';
$codificado = base64_encode($secret);
print $codificado;
echo '<br>';
$decodificado = base64_decode($codificado);
echo $decodificado;

// Concat Data in Image
//$ss->Write(  $ss->Read(). " - Me gusta comer empanadas de pabellón");

// Read in Image
//print $ss->Read();
 
// Data in Image
/*
$ss = new StreamSteganography("img/test7.png");
print $ss->Read()."\n";
 */
?>