<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>Inicio de Sesión </h1>
         </div>
    
    <br/>
        <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
            <br/><br/>
            <form method="POST" action="" name="loginForm" id="loginForm" autocomplete="off">
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
                        <tr><td>Usuario:</td><td colspan="2"><input type="text" name="correo_electronico" id="usuario" placeholder="Usuario"></td></tr>
                        <tr>
                            <td>Contrase&ntilde;a:</td>
                            <td colspan="2"><input type="password" name="contrasena" id="contrasena" placeholder="Contrasena"></td></tr>
                        <tr>
                            <td>C&oacute;digo de verficaci&oacute;n</td><td><input type="text" name="codigo" id="codigo" placeholder="Codigo de verificacion"></td>
                            <td><?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?></td></tr>
                        
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr><td colspan="3">
                        <center><input type="submit" id="inicio" name="inicio" value="Entrar" class="fg-button ui-state-default fg-button-icon-left" ><br/>
                        <a href="#">Recuperar usuario/contraseña </a></center></td></tr>
                    </table></center>
            </form>
            <br/><br/>
        </div>
   
</div>
<br/><br/>

    <link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/reset.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/bike2/jquery-ui.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/jroller.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/fg.buttons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/control/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" />
    <script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/fg.menu.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jroller.js"></script>
<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/ui.selectmenu.js"></script>
<script type="text/javascript" src="/control/js/control.js"></script>
