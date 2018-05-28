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
                        <h2>Generar PDF de las planificacines</h2>
                        <h5>Donde se imprimien los detalles de las planificaciones aplicadas</h5>   
                        
                    </div>
                </div>
                <hr /><!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #fcfcfc;">
                                Planificaciones registradas
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Disciplina</th>
                                                <th>Fecha de Inicio</th>
                                                <th>Fecha de Finalización</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php foreach ($pdc as $key){ ?>
                                            <?php if(!empty($Opdc->consultarADP2($key['id_pdc'],$key['id_disciplina']))){ ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $key['nombre_pdc']; ?></td>
                                                <td><?php echo $key['tipo_pdc']; ?></td>
                                                <td><?php echo $key['nombre_disciplina']; ?></td>
                                                <td><?php echo $key['fecha_inicio'];?></td>
                                                <td><?php echo $key['fecha_fin'];?></td>
                                                <td class="center">
                                                <?php $uid= $key['nombre_pdc']; ?>
                                                    <a class="btn btn-warning" href="<?php echo "?action=generarReportesPdc&programa=".$uid; ?>">Ver PDF</a>
                                                    
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                           
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