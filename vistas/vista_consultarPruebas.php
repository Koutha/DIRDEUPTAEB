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
                        <h2>Registros
                         <ul class="nav nav-tabs">
                    <li style="float: right;">
                         <a class="btn btn-infoda" href="?action=registrarPruebas">Registrar</a>
                    </li>
                </ul></h2>   
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php if (isset($borrado)&&$borrado==1) {?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Eliminacion exitosa!</strong> La prueba se ha eliminado correctamente.
                    </div>
                <?php } ?>
                <?php if (isset($actualizo)&&$actualizo==1) {?>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Actualizado!</strong> Los datos de la prueba han sido modificados exitosamente.
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pruebas reguistradas en el sistema
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Tipo de <br/> prueba</th>
                                                <th>Objetivo</th>
                                                <th>Unidad</th>
                                                <th>Condición</th>
                                                <th>Deficiente</th>
                                                <th>Regular</th>
                                                <th>Bueno</th>
                                                <th>Excelente</th>
                                                <th>Acciones</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody><?php foreach ($todos as $au){ ?>
                                        <?php if($au['status']== 1 ){ ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $au['nombre'] ?></td>
                                                <td><?php echo $au['descripcion']; ?></td>
                                                <td><?php echo $au['tipo_prueba']; ?></td>
                                                <td><?php echo $au['objetivo'];?></td>
                                                <td><?php echo $au['unidad']; ?></td>
                                                <td><?php if ($au['condicion']=='1'){echo "los rangos para excelente son maximos";} else {echo "los rangos para excelente son minimos";}?></td>
                                                <td><?php echo $au['rango1']; ?></td>
                                                <td><?php echo $au['rango2']; ?></td>
                                                <td><?php echo $au['rango3']; ?></td>
                                                <td><?php echo $au['rango4']; ?></td>

                                                <td class="center">
                                                    <?php $uid= $au['id_prueba']; ?>
                                                    <!-- Boton para activar el modal MODIFICAR -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?php echo "?action=modificarPruebas&id_prueba=".$uid; ?>">Modificar</button>
                                                </td>
                                                <td class="center">
                                                    <!-- Boton para activar el modal ELIMINAR -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" data-id="<?php echo "?action=eliminarPruebas&id_prueba=".$uid; ?>">Eliminar</button>
                                                        
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
                                                                    <p>¿Estas segur@ que quieres modificar la prueba?</p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-warning" href="">Modificar</a>
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                <!-- /contenido del Modal -->
                                             <!-- contenido del Modal ELIMINAR -->
                                                          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                    <h4 class="modal-title">Confirmación</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Estas segur@ que quieres eliminar la prueba?</p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-danger" href="">Eliminar</a>
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