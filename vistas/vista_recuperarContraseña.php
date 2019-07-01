<?php if (isset($_SESSION['username'])) {
  
require('core/sist-header.php');
?>

<body>
    <div id="wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Recuperación de contraseña</h2>  
                        <?php if (isset($_SESSION['imgIncorrect']) && $_SESSION['imgIncorrect'] == 1) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Incorrecta!</strong>  La imagen selecionada no es correcta.
                            </div>
                        <?php unset($_SESSION['imgIncorrect']); } ?>
                    </div>
                </div>
                <hr /><!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->  
                        <form action="" method="post" role="form" class="form-group">
                           
                                
                            
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Seleccione una imagen para continuar</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-sm-9">
                                            <div class="div-general-img">
                                        <?php 
                                            foreach ($arr as $key => $value) {
                                                echo '<div class="img">
                                                        <label >
                                                            <img src="'.$value.'.png" width="100px" height="100px" />
                                                            <input type="radio" name="imgValid" value="'.$value.'.png" class="hidden" required>
                                                        </label>
                                                    </div>';
                                            }
                                        ?>
                                            </div>
                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="seleccion" value="<?php echo $seleccion; ?>">
                                    

                                   
                                    
                                    <button name="submit" value="recuperarContraseña" type="submit" class="btn btn-primary">Continuar</button>
                                    <a href="?action=logout" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span> Salir</a>
                                </div>
                        </form><!-- End Form Elements -->
                    </div>
                </div> <!-- /. ROW  -->
            </div><!-- /. PAGE INNER  -->  
    </div><!-- /. WRAPPER  -->

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
    <script src='assets/locale/es-do.js'></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript" ></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
   <!-- previsualizacion de imagenes -->
    <script src="assets/js/img-preview.js" type='text/javascript'></script>
    
    <script type="text/javascript">
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
<?php }else{
require('core/sist-header.php');
?>
<body style="background-image: url(assets/images/fondoUPTAEB.jpg);background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Sistema de gestión y seguimiento de atletas </h2>
               
                <h5> <strong> Dirección de deportes</strong> </h5>
                 <br />
            </div>
        </div>

         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #fcfcfc;">
                        		<strong> <center>Recuperar contraseña</center> </strong>  
                            </div>
                            <div class="panel-body">
                              <?php if (isset($user)&&$user==0) {?>
                                      <div class="alert alert-info alert-dismissible">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Usuario incorrecto</strong> por favor intentelo de nuevo.
                                        </div>
                              <?php } ?>
                                <form action=" " method="post" role="form">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Usuario " required />
                                            <input type="hidden" class="form-control" name="usuario" value="1"/>
                                      </div>
                                      <div class="form-group" >
                                          <button name="submit" value="recuperarContraseña" type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-log-in"></span>Continuar</button>
                                        	<!-- <input type="submit" name="Submit" value="login" class="btn btn-primary "> -->
                                          <a href="?action=logout" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span> Salir</a>
                                      </div>
                                    <hr />
                                </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
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
   
</body>
</html>
<?php }?>
