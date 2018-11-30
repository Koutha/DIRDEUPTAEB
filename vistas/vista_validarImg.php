<?php
require('core/sist-header.php');
?>

<body>
    <div id="wrapper">
        <!--Barras de navegacion-->
        <?php require('core/sist-navbar.php'); ?>
        <!--/Barras de navegacion-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Programas directos de competencia</h2>
                        <h5>Donde se establece la estructura del programa de entrenamiento con miras a la obtención de logros deportivos en corto tiempo. </h5>   
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
                                    <?php if(isset($seleccion2)){ ?> 
                                        <input type="hidden" name="seleccion2" value="<?php echo $seleccion2; ?>">
                                     <?php   }  ?>

                                   
                                    
                                    <button name="submit" value="validarImg" type="submit" class="btn btn-primary">Continuar</button>
                                </div>
                        </form><!-- End Form Elements -->
                    </div>
                </div> <!-- /. ROW  -->
            </div><!-- /. PAGE INNER  -->    
        </div><!-- /. PAGE WRAPPER  --> 
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
