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
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-md-12" >
                            <h2>Información del Personal</h2>
                            
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#datos_personales">Personales</a></li>
                                <li><a data-toggle="tab" href="#datos_disciplina">Disciplina</a></li>
                                <li style="float: right;">
                                    <a class="btn btn-dangerda" href="?action=modificarPersonal&cedula_et=<?php echo $personal['cedula_et']; ?>">Modificar</a>
                                </li>
                                <li style="float: right;">
                                    <a class="btn btn-infoda" href="?action=consultarPersonal">Volver</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="datos_personales" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $personal['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $personal['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $personal['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><span class="glyphicon glyphicon-credit-card"></span> <strong>Nº Cedula:</strong> <?php echo $personal['cedula_et']; ?> </p>
                                            <p><span class="glyphicon glyphicon-phone"></span><strong>Telefono movil:</strong>  <?php echo $personal['tel_movil']; ?></p>
                                            <p><span class="glyphicon glyphicon-envelope"></span> <strong>Correo:</strong>  <?php echo $personal['correo']; ?></p>
                                            <p><span class="glyphicon glyphicon-heart"></span> <strong>Cargo:</strong>  <?php echo $personal['cargo']; ?></p>
                                            <div >
                                                <p><span class="glyphicon glyphicon-picture"></span> <strong>Imagen de Cedula:</strong></p>
                                                <img class="thumbnail" src="<?php echo $personal['dir_cedula']; ?>" alt="img cedula" style="width:45%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div id="datos_disciplina" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $personal['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $personal['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $personal['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Disciplinas en las que participa:</strong></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> 
                                                <strong> <?php echo $personalDisciplinas[0]['nombre'].'<br/>';?></strong>
                                            </p>
                                            <?php if (isset($personalDisciplinas[1]['nombre'])) { ?>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> 
                                                <strong> <?php echo $personalDisciplinas[1]['nombre'];?></strong>
                                            </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /. CONTAINER-FLUID -->     
            </div><!-- /. PAGE INNER  -->    
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
