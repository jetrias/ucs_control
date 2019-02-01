<?php

/**
 * reporte actions.
 *
 * @package    ucs_control
 * @subpackage reporte
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  public function executeReporteEstado(sfWebRequest $request){
      //select estados
      $this->estado=  EstadoTable::getEstado();
      //<option value="audi" selected>Audi</option>
      
  }
  public function executeMostrarReporteEstado(sfWebRequest $request){
      ini_set('max_execution_time', 300);
        $this->estado = $this->getRequestParameter('estado');
        $this->estudiantes = EstudianteTable::obtener_estudiante_estado($this->estado);
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Notas');
        $pdf->SetSubject('SIGE - Notas');
        $pdf->SetKeywords('SIGE, PDF, Notas');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage('P', 'A4');
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        foreach($this->estudiantes as $data):
         $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> Dirección General de Control de Estudios</font></td></tr>
            <tr><td colspan="2" align="center"><b>CERTIFICACIÓN DE CALIFICACIONES</b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>
       Quien suscribe, la Secretaría General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”,
       certifica que el ciudadano:  <strong>'.$data['primer_nombre'].' '.$data['segundo_nombre'].' '.$data['primer_apellido'].' '.$data['segundo_apellido'].'</strong>, titular del Documento de Identidad 
       N° <strong>'.$data['tipo_identificacion'].'-'.$data['identificacion'].'</strong>, quien cursó y aprobó las unidades curriculares del Plan de Estudio del  
       <strong>Programa Nacional de Formación en Medicina Integral Comunitaria</strong>, para optar al título de: 
       <strong>Médico (a) Integral Comunitario (a)</strong>, obtuvo las siguientes calificaciones: 
       
</p></td></tr>
            </table></font><br>
            <font size="8">
            <table border="1">
            <tr><td width="3%" align="center">N</td><td width="15%" align="center">CÓDIGO</td><td width="66%" align="center">UNIDAD CURRÍCULAR</td><td width="10%" align="center">PERÍODO<br>LECTIVO</td><td width="6%" align="center">NOTA</td></tr>';
        $notas = NotasTable::getNotasGrado2($data['id']);
        $nro = 0;
        $sum_notas=0;
        foreach ($notas as $data):
            $nro++;
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['cod_ubv'] . '</td>
            <td>' . $this->titleCase($data['descripcion']) . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
            </tr>';
            $sum_notas.=intval($sum_notas)+intval($data['nota']);
        endforeach;
        $promedio=$sum_notas/$nro;
        $html2.='</table>
            </table>
<br/><br/>
<table><tr><td>
<p align="justify">
La escala de calificaciones es del 1 al 20, siendo la mínima aprobatoria de 12 puntos.
Certificación que se expide al solicitante por parte de la Secretaría General de la Universidad de la Ciencias de la Salud “Hugo Chávez Frías”, a los Ocho (8) días del mes de mayo del año Dos Mil Dieciocho (2018).
</p>'.$promedio.'
</td></tr></table><br/>
<table><tr><td><font size="8"><i>im/AM</i>
<p align="right"><i><strong>Sin sello no tiene válidez</strong></i>
</p></font>
</td></tr>
<tr><td align="center"><strong>Prof. Ana Y. Montenegro N.<br/>Secretaria General UCS</strong>
</td></tr>
</table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage('P', 'A4');
    endforeach;
        //$pdf->writeHTML($html2, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
  }
  function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
    {
        /*
         * Exceptions in lower case are words you don't want converted
         * Exceptions all in upper case are any words you don't want converted to title case
         *   but should be converted to upper case, e.g.:
         *   king henry viii or king henry Viii should be King Henry VIII
         */
        $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
        foreach ($delimiters as $dlnr => $delimiter) {
            $words = explode($delimiter, $string);
            $newwords = array();
            foreach ($words as $wordnr => $word) {
                if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtoupper($word, "UTF-8");
                } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtolower($word, "UTF-8");
                } elseif (!in_array($word, $exceptions)) {
                    // convert to uppercase (non-utf8 only)
                    $word = ucfirst($word);
                }
                array_push($newwords, $word);
            }
            $string = join($delimiter, $newwords);
       }//foreach
       return $string;
    }
    public function executeMostrarReporteSenamecf(sfWebRequest $request){
      ini_set('max_execution_time', 300);
       // $this->estado = $this->getRequestParameter('estado');
        $this->estudiantes = EstudianteTable::obtener_estudiante_senamecf();
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGE');
        $pdf->SetTitle('Notas');
        $pdf->SetSubject('SIGE - Notas');
        $pdf->SetKeywords('SIGE, PDF, Notas');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage('P', 'A4');
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        foreach($this->estudiantes as $data):
         $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> DIRECCIÓN GENERAL DE CONTROL DE ESTUDIOS</font></td></tr>
            <tr><td colspan="2" align="center"><b>CERTIFICACIÓN DE CALIFICACIONES </b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>
Quien suscribe, la Secretaría General de la Universidad de las Ciencias de la Salud 
“Hugo Chávez Frías”, certifica que el(la) ciudadano(a): '.$data['primer_nombre'].' '.$data['segundo_nombre'].' '.$data['primer_apellido'].' '.$data['segundo_apellido'].', 
    titular del Documento de Identidad N° '.$data['identificacion'].', quien cursó y aprobó las unidades curriculares del Plan de Estudios del Programa Nacional de Formación Avanzada en Patología Forense, para optar al título de: ESPECIALISTA EN PATOLOGÍA FORENSE, obtuvo las siguientes calificaciones:            
 </p></td></tr>
            </table></font><br>
            <font size="8">
            <table border="1" cellpadding="10">
            <tr><td width="6%" align="center">N</td><td  width="20%" align="center">CÓDIGO</td>
            <td  width="50%" align="center">UNIDAD CURRÍCULAR</td><td  width="10%" align="center">PERÍODO<br>LECTIVO</td><td  width="14%" align="center">CALIFICACIÓN</td></tr>
            ';
        $notas = NotasTable::getNotasGrado2($data['id']);
        $nro = 0;
        $ia=0;
        foreach ($notas as $data):
            $nro++;
            $ia=$ia+$data['nota'];
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['cod_ubv'] . '</td>
            <td align="center">' . $this->titleCase($data['descripcion']) . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
             </tr>';
        endforeach;
        $indice=$ia/$nro;
        $html2.='</table><br><br><br><table>
            <tr><td colspan="3"><p align="justify">La escala de calificaciones es del 1 al 20, siendo la mínima aprobatoria de 10 puntos. Certificación que se expide al solicitante por parte de la Secretaría General de la Universidad de la Ciencias de la Salud “Hugo Chávez Frías”, a los Ocho (08) días del mes de agosto del año Dos Mil Dieciocho (2018).</p></td></tr>
    <tr><td align="center" width="20%"></td><td align="center" width="60%"><br/><br/><br/>ÍNDICE ACADÉMICO: '.number_format($indice, 2, '.', '').'<br>
EL TOTAL DE UNIDADES DE CRÉDITOS REQUERIDAS PARA EGRESAR ES DE: '.$nro.'
</td><td align="center" width="20%"></td></tr>
    <tr><td align="center" width="20%">im/AYMN</td><td align="center" width="60%"></td><td align="center" width="20%">sin sello no tiene válidez</td></tr>
    <tr><td align="center" width="20%"></td><td align="center" width="60%"><br/><br/><br/><br/><br/><br/>ANA YADIRA MONTENEGRO NAVAS<br>

SECRETARIA GENERAL <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”
</td><td align="center" width="20%"></td></tr>
            </table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage('P', 'A4');
    endforeach;
        //$pdf->writeHTML($html2, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
  }
}
