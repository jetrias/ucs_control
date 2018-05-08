<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets();?>
        <?php include_javascripts();?>
        <style>
            .redondo {
                border: 2px solid grey;
                margin: 0;
                padding: 0;
                border-radius: 800px;
                overflow: hidden;
            }


            .imgRedonda {
                /*    width:300px;
                    height:300px;*/
                border-radius:50px;
                border:10px solid #666;
            }
            @keyframes pound {
                from { transform: none; }
                50% { transform: scale(1.4); }
                to { transform: none; }
            }

            .heart {
                display: inline-block;
                /*font-size: 150px;*/
                color: #e00;
                animation: pound .5s infinite;
                transform-origin: center;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <img class="navbar-brand" src="/control/images/logo_ucs.png"/> 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/control/estudiante.php/inicio">Universidad de Las Ciencias de la Salud "Hugo Chávez Frías"</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <!--                        <li>
                                                        <a href="#">
                                                            <div>
                                                                <strong>John Smith</strong>
                                                                <span class="pull-right text-muted">
                                                                    <em>Yesterday</em>
                                                                </span>
                                                            </div>
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <strong>John Smith</strong>
                                                                <span class="pull-right text-muted">
                                                                    <em>Yesterday</em>
                                                                </span>
                                                            </div>
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <strong>John Smith</strong>
                                                                <span class="pull-right text-muted">
                                                                    <em>Yesterday</em>
                                                                </span>
                                                            </div>
                                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a class="text-center" href="#">
                                                            <strong>Read All Messages</strong>
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </li>-->
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <!--                        <li>
                                                        <a href="#">
                                                            <div>
                                                                <p>
                                                                    <strong>Task 1</strong>
                                                                    <span class="pull-right text-muted">40% Complete</span>
                                                                </p>
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                        <span class="sr-only">40% Complete (success)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <p>
                                                                    <strong>Task 2</strong>
                                                                    <span class="pull-right text-muted">20% Complete</span>
                                                                </p>
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                        <span class="sr-only">20% Complete</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <p>
                                                                    <strong>Task 3</strong>
                                                                    <span class="pull-right text-muted">60% Complete</span>
                                                                </p>
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                        <span class="sr-only">60% Complete (warning)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <div>
                                                                <p>
                                                                    <strong>Task 4</strong>
                                                                    <span class="pull-right text-muted">80% Complete</span>
                                                                </p>
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                        <span class="sr-only">80% Complete (danger)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a class="text-center" href="#">
                                                            <strong>See All Tasks</strong>
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </li>-->
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php
                            $prueba = 0;
                            if ($prueba == 1) {
                                $clase = 'fa fa-bell fa-fw animacion heart';
                            } else {
                                $clase = 'fa fa-bell fa-fw animacion';
                            }
                            ?>
                            <i class="<?php echo $clase; ?>" ></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
<!--                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>-->
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                            </li>
    <!--                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>-->
                            <li class="divider"></li>
                            <li><a href="/control/index.php/login/salir"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <table>
                                       <?php
					$foto='persona.jpg';
					if ($sf_user->getAttribute('foto')!=null){
						$foto=$sf_user->getAttribute('foto');
					}
					?>
                                        <tr><td rowspan="4"> <div class="redondo"><img src='/control/uploads/fotos/original/s_<?php echo $foto; ?>' /></div></td><td><?php echo $sf_user->getAttribute('tipo_identificacion') ?>-<?php echo $sf_user->getAttribute('identificacion') ?></td></tr>
                                        <!-- tr><td rowspan="4"> <div class="redondo"><img src='/control/uploads/fotos/original/s_persona.jpg' /></div></td><td><?php echo $sf_user->getAttribute('tipo_identificacion') ?>-<?php echo $sf_user->getAttribute('identificacion') ?></td></tr -->
                                        <tr><td><?php echo $sf_user->getAttribute('nombre') ?></td></tr>
                                        <tr><td><?php echo $sf_user->getAttribute('apellido') ?></td></tr>
                                        <tr><td><?php echo $sf_user->getAttribute('estatus') ?></td></tr>
                                    </table>
<!--                                <span class="input-group-btn">
     <button class="btn btn-default" type="button">
         <i class="fa fa-search"></i>
     </button>
 </span>-->
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="/control/estudiante.php/inicio"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Datos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/control/estudiante.php/estudiante/<?php echo $sf_user->getAttribute('estudiante_id') ?>/edit">Datos Personales</a>
                                    </li>
                                    <li>
                                        <a href="/control/estudiante.php/estudio_socioeconomico">Caracterización</a>
                                    </li>
                                    <li>
                                        <a href="/control/estudiante.php/otra_informacion">Otra Información</a>
                                    </li>
                                    <li>
                                        <a href="/control/estudiante.php/reclamo">Reclamos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
<?php echo $sf_content ?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
    </body>
</html>
