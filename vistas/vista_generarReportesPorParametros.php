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
                        <!-- Form Elements -->  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Generar reportes por parametros</h4>
                                si desea generar un reporte por parámetro debe seleccionar una opcción y pulsar en continuar
                            </div>
                            <div class="panel-body">
                                <?php if (isset($atletaestapeso)&&$atletaestapeso==0) {?>
                                   <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>No existen atletas que cumplan con los rangos establecidos.</strong>
                                    </div>
                                <?php } ?>
                                <?php if (isset($atletadisciplinadiscapacidad)&&$atletadisciplinadiscapacidad==0) {?>
                                   <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>No existen atletas con discapacidad registrados en esta disciplina.</strong>
                                    </div>
                                <?php } ?>
                                <?php if (isset($atletadisciplinapnf)&&$atletadisciplinapnf==0) {?>
                                   <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>No existen atletas registrados en la disciplina y el pnf selecionados.</strong>
                                    </div>
                                <?php } ?>
                              <form action="" method="POST" role="form">
                                <div class="row">
                                 <div class="col-md-12">
                                         <div class="col-md-12">
                                         <div class="form-group">
                                           <?php switch ($selectReporte) {
                                                case '2': ?>
                                                <input type="hidden" name="selectReporte" value="<?php echo $selectReporte;?>" >
                                                <div class="col-md-5">
                                                    <label  class="control-label label-default">Seleccione un rago de estatura minimo y un máximo</label>
                                                    <div class="col-md-12" class="form-group">
                                                        <div class="col-md-6">
                                                            <label  class="control-label label-default">Minimo</label>
                                                            <input type="number" style="max-width:200px" name="estaturamin" min="1" max="4" step="0.01" class="form-control" required="required" placeholder="ej: 1,71" >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label  class="control-label label-default">Máximo</label>
                                                            <input type="number" style="max-width:200px" name="estaturamax" min="1" max="4" step="0.01" class="form-control" required="required" placeholder="ej: 1,85" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label  class="control-label label-default">Seleccione un rago de peso minimo y un máximo</label>
                                                    <div class="col-md-12" class="form-group">
                                                        <div class="col-md-6">
                                                            <label  class="control-label label-default">Minimo</label>
                                                            <input type="number" style="max-width:200px" name="pesomin" min="1" max="200" step="0.001" class="form-control" required="required" placeholder="ej: 65,000 ; para 65 kilos" >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label  class="control-label label-default">Máximo</label>
                                                            <input type="number" style="max-width:200px" name="pesomax" min="1" max="200" step="0.001" class="form-control" required="required" placeholder="ej: 85,000 ; para 85 kilos" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5" class="form-group">
                                                    <br/><br/><br/>
                                                    <button name="submit" value="generarReportesAtleta" type="submit" class="btn btn-primary">Generar</button>
                                                    <a class="btn btn-danger" href="?action=generarReportesAtleta&at">Regresar</a>
                                                </div>
                                                <?php  break;
                                                case '10':?>
                                                    <div class="col-md-5 form-group">
                                                        <label  class="control-label label-default">Debe selaccionar una disciplina para poder imprimir el reporte de atletas discapacitados por disciplinas</label>
                                                        <input type="hidden" name="selectReporte" value="<?php echo $selectReporte;?>" >
                                                        <label>seleccione la disciplina</label>
                                                        <select name="id_disciplina" class="form-control" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach ($disciplinas as $disci){ 
                                                                if($disci['status']== 1 ){ ?>
                                                            <option value="<?php echo $disci['id_disciplina']; ?>"><?php echo $disci['nombre']; ?> </option>
                                                            
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8" class="form-group">
                                                        <br/><br/><br/>
                                                        <button name="submit" value="generarReportesAtleta" type="submit" class="btn btn-primary">Generar</button>
                                                        <a class="btn btn-danger" href="?action=generarReportesAtleta&at">Regresar</a>
                                                    </div>
                                                <?php break;
                                                case '11':?>
                                                    <input type="hidden" name="selectReporte" value="<?php echo $selectReporte;?>" >
                                                    <label  class="control-label label-default">Debe selaccionar una disciplina y un PNF para poder imprimir el reporte de atletas por disciplina y PNF</label>
                                                    <div class="col-md-5 form-group">
                                                        <label>seleccione la disciplina</label>
                                                        <select name="id_disciplina" class="form-control" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach ($disciplinas as $disci){ 
                                                                if($disci['status']== 1 ){ ?>
                                                            <option value="<?php echo $disci['id_disciplina']; ?>"><?php echo $disci['nombre']; ?> </option>
                                                            
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <label>seleccione el pnf</label>
                                                        <select name="id_pnf" class="form-control" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach ($pnf as $todospnf){ 
                                                                if($disci['status']== 1 ){ ?>
                                                            <option value="<?php echo $todospnf['id_pnf']; ?>"><?php echo $todospnf['nombre']; ?> </option>
                                                            
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                <div class="col-md-5" class="form-group">
                                                    <br/><br/><br/>
                                                    <button name="submit" value="generarReportesAtleta" type="submit" class="btn btn-primary">Generar</button>
                                                    <a class="btn btn-danger" href="?action=generarReportesAtleta&at">Regresar</a>
                                                </div>
                                               <?php }?>
                                                
                                        </div> 
                                        </div>
                                       </div>  
                                    </div>
                                </form>
                            <!-- End Form Elements -->
                        </div>

                    </div>
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