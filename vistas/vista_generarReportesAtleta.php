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
                        <h2>Generar ficha en PDF </h2>
                        <h5>Donde se selecciona el atleta para generar la ficha con la información en PDF</h5>   
                        
                    </div>
                </div>
                <hr /><!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Generar reportes por parametros</h4>
                                si desea generar un reporte por parámetro debe seleccionar una opcción y pulsar en continuar
                            </div>
                            <div class="panel-body">
                                <?php if (isset($discapacidad)&&$discapacidad==0) {?>
                               <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>No existen atletas registrados en el sistema con alguna discapacidad.</strong>
                                </div>
                            <?php } ?>
                              <form action="" method="POST" role="form">
                                <div class="row">
                                 <div class="col-md-12">
                                         <div class="col-md-6">
                                         <div class="form-group">
                                                <label>seleccione prueba</label>
                                                <select name="selectReporte" class="form-control" required>
                                                    <option value="">Seleccione...</option>
                                                    <option value="1">Reporte por Discapacidad</option>
                                                    <option value="2">Reporte por Peso y Estatura</option>
                                                    <option value="3">Reporte por Talla de Franela</option>
                                                    <option value="4">Reporte por Talla de Pantalon</option>
                                                    <option value="5">Reporte por Talla de Shorts</option>
                                                    <option value="6">Reporte por Talla de Zapatos</option>
                                                    <option value="7">Reporte por Talla de Gorra</option>
                                                    <option value="8">Reporte por Talla de Chaqueta</option>
                                                    <option value="9">Reporte de Tallas</option>
                                                    <option value="10">Reportes por Discapacidad y Disciplina</option>
                                                    <option value="11">Reportes por Disciplina y PNF</option>
                                                    
                                                </select>
                                        </div> 
                                        </div>
                                       </div>                                     
                                
                                    <div class="form-group">
                                    <button name="submit" value="generarReportesAtleta" type="submit" class="btn btn-primary">Siguente</button>
                                </div>
                            </div>
                                </form>
                            <!-- End Form Elements -->
                        </div>

                    </div>
                    </div>
                    <!-- /. ROW  -->
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #fcfcfc;">
                                Atletas registrados
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Telefonos</th>
                                                <th>Disciplinas</th>
                                                <th>Acciones</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody><?php foreach ($todos as $au){ ?>
                                            <?php if($au['status']== 1 ){ ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $au['cedula_atleta']; ?></td>
                                                <td><?php echo $au['nombres']; ?></td>
                                                <td><?php echo $au['apellidos']; ?></td>
                                                <td><?php echo $au['tel_movil'];?><br/>
                                                    <?php echo $au['tel_fijo']; ?></td>
                                                <td><?php $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($au['cedula_atleta']);
                                                          echo $atletaDisciplinas[0]['nombre'].'<br/>';
                                                          if (isset($atletaDisciplinas[1]['nombre'])) {
                                                              echo $atletaDisciplinas[1]['nombre'];
                                                          }?>   
                                                </td>
                                                <td class="center">
                                                <?php $uid= $au['cedula_atleta']; ?>
                                                    <a class="btn btn-warning" href="<?php echo "?action=generarReportesAtleta&at&atleta=".$uid; ?>">Ver Ficha en PDF</a>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-infoda" href="<?php echo "?action=generarReportesAtleta&at&const&atleta=".$uid; ?>">Generar constancia</a>
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