<!--<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <br>
            <h2><strong>UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD &quot;HUGO CH&Aacute;VEZ FR&Iacute;AS&quot;</strong></h2>
            <br>
        </div>
        <div class="modal-body"><p><br>
            <p style='color: red;' class="blink_text" align="justify"><strong>
                    ESTIMADOS ESTUDIANTES SE LES RECUERDA:
                    <br>1.- LOS PAGOS PARA EL INCENTIVO DE LA BECA ESTUDIANTIL SE REALIZAR&Aacute;N S&Oacute;LO A CUENTAS BANCARIAS PERSONALES.
                    <br>2.- DEBEN CUIDAR LA TRANSCRIPCI&Oacute;N DE LOS 20 D&Iacute;GITOS DEL N&Uacute;MERO DE SU CUENTA.
                    <br>3.- DEBEN ABSTENERSE DE REGISTRAR: CUENTAS PERSONALES DE TERCEROS Y CUENTAS ASOCIADAS A OTRAS GRANDES MISIONES (MADRES DEL BARRIO, HIJOS DE VENEZUELA, ENTRE OTRAS).
                    <br> 

                </strong></p><br>
            <p>
                Desliza el cursor sobre los pasos de la ruta para ver las indicaciones de cada paso. </p><br></p>
        </div>
        <div class="modal-footer">
            <h3></h3>
        </div>
    </div>
</div>-->
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>REGISTRAR USUARIO - Formulario de Búsqueda</h1>
    </div>
    <br/>
    <div class="ui-corner-all ui-tabs-panel ui-widget-content ui-corner-bottom">
        <br/>
        <br/>
        <form method="POST" action="/control/index.php/buscar/buscar" name="buscarForm" id="buscarForm" onSubmit="return enviar()" autocomplete="off">
            <center>
                <table>
                    <tr>
                        <td colspan="3"> &nbsp;
                            <?php if ($sf_user->hasFlash('error')): ?>
                                <div class="error" style="display: none; background-color: #ffe6e6">
                                    <span>
                                        <center>
                                            <font color="red"><?php echo $sf_user->getFlash('error') ?></font>
                                        </center>
                                    </span></div>
                            <?php endif ?>
                            <?php if ($sf_user->hasFlash('notice')): ?>
                                <div class="error" style="display: none; background-color: #79b7e7">
                                    <span>
                                        <center>
                                            <font color="blue"><?php echo $sf_user->getFlash('notice') ?></font>
                                        </center>
                                    </span></div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td>TIPO DE IDENTIFICACIÓN:&nbsp;</td>
                        <td>
                            <select name="personati_id" id="personati_id"style="width:155px" required>
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
<br/>
<br/>
<center>
    <!--img src="/control/images/ruta.png" width="1100"/-->
    <img src="/control/images/registromatricula-ucs-2.jpg" alt="img" width="1300" height="788" usemap="#Map" border="0" />
    <map name="Map" id="Map">
        <area shape="poly" coords="772,419,855,269,830,235,841,179,807,162,788,172,779,182,768,184,700,160,667,152,634,148,615,148" href="#"/><span class="red"><strong>PASO 1 </strong><br><p style="text-align: justify;">Ingresa al sistema colocando la siguiente dirección en el navegador: www.ucs.gob.ve</p></span>
        <area shape="poly" coords="862,278,706,547,876,548,892,507,920,506,952,488,955,467,940,443,915,437,893,349" href="#" /><span class="purple"><strong>PASO 2 </strong><br><p style="text-align: justify;">Selecciona el tipo de documento de identidad e introduce el número de identificación y el código de verificación (sin distinción de mayúsculas o minúsculas).</p></span>
        <area shape="poly" coords="872,557,560,556,645,706,693,699,707,727,731,742,761,729,768,702,756,685,831,621" href="#" /><span class="orange"><strong>PASO 3 </strong><br><p style="text-align: justify;">Despliega cada una de las pestañas y suministra fidedignamente toda la información solicitada (NO OMITAS NINGÚN DATO).</p></span>
        <area shape="poly" coords="638,707,481,436,395,582,423,620,411,647,410,677,428,695,460,688,474,672,483,671,556,698" href="#" /><span class="yellow"><strong>PASO 4 </strong><br><p style="text-align: justify;">Puedes hacerlo de dos formas:<br>1 Escanea la fotografía <br>2 Captura la imagen <br> la foto debe ser de frente, con fondo blanco, medidas 4x3cm, formato jpg, tamaño del archivo debe ser menor a 2MB.</p></span>
        <area shape="poly" coords="389,572,547,306,376,306,354,351,315,354,296,380,310,412,338,419,360,512" href="#" /><span class="green"><strong>PASO 5 </strong><br><p style="text-align: justify;">Procede a imprimir:<br>1.- Planilla de matrícula con carnet estudiantil.<br>2.- Constancia de estudios <br> Recuerda revisar que todos los campos estén completos con los DATOS CORRECTOS<br> Preferiblemente imprime tus documentos a color.</p></span>
        <area shape="poly" coords="380,298,692,298,607,149,560,158,536,124,508,117,487,136,490,168,489,186,434,226" href="#" /><span class="blue"><strong>PASO 6 </strong><br><p style="text-align: justify;">Dirígete a la Dirección de Control de Estudios (Secretaría Docente) de tu Estado, presenta los documentos impresos con tu Documento de Identidad para completar la validación con la firma y sello del secretario(a) docente.
                <br>IMPORTANTE:<br>-En caso de que el Secretario(a) Docente indique que hay diferencias entre los datos suministrados en la Planilla de Matrícula y tu Documento de Identidad debes corregir el registro en el SIGE-UCS y volver a imprimir los documentos para su validación.<br>
                -Ten en cuenta que se requiere la firma y sello de la Dirección de Control de Estudios (Secretaría Docente) de tu Estado para validar satisfactoriamente tus documentos.</p></span>
    </map>
</center>

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
<script>
            function enviar() {
                return true;
                var form = document.getElementById("buscarForm");
                var valor = document.getElementById("identificacion").value;
                var d = new Date();
                var n = <?php echo date('N') ?>;
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
</script>
