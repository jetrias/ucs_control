<script type="text/javascript">
    function validar() {
        /* DECLARAR CAMPOS A VALIDAR */
        /** 	DECLARA PERSONA A VALIDAR		**/
        var_text1 = document.getElementById('usuario_re1').value;
        var_text2 = document.getElementById('usuario_re2').value;
        var_password1 = document.getElementById('clave').value;
        var_password2 = document.getElementById('clave2').value;
        
        msj = ' ';
        /* VALIDAR DE CAMPOS */
        /** 	VALIDAR PERSONA			**/
        if (var_text1 == null || var_text1.length <= 1 || var_text1.length > 50) {
            msj = 'El campo 1er Nombre debe tener 2 letras minimo, maximo 50 \n';
        }
        if (var_text2 == null || var_text2.length <= 1 || var_text2.length > 50) {
            msj = msj + 'El campo 1er Apellido debe tener 2 letras minimo, maximo 50 \n';
            return false;
        }
        /*** 	Validar Contraseñas 		***/
        if (var_password1 == null || var_password1.length <= 5 || var_password1.length > 20 || /^\s+$/.test(var_password1)) {
            msj = msj + 'El campo Clave debe tener 6 caracteres minimo, maximo 20 \n';
        }
        if (var_password2 == null || var_password2.length <= 5 || var_password2.length > 20 || /^\s+$/.test(var_password2)) {
            msj = msj + 'El campo Confirme Clave debe tener 3 caracteres minimo, maximo 20 \n';
        }
        if (var_password1 !== var_password2) {
            msj = msj + 'Los campos de Clave no coinciden \n';
        }
        if (msj === ' ') {
            /*alert('Contraseña actualizada con éxito!!!');*/
            return true;
        } else {
            alert(msj);
            return false;
        }
    }
</script>
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>Recuperar Clave</h1>
    </div>
    <br/>
    <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
        <br/>
        <br/>
        <form method="POST" action="/control/index.php/usuario/recupera" name="buscarForm" id="buscarForm" onSubmit="return validar()" autocomplete="off">
            <center>
                <table>
                    <tr>
                        <td colspan="2">
                            <?php if ($sf_user->hasFlash('error')): ?>
                                <div class="error" style="display: none; background-color: #ffe6e6">
                                    <span>
                                        <center>
                                            <font color="red">
                                            <?php echo $sf_user->getFlash('error') ?>
                                            </font>
                                        </center>
                                    </span>
                                </div>
                            <?php endif ?>
                            <?php if ($sf_user->hasFlash('notice')): ?>
                                <div class="error" style="display: none; background-color: #79b7e7">
                                    <span>
                                        <center>
                                            <font color="blue">
                                            <?php echo $sf_user->getFlash('notice') ?>
                                            </font>
                                        </center>
                                    </span>
                                </div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></br>
                            <center><b><u>DATOS DEL USUARIO</u></b></center>
                        </td>
                    </tr>
                    <tr>
                        <td></br>
                            PRIMER NOMBRE:&nbsp;<br>
                            PRIMER APELLIDO:&nbsp;<br>
                            IDENTIFICACION:&nbsp;<br>
                            NOMBRE DE USUARIO:&nbsp;<br>
                        </td>
                        <td colspan="2"></br><?php
                            echo $sf_user->getAttribute('persona_nom1') . '<br>';
                            echo $sf_user->getAttribute('persona_ape1') . '<br>';
                            echo $sf_user->getAttribute('personati_id') . '-';
                            echo $sf_user->getAttribute('persona_ide') . '<br>';
                            echo $sf_user->getAttribute('usuario_nom') . '<br>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></br>
                            <center><b><u>PREGUNTAS DE SEGURIDAD</u></b></center>
                        </td>
                    </tr>
                    <tr>
                        <td>PREGUNTA 1:&nbsp;</td>
                    </tr>
                    <tr>
                        <td bgcolor="white">
                            <?php echo $sf_user->getAttribute('usuario_pr1'); ?>&nbsp;
                        </td>
                        <td>
                            <input type="text" name="usuario_re1" id="usuario_re1" pattern='[A-ZÑÁÉÍÓÚ 0-9]{3,50}' placeholder="Coloque respuesta 1 de la pregunta 1" required>
                        </td>
                    </tr>
                    <tr>
                        <td>PREGUNTA 2:&nbsp;</td>
                    </tr>
                    <tr>
                        <td bgcolor="white">
                            <?php echo $sf_user->getAttribute('usuario_pr2'); ?>&nbsp;
                        </td>
                        <td>
                            <input type="text" name="usuario_re2" id="usuario_re2" pattern='[A-ZÑÁÉÍÓÚ 0-9]{3,50}' placeholder="Coloque respuesta 2 de la pregunta 2" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></br>
                            <center><b><u>CAMBIO DE CLAVE</u></b></center>
                        </td>
                    </tr>
                    <tr>
                        <td></br>NUEVA CLAVE:&nbsp;</td>
                        <td></br>
                            <input type="password" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[$@$¡%?&])[A-Z\d$@$¡%?&]{6,20}" name="clave" id="clave" placeholder="Coloque su nueva Clave" required>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>La contraseña debe tener al menos 1 número, 1 letra</br>y 1 de estos ¡@$%&? caracteres especiles.</td>
                    </tr>
                    <tr>
                        <td>REPITA NUEVA CLAVE:&nbsp;</td>
                        <td>
                            <input type="password" name="clave2" id="clave2" placeholder="Repita su nueva Clave" required>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <input type="reset"  id="limpiar" name="limpiar" value="LIMPIAR" style="width:100px" class="fg-button ui-state-default fg-button-icon-left">
                        </td>
                        <td>
                            <input type="submit"  id="enviar" name="enviar" value="ENVIAR" style="width:100px" class="fg-button ui-state-default fg-button-icon-left"></center>
                        </td>
                        <td>
                            <input type="button" id="atras" name="atras" value="ATRÁS" style="width:100px" class="fg-button ui-state-default fg-button-icon-left" onclick="window.history.back();">
                        </td>
                    </tr>
                </table>
            </center>
        </form>
        <br/>
        <br/>
    </div>
</div>
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
