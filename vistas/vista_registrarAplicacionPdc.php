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
                        <!--alerta de registro-->
                    <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Completado!</strong>  Todos los dias de esta planificacion ya estan asignados.
                            </div>
                        <?php unset($_SESSION['msg']); } ?>
                        <!--/ alerta de registro-->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <a class="btn btn-info" href="<?php echo "?action=registrarAplicacionPdc"; ?>" style="float: right;">Volver</a>
                            <div class="panel-heading" style="color: #fcfcfc;">
                                <center>Calendario de planificaciones</center>

                            </div>
                            <div class="panel-body">
                                <div id='calendar'></div> <!--Calendario-->
                                <!-- Contenido del modal consultar-->
                                <div class="modal fade" id="consultar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <!-- form asignarAtletas elements -->
                                            <form action="" method="post" role="form" class="form-group">
                                                <div class="informacion"> <!-- Seccion Informacion -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title text-center">Datos del Programa de entrenamiento</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <dl class="dl-horizontal">
                                                            <dt>Nombre</dt>
                                                            <dd id="title"></dd>
                                                            <dt>Descripcion</dt>
                                                            <dd id="descripcion"></dd>
                                                            <dt>Disciplina</dt>
                                                            <dd id="disciplina"></dd>
                                                            <dt>Tipo de Planificacion</dt>
                                                            <dd id="tipo_pdc"></dd>
                                                            <dt>Inicio del Dia</dt>
                                                            <dd id="start"></dd>
                                                            <dt>Finalización</dt>
                                                            <dd id="end"></dd>
                                                        </dl>
                                                    </div>
                                                    <input type="hidden" name="nombre_pdc" id="nombre_pdc" value="">
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" value="asignarAtletaPdc" class="btn btn-warning"  >Asignar Atletas + </button>
                                                        <?php if (isset($asigDias)) { ?>
                                                            <a class="btn btn-warning" href="<?php echo "?action=registrarAplicacionDiaPdc&id=".$pdc['id_pdc']; ?>">Planificar Dias </a>
                                                       <?php } ?>
                                                        <!-- boton para desplazar el modal y abrir la seccion asignarAtletas<button type="button" class="btn goToAsignar btn-warning"  >Asignar Atletas + </button> -->
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div><!--/. End Seccion Informacion -->
                                                <div class="asignarAtletas"><!-- Seccion asignarAtletas -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close goToInformacion"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title text-center">Datos de la sesion de entrenamiento</h4>
                                                    </div>
                                               
                                                    <div class="modal-body"><!--Cuerpo del modal -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="checkbox form-control">
                                                                        <label><input type="checkbox" id="select_all"/> Seleccionar todos</label>
                                                                    </div>
                                                                 
                                                                    <div class="checkbox form-control">
                                                                        <label><input class="checkbox" type="checkbox" name="check[]"> This is Item 1</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div> <!--/ col-md-12 -->
                                                        </div> <!-- /. ROW  -->
                                                    </div><!--/. End div class="modal-body" Cuerpo del modal -->
                                                    <div class="modal-footer">
                                                        <!--<a class="btn btn-success" id="redir" href="">Asignar Atletas + </a>-->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmar">Guardar Cambios</button>
                                                        <button type="button" class="btn goToInformacion btn-info">Volver</button>
                                                    </div>
                                                    <!-- contenido del Modal confirmar asignarAtletas #modalConfirmar -->
                                                    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmar" data-backdrop="static">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-number="1" aria-label="Close">&times;</button>
                                                                    <h4 class="modal-title">Confirmación</h4>
                                                                    </div>
                                                                <div class="modal-body">
                                                                    <p>¿Estas segur@ que quieres asignar estos atletas?</p>  
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="submit" value="asignarAtletaPdc" class="btn btn-danger">Si</button>
                                                                    <button type="button" class="btn btn-info" data-number="1">Volver</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /. End contenido del Modal confirmar asignarAtletas -->   
                                               
                                                </div><!--/. End Seccion asignarAtletas --> 
                                            </form> <!--/. End form asignarAtletas elements -->   
                                        </div><!--/. End div class="modal-content" -->
                                    </div><!--/. End div class="modal-dialog" --> 
                                </div><!--/.modal consultar -->
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
    <script src='assets/locale/es-do.js'></script>
    <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next,today',
            center: 'title',
            right: 'month'  //agendaWeek,agendaDay,listWeek'
          },
          defaultDate:<?php $f_ini= new DateTime($pdc['fecha_inicio']);
                            $fe= $f_ini->format('Y-m-d');
                            echo json_encode($fe);  ?>,
          navLinks: false, // can click day/week names to navigate views
          editable: false,
          eventLimit: true, // allow "more" link when too many events
          eventClick: function(event){ // al hacer click en el evento
            $('#consultar #id').text(event.id);
            $('#consultar #title').text(event.title);
            $('#consultar #descripcion').text(event.desc);
            $('#consultar #disciplina').text(event.disciplina);
            $('#consultar #tipo_pdc').text(event.tipo_pdc);
            $('#consultar #start').text(event.start.format('LLLL'));
            $('#consultar #end').text(event.end.format('LLLL'));
            $('#consultar #nombre_pdc').val(event.title);
            //$('#consultar #redir').attr("href","?action=asignarAtletaPdc&id="+event.id);
            $('#consultar').modal('show');
            return false;
          },
          selectable: false,
          selectHelper: true,
          /*select: function(start,end){ //funcion para pasar atributos al modal
            $('#registrarPdc #start').val(moment(start).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc #end').val(moment(end).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc').modal('show');
          },*/
            events: [ 
                        {
                            id:           '<?php echo $pdc['id_pdc']; ?>',
                            title:        '<?php echo $pdc['nombre_pdc']; ?>',
                            desc:         '<?php echo $pdc['descripcion']; ?>',
                            disciplina:   '<?php echo $pdc['nombre_disciplina']; ?>',
                            id_disciplina:'<?php echo $pdc['id_disciplina']; ?>',
                            tipo_pdc:     '<?php echo $pdc['tipo_pdc']; ?>',
                            start:        '<?php echo $pdc['fecha_inicio']; ?>',
                            end:          '<?php echo $pdc['fecha_fin']; ?>',
                            tecnica:      '<?php echo $pdc['tecnica']; ?>',
                            tactica:      '<?php echo $pdc['tactica']; ?>',
                            fisico:       '<?php echo $pdc['fisico']; ?>',
                            psicologico:  '<?php echo $pdc['psicologico']; ?>',
                            velocidad:    '<?php echo $pdc['velocidad']; ?>',
                            color: getRandomColor(),
                        },
            ]
        });

      });
    </script>
    <script type="text/javascript">
        $('.goToAsignar').on("click", function(){
            $('.asignarAtletas').slideToggle();
            $('.informacion').slideToggle();
        });
        
        $('.goToInformacion').on("click", function(){
            $('.informacion').slideToggle();
            $('.asignarAtletas').slideToggle();
        });
        $("button[data-number=1]").click(function(){
            $('#modalConfirmar').modal('hide');
        });
    </script>
    <script type="text/javascript">
        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });
        //".checkbox" change
        $('.checkbox').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $("#select_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all").prop('checked', true);
            }
        });
    </script>
    
    
</body>