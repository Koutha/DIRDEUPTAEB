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
                <div  class="container-fluid" >
                    <div  class="row">
                        <div class="col-md-12" >
                            <h2>Consultando la aplicacion de programas directos de competencia</h2>
                            <h5>Información del Atleta</h5>
                          
                            <ul class="nav nav-tabs">
                                <li><a data-toggle="tab" href="#datos_personales">Personales</a></li>
                                <li><a data-toggle="tab" href="#datos_academicos">Académicos</a></li>
                                <li><a data-toggle="tab" href="#datos_medicos">Médicos</a></li>
                                <li><a data-toggle="tab" href="#datos_uniforme">Uniforme</a></li>
                                <li class="active"><a data-toggle="tab" href="#datos_deportivos">Deportivos</a></li>
                                
                                <li style="float: right;">
                                    <a class="btn btn-infoda" href="?action=consultarAplicacionPdc&at">Volver</a>
                                </li>
                                <!-- <li style="float: right;">
                                    <a id="gpdf" class="btn btn-infoda" href="#">PDF</a>
                                    
                                </li> -->
                                
                            </ul>
                            <div class="tab-content">
                                <div id="datos_personales" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $atleta['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $atleta['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $atleta['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><span class="glyphicon glyphicon-credit-card"></span> <strong>Nº Cedula:</strong> <?php echo $atleta['cedula_atleta']; ?> </p>
                                            <p><span class="glyphicon glyphicon-plus"></span> <strong>Fecha de Nacimiento:</strong> <?php echo $atleta['fecha_nacimiento']; ?></p>
                                            <p><span class="glyphicon glyphicon-edit"></span> <strong>Dirección:</strong> <?php echo $atleta['direccion']; ?></p>
                                            <p><span class="glyphicon glyphicon-phone"></span><strong>Telefono movil:</strong>  <?php echo $atleta['tel_movil']; ?></p>
                                            <p><span class="glyphicon glyphicon-phone-alt"></span> <strong>Telefono fijo:</strong>  <?php echo $atleta['tel_fijo']; ?></p>
                                            <p><span class="glyphicon glyphicon-envelope"></span> <strong>Correo:</strong>  <?php echo $atleta['correo']; ?></p>
                                            <p><span class="glyphicon glyphicon-heart"></span> <strong>Sexo:</strong>  <?php echo $atleta['sexo']; ?></p>
                                            <div >
                                                <p><span class="glyphicon glyphicon-picture"></span> <strong>Imagen de Cedula:</strong></p>
                                                <img class="thumbnail" src="<?php echo $atleta['dir_cedula']; ?>" alt="img cedula" style="width:45%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="datos_academicos" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $atleta['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $atleta['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $atleta['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>PNF:</strong>  <?php echo $pnf; ?></p>
                                            <p><span class="glyphicon glyphicon-ok-circle"></span> <strong>Trayecto:</strong>  <?php echo $atleta['trayecto']; ?></p>
                                            <p><span class="glyphicon glyphicon-plus"></span><strong>Año de Ingreso:</strong>  <?php echo $atleta['año_ingreso']; ?></p>
                                            <div >
                                                <p><span class="glyphicon glyphicon-picture"></span> <strong>Carnet:</strong></p>
                                                <img class="thumbnail" src="<?php echo $atleta['dir_carnet']; ?>" alt="img cedula" style="width:45%">
                                            </div>
                                            <div >
                                                <p><span class="glyphicon glyphicon-picture"></span> <strong>Planilla de Inscripción:</strong></p>
                                                <img class="thumbnail" src="<?php echo $atleta['dir_planilla']; ?>" alt="img cedula" style="width:45%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="datos_medicos" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $atleta['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $atleta['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $atleta['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Estatura:</strong>  <?php echo $atleta['estatura'] . " mts"; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Peso:</strong>  <?php echo $atleta['peso'] . "kg"; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Tipo de Sangre:</strong>  <?php echo $atleta['tipo_sangre']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Contactar en caso de Emergencia a:</strong>  <?php echo $atleta['contacto_emergencia']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Al numero:</strong>  <?php echo $atleta['tel_contacto']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Alergias:</strong>  <?php echo $atleta['info_alergias']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Discapacidad:</strong>  <?php echo $atleta['info_discapacidad']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Observaciones Médicas :</strong>  <?php echo $atleta['observaciones']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="datos_uniforme" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $atleta['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $atleta['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $atleta['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de Franela:</strong>  <?php echo $atleta['talla_franela']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de Pantalon:</strong>  <?php echo $atleta['talla_pantalon']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de shorts:</strong>  <?php echo $atleta['talla_short']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de zapatos:</strong>  <?php echo $atleta['talla_zapato']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de gorra:</strong>  <?php echo $atleta['talla_gorra']; ?></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> <strong>Talla de chaqueta:</strong>  <?php echo $atleta['talla_chaqueta']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="datos_deportivos" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $atleta['dir_foto']; ?>" alt="foto" style="width:100%">
                                                <div class="caption">
                                                    <p><span class="glyphicon glyphicon-tag"></span><strong> Nombres:</strong> <?php echo $atleta['nombres']; ?> </p>
                                                    <p><span class="glyphicon glyphicon-tags"></span><strong> Apellidos:</strong> <?php echo $atleta['apellidos']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Disciplinas en las que participa:</strong></p>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> 
                                                <strong> <?php echo $atletaDisciplinas[0]['nombre'].'<br/>';?></strong>
                                            </p>
                                            <?php if (isset($atletaDisciplinas[1]['nombre'])) { ?>
                                            <p><span class="glyphicon glyphicon-bookmark"></span> 
                                                <strong> <?php echo $atletaDisciplinas[1]['nombre'];?></strong>
                                            </p>
                                            <?php } ?>
                                            <?php if(!empty($pdc_atleta)){ ?>
                                             <p><strong>Planificaciones asignadas:</strong></p>
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
                                                    <tbody><?php foreach ($pdc_atleta as $key){ ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $key['nombre_pdc']; ?></td>
                                                            <td><?php echo $key['tipo_pdc']; ?></td>
                                                            <td><?php echo $key['nombre_disciplina']; ?></td>
                                                            <td><?php echo $key['fecha_inicio'];?></td>
                                                            <td><?php echo $key['fecha_fin'];?></td>
                                                            <td class="center">
                                                            <?php $uid= $key['nombre_pdc']; ?>
                                                                <a class="btn btn-warning" href="<?php echo "?action=consultarAplicacionPdc&programa=".$uid; ?>">Mas Detalles</a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php }else{ ?>
                                                <p><strong>Planificaciones asignadas:</strong></p>
                                                <p><strong>El atleta no está asignado a una planificación</strong></p>
                                            <?php } ?>
                                        </div><!-- /. <div class="col-md-8"> -->   
                                    </div><!-- /.  <div class="row"> -->  
                                </div><!-- /.  <div id="datos_deportivos" class="tab-pane fade in active"> -->   
                            </div> <!-- /.  <div class="tab-content"> -->   
                        </div><!-- /.  <div class="col-md-12" > -->  
                    </div> <!-- /.   <div class="row"> -->  
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
    <script src="assets/js/jspdf.min.js" type="text/javascript"></script>
    <script src="assets/js/html2canvas.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#gpdf").click(function(){
                html2canvas($("#datos_deportivos"), {
                    onrendered: function(canvas){
                        var img = canvas.toDataURL("image/png");
                        var pdfdoc = new jsPDF(
                            {
                                orientation: 'l',
                                unit: 'cm',
                                format: 'letter'
                            }
                        );
                        pdfdoc.addImage(img, 'JPEG',1,1,25,18);
                        pdfdoc.output('dataurlnewwindow');

                    }
                });
                
                /*pdfdoc.fromHTML($('#datos_deportivos').html(), 2, 2, {
                    'width': 900,
                 
                });*/
            //var d = new Date();
            //pdfdoc.output('dataurlnewwindow');
            //pdfdoc.save('doc'+d.toLocaleString()+'.pdf'); //nombre + fecha + formato
            });
        });
    </script>
     <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
