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
                        <h2>Consulta de pruebas</h2>   
                        <h5> Modulo para la consulta de las pruebas registradas en el sistema </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <?php if (isset($actualizo)&&$actualizo==1) {?>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Usuario Actualizado!</strong> Los datos del usuario han sido modificados exitosamente.
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
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
                                                <th>Cedula</th>
                                                <th>prueba</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                       <tbody> <?php foreach ($todosp as $aud){$condicion=$aud['condicion']; $rango1=$aud['rango1'];$rango2=$aud['rango2'];$rango3=$aud['rango3'];$rango4=$aud['rango4'];
                                                  } ?>
                                        <?php foreach ($todos as $au){ ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $au['fecha'] ?></td>
                                                <td><?php if ($condicion=='1') {
                                                 if ($au['medicion']<=$rango1) { echo $au['medicion']." el  resultado es deficiente";
                                                }
                                                elseif (($au['medicion']>$rango1) && ($au['medicion']<= $rango2)){ echo $au['medicion']." el  resultado es regular";
                                                }
                                                elseif (($au['medicion']>$rango2) && ($au['medicion']<=$rango3)){ echo $au['medicion']." el  resultado es bueno";
                                                }
                                                else { echo $au['medicion']." el  resultado es exelente";
                                                }} 
                                            else{if ($au['medicion']>=$rango1) { echo $au['medicion']." el  resultado es deficiente";
                                                }
                                                elseif (($au['medicion']<$rango1) && ($au['medicion']>= $rango2)){ echo $au['medicion']." el  resultado es regular";
                                                }
                                                elseif (($au['medicion']<$rango2) && ($au['medicion']>=$rango3)){ echo $au['medicion']." el  resultado es bueno";
                                                }
                                                else { echo $au['medicion']." el  resultado es exelente";
                                                }}?></td>
                                                <td><?php foreach ($todosa as $aua){if ($aua['cedula_atleta']==$au['cedula_atleta']) {echo $aua['nombres']." ".$au['cedula_atleta']; }}?></td>
                                                <td><?php foreach ($todosp as $aud) if ($au['id_prueba']==$aud['id_prueba']) {
                                                {echo $aud['nombre'];}}?></td>

                                                <td class="center">
                                                    <?php $uid= $au['id_ap']; ?>
                                                    <!-- Boton para activar el modal MODIFICAR -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?php echo "?action=modificaraplipruebas&id_ap=".$uid; ?>">Modificar</button>
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
                                            <!-- contenido del Modal MODIFICAR -->
                                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                    <h4 class="modal-title">Confirmación</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Estas segur@ que quieres modificar la aplicacion de la prueba?</p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-warning" href="">Modificar</a>
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
                        <!--End Advanced Tables -->
                    </div>
                <!-- /. ROW  -->
                </div>
             <!-- /. PAGE INNER  -->
            </div>
        <!-- /. PAGE WRAPPER  -->   
        </div>
       <!-- /. WRAPPER  -->
    </div>

    <!-- SCRIPT PARA LA TABLA-->

        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
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
    </script>
                <!--DEBE IR AL FINAL-->
              <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>