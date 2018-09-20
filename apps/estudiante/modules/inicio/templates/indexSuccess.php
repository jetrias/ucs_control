
 <h1 class="page-header">Página de Inicio</h1>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-table fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">1</div>
                                    <div>NOTAS</div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $notas='#';
                        if($sf_user->getAttribute('notas')=='SI-ELAM'){
                             $notas='/control/estudiante.php/reporte/mostrarNotas';
                        }
                        if($sf_user->getAttribute('notas')=='SI-7'){
                             $notas='/control/estudiante.php/reporte/mostrarNotas2';
                        }
                         if($sf_user->getAttribute('notas')=='SENAMECF'){
                             $notas='/control/estudiante.php/reporte/mostrarSenamecf';
                        }
                        ?>
                        <a href="<?php echo $notas;?>" target="_blank">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2</div>
                                    <div>CARNÉ</div>
                                </div>
                            </div>
                        </div>
                        <?php
                         if($sf_user->getAttribute('n_ingreso')==TRUE){
                             $link_carnet='#';
                         }else{
                             $link_carnet='/control/estudiante.php/reporte/carnet';
                         }
                        ?>
                        <a href="<?php echo $link_carnet; ?>" target="_blank"  download="carnet.png">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">3</div>
                                    <div>C. de ESTUDIOS</div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $link_constancia='#';
                         if($sf_user->getAttribute('n_ingreso')==TRUE){
                             $link_constancia='#';
                         }else{
                            $link_constancia='/control/estudiante.php/reporte/consEst';
                         }
                       
                        ?>
                        <a href="<?php echo $link_constancia;?>" target='_blank'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">4</div>
                                    <div>MATRÍCULA</div>
                                </div>
                            </div>
                        </div><?php
                        if($sf_user->getAttribute('n_ingreso')==TRUE){
                            $link_matricula='/control/index.php/reporte/CICS';
                        }else{
                            $link_matricula='/control/estudiante.php/reporte/matricula';
                        }
                        ?>
                        <a href="<?php echo $link_matricula;?>" target='_blank'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-table fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">5</div>
                                    <div>HORARIO</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" target='_blank'>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
