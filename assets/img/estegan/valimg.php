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
.check
{
    opacity:0.5;
	color:#996;
}
.box{
    margin-bottom:5px;
}
</style>
</head>
<body>
 
<div class="container-fluid">

	<div class="row">
	
			
			<?php 
				function randomGen($min, $max, $quantity, $imgcheck = null) {
    				$numbers = range($min, $max); //generamos el arreglo
    				foreach ($numbers as &$value) {
    					$value = 'img/test'.$value; //agregamos la ruta de las imagenes
    					
    				}
   
    				if (array_search($imgcheck, $numbers)) {  //buscamos la imagen para no repetirla
    					$key = array_search($imgcheck, $numbers);
    					unset($numbers[$key]);

    				}
    				shuffle($numbers); //mezclamos el orden aleatoriamente
    				return array_slice($numbers, 0, $quantity); // devolvemos la cantidad que $quantity nos indique sin repetirlos
				}

				$arr = randomGen(1,7,4,'img/test7');
				array_push($arr, 'userimg/outputuserimg1');
				shuffle($arr);
				foreach ($arr as $key => $value) {
					echo $value;
					echo ' ';
				}
			 ?>
		<form method="post" action="">
		<div class="col-sm-9 bg-info">
			<div class="div-general-img">
				<?php 
					$arr = randomGen(1,7,4, 'img/test7');
					array_push($arr, 'userimg/outputuserimg1');
					shuffle($arr);
					foreach ($arr as $key => $value) {
					echo '<div class="img">
							<label >
							<img src="'.$value.'.png" width="100px" height="100px" />
								<input type="radio" name="img" value="'.$value.'.png" class="hidden">
							</label>
							</div>';

					}
				 ?>
			</div>
			<input type="submit" value="Enviar" class="btn btn-success">
		</div>

		
		</form>
		<?php 
			if (isset($_POST['img'])){
				echo '<div class="col-sm-9 bg-info">
				<img src="'.$_POST['img'].'" width="100px" height="100px" />
				</div>';
			}
		 ?>
	</div>
</div>


<div class="container">
	<div class="row">
		<form method="post">
			<?php
				$arr = randomGen(1,7,4);
				array_push($arr, 'userimg');
				shuffle($arr);
				foreach ($arr as $key => $value) {
		echo '<div class="form-group">	
			<div class="col-md-2 box">
				<label class="btn btn-primary">
					<img src="img/test'.$value.'.png" alt="..." class="img-thumbnail img-check" >
					<input type="radio" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off">
				</label>
			</div>
		</div>';
			}
			?>
		<div class="clearfix"></div>
		
		<input type="submit" value="Check Item" class="btn btn-success">
		
		</form>
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

$(document).ready(function(e){
    		
			$('.img-check').click(function(e) {
        $('.img-check').not(this).removeClass('check')
    		.siblings('input').prop('checked',false);
    	$(this).addClass('check')
            .siblings('input').prop('checked',true);
    });
			
	});
 
</script>
 
</body>
</html>