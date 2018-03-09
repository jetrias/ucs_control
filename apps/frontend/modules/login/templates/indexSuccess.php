<script type="text/javascript">


var first = getUrlVars()["id"];
var second = getUrlVars()["page"];

alert(first);
alert(second);

function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}







/*------------------------- FUNCION SALIR APLICACION  -------------------------*/
		function salir(this){
                    alert('salir');
			//if (cmd=='SALIR'){
                        window.close();
//				open(location, '_self').clos e();
			//}
//			return false;
		}
/*------------------------- FIN FUNCION SALIR APLICACION  -------------------------*/

/*------------------------- FUNCION VALIDAR ACCESO  -------------------------*/
    function validar() {
        /* DECLARAR CAMPOS A VALIDAR */
        /** 	DECLARA PERSONA A VALIDAR		**/
        var_text1 = document.getElementById('usuario_nom').value;
        var_text2 = document.getElementById('codigo').value;
        var_password = document.getElementById('usuario_cla').value;
        msj = ' ';
        /* VALIDAR DE CAMPOS */
        /** 	VALIDAR PERSONA			**/
        if (var_text1 == null || var_text1.length <= 8 || var_text1.length > 9) {
            msj = 'El campo Usuario debe cumplir el formato predeterminado \n';
        }
        if (var_text2 == null || var_text2.length <= 1 || var_text2.length > 50) {
            msj = msj + 'El campo Código debe tener 5 caracteres alfanuméricos \n';
            return false;
        }
        /*** 	Validar Contraseñas 		***/
        if (var_password1 == null || var_password1.length <= 5 || var_password1.length > 20 || /^\s+$/.test(var_password1)) {
            msj = msj + 'El campo Clave debe tener 6 caracteres alfanuméricos minimo, maximo 20 \n';
        }
        if (msj === ' ') {
            alert('Bienvenido/a al SIGE');
            return true;
        } else {
            alert(msj);
            return false;
        }
    }
/*------------------------- FIN FUNCION VALIDAR ACCESO ----------------------*/
</script>
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>Inicio de Sesión</h1>
        <a href="/control/index.php/buscar/buscar" style="float: right; margin-top: -23px" class="fg-button ui-state-default fg-button-icon-left ui-corner-all">REGISTRARSE</a>
    </div>
    <br/>
    <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
        <br/>
        <br/>
        <form method="POST" action="" name="loginForm" id="loginForm" onSubmit="return validar()" autocomplete="off">
            <center>
                <table>
                    <tr>
                        <th colspan="3"><?php if ($sf_user->hasFlash('error')): ?>
                            <div class="error" style="display: none; background-color: #ffe6e6">
                                <span>
                                    <center>
                                        <font color="red">
                                            <?php echo $sf_user->getFlash('error') ?>
                                        </font>
                                    </center>
                                </span>
                            </div>      <?php endif ?>
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
                        </th>
                    </tr>
                    <tr>
                        <th>USUARIO:&nbsp;</th>
                        <td colspan="2"><input type="text" name="usuario_nom" minlength="9" maxlength="9" id="usuario_nom" pattern='^[A-Z]{2}\.[A-Z]{2}\.[0-9]{3}$' placeholder="Coloque su Usuario. Ej.: XX.XX.999" required></td>
                    </tr>
                    <tr>
                        <th>CLAVE:&nbsp;</th>
                        <td colspan="2"><input type="password" name="usuario_cla" id="usuario_cla" minlength="6" maxlength="20" pattern='[A-Z\d$@$¡%?&]{6,20}' placeholder="Coloque su Clave" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <th>CODIGÓ DE VERIFICACIÓN:&nbsp;</th>
                        <td>
                            <input type="text" name="codigo" id="codigo" minlength="5" maxlength="5" pattern='[A-Z 0-9]{5,5}' style="width:155px" placeholder="Coloque Código de Verificación" required>
                            <br/>No se distingue entre mayúsculas<br/>y minúsculas
                        </td>
                        <td>
                            <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
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
                            <input type="submit" id="acceder" name="acceder" value="ACCEDER" style="width:100px" class="fg-button ui-state-default fg-button-icon-left">
                        </td>
                        <td>
                            <input type="button" id="salir" name="salir" value="SALIR" style="width:100px" class="fg-button ui-state-default fg-button-icon-left" onClick="salir(this);">
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <center>
                                <br/>
                                <a href="/control/index.php/usuario/buscarUsuario">¿OLVIDÓ SU USUARIO Ó CLAVE?</a>
                                <br/>
                            </center>
                        </td>
                    </tr>
                </table>
            </center>
        </form>
        <br/>
        <br/>
    </div>
</div>
<br/>
<br/>
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
