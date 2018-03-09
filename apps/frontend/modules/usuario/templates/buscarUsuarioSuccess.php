<script type="text/javascript">
    function validar() {
        /* DECLARAR CAMPOS A VALIDAR */
        /** 	DECLARA PERSONA A VALIDAR		**/
        var_list1 = document.getElementById('pertid_id').selectedIndex;
        var_text1 = document.getElementById('persona_ide').value;
        var_text2 = document.getElementById('codigo').value;
        msj = ' ';
        /* VALIDAR DE CAMPOS */
        /** 	VALIDAR PERSONA			**/
        if(var_list1 == null || var_list1 == 0){
            alert('El campo Tipo de Identificacion no puede estar vacio');
            return false;
        }
        if (var_text1 == null || var_text1.length <= 3 || var_text1.length > 12) {
            msj = 'El campo Numero de Identificacion debe tener 3 caracteres minimo, maximo 50 \n';
        }
        
        if (var_text2 == null || var_text2.length <= 4 || var_text2.length > 5) {
            msj = msj + 'El campo Código debe tener 5 caracteres alfanuméricos \n';
            return false;
        }
        if (msj === ' ') {
            /*alert('Bienvenido/a al SIGE');*/
            return true;
        } else {
            alert(msj);
            return false;
        }
    }
</script>
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>RECUPERAR CLAVE - Formulario de Búsqueda</h1>
    </div>
    <br/>
    <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
        <br/>
        <br/>
        <form method="POST" action="/control/index.php/usuario/buscarUsuario" name="buscarForm" id="buscarForm" onSubmit="return validar()" autocomplete="off">
            <center>
                <table>
                    <tr>
                        <td colspan="3">
                            <?php if ($sf_user->hasFlash('error')): ?>
                                <div class="error" style="display: none; background-color: #ffe6e6">
                                    <span>
                                        <center>
                                            <font color="red"><?php echo $sf_user->getFlash('error') ?></font>
                                        </center>
                                    </span>
                                </div>
                            <?php endif ?>
                            <?php if ($sf_user->hasFlash('notice')): ?>
                                <div class="error" style="display: none; background-color: #79b7e7">
                                    <span>
                                        <center>
                                            <font color="blue"><?php echo $sf_user->getFlash('notice') ?></font>
                                        </center>
                                    </span>
                                </div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td>TIPO DE IDENTIFICACIÓN:&nbsp;</td>
                        <td>
                            <select name="personati_id" id="personati_id" style="width:155px" required>
                                <option value="">Seleccione</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="P">P</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="persona_ide" id="persona_ide" minlength="4" maxlength="12" pattern='[A-Z 0-9]{4,12}' style="width:155px" placeholder="Número de identificación" required>
                        </td>
                    </tr>
                    <tr>
                        <td>CÓDIGO DE VERIFICACIÓN:&nbsp;</td>
                        <td>
                            <?php echo '<img src="module' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
                        </td>
                        <td>
                            <input type="text" name="codigo" id="codigo" minlength="5" maxlength="5" pattern='[A-Z 0-9]{5,5}' style="width:155px" placeholder="Coloque Código de verificación" required>
                            <br/>No se distingue entre mayúsculas<br/>y minúsculas
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
                            <input type="submit"  id="buscar" name="buscar" value="BUSCAR" style="width:100px" class="fg-button ui-state-default fg-button-icon-left">
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
<!--<script>

            function enviar() {
                return true;
                var form = document.getElementById("buscarForm");
                var valor = document.getElementById("identificacion").value;
                var d = new Date();
                var n = <?php/* echo date('N')*/ ?>;
                var u = valor.substring(valor.length - 1, valor.length);
                if (valor.length == 0) {
                    alert('debe colocar el numero de identificacion!!!');
                    return false;
                } else {
                    if (n == 1) {
                        if (u == '0' || u == '1') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 0,1');
                            return false;
                        }
                    }
                    if (n == 2) {
                        if (u == '2' || u == '3') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 2,3');
                            return false;
                        }
                    }
                    if (n == 3) {
                        if (u == '4' || u == '5') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 4,5');
                            return false;
                        }
                    }
                    if (n == 4) {
                        if (u == '6' || u == '7') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 6,7');
                            return false;
                        }
                    }
                    if (n == 5) {
                        if (u == '8' || u == '9') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 8,9');
                            return false;
                        }
                    }
                    if (n == 6) {
                        if (u == '0' || u == '1' || u == '2' || u == '3' || u == '4') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 0,1,2,3,4');
                            return false;
                        }
                    }
                    if (n == 7) {
                        if (u == '5' || u == '6' || u == '7' || u == '8' || u == '9') {
                            return true;
                        } else {
                            alert('hoy le toca a los terminales 5,6,7,8,9');
                            return false;
                        }

                    }

                    alert(valor);
                }
            }
            var modal = document.getElementById('myModal');


// Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
//btn.onclick = function() {
//    modal.style.display = "block";
//}
            window.onload = function () {
                modal.style.display = "block";
            }

// When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

// When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
</script>-->
