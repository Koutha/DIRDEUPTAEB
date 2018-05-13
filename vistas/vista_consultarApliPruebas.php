<!DOCTYPE html>
<html >
<head >
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de Registro</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
     <link href="assets/css/fontawesome-all.min.css" rel="stylesheet" />
    
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/stepform.css" rel="stylesheet" type="text/css" >
     <!-- GOOGLE FONTS-->
   <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CALENDAR-->
    <link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' />

</head>
<body>
    
        <!--Barras de navegacion-->
        
             <?php require('core/sist-navbar.php'); ?> 
        <!--/Barras de navegacion-->
        <div id="page-wrapper" > 
            <div id="page-inner col-md-12">
                
                <!-- /. ROW  -->
               
                <?php if (isset($_SESSION['modifico']) && $_SESSION['modifico'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Modificada!</strong>  se ha modificado Exitosamente.
                            </div>      
                <?php unset($_SESSION['modifico']); } ?>
                
                 <div class="row">
                        
                            
                                
                                    <div class="row"><div class="col-md-9">
                        <ul class="nav nav-tabs" style="float: right;">
                    <li style="float: right;">
                         <a class="btn btn-infoda" href="?action=registrarApliPruebas">Registrar</a>
                    </li>
                    <li >
                         <a class="btn btn-danger" href="?action=consultarApliPruebas">Regresar</a>
                    </li>
                </ul>

                    </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $todosa['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Cedula:</strong> <?php echo $todosa['cedula_atleta']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $todosa['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $todosa['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                    <div class="col-lg-5 ">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Grafica que expresa visualmente el desempeño del atleta en las diversas pruebas</h3>
                            </div>
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" data-id="">Ver calificación general</button>
                                </div>
                            </div>
                        </div>
                    </div></div>
                                    </div>
                                </div>
                               
                            </div>
                       
                    
                    <div class="col-md-9">
                        <!-- Advanced Tables -->
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registros de la base de datos
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Resultado de <br/>la prueba</th>
                                                <th>prueba</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                       <tbody> 
                                        <?php $deficiente=0; $regular=0; $bueno=0; $excelente=0; foreach ($todos as $au){if(($cedula_atleta)==($au['cedula_atleta'])){ ?>
                                            <tr class="odd gradeX"><?php foreach ($todosp as $aud){if(($au['id_prueba'])==($aud['id_prueba'])){$condicion=$aud['condicion']; $rango1=$aud['rango1'];$rango2=$aud['rango2'];$rango3=$aud['rango3'];$rango4=$aud['rango4'];
                                                  }} ?>
                                                <td><?php echo $au['fecha'] ?></td>
                                                <td><?php if ($condicion=='1') {
                                                 if ($au['medicion']<=$rango1) {$deficiente=$deficiente+1; echo $au['medicion']." el  resultado es deficiente";
                                                }
                                                elseif (($au['medicion']>$rango1) && ($au['medicion']<= $rango2)){$regular=$regular+1; echo $au['medicion']." el  resultado es regular";
                                                }
                                                elseif (($au['medicion']>$rango2) && ($au['medicion']<=$rango3)){$bueno=$bueno+1; echo $au['medicion']." el  resultado es bueno";
                                                }
                                                else { $excelente=$excelente+1; echo $au['medicion']." el  resultado es excelente";
                                                }} 
                                            else{if ($au['medicion']>=$rango1) {$deficiente=$deficiente+1; echo $au['medicion']." el  resultado es deficiente";
                                                }
                                                elseif (($au['medicion']<$rango1) && ($au['medicion']>= $rango2)){$regular=$regular+1; echo $au['medicion']." el  resultado es regular";
                                                }
                                                elseif (($au['medicion']<$rango2) && ($au['medicion']>=$rango3)){$bueno=$bueno+1; echo $au['medicion']." el  resultado es bueno";
                                                }
                                                else {$excelente=$excelente+1; echo $au['medicion']." el  resultado es excelente";
                                                }}?></td>
                                                <td><?php foreach ($todosp as $aud){ if ($au['id_prueba']==$aud['id_prueba']) {
                                                echo $aud['nombre'];}}?></td>

                                                <td class="center">
                                                    <?php $uid= $au['id_ap']; $promedio=($deficiente*0.25)+($regular*0.25)+($bueno*0.25)+($excelente*0.25);?>
                                                    <!-- Boton para activar el modal MODIFICAR -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?php echo "?action=modificaraplipruebas&id_ap=".$uid; ?>">Modificar</button>
                                                </td>
                                                
                                            </tr>
                                            <?php }} ?>
                                            <!-- contenido del Modal MODIFICAR -->
                                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                    <h4 class="modal-title">Confirmación</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Estas segur@ que quieres modificar la aplicación de la prueba?</p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-warning" href="">Modificar</a>
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                   
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><?php if ($promedio<25) {echo "La calificacion es deficiente";} else if (($promedio>=25) && ($promedio<50)) {echo "La calificacion es regular";}
                                                                 else if (($promedio>=50) && ($promedio<75)) {echo "La calificacion es buena";} else {echo "La calificacion es excelente";}?></p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                <!-- /contenido del Modal -->
                                                    
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                         </div>
                        <!--End Advanced Tables -->
                    </div>
                <!-- /. ROW  -->
                
       <!-- /. WRAPPER  -->
   

    <!-- SCRIPT PARA LA TABLA-->
<script src="assets/js/jquery.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
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
    <!-- MORRIS CHART SCRIPTS -->


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
        label: "Excelente",
        data: <?php echo $excelente;?>
    }, {
        label: "Bueno",
        data: <?php echo $bueno;?>
    }, {
        label: "Regular",
        data: <?php echo $regular;?>
    }, {
        label: "Deficiente",
        data: <?php echo $deficiente;?>
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
    <script type="text/javascript">
  
    </script>
                <!--DEBE IR AL FINAL-->
              <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>