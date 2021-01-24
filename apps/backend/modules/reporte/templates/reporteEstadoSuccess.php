<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/reset.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/bike/jquery-ui.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/jroller.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.buttons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" />
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/fg.menu.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jroller.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/ui.selectmenu.js"></script>
<table width="100%">
    <tr><td><center></center></td></tr>
<tr><td>&nbsp;<br/></td></tr>
<tr><td>  
        <div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
            <div class="fg-toolbar ui-widget-header ui-corner-all">
                <h1>Seleccione el estado MIC</h1>
            </div>
            <div class="sf_admin_flashes ui-widget">
            </div>
            <div id="sf_admin_header">MIC
            </div>
            <div id="sf_admin_content">
                <script type="text/javascript" src="/control/sfDependentSelectPlugin/js/SelectDependiente.min.js"></script>
                <div class="sf_admin_form">
                    <form target="_blank" method="get" action="/control/backend.php/reporte/MostrarReporteEstado" enctype="multipart/form-data"><input type="hidden" name="sf_method" value="put" />
                        <div class="ui-helper-clearfix"></div>
                        <div id="sf_admin_form_tab_menu">
                            <br><br><br>
                            <div id="sf_fieldset_none" class="ui-corner-all">
                                <select name="estado" id="estado">
                                    <?php
                                    foreach ($estado as $data):
                                        echo "<option value='" . $data['id'] . "' selected>" . $data['descripcion'] . "</option>";
                                    endforeach;
                                    ?>
                                </select>
				<select name="periodo" id="periodo">
					<option value="SI">SI</option>
					<option value="SI-7">MIC-7</option>
					<option value="SI-8">MIC-8</option>
					<option value="SI-9">MIC-9</option>
					<option value="SI-9-2">MIC-9-2</option>
					<option value="SI-ELAM">ELAM</option>
                    <option value="SI-10">MIC-10</option>
					<!--option value="SI-RI">RADIOIMAGENOLOGIA-I</option-->
					<!--option value="SENAMECF">SENAMECF-I</option-->

				</select>
                                <input type="submit" value="Generar Reporte" id='enviar' name='enviar'>
                            </div>
                            <br><br><br><br><br><br>
                        </div>
                    </form>
                </div>
                <div id="sf_admin_content">
                <script type="text/javascript" src="/control/sfDependentSelectPlugin/js/SelectDependiente.min.js"></script>
                <div class="sf_admin_form">
                    <form target="_blank" method="get" action="/control/backend.php/reporte/MostrarReporteEstado" enctype="multipart/form-data"><input type="hidden" name="sf_method" value="put" />
                        <div class="ui-helper-clearfix"></div>
                        <div id="sf_admin_form_tab_menu">
                            <br><br><br>
                            <div id="sf_fieldset_none" class="ui-corner-all">
                                <select name="estado" id="estado">
                                    <?php
                                    foreach ($estado as $data):
                                        echo "<option value='" . $data['id'] . "' selected>" . $data['descripcion'] . "</option>";
                                    endforeach;
                                    ?>
                                </select>
				<select name="periodo" id="periodo">
					<option value="SI">SI</option>
					<option value="SI-7">MIC-7</option>
					<option value="SI-8">MIC-8</option>
					<option value="SI-9">MIC-9</option>
					<option value="SI-9-2">MIC-9-2</option>
					<option value="SI-ELAM">ELAM</option>
                    <option value="SI-10">MIC-10</option>
					<!--option value="SI-RI">RADIOIMAGENOLOGIA-I</option-->
					<!--option value="SENAMECF">SENAMECF-I</option-->

				</select>
                                <input type="submit" value="Generar Reporte" id='enviar' name='enviar'>
                            </div>
                            <br><br><br><br><br><br>
                        </div>
                    </form>
                </div>
                <div id="sf_admin_footer">
                </div>
            </div>
    </td></tr>
<tr><td>  
        <div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
            <div class="fg-toolbar ui-widget-header ui-corner-all">
                <h1>Seleccione el estado RI</h1>
            </div>
            <div class="sf_admin_flashes ui-widget">
            </div>
            <div id="sf_admin_header">RI
            </div>
            <div id="sf_admin_content">
                <script type="text/javascript" src="/control/sfDependentSelectPlugin/js/SelectDependiente.min.js"></script>
                <div class="sf_admin_form">
                    <form target="_blank" method="get" action="/control/backend.php/reporte/MostrarReporteEstadoRi" enctype="multipart/form-data"><input type="hidden" name="sf_method" value="put" />
                        <div class="ui-helper-clearfix"></div>
                        <div id="sf_admin_form_tab_menu">
                            <br><br><br>
                            <div id="sf_fieldset_none" class="ui-corner-all">
                                <select name="estado" id="estado">
                                    <?php
                                    foreach ($estado as $data):
                                        echo "<option value='" . $data['id'] . "' selected>" . $data['descripcion'] . "</option>";
                                    endforeach;
                                    ?>
                                </select>
                                <input type="submit" value="Generar Reporte" id='enviar' name='enviar'>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </form>
                </div>
                <div id="sf_admin_footer">
                </div>
            </div>
    </td></tr>

