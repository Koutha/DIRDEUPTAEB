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
               <!-- <div class="row">
                    <div class="col-md-12">
                        <h2>Pagina Principal</h2>   
                        <h5>Resumen registros y tareas </h5>
                        

                    </div>
                </div>   -->           
                <!-- /. ROW  -->
                <hr />
                 <div class="row">
                  <!-- <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">Mensajes o Sugerencias</p>
                                <p class="text-muted">Mensajes</p>
                            </div>
                        </div>
                    </div> -->
                    <!--<div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <a href="?action=reportesvacio"><span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span></a>
                            <div class="text-box" >
                                <p class="main-text"> Formato de documentos </p> <a target="_blank" href="?action=reportesvacio">
                                <p class="text-muted">Constancias en formatos vacios</p>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-4 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo $totalA; ?></p>
                                <p class="text-muted"> Atletas registrados</p>
                            </div>
                            <a href="?action=registrarAtleta" class="btn btn-sm btn-primary">Agregar Nuevo +</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fas fa-basketball-ball"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo $totalD; ?></p>
                                <p class="text-muted"> Disciplinas</p>
                            </div>
                            <a href="?action=consultarDisciplina" class="btn btn-sm btn-primary">Ver Disciplinas</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fas fa-child"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo $totalP; ?></p>
                                <p class="text-muted"> Registros de Personal </p>
                            </div>
                            <a href="?action=consultarPersonal" class="btn btn-sm btn-primary">Agregar Nuevo +</a>
                        </div>
                    </div>
                   
                    <div class="col-md-4 col-sm-6 col-xs-12">                       
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fas fa-hdd fa-3x"></i>
                                <h3>120 GB </h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               Disk Space Available
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-edit fa-3x"></i>
                                <h3>20,000 </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Articles Pending
                                
                            </div>
                        </div>                         
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />                
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
    </div>
     <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
