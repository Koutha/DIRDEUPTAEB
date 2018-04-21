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
                    <!--alerta de registro-->
                    <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Registrada!</strong>  se ha registrado Exitosamente.
                            </div>
                        <?php unset($_SESSION['registro']); } ?>
                        <!--/ alerta de registro-->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #fcfcfc;">
                                <center>Calendario de planificaciones</center>
                            </div>
                            <div class="panel-body">
                                <div id='calendar'></div> <!--Calendario-->
                                <!-- Contenido del modal consultar-->
                                <div class="modal fade" id="consultar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center">Datos de la Planificacion</h4>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="dl-horizontal">
                                                    <dt>ID</dt>
                                                    <dd id="id"></dd>
                                                    <dt>Titulo</dt>
                                                    <dd id="title"></dd>
                                                    <dt>Descripcion</dt>
                                                    <dd id="descripcion"></dd>
                                                    <dt>Disciplina</dt>
                                                    <dd id="disciplina"></dd>
                                                    <dt>Tipo de Planificacion</dt>
                                                    <dd id="tipo_pdc"></dd>
                                                    <dt>Fecha de Inicio</dt>
                                                    <dd id="start"></dd>
                                                    <dt>Fecha de Finalización</dt>
                                                    <dd id="end"></dd>
                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                               <!--  <button type="button" class="btn btn-success">test</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/.modal consultar -->
                                <div class="modal fade" id="registrarPdc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center">Registrar Planificación</h4>
                                            </div>
                                            <!-- Form Elements -->  
                                            <form action="" method="post" role="form" class="form-group"> 
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Programas directos de competencia</h4>
                                                        <h6>Donde se establece la estructura del programa de entrenamiento con miras a la obtención de logros deportivos en corto tiempo. </h6>   
                                                        
                                                    </div>
                                                </div><!-- /. ROW  -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h5><strong>Información del Programa</strong></h5>
                                                            </div>
                                                            <div class="panel-body">
                                                                <?php if (isset($existe) && $existe == 1) { ?>
                                                                    <div class="alert alert-danger alert-dismissible fade in">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <strong>El Nombre ya existe</strong> por favor intente con uno diferente
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label>Nombre</label>
                                                                            <input type="text" class="form-control" name="nombre_pdc" placeholder="" value="<?php echo isset($_POST['nombre_pdc']) ? $_POST['nombre_pdc'] : ''; ?>" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Descripción</label>
                                                                            <textarea name="descripcion" class="form-control" placeholder="" required><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label  class="control-label label-default">Tipo de programa</label>
                                                                            <select name="tipo_pdc" class="form-control" required >
                                                                                <option value="">Seleccione...</option>
                                                                                <option value="Preparatorio" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Preparatorio") ? 'selected' : ''; ?>>Preparatorio</option>
                                                                                <option value="Pre-Compentencia" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Pre-Compentencia") ? 'selected' : ''; ?>>Pre-Compentencia</option>
                                                                                <option value="Competitivo" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Competitivo") ? 'selected' : ''; ?>>Competitivo</option>
                                                                                <option value="Post-Competencia" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Post-Competencia") ? 'selected' : ''; ?>>Post-Competencia</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label  class="control-label label-default">Disciplina</label>
                                                                            <select name="id_disciplina" class="form-control" required >
                                                                                <option value="">Seleccione...</option>
                                                                                <?php foreach ($disciplinas as $key => $value) { ?>
                                                                                    <option value="<?php echo $value['id_disciplina']; ?>" <?php echo (isset($_POST['id_disciplina']) && $_POST['id_disciplina'] == $value['id_disciplina']) ? 'selected' : ''; ?>><?php echo $value['nombre']; ?></option>
                                                                                    <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div> <!--/Informacion del programa-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h5><strong>Duración</strong></h5>
                                                            </div>
                                                            <div class="panel-body">
                                                                <?php if (isset($periodo) && $periodo == 1) { ?>
                                                                <div class="alert alert-danger alert-dismissible fade in">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    <strong>Periodo invalido</strong> La fecha de inicio debe ser menor a la fecha de finalizacion
                                                                </div>
                                                                <?php } ?>
                                                                <div class="row" >
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group" >
                                                                            <label>Fecha de Inicio</label>
                                                                            <input type="date" name="fecha_inicio" id="start" class="form-group" value="<?php echo isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>    
                                                                    <div class="col-md-4" >  
                                                                        <div class="form-group" >
                                                                            <label>Fecha de Finalización</label>
                                                                            <input type="date" name="fecha_fin" id="end" class="form-group" value="<?php echo isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  <!--/ Duracion-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h5><strong>Características del Programa</strong></h5>
                                                            </div>
                                                            <div class="panel-body">
                                                                <?php if (isset($porcentaje) && $porcentaje == 1) { ?>
                                                                <div class="alert alert-danger alert-dismissible fade in">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    <strong>Porcentajes incorrectos</strong> La suma de los porcentajes debe ser igual a 100 % 
                                                                </div>
                                                                <?php } ?>
                                                            <label>Aspectos a trabajar en porcentaje</label>
                                                                <div class="row" >
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group">
                                                                            <label>Técnica</label>
                                                                            <input type="number" min="1" max="100" name="tecnica" class="form-control" value="<?php echo isset($_POST['tecnica']) ? $_POST['tecnica'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group">
                                                                            <label>Táctica</label>
                                                                            <input type="number" min="1" max="100" name="tactica" class="form-control" value="<?php echo isset($_POST['tactica']) ? $_POST['tactica'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group">
                                                                            <label>Físico</label>
                                                                            <input type="number" min="1" max="100" name="fisico" class="form-control" value="<?php echo isset($_POST['fisico']) ? $_POST['fisico'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group">
                                                                            <label>Psicológico</label>
                                                                            <input type="number" min="1" max="100" name="psicologico" class="form-control" value="<?php echo isset($_POST['psicologico']) ? $_POST['psicologico'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" >
                                                                        <div class="form-group">
                                                                            <label>Velocidad</label>
                                                                            <input type="number" min="1" max="100" name="velocidad" class="form-control" value="<?php echo isset($_POST['velocidad']) ? $_POST['velocidad'] : ''; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  <!--/ Caracteristicas del programa-->     
                                                    </div> <!--/ col-md-12 -->
                                                </div> <!-- /. ROW  -->
                                            </div> <!--/ Modal Body-->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" value="registrarPdc" class="btn btn-primary">Registrar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                                                </div>
                                            </div>
                                            </form><!-- End Form Elements -->
                                        </div><!--/ Modal Content -->
                                    </div><!--/ Modal Dialog -->
                                </div><!--/.modal registrar -->
                            </div><!--/.panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /. col-md-12  -->
                </div><!-- /. ROW  --> 
            </div><!-- /. PAGE INNER  -->     
        </div><!-- /. PAGE WRAPPER  -->       
    </div> <!-- /. WRAPPER  -->
   
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- script para validaciones -->
    <script src="assets/js/valida.js" type="text/javascript" ></script>
    <!-- CALENDAR -->
    <script src='assets/js/moment.min.js'></script>
    <script src='assets/js/fullcalendar.min.js'></script>
    <script src='assets/locale/es.js'></script>
    <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next,today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
          defaultDate: Date(),
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          eventLimit: true, // allow "more" link when too many events
          eventClick: function(event){
            $('#consultar #id').text(event.id);
            $('#consultar #title').text(event.title);
            $('#consultar #descripcion').text(event.desc);
            $('#consultar #disciplina').text(event.disciplina);
            $('#consultar #tipo_pdc').text(event.tipo_pdc);
            $('#consultar #start').text(event.start.format('LLLL A'));
            $('#consultar #end').text(event.end);
            $('#consultar').modal('show');
            return false;
          },
          selectable: true,
          selectHelper: true,
          select: function(start,end){ //funcion para pasar atributos al modal
            $('#registrarPdc #start').val(moment(start).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc #end').val(moment(end).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc').modal('show');
          },
            events: [
                    <?php if(!empty($pdc))foreach ($pdc as $key) { ?>
                        {
                      id:    '<?php echo $key['id_dp']; ?>',
                      title: '<?php echo $key['nombre_pdc']; ?>',
                      desc:  '<?php echo $key['descripcion']; ?>',
                      disciplina:  '<?php echo $key['nombre_disciplina']; ?>',
                      tipo_pdc:  '<?php echo $key['tipo_pdc']; ?>',
                      start: '<?php echo $key['fecha_dia']; ?>',
                      end: '<?php  $key['fecha_dia'];?>',
                        },
                   <?php   }  ?>
                    {
                      title: 'All Day Event',
                      start: '2018-03-01',
                    },
            ]
        });

      });
    </script>

    
    
</body>