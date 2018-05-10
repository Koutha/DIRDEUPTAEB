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
                        <ul class="nav nav-tabs">
                    <li style="float: right;">
                         <a class="btn btn-infoda" href="?action=registrarApliPruebas">Registrar</a>
                    </li>
                </ul>

                    </div>
                </div>
                <!-- /. ROW  -->
               
                
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
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                       <tbody> 
                                        <?php foreach ($todos as $key) {
                                            $atleta=$Oprueba->consultarDatosa($key['cedula_atleta']);
                                             ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $atleta['cedula_atleta'] ?></td>
                                                <td><?php echo $atleta['nombres'] ?></td>
                                                <td class="center">
                                                    <?php $cedula_atleta= $atleta['cedula_atleta'];?>
                                                    <!-- Boton para activar el modal MODIFICAR -->
                                                    <a href="<?php echo "?action=consultarApliPruebas&cedula_atleta=".$cedula_atleta; ?>" class="btn btn-danger">  detalle</a>
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
                                            
                                             
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