<?php

/**
 * reporte actions.
 *
 * @package    ucs_control
 * @subpackage reporte
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeConstancia() {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
//    $this->estudiante=250;
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $data[0]['foto'];
        }
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Constancia de Estudios');
        $pdf->SetSubject('SIGE - Constancia de Estudios');
        $pdf->SetKeywords('SIGE, PDF, Constancia de Estudios');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 14, '', true);
        // Add a page
        // This method has several options, check the source code documentation for more information.
// set style for barcode
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $vence = '04-04-2017';
        switch ($mes) {
            case 1:
                $mes_letras = 'enero';
                break;
            case 2:
                $mes_letras = 'febrero';
                break;
            case 3:
                $mes_letras = 'marzo';
                break;

            case 4:
                $mes_letras = 'abril';
                break;

            case 5:
                $mes_letras = 'mayo';
                break;

            case 6:
                $mes_letras = 'junio';
                break;

            case 7:

                $mes_letras = 'julio';
                break;
            case 8:
                $mes_letras = 'agosto';
                break;

            case 9:
                $mes_letras = 'septiembre';
                break;

            case 10:
                $mes_letras = 'octubre';
                break;


            case 11:
                $mes_letras = 'noviembre';
                break;

            case 12:
                $mes_letras = 'diciembre';
                break;
        }
        $params2 = $pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L', '', '', 20, 20, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $code = '<tcpdf method="write1DBarcode" params="' . $params . '" />';
        $code2 = '<tcpdf method="write2DBarcode" params="' . $params2 . '" />';

        // ---------------------------------------------------------
        $pdf->AddPage();
        $html = '<div style="text-align:center"><img src="images/logo_ucs.jpg" width="300" /></div>
             <div style="text-align:center">REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br>
SECRETARIA GENERAL <br>
DIRECCIÓN GENERAL DE ADMISIÓN, CONTROL DE ESTUDIOS Y REGISTROS ACADEMICOS<br>
<b>DIRECCIÓN DE CONTROL DE ESTUDIOS</b><br><br>

<b>CONSTANCIA DE ESTUDIO</b><br><br>
</div>
        <span style="text-align:justify;">
            Quien suscribe <b>Ana Y. Montenegro N.</b>, Secretaria General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”, 
            por medio de la presente hace constar que el(la) ciudadano(a) ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' 
            ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ', de Nacionalidad __________________ titular del Documento de 
                Identidad CI/PP N° ' . $data[0]['identificacion'] . ', es estudiante activo (a)  del Programa Nacional de Formación en 
                Medicina Integral Comunitaria (PNFMIC). Actualmente, cursa el Período Académico 2017-I, comprendido entre el 09-01-2017 
                al 31-06-2017, en el siguiente horario: lunes a sábado de 8:00 a.m. a 12:00 a.m., y de 1:00 p.m., a 5:00 p.m., en el Área 
                de Salud Integral Comunitaria__________________, ubicada en la Parroquia ' . $data[0]['parroquia'] . ', Municipio ' . $data[0]['municipio'] . ' 
                    del  Estado ' . $data[0]['estado'] . '.  <br>

Constancia que se emite  a los ' . $dia . ' días del mes de ' . $mes . ' de ' . $year . '.
<br><br>
</span>
<div style="text-align:center">Atentamente,<br><br><br>

   <b>Prof. Ana Y. Montenegro N. <br>
Secretaria General <br>
Universidad de las Ciencias de la Salud “Hugo Chávez Frías”<br></b>
Según Resolución N°201 de fecha 29 de Julio de 2016<br>
Publicada en Gaceta Oficial N°40.956 de fecha 01 de Agosto de 2016<br>
<br><br>
Validado por: __________________________________<br>
Secretario (a) Docente del Programa Nacional de formación<br> en Medicina Integral Comunitaria 
<br><br>
</div>
<table><tr><td width="90%">
<p>Nota: Esta constancia de no contar con la firma y sello de la Direción de Control de Estudios del estado pierde su validez</p></td>
<td width="10%">' . $code2 . '</td></tr></table>
<div style="text-align:center"><img src="images/footer.jpg" height="100" width="1000"/></div>
';
        $pdf->SetFont('dejavusans', '', 11, '', true);
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->Output('matricula.pdf', 'I');
        throw new sfStopException();
    }

    public function edad($fecha) {
        $fecha = str_replace("/", "-", $fecha);
        $fecha = date('Y/m/d', strtotime($fecha));
        $hoy = date('Y/m/d');
        $edad = $hoy - $fecha;
        return $edad;
    }

    public function executeVerConstancia() {
        
    }

    public function executeConsEst() {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $data[0]['foto'];
        }
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Constancia de Estudios');
        $pdf->SetSubject('SIGE - Matrícula Premédico');
        $pdf->SetKeywords('SIGE, PDF, Matrícula, Premédico, Planilla,Inscripción');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 10, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 14, '', true);
        $pdf->AddPage();
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $vence = '04-04-2017';
        switch ($mes) {
            case 1:
                $mes_letras = 'enero';
                break;
            case 2:
                $mes_letras = 'febrero';
                break;
            case 3:
                $mes_letras = 'marzo';
                break;
            case 4:
                $mes_letras = 'abril';
                break;
            case 5:
                $mes_letras = 'mayo';
                break;
            case 6:
                $mes_letras = 'junio';
                break;
            case 7:
                $mes_letras = 'julio';
                break;
            case 8:
                $mes_letras = 'agosto';
                break;
            case 9:
                $mes_letras = 'septiembre';
                break;
            case 10:
                $mes_letras = 'octubre';
                break;
            case 11:
                $mes_letras = 'noviembre';
                break;
            case 12:
                $mes_letras = 'diciembre';
                break;
        }
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado,'EAN13', '', '', '', 18, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 50, 50, $style, 'N');
        $params2 = $pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L', '', '', 20, 20, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $code = '<tcpdf method="write1DBarcode" params="' . $params . '" />';
        $code2 = '<tcpdf method="write2DBarcode" params="' . $params2 . '" />';
        $html = '<div style="text-align:center"><img src="images/logo_ucs.jpg" width="300" /><br></div>
             <div style="text-align:center">REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br>
SECRETARIA GENERAL <br>
DIRECCIÓN GENERAL DE ADMISIÓN, CONTROL DE ESTUDIOS Y REGISTROS ACADEMICOS<br>
<b>DIRECCIÓN DE CONTROL DE ESTUDIOS</b><br><br>


<b>CONSTANCIA DE ESTUDIO</b><br>
</div>
        <span style="text-align:justify;">
            Quien suscribe <b>Ana Y. Montenegro N.</b>, Secretaria General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”, 
            por medio de la presente hace constar que el(la) ciudadano(a) <b> ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' 
            ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . '</b>, titular del Documento de 
                Identidad CI/PP N°<b>' . $data[0]['identificacion'] . '</b>, es estudiante activo (a)  del Programa Nacional de Formación en 
                Medicina Integral Comunitaria (PNFMIC). Actualmente, cursa el Período Académico 2018-I, comprendido entre el 17-9-2018
                al 31-12-2018, en el siguiente horario: lunes a sábado de 8:00 a.m. a 12:00 a.m., y de 1:00 p.m., a 5:00 p.m.,  en la Parroquia 
                ' . $data[0]['parroquia'] . ', del Municipio ' . $data[0]['municipio'] . ' del  Estado ' . strtoupper($data[0]['estado']) . '. 
            Constancia que se emite  a los ' . $dia . ' días del mes de ' . $mes_letras . ' de ' . $year . '.
<br>
</span>
<div style="text-align:center">Atentamente,<br>
<img src="images/sello.jpg" width="340" style="media: print; float: right;"/>
<img src="images/firma_ana.jpg" width="500"/><br>
   <b>Prof. Ana Y. Montenegro N. <br>
Secretaria General <br>
Universidad de las Ciencias de la Salud “Hugo Chávez Frías”<br></b>
Según Resolución N°201 de fecha 29 de Julio de 2016<br>
Publicada en Gaceta Oficial N°40.956 de fecha 01 de Agosto de 2016<br>
<br>
Validado por: __________________________________<br>
Secretario (a) Docente del Programa Nacional de formación<br> en Medicina Integral Comunitaria 
</div>
<table><tr><td width="90%">
<p>Nota: Esta constancia de no contar con la firma y sello de la Direción de Control de Estudios del estado pierde su validez</p></td>
<td width="10%">' . $code2 . '</td></tr></table>
<div style="text-align:center"><img src="images/footer.jpg" height="100" width="1000"/></div>
';
        $pdf->SetFont('dejavusans', '', 11, '', true);
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->Output('matricula.pdf', 'I');
        throw new sfStopException();
    }

    public function executeMostrarNotas(sfWebRequest $request) {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $data[0]['foto'];
        }
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Documento de Verificación');
        $pdf->SetSubject('SIGE - Verificación');
        $pdf->SetKeywords('SIGE, PDF, verificación');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage();
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $vence = '04-04-2017';
        switch ($mes) {
            case 1:
                $mes_letras = 'enero';
                break;
            case 2:
                $mes_letras = 'febrero';
                break;
            case 3:
                $mes_letras = 'marzo';
                break;
            case 4:
                $mes_letras = 'abril';
                break;
            case 5:
                $mes_letras = 'mayo';
                break;
            case 6:
                $mes_letras = 'junio';
                break;
            case 7:
                $mes_letras = 'julio';
                break;
            case 8:
                $mes_letras = 'agosto';
                break;
            case 9:
                $mes_letras = 'septiembre';
                break;
            case 10:
                $mes_letras = 'octubre';
                break;
            case 11:
                $mes_letras = 'noviembre';
                break;
            case 12:
                $mes_letras = 'diciembre';
                break;
        }
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado,'EAN13', '', '', '', 18, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 50, 50, $style, 'N');
        $params2 = $pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L', '', '', 20, 20, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $code = '<tcpdf method="write1DBarcode" params="' . $params . '" />';
        $code2 = '<tcpdf method="write2DBarcode" params="' . $params2 . '" />';
        $html = '<table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>ACTA DE VERIFICACIÓN ACADÉMICA <br><br>V COHORTE PNFMIC - ESTUDIANTES INTERNACIONALES</b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br><br>Hoy____de_______________de__________, en la ciudad de_________________ del estado__________________,
reunidos: el (la) Coordinador (a) CABES-PNFMIC, ___________________________ Doc. Identidad N°_________________,
el (la) Secretario (a) Docente del PNFMIC - Dirección de Control de Estudios _____________________________________
Doc. Identidad N°_______________, conjuntamente con el (la) Prof._________________________________________ Doc.
Identidad N°______________, constituidos como Comité de Verificación Académica de la V Cohorte de estudiantes
internacionales del PNFMIC, y ______________________________ Doc. Identidad N°____________, en calidad de Testigo
Estudiantil, con la finalidad de realizar una revisión exhaustiva a las Actas de Notas de cada una de las unidades curriculares
cursadas por: ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ', Doc. Identidad N°' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion'] . ', aspirante al título de Médico (a) Integral Comunitario (a),
CERTIFICAMOS: que las calificaciones obtenidas por este (a) último (a), se encuentran verificadas y marcadas como
correctas, en el Anexo 2-B que precede al presente documento. Específicamente, en la columna identificada como: SI SE
CORRESPONDE CON LA NOTA PLASMADA EN EL ACTA DE EXAMEN DE LA UNIDAD CURRICULAR, y también, en la columna
identificada como: CORRECCION CALIFICACIÓN DEFINITIVA QUE APARECE EN EL ACTA DE EXAMEN. La Corrección se
realizará sólo en el caso de que la nota reflejada en una o más unidades curriculares, no se correspondiera con la nota
reflejada en el acta de examen, y en este sentido, el Comité de Verificación procedió a plasmar la nota que efectivamente
estaba indicada en el acta de examen.</p></td></tr>
<tr><td align="center"><br><br><br><br>_______________________<br>Coordinador CABES-PNFMIC<br>Firma y Nro. Doc. Identidad <br><br><br><br>______________________________<br>Prof. (Equipo Promotor de la UCS)<br>Firma y  Nro. Doc. Identidad</td>
<td align="center"><br><br><br><br>______________________________<br>Secretario (a) Docente PNFMIC<br>Firma y Nro. Doc. Identidad<br><br><br><br>______________________________<br>Testigo Estudiantil<br>Firma y Nro. Doc. Identidad</td></tr>
<tr><td colspan="2" align="center"><br><br><br><b>SELLO<br>DIRECCIÓN DE CONTROL DE ESTUDIOS</b></td></tr>
<tr><td align="right" colspan="2"><br><br><br><b>Formato 02-A</b></td></tr>
            </table>';
        $pdf->SetFont('dejavusans', '', 9, '', true);
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetMargins(PDF_MARGIN_LEFT - 10, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 10);
        $pdf->AddPage();

        $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>DOCUMENTO DE VERIFICACIÓN ACADÉMICA </b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>Hoy____ de _________________________ de 20_____, el (la) estudiante: ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ', PORTADOR (A) DEL 
            DOCUMENTO DE IDENTIDAD Nº ' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion'] . ', hace entrega del  Documento de Verificación Académica ante la Secretaria Docente,  para que el Comité de Verificación Académica de la V Cohorte de estudiantes internacionales, procedan a la revisión de las notas obtenidas en cada una de las unidades curriculares que contempla el Plan de Estudios del PNFMIC. </p></td></tr>
            </table></font><br>
            <font size="8">
            <table border="1">
            <tr><td rowspan="2" width="3%" align="center">N</td><td rowspan="2" width="7%" align="center">CÓDIGO</td><td rowspan="2" width="45%" align="center">UNIDAD CURRÍCULAR</td><td rowspan="2" width="7%" align="center">PERÍODO<br>LECTIVO</td><td rowspan="2" width="6%" align="center">NOTA</td><td colspan="2" width="15%" align="center">Observación por parte del comité de verificación</td><td  rowspan="2" width="15%" align="center">
           Calificación Definitiva según el Acta de Examen </td></tr>
            <tr><td align="center">SI</td>
            <td align="center">NO</td></tr>';
        $this->identificacion = $this->getUser()->getAttribute('identificacion');
        $notas = NotasTable::getNotasGrado($this->identificacion);
        foreach ($notas as $data):
            $html2.='<tr><td align="center">' . $data['identificador'] . '</td><td align="center">' . $data['unidad_curricular'] . '</td><td align="center">' . $data['descripcion'] . '</td><td align="center">' . $data['periodo'] . '</td><td align="center">' . $data['nota'] . '</td>
             <td></td><td></td><td></td></tr>';
        endforeach;
        $html2.='</table><table>
    <tr><td align="center"><br><br><br>_______________________<br>Coordinador CABES-PNFMIC<br>Firma y Nro. Doc. Identidad </td><td align="center"><br><br><br>______________________________<br>Prof. (Equipo Promotor de la UCS)<br>Firma y  Nro. Doc. Identidad</td>
<td align="center"><br><br><br>______________________________<br>Secretario (a) Docente PNFMIC<br>Firma y Nro. Doc. Identidad</td><td align="center"><br><br><br>______________________________<br>Testigo Estudiantil<br>Firma y Nro. Doc. Identidad</td></tr>
<tr><td colspan="4" align="center"><br><br><br><b>SELLO<br>DIRECCIÓN DE CONTROL DE ESTUDIOS</b></td></tr>
<tr><td align="right" colspan="4"><b>Formato 02-B</b></td></tr>
            </table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage();
        $html3 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            
            <tr><td colspan="2"><br><br><br><br><b>INSTRUCCIONES PARA EL FORMATO 02-A</b>
<p style="text-align: justify">
<br>
1. El Acta de Verificación Académica, denominada como Formato 02-A para la V Cohorte PNFMIC de Estudiantes Internacionales, es uso exclusivo del Comité, el cual CERTIFICARÁ que las calificaciones obtenidas por el estudiante, se encuentran verificadas y marcadas como correctas en el Formato 02-B, que precede al presente documento.
<br>
2. El referido formato, debe ser descargado del SIGE por el estudiante y éste debe presentarlo y entregarlo a la Secretaría Docente del estado.
<br><br><br><br>

<b>INSTRUCCIONES PARA EL FORMATO 02-B</b><br><br>

1. El Documento de Verificación Académica, denominado Formato 02-B, será descargado del SIGE por el estudiantes, para que el mismo  proceda a la revisión de las notas obtenidas en cada una de las unidades curriculares que contempla el Plan de Estudios del PNFMIC.
<br>
2.  En el caso de que el (la) estudiante requiera realizar alguna observación en relación a: sus datos de identidad y/o sobre  las calificaciones señaladas en el Formato 02-B, deberá manifestarlo por escrito a la Secretaría Docente-Dirección de Control de Estudios al momento de consignarlo. De presentar observaciones sobre una o más calificaciones, el Comité de Verificación procederá a validar o no la (s) observación (es) presentada por el (la) estudiante, sólo a partir de la calificación  reflejada en el acta de examen de la unidad (es) curricular(es) a la cual hace referencia.  
<br>
3. En la columna para las observaciones realizadas por parte del Comité de Verificación al Formato 02-B, una vez revisada la nota contra el acta de examen, debe marcar SI con una equis (X) cuando  se corresponda con la nota plasmada en el acta de examen de la unidad curricular y debe marcar NO  con una equis (X) cuando se corresponda de manera negativa la nota plasmada en el acta de examen de la unidad curricular.
<br>
4. En la  columna para la calificación definitiva según el acta de examen: solo en los casos que la nota reflejada en el Formato 02-B,  no se corresponda con la nota reflejada en el acta de examen, el Comité de Verificación procederá a realizar la respectiva corrección, colocando la nota que aparece en el acta de examen.
<br>
<br>
NOTA: deben ser impresos dos (02) ejemplares de cada formato.</p></td></tr></table>';
        $pdf->writeHTML($html3, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();

//         $this->identificacion=$this->getUser()->getAttribute('identificacion');
//         $notas= NotasTable::getNotasGrado($this->identificacion);
//         
//         
//         echo 'aqui';
//         echo 'identificacion'.$this->identificacion;
//         echo '<pre>';
//         print_r($notas);
//         echo '</pre>';
//         exit();
    }

    public function executeMatricula() {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
//    $this->estudiante=250;
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 's_persona.jpg';
        } else {
            $foto = 's_' . $data[0]['foto'];
        }
//$foto='s_5f4082e7abcae8aa5032e90449a4e5a3d65ff487.jpg';
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Matrícula');
        $pdf->SetSubject('SIGE - Matrícula');
        $pdf->SetKeywords('SIGE, PDF, Matrícula');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 14, '', true);
        // Add a page
        // This method has several options, check the source code documentation for more information.
// set style for barcode
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');


        // ---------------------------------------------------------
        $pdf->AddPage();
        $html = '
<style>
    .clase {
        font-family: verdana;
        font-size: 8;
    }
</style>
<table border="1px;" width="100%"cellpadding="0" cellspacing="0" class="clase">
    <tr><td colspan="7" align="center"><img src="images/cintillo.jpg"/></td></tr>
    <tr><td colspan="6" width="80%" align="center">REPÚBLICA BOLIVARIANA DE VENEZUELA<br> 
            UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD "HUGO CHÁVEZ FRÍAS"<br>
            <b>PLANILLA DE MATRÍCULA AÑO ACADÉMICO 2018</b>
        </td><td width="20%"><img src="uploads/fotos/original/' . $foto . '" height="340" width="280" alt="foto"/></td></tr>
    <tr><td colspan="7" align="center"><b>DATOS PERSONALES</b></td></tr>
    <tr><td>PRIMER APELLIDO:<br>' . $data[0]['primer_apellido'] . '</td><td>SEGUNDO APELLIDO:<br>' . $data[0]['segundo_apellido'] . '</td><td>NOMBRES:<br>' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . '</td><td>GÉNERO:</td>
        <td>EDAD:<br>' . $edad . '</td><td>FECHA DE NACIMIENTO:<br>' . $fecha2 . '</td><td>ESTADO CIVIL:</td></tr>
    <tr><td colspan="2">NACIONALIDAD: ' . $data[0]['tipo_identificacion'] . '</td><td colspan="2">N. DE CÉDULA:' . $data[0]['identificacion'] . '</td><td colspan="3">PAÍS DE ORIGEN:</td></tr>
    <tr><td colspan="7">DIRECCIÓN: ' . $data[0]['direccion'] . '</td></tr>
    <tr><td colspan="2">ESTADO: ' . $data[0]['estado'] . '</td><td colspan="2">MUNICIPIO: ' . $data[0]['municipio'] . '</td><td colspan="3">PARROQUIA: ' . $data[0]['parroquia'] . '</td></tr>
    <tr><td colspan="2">TELÉFONO:' . $data[0]['telefono'] . '</td><td colspan="3">CORREO:' . $data[0]['correo_electronico'] . '</td><td colspan="2">TWITTER:</td></tr>
    <tr><td colspan="7" align="center"><b>UBICACIÓN DOCENTE</b></td></tr>
    <tr><td colspan="2">ESTADO:</td><td colspan="3">MUNICIPIO:</td><td colspan="2">ASIC:</td></tr>
    <tr><td colspan="2">PARROQUIA:</td><td colspan="3">NÚCLEO DOCENTE:</td><td colspan="2">PNF:</td></tr>
    <tr><td colspan="7">RATIFICACIÓN DE MATRÍCULA EN EL AÑO: 1___ 2___ 3___ 4___ 5___ 6___ </td></tr>
    <tr><td colspan="7" align="center"><b>CONDICIÓN DE RATIFICACIÓN</b></td></tr>
    <tr><td colspan="7">ESTUDIANTE NUEVO INGRESO: ______  REGULAR (CONTINUANTE):________ CONTINUANTE CON ARRASTRE ______ REINGRESO ______ REPITENTE ________  </td></tr>
    <tr><td colspan="7" align="center"><b>MOTIVO DE MATRÍCULA POR REINGESO</b></td></tr>
    <tr><td></td><td align="center" colspan="2">Solicitud Personal</td><td rowspan="4" colspan="2">Licencia Académica Por</td><td></td><td>Enfermedad</td></tr>
    <tr><td></td><td align="center" colspan="2">Aplicación de Medida Disciplinaria</td><td></td><td>Maternidad</td></tr>
    <tr><td></td><td align="center" colspan="2">Insuficiencia Académica</td><td></td><td>Problemas Personales</td></tr>
    <tr><td></td><td align="center" colspan="2">Deserción</td><td></td><td>Otro</td></tr>
</table>
<table border="0px;" width="100%"cellpadding="0" cellspacing="0" class="clase">
    <tr><td width="30%" align="center"><br><br><br>_________________________________<br> Firma y Sello<br> Dirección de Control de Estudios<br> Secretaría General</td>
        <td width="40%"></td>
        <td width="30%" align="center"><br><br><br>_________________________________<br> Estudiante</td></tr>
    <tr><td colspan="3"><br><br>NOTA: EL ESTUDIANTE DEBE IMPRIMIR DOS (02) EJEMPLARES DE ESTA PLANILLA. UNA DEBE SER ENTREGADA A LA SECRETARIA DOCENTE PARA SER ARCHIVADA EN SU EXPEDIENTE Y LA OTRA LA GUARDARÁ COMO CONSTANCIA DE LA FORMALIZACION DE LA MATRICULA.</td></tr>
</table>';
        $pdf->writeHTML($html, true, 0, true, true);
        if ($data[0]['n_ingreso'] == true) {
            $pdf->AddPage();
            $html2 = '<style>
    .clase {
        font-family: verdana;
        font-size: 8;
    }
</style>
<table  border="0px;" width="100%"cellpadding="0" cellspacing="0" class="clase">
    <tr><td><img src="images/cintillo.jpg"/></td></tr>
    <tr><td align="center"><br><br><br><b>CONSTANCIA DE APROBACIÓN</b></td></tr>
    <tr><td align="center"><br><br><b>I CURSO INTRODUCTORIO A LAS CIENCIAS DE LA SALUD 2017</b></td></tr>
    <tr><td><br><br><p style="text-align: justify">Por medio de la presente, se hace constar que el(la) ciudadano(a):' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' 
            ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ',  titular de la Cédula de Identidad N° ' . $data[0]['identificacion'] . ' ,  
    cursó y aprobó el I Curso  Introductorio a las Ciencias de la Salud 2017, en el estado: 
    _________________,municipio:_______________________, ASIC:_____________________, obteniendo 
    las siguientes calificaciones:</p> <br><br>
        </td></tr>
    <tr><td>
            <table border="1px;" width="100%"cellpadding="0" cellspacing="0" class="clase">
                <tr><td>EJES DE FORMACIÓN</td><td>UNIDADES CURRICULAES</td><td>NOTA(ESCALA 1-20)</td></tr>
                <tr><td>Comunicacional</td><td>COMUNICACIÓN Y TÉCNICAS DE ESTUDIO PARA EL APRENDIZAJE (CTEA)
</td><td></td></tr>
                <tr><td rowspan="3">Científico Técnico</td><td>BIOLOGÍA (BIO)</td><td></td></tr>
                <tr><td>FÍSICA BÁSICA (FB)</td><td></td></tr>
                <tr><td>QUÍMICA (QUÍ)</td><td></td></tr>
                <tr><td>Razonamiento Lógico Matemático</td><td>MATEMÁTICA BÁSICA (MB)</td><td></td></tr>
                <tr><td rowspan="2">Socio Político</td><td>REALIDAD SOCIOPOLÍTICA Y  PENSAMIENTO LATINOAMERICANO (RSPL)
</td><td></td></tr>
                <tr><td>PROYECTO NACIONAL Y NUEVA  CIUDADANÍA (PNNC)</td><td></td></tr>
                <tr><td >Práctico</td><td>INTRODUCCIÓN AL SISTEMA PÚBLICO NACIONAL DE SALUD (ISPNS) E INTRODUCCIÓN AL CONSULTORIO DE BARRIO ADENTRO (ICBA)</td><td></td></tr>
                <tr><td colspan="2" align="center"><b>CALIFICACIÓN INTEGRAL DEFINITIVA</b></td><td></td></tr>
                <tr><td colspan="3">
                    Observaciones:
                    <br>
                    <br><br><br><br><br>
                    ____________________________  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ______________________________<br>
                    SECRETARIO DOCENTE
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    COORDINADOR CABES<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    SELLO<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    FECHA:___/___/____
                        <br><br>
                    </td></tr>
            </table></td></tr>
</table>';
            $pdf->writeHTML($html2, true, 0, true, true);
        }
        $pdf->SetFont('dejavusans', '', 11, '', true);

        $pdf->Output('matricula.pdf', 'I');
        throw new sfStopException();
    }

    public function executeMostrarNotas2(sfWebRequest $request) {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $data[0]['foto'];
        }
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Documento de Verificación');
        $pdf->SetSubject('SIGE - Verificación');
        $pdf->SetKeywords('SIGE, PDF, verificación');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage();
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $vence = '04-04-2017';
        switch ($mes) {
            case 1:
                $mes_letras = 'enero';
                break;
            case 2:
                $mes_letras = 'febrero';
                break;
            case 3:
                $mes_letras = 'marzo';
                break;
            case 4:
                $mes_letras = 'abril';
                break;
            case 5:
                $mes_letras = 'mayo';
                break;
            case 6:
                $mes_letras = 'junio';
                break;
            case 7:
                $mes_letras = 'julio';
                break;
            case 8:
                $mes_letras = 'agosto';
                break;
            case 9:
                $mes_letras = 'septiembre';
                break;
            case 10:
                $mes_letras = 'octubre';
                break;
            case 11:
                $mes_letras = 'noviembre';
                break;
            case 12:
                $mes_letras = 'diciembre';
                break;
        }
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado,'EAN13', '', '', '', 18, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 50, 50, $style, 'N');
        $params2 = $pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L', '', '', 20, 20, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $code = '<tcpdf method="write1DBarcode" params="' . $params . '" />';
        $code2 = '<tcpdf method="write2DBarcode" params="' . $params2 . '" />';
        $html = '<table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>ACTA DE VERIFICACIÓN ACADÉMICA <br><br>VII COHORTE PNFMIC</b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br><br>Hoy____ de _________________________ de 20________, reunidos: el (la) 
            Secretario (a) Docente PNFMIC ____________________________ Doc. Ident. N° ____________, el (la) Director (a) de Secretaría UCS
             ___________________________________ Doc. Ident. N°_______________, del estado ___________________ , conjuntamente con los (las) 
             Profesores (as)____________________________ Doc. Ident. N°______________ y _______________________________ Doc. Ident. 
             N°______________, respectivamente, designados como Comité de Verificación Académica de la VII Cohorte del  PNFMIC, y 
             ______________________________ Doc. Identidad N°____________, en calidad de Testigo Estudiantil, con la finalidad de 
             realizar una revisión exhaustiva a las Actas de Exámenes de cada una de las unidades curriculares cursadas  por: 
             ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ', 
             Doc. Identidad N°' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion'] . ', 
             aspirante al título de Médico (a) Integral Comunitario (a),
CERTIFICAMOS: que las calificaciones obtenidas por este (a) último (a), se encuentran verificadas y marcadas como
correctas, en el Anexo 2-B que precede al presente documento. Específicamente, en la columna identificada como: SI SE
CORRESPONDE CON LA NOTA PLASMADA EN EL ACTA DE EXAMEN DE LA UNIDAD CURRICULAR, y también, en la columna
identificada como: CORRECCION CALIFICACIÓN DEFINITIVA QUE APARECE EN EL ACTA DE EXAMEN. La Corrección se realizó sólo en el caso de que la nota 
reflejada en una o más unidades curriculares, no se  correspondiera con la nota reflejada en el acta de examen, y en este sentido, el Comité 
de Verificación procedió a plasmar la nota que efectivamente estaba indicada en el acta de examen.</p></td></tr>
<tr><td align="center"><br><br><br><br>_______________________<br>Secretario (a) Docente MMC<br>Firma y Nro. Doc. Identidad <br><br><br><br>______________________________<br>Prof. <br>Firma y  Nro. Doc. Identidad</td>
<td align="center"><br><br><br><br>______________________________<br>Director de Secretaría<br>Firma y Nro. Doc. Identidad  <br><br><br><br>______________________________<br>Prof. <br>Firma y  Nro. Doc. IdentidadProf. <br>Firma y  Nro. Doc. Identidad</td></tr>
<tr><td align="center"><br><br><br><br>______________________________<br>Testigo Estudiantil</td><td align="center"><br><br><br><b>SELLO<br>DIRECCIÓN DE CONTROL DE ESTUDIOS</b></td></tr>
<tr><td align="right" colspan="2"><br><br><br><b>Formato 02-A</b></td></tr>
            </table>';
        $pdf->SetFont('dejavusans', '', 9, '', true);
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetMargins(PDF_MARGIN_LEFT - 10, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 10);
        $pdf->AddPage();

        $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>DOCUMENTO DE VERIFICACIÓN ACADÉMICA </b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>Hoy____ de _________________________ de 20_____, el (la) estudiante: ' . $data[0]['primer_nombre'] . ' ' . $data[0]['segundo_nombre'] . ' ' . $data[0]['primer_apellido'] . ' ' . $data[0]['segundo_apellido'] . ', PORTADOR (A) DEL 
            DOCUMENTO DE IDENTIDAD Nº ' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion'] . ', hace entrega del  Documento de Verificación Académica ante la Secretaria Docente,  para que el Comité de Verificación Académica de la VII Cohorte, procedan a la revisión de las notas obtenidas en cada una de las unidades curriculares que contempla el Plan de Estudios del PNFMIC. </p></td></tr>
            </table></font><br>
            <font size="8">
            <table border="1">
            <tr><td rowspan="2" width="3%" align="center">N</td><td rowspan="2" width="10%" align="center">CÓDIGO</td><td rowspan="2" width="45%" align="center">UNIDAD CURRÍCULAR</td><td rowspan="2" width="7%" align="center">PERÍODO<br>LECTIVO</td><td rowspan="2" width="6%" align="center">NOTA</td><td colspan="2" width="15%" align="center">Observación por parte del comité de verificación</td><td  rowspan="2" width="12%" align="center">
           Calificación Definitiva según el Acta de Examen </td></tr>
            <tr><td align="center">SI</td>
            <td align="center">NO</td></tr>';
        $this->identificacion = $this->getUser()->getAttribute('identificacion');
        $this->id = $this->getUser()->getAttribute('estudiante_id');
        $notas = NotasTable::getNotasGrado2($this->id);
        $nro = 0;
        foreach ($notas as $data):
            $nro++;
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['unidad_curricular'] . '</td>
            <td align="center">' . $data['descripcion'] . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
             <td></td><td></td><td></td></tr>';
        endforeach;
        $html2.='</table><table>
    <tr>
    <td align="center"><br><br><br>_______________________<br>Sec. Doc. MMC<br>Firma y Nro. Doc. Identidad </td>
    <td align="center"><br><br><br>_______________________<br>Director de Secretaría UCS<br>Firma y  Nro. Doc. Identidad</td>
    <td align="center"><br><br><br>_______________________<br>Profesor(a)<br>Firma y Nro. Doc. Identidad</td>
    <td align="center"><br><br><br>_______________________<br>Profesor(a)<br>Firma y Nro. Doc. Identidad</td></tr>
 <tr>
    <td colspan="2" align="center"><br><br><b>_______________________<br>Testigo Estudiantil<br>Firma y Nro. Doc. Identidad</b></td>
    <td align="center"><br><br><b>SELLO<br>DIRECCIÓN DE CONTROL DE ESTUDIOS</b></td><td align="right" ><b>Formato 02-B</b></td></tr>
            </table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage();
        $html3 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            
            <tr><td colspan="2"><br><br><br><br><b>INSTRUCCIONES PARA EL FORMATO 02-A</b>
<p style="text-align: justify">
<br>
1. El Acta de Verificación Académica del Estudiante, denominada como Formato 02-A para la VII Cohorte PNFMIC, es de uso exclusivo del Comité de Verificación, el cual CERTIFICARÁ que las calificaciones obtenidas por el estudiante, se encuentran verificadas y marcadas como correctas en el Formato 02-B, que precede al presente documento.<br>
2. El referido formato, debe ser descargado del SIGE por el estudiante y éste, debe presentarlo y entregarlo a la Secretaría Docente del estado donde culminó sus estudios de pregrado<br><br><br><br>

<b>INSTRUCCIONES PARA EL FORMATO 02-B</b><br><br>

1. El Documento de Verificación Académica del Estudiante, denominado Formato 02-B, será descargado del SIGE por el estudiante, quien debe proceder a la revisión de las notas obtenidas en cada una de las unidades curriculares que contempla el Plan de Estudios del PNFMIC.<br>
2. En el caso de que el (la) estudiante requiera realizar alguna observación en relación a: sus datos de identidad y/o sobre las calificaciones señaladas en el Formato 02-B, deberá manifestarlo por escrito a la Secretaría Docente MMC y a la Dirección de Secretaria UCS. De presentar observaciones sobre una o más calificaciones, <u>el Comité de Verificación procederá a validar o no la (s) observación (es) presentada por el (la) estudiante, sólo a partir de la calificación  reflejada en el acta de examen de la unidad (es) curricular(es) a la cual (es) hace referencia.</u><br>
3. En la columna identificada como: Observaciones por parte del Comité de Verificación, una vez revisada la nota contra el acta de examen, debe marcar SI con una equis (X) cuando  se corresponda con la nota plasmada en el acta de examen de la unidad curricular y debe marcar NO con una equis (X) cuando no se corresponda a la nota plasmada en el acta de examen de la unidad curricular.<br>
4. En la columna identificada como: Corrección: calificación definitiva que aparece en el acta de examen, el Comité de
Verificación procederá a realizar la respectiva corrección, colocando la nota que aparece en el acta de examen, sólo en los
casos en que la nota reflejada en el acta de examen no se corresponda con la nota reflejada en el Formato 02-B.
<br>
<br>
NOTA: deben ser impresos dos (02) ejemplares de cada formato.</p></td></tr></table>';
        $pdf->writeHTML($html3, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
    }

    public function executeCarnet(sfWebRequest $request) {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->data = EstudianteTable::buscarEstudiante($this->estudiante);
        header('Content-Type: image/png');
        header("Cache-Control: no-cache, must-revalidate");
        $cedula = $this->data[0]['identificacion'];
        $server='http://localhost/';
        $pathImg =$server.'control/images/';
        $width = 1338;
        $height = 408;
        $base = imagecreatetruecolor($width, $height);
        $black = ImageColorAllocate($base, 0, 0, 0);
        $white = ImageColorAllocate($base, 255, 255, 255);
        imagefill($base, 0, 0, $white);
        $fondo = imagecreatefrompng($pathImg.'base_carnet.png');
        imagecopyresampled($base, $fondo, 0, 0, 0, 0, $width, $height, imagesx($fondo), imagesy($fondo));
        $normal = dirname(__FILE__).'/../util/arial.ttf';
        $bold = dirname(__FILE__).'/../util/arialbd.ttf';
        $largo_pro=  strlen($this->data[0]['pnf']);
        $x = ($width/4)-($largo_pro*5.5);
        $y=($height/4)+($height/4.5);
        imagettftext($base, 14, 0, $x, $y-60, $black, $bold, $this->data[0]['pnf']);
//nombre y apellido
        $x_str_nombre = 455;
        $y_str_nombre = 180;
        $interLine = 22;
        $largo_nombre=  strlen($this->data[0]['primer_nombre'])*14;
        $largo_apellido=  strlen($this->data[0]['primer_apellido'])*14;
        imagettftext($base, 14, 0, $x_str_nombre-$largo_nombre, $y_str_nombre, $black, $normal, $this->data[0]['primer_nombre']);
        imagettftext($base, 14, 0, $x_str_nombre-$largo_apellido, $y_str_nombre + $interLine, $black, $normal, $this->data[0]['primer_apellido']);
//cedula
        $y_str_cedula = 224;
        $largo_identificacion=  strlen($this->data[0]['tipo_identificacion'] . '-' . $this->data[0]['identificacion'])*12;
        imagettftext($base, 14, 0, $x_str_nombre-$largo_identificacion, $y_str_cedula, $black, $normal, $this->data[0]['tipo_identificacion'] . '-' . $this->data[0]['identificacion']);
//estado
        $y_str_cedula = 246;
        $largo_estado=  strlen($this->data[0]['estado'])*14;
        imagettftext($base, 14, 0, $x_str_nombre-$largo_estado, $y_str_cedula, $black, $normal, $this->data[0]['estado']);
////foto
        $foto_path=$server.'control/uploads/fotos/original/';
        $image_foto = imagecreatefromjpeg($foto_path.'s_'.$this->data[0]['foto']);
        $x_foto = 465;
        $y_foto = 165;
        imagecopyresampled($base, $image_foto, $x_foto, $y_foto, 0, 0, 159, 172, imagesx($image_foto), imagesy($image_foto));
//fecha vencimiento
        $x_vence = 490;
        $y_vence = 385;
        imagettftext($base, 10, 0, $x_vence, $y_vence, $black, $bold, 'Vence: 31-12-'. ((date('Y'))));
        imagepng($base);
        throw new sfStopException();
    }
        public function executeMostrarSenamecf(sfWebRequest $request) {
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $data = EstudianteTable::buscarEstudiante($this->estudiante);
        $edad = $this->edad($data[0]['fecha_nacimiento']);
        $fecha2 = date("d-m-Y", strtotime($data[0]['fecha_nacimiento']));
        $encript = new crypt();
        $encriptado = $encript->encriptar($data[0]['id'] . '-' . $data[0]['tipo_identificacion'] . '-' . $data[0]['identificacion']);
        if ($data[0]['foto'] == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $data[0]['foto'];
        }
        if ($data[0]['tipo_identificacion'] == 'V') {
            $tipo_identificacion = 'CÉDULA';
        }
        if ($data[0]['tipo_identificacion'] == 'P') {
            $tipo_identificacion = 'PASAPORTE';
        }
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Documento de Verificación');
        $pdf->SetSubject('SIGE - Verificación');
        $pdf->SetKeywords('SIGE, PDF, verificación');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage();
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $vence = '04-04-2017';
        switch ($mes) {
            case 1:
                $mes_letras = 'enero';
                break;
            case 2:
                $mes_letras = 'febrero';
                break;
            case 3:
                $mes_letras = 'marzo';
                break;
            case 4:
                $mes_letras = 'abril';
                break;
            case 5:
                $mes_letras = 'mayo';
                break;
            case 6:
                $mes_letras = 'junio';
                break;
            case 7:
                $mes_letras = 'julio';
                break;
            case 8:
                $mes_letras = 'agosto';
                break;
            case 9:
                $mes_letras = 'septiembre';
                break;
            case 10:
                $mes_letras = 'octubre';
                break;
            case 11:
                $mes_letras = 'noviembre';
                break;
            case 12:
                $mes_letras = 'diciembre';
                break;
        }
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado,'EAN13', '', '', '', 18, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 50, 50, $style, 'N');
        $params2 = $pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L', '', '', 20, 20, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position' => 'C', 'border' => false, 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
        $code = '<tcpdf method="write1DBarcode" params="' . $params . '" />';
        $code2 = '<tcpdf method="write2DBarcode" params="' . $params2 . '" />';
       
        $pdf->SetFont('dejavusans', '', 9, '', true);
       // $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetMargins(PDF_MARGIN_LEFT - 10, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 10);
        //$pdf->AddPage();

        $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>DOCUMENTO DE VERIFICACIÓN ACADÉMICA </b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>Hoy_______ de _________________________ de 20______, el (la) estudiante: '.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_nombre'].' , portador (a) del Documento de Identidad N.º '.$data[0]['identificacion'].', hace entrega del  Documento de Verificación Académica de la I Cohorte PNFA-PF, ante la Dirección de Acreditación y Certificacióndel SENAMECF,  para que el Comité de Verificación Académica procedan a la revisión de las calificaciones obtenidas en cada una de las Unidades Curriculares que contempla el Plan de Estudios del Programa Nacional de Formación Avanzada en Patología Forense.</p></td></tr>
            </table></font><br>
            <font size="8">
            <table border="1">
            <tr><td rowspan="2" width="3%" align="center">N</td><td rowspan="2" width="10%" align="center">CÓDIGO</td><td rowspan="2" width="45%" align="center">UNIDAD CURRÍCULAR</td><td rowspan="2" width="7%" align="center">PERÍODO<br>LECTIVO</td><td rowspan="2" width="6%" align="center">NOTA</td><td colspan="2" width="15%" align="center">Observación por parte del comité de verificación</td><td  rowspan="2" width="12%" align="center">
           Calificación Definitiva según el Acta de Examen </td></tr>
            <tr><td align="center">SI</td>
            <td align="center">NO</td></tr>';
        $this->identificacion = $this->getUser()->getAttribute('identificacion');
        $this->id = $this->getUser()->getAttribute('estudiante_id');
        $notas = NotasTable::getNotasGrado2($this->id);
        $nro = 0;
        foreach ($notas as $data):
            $nro++;
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['unidad_curricular'] . '</td>
            <td align="center">' . $data['descripcion'] . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
             <td></td><td></td><td></td></tr>';
        endforeach;
        $html2.='</table><table>
    <tr>
    <td align="center"><br><br><br>_______________________<br>Directora de Acreditación, Certificación y Desarrollo <br>Avanzado Científico Forense<br>Firma y Nro. Doc. Identidad </td>
    <td align="center"><br><br><br>_______________________<br>Coordinadora Formación y Desarrollo Avanzado <br> Científico Forense <br>Firma y Nro. Doc. Identidad</td>
    <td colspan="2" align="center"><br><br><br>_______________________<br>Docente. Medico Patologo (a).<br>Firma y Nro. Doc. Identidad</td>
    </tr>
 <tr>
    <td colspan="2" align="center"><br><br>_______________________<br>Vocero Estudiantil<br>Firma y Nro. Doc. Identidad</td>
    <td colspan="2" align="center"><br><br>_______________________<br>Vocero Estudiantil<br>Firma y Nro. Doc. Identidad</td><td align="right" ><b>Formato 02-B</b></td></tr>
    <tr><td colspan="4" align="center"><br><br><br><br>SELLO</td></tr>
            </table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        
//        $pdf->writeHTML($html3, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
    }

}
