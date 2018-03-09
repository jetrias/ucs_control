
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>Formulario de Busqueda</h1>
         </div>
    <br/>
        <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
            <br/><br/>
            <form method="POST" action="" name="buscarForm" id="buscarForm">
                <center><table>
                        <tr><td colspan="3"> &nbsp;
                            <?php if ($sf_user->hasFlash('error')): ?>
                                <div class="error" style="display: none; background-color: #ffe6e6"><span><center>
                                <font color="red"><?php echo $sf_user->getFlash('error') ?></font>
                                </center>
                    </span></div>
                            <?php endif ?>
                            <?php if ($sf_user->hasFlash('notice')): ?>
                                <div class="error" style="display: none; background-color: #79b7e7"><span><center>
                                <font color="blue"><?php echo $sf_user->getFlash('notice') ?></font>
                                </center>
                    </span></div>
                            <?php endif ?>
                            </td></tr>
                        <tr><td colspan="2">Código:</td><td><input type="text" name="codigo" id="codigo" placeholder="Intorduzca el codigo de la planilla"></td></tr>
                        <tr>
                            <td>C&oacute;digo de verficaci&oacute;n</td><td><?php echo '<img src="module' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?></td>
                            <td><input type="text" name="codigo" id="codigo" placeholder="Codigo de verificacion"></td></tr>

                        <tr><td colspan="3">
                        <center><input type="submit" id="buscar" name="buscar" value="Buscar" class="fg-button ui-state-default fg-button-icon-left" > </center></td></tr>
                    </table></center>
            </form>
            <br/><br/>
        </div>
   
</div>
<br/><br/>

    <link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/reset.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/bike/jquery-ui.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/jroller.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.buttons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" />
    <script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="/control/js/control.js"></script>
<script type="text/javascript" src="/control/js/date_es.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/fg.menu.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jroller.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/ui.selectmenu.js"></script>