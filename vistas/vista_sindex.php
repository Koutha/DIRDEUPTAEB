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
                            <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar Atleta",$_SESSION['id_usuario'])) { ?>
                            <a href="?action=registrarAtleta" class="btn btn-sm btn-primary">Agregar Nuevo +</a><?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
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
                    <div class="col-md-4 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fas fa-child"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo $totalP; ?></p>
                                <p class="text-muted"> Registros de Personal </p>
                            </div>
                            <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar personal capacitado",$_SESSION['id_usuario'])) { ?>
                            <a href="?action=consultarPersonal" class="btn btn-sm btn-primary">Agregar Nuevo +</a><?php } ?>
                        </div>
                    </div>
                   

                </div>
                <?php $mesa=0; $registromarca=0; $combate=0; $pelota=0;
                foreach ($todosad as $key => $atletad) { 
                    foreach ($disciplina as $key => $disci) {
                        if ($atletad['id_disciplina']==$disci['id_disciplina']) {
                            if ($disci['tipo_disciplina']=="Mesa") {
                                $mesa=$mesa+1;
                            }else if ($disci['tipo_disciplina']=="Registro y Marca") {
                                $registromarca=$registromarca+1;
                            }else if ($disci['tipo_disciplina']=="Combate") {
                                $combate=$combate+1;
                            }else{
                                $pelota=$pelota+1;
                            }
                        }
                    }
                } ?>
                <!-- /. ROW  -->
                <hr />  
                <div class="row col-md-12 col-sm-10 col-md-offset-1">
                    <div class="col-md-8">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Grafica que expresa la cantidad de atletas que pertenecen a cada categoria</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-offset-1 flot-chart">
                                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                                </div>
                                <div class="text-right">
                                    <h4> Mesa: <?PHP echo $mesa*100/4; ?>% Combate: <?PHP echo $combate*100/4; ?>% Registro y Marca: <?PHP echo $registromarca*100/4; ?>% Pelota: <?PHP echo $pelota*100/4; ?>%</h4>
                                </div>
                                
                            </div>
                        </div>
                    </div></div>            
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
    </div>
     <!-- JQUERY SCRIPTS -->
     <script src="assets/js/jquery.js"></script>
    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.pie.js"></script>
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
    <!-- JQUERY SCRIPTS -->
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });

        $('#myModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('a.btn.btn-danger').attr('href', recipient);
        });
        $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('a.btn.btn-warning').attr('href', recipient);
        });
         $(function() {

    var data = [{
        label: "Mesa",
        data: <?php echo $mesa;?>
    }, {
        label: "Combate",
        data: <?php echo $combate;?>
    }, {
        label: "Registro y Marca",
        data: <?php echo $registromarca;?>
    }, {
        label: "Pelota",
        data: <?php echo $pelota;?>
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});
    </script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
