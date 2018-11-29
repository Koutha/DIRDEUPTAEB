<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title> </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="css/style.css" media="all" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style type="text/css">
	.div-general-img
{
display: inline-flex;
}
 
.img
{
background-color: #fff;
margin: 25px;
padding:25px;
}
 
.img-selected
{
border: 3px dashed #099a9f;
margin:25px;
padding:25px;
}
</style>
</head>
<body>
 
<div class="container-fluid">

	<div class="row">
	
			
			<?php 
				function randomGen($min, $max, $quantity) {
    				$numbers = range($min, $max);
    				shuffle($numbers);
    				return array_slice($numbers, 0, $quantity);
				}
				/*$arr = randomGen(1,7,4);
				foreach ($arr as $key => $value) {
					echo $value;
				}*/
			 ?>
	
		<div class="col-sm-8 bg-info">
			<div class="div-general-img">
				<?php 
					$arr = randomGen(1,7,4);
					foreach ($arr as $key => $value) {
					echo '<div class="img"><img src="img/test'.$value.'.png" width="100px" height="100px" /><input type="radio" name="img"></div>';

					}
					
				 ?>
			</div>
		</div>
		
	</div>
</div>
<script>
 
$(document).ready(function(){
 
//recibe evento al realizar click dentro del elemento que contiene la clase img
$(".img").click(function(){
 
//comprobamos si existe una imagen seleccionada
if ( $( ".img" ).hasClass( "img-selected" ) ) {
/*en el caso que exista ya una imagen seleccionada la eliminamos para que únicamente solo se tenga una imagen seleccionada*/
$(".img").removeClass("img-selected");
}
//añadimos la clase de la imagen seleccionada
$(this).addClass("img-selected");
});
});
 
</script>
 
</body>
</html>