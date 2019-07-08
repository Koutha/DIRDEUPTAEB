<!-- NAV TOP  -->
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?action=sindex">Dirección de Deportes</a> 
    </div>
    <div style="color: white;padding: 15px 25px 1px 5px;float: right;font-size: 16px;">
        <div class="dropdown navbar-right">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?>
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <!--<li class="dropdown-header">Dropdown header 1</li>-->
                  <li><a href="#"><span class="glyphicon glyphicon-th-list"></span> Mi perfil</a></li>
                  <li><a href="<?php echo "?action=modificarContraseña&id="."1"; ?>"><span class="glyphicon glyphicon glyphicon-edit"></span> Cambiar contraseña</a></li>

                  <li class="divider"></li>
                  <!--<li class="dropdown-header">Dropdown header 2</li>-->
                  <li><a href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
              </ul>
          </div>
          <!--<a href="?action=logout" class="btn btn-primary "><span class="glyphicon glyphicon-log-out"></span> Salir</a>-->
      </div>
      <div style="color: white;
      padding: 15px 1px 5px 25px;
      float: left;
      font-size: 16px;"> Universidad Politecnica Territorial del Estado Lara "Andres Eloy Blanco" &nbsp; 
  </div>

</nav>   
<!-- /. NAV TOP END  -->
<!-- NAV SIDE  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
           <li class="text-center">
               <img src="assets/images/logoUPTAEB.jpg" class="user-image img-responsive"/>
               <p style="color:#fff"><?php echo "Bienvenid@  " . $_SESSION['username']; ?></p>
           </li>
           <li>
            <!--class="active-menu"--><a href="?action=sindex"><i class="fa fa-tachometer-alt fa-2x"></i>Inicio</a>
        </li>
        <?php if ($_SESSION['rol']==1) { ?>
        <li><a href="#"><i class="fas fa-user-secret fa-2x"></i>Administrar<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Usuarios<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="?action=registrarAdm">Registrar</a>
                        </li>
                        <li>
                            <a href="?action=consultarAdm">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Disciplinas<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="?action=registrarDisciplina">Registrar</a>
                        </li>
                        <li>
                            <a href="?action=consultarDisciplina">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">PNF<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="?action=registrarPnf">Registrar</a>
                        </li>
                        <li>
                            <a href="?action=consultarPnf">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Bitácora<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="?action=consultarBitacora">Consultar</a>
                        </li>
                    </ul>
                </li>
                <li>
                <a href="#">Mantenimiento<span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="?action=validarImg&mod=backupRestore">Respaldo / Restauracion </a>
                    </li>
                    <li>
                        <a href="?action=validarImg&mod=restoreAutoSave">Punto de control</a>
                    </li>
                </ul>
            </li>
                 </ul>
        </li>
    <?php }if ($_SESSION['rol']==1 or $_SESSION['rol']==2) { ?>
                        <li><a href="#"><i class="fas fa-street-view fa-2x"></i>Personal Capacitado<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar personal capacitado",$_SESSION['id_usuario'])) { ?>
                                <li>
                                    <a href="?action=registrarPersonal">Registrar </a>
                                </li>
                                <?php } ?>
                                <li>
                                    <a href="?action=consultarPersonal">Consultar </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fas fa-user-plus fa-2x"></i> Atletas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar Atleta",$_SESSION['id_usuario'])) { ?><li>
                                    <a href="?action=registrarAtleta">Registrar</a>
                                </li><?php } ?>
                                <li>
                                    <a href="?action=consultarAtleta">Consultar</a>
                                </li>
                                <li>
                                    <a href="#">Reportes<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="?action=generarReportesAtleta&at">Por Atleta</a>
                                        </li>
                                        <li>
                                            <a href="?action=generarReportesAtleta">Por Disciplina </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>      
                        <?php }if ($_SESSION['rol']==1 or $_SESSION['rol']==3){?>
                        <li><a href="#"><i class="fas fa-chart-line fa-2x"></i> Pruebas (Test)<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($_SESSION['rol']==1) {?>
                                <li>
                                    <a href="?action=registrarPruebas">Registrar</a>
                                </li>                                    
                            <?php }?>
                                <li>
                                    <a href="?action=consultarPruebas">Consultar</a>
                                </li>

                                <li><a href="#">Aplicar<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar Aplicación de Pruebas",$_SESSION['id_usuario'])) { ?><li>
                                            <a href="?action=registrarApliPruebas">Registrar</a>
                                        </li><?php } ?>
                                        <li>
                                            <a href="?action=consultarApliPruebas">Consultar</a>
                                        </li>
                                        <!--li>
                                            <a href="#">Resultados / Reportes </a>
                                        </li-->
                                    </ul>
                                </li>
                            </ul> 
                        </li>
                        <li><a href="#"><i class="fas fa-edit fa-2x"></i>Planificación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#">Programas / PDC <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar PDC",$_SESSION['id_usuario'])) { ?><li>
                                            <a href="?action=validarImg&mod=registrarPdc">Registrar</a>
                                        </li><?php } ?>
                                        <li>
                                            <a href="?action=validarImg&mod=consultarPdc">Consultar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Aplicación<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <?php if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Registrar Aplicación de PDC",$_SESSION['id_usuario'])) { ?><li>
                                            <a href="?action=validarImg&mod=registrarAplicacionPdc">Registrar</a>
                                        </li><?php } ?>
                                        <li>
                                            <a href="#">Consultar<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="?action=validarImg&mod=consultarAplicacionPdc">Por programa</a>
                                                </li>
                                                <li>
                                                    <a href="?action=validarImg&mod=consultarAplicacionPdc&at">Por atleta</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="?action=validarImg&mod=generarReportesPdc">Reportes</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> 
                        </li>
                        <?php }?>
                        <li>
                            <a href="?action=logout"><i class="fas fa-sign-out-alt fa-2x"></i>Salir</a>
                        </li> 

                    </ul>
                </div>
            </nav>  
        <!-- /. NAV SIDE END  -->