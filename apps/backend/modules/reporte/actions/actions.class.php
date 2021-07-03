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
	$this->periodo = $this->getRequestParameter('periodo');
        $this->estudiantes = EstudianteTable::obtener_estudiante_estado_periodo($this->estado,$this->periodo); 
//echo $this->estado.' '.$this->periodo;
//print_r($this->estudiantes);
//exit();
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
        $pdf->AddPage('P', 'F4');
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
            <tr><td colspan="2" align="center"><b>NOTAS CERTIFICADAS</b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>
       Quien suscribe, la Secretaría General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”,
       certifica que el ciudadano(a):  <strong>'.$data['primer_nombre'].' '.$data['segundo_nombre'].' '.$data['primer_apellido'].' '.$data['segundo_apellido'].'</strong>, titular del Documento de Identidad 
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
            $sum_notas=$sum_notas+$data['nota'];
        endforeach;
        $promedio=$sum_notas/$nro;
        $promedio2=number_format((float)$promedio, 2, '.', '');
        $html2.='</table>
            </table> <br/><br/> <table><tr><td> <p align="justify"> La escala de calificaciones es del 1 al 20, siendo la mínima aprobatoria de 12 puntos. 
Certificación que se expide al solicitante por parte de la Secretaría General de la Universidad de la Ciencias de la Salud “Hugo Chávez Frías”, en fecha 
'.date('d-m-Y').'. </p> Indice Académico: <strong>'.$promedio2.'</strong>. El total de unidades curriculares 
requeridas para egresar es de 49. </td></tr></table><br/> <table><tr><td><font size="8"><i>MA/mi</i> <p align="right"><i><strong>Sin sello no tiene 
validez</strong></i> </p></font> </td></tr> <tr><td align="center"><strong>Prof. Ana Y. Montenegro N.<br/>Secretaria General UCS</strong> </td></tr> </table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage('P', 'F4');
    endforeach;
        //$pdf->writeHTML($html2, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
  }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function executeMostrarReporteEstadoV(sfWebRequest $request){
    ini_set('max_execution_time', 300);
      $this->estado = $this->getRequestParameter('estado');
  $this->periodo = $this->getRequestParameter('periodo');
      $this->estudiantes = EstudianteTable::obtener_estudiante_estado_periodo($this->estado,$this->periodo);
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
      $pdf->AddPage('P', 'F4');
      $style = array(
          'border' => 2,
          'vpadding' => 'auto',
          'hpadding' => 'auto',
          'fgcolor' => array(0, 0, 0),
          'bgcolor' => false, //array(255,255,255)
          'module_width' => 1, // width of a single module in points
          'module_height' => 1 // height of a single module in points
      );
      if($this->periodo=="ELAM-9"){
          $cohorte='VIII cohorte ELAM';
          $pnf='VIII COHORTE PNFMIC ELAM';
          $comite='VIII Cohorte del  PNFMIC - ELAM';
      }else{
          $cohorte='X cohorte';
          $pnf='X COHORTE PNFMIC';
          $comite='X Cohorte del  PNFMIC';
      }
      $html='<br><br><font size="8"><table>
      <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
      Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> Dirección General de Control de Estudios<br>
      <strong>FORMATO O2-A</strong></font></td></tr>
      <tr><td colspan="2" align="center"><b>ACTA DE VERIFICACIÓN ACADÉMICA DEL ESTUDIANTE <br>'.$pnf.'</b></td></tr>
      <tr><td colspan="2"><p style="text-align: justify"><br>
      Hoy____ de _________________________ de 20________, reunidos: el (la) Secretario (a) Docente PNFMIC
       ____________________________ Doc. Ident. N° ____________, el (la) Director (a) de Secretaría UCS 
       ___________________________________ Doc. Ident. N°_______________, del estado ___________________, 
       conjuntamente con los (las) Profesores (as)____________________________ Doc. Ident. N°______________ y _______________________________ 
       Doc. Ident. N°______________, respectivamente, designados como Comité de Verificación Académica de la '.$comite.', 
       y ______________________________ Doc. Identidad N°____________, en calidad de Testigo Estudiantil, con la finalidad de realizar una 
       revisión exhaustiva a las Actas de Exámenes de cada una de las unidades curriculares cursadas por: 
       ________________________________________________________Doc. Identidad N. º ___________________________, aspirante al 
       título de Médico (a) Integral Comunitario (a), CERTIFICAMOS: que las calificaciones obtenidas por este (a) último (a), se 
       encuentran verificadas y marcadas como correctas, en el Formato 02-B que precede al presente documento. Específicamente, en la 
       columna identificada como: SI  SE CORRESPONDE CON LA NOTA PLASMADA EN EL ACTA DE EXAMEN DE LA UNIDAD CURRICULAR, y también, en la 
       columna identificada como: CORRECCIÓN CALIFICACIÓN DEFINITIVA QUE APARECE EN EL ACTA DE EXAMEN. La Corrección se realizó sólo en el 
       caso de que la nota reflejada en una o más unidades curriculares, no se  correspondiera con la nota reflejada en el acta de examen, y 
       en este sentido, el Comité de Verificación procedió a plasmar la nota que efectivamente estaba indicada en el acta de examen.    
      </p></td></tr></table><br>
      <table>
        <tr><td colspan="4" align="center">&nbsp;</td></tr>
        <tr><td>_____________________</td><td>_____________________</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>_____________________</td></tr>
        <tr><td>Sec Docente MMC</td><td>Director de Secretaria UCS</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Profesor(a)</td></tr>
        <tr><td colspan="4" align="center">&nbsp;</td></tr>
        <tr><td>_____________________</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>_____________________</td></tr>
        <tr><td>Profesor(a)</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Testigo Estudiantil</td></tr>
        <tr><td colspan="4" align="center">SELLO <br> DIRECCION DE CONTROL DE ESTUDIOS</td></tr>
        </table>';
      $pdf->writeHTML($html, true, 0, true, true);
      $pdf->AddPage('P', 'F4');
      foreach($this->estudiantes as $data):
       $html2 = '<br><br><font size="8"><table>
          <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
          Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> Dirección General de Control de Estudios<br>
          <strong>FORMATO O2-B</strong></font></td></tr>
          <tr><td colspan="2" align="center"><b>DOCUMENTO DE VERIFICACIÓN ACADÉMICA DEL ESTUDIANTE </b></td></tr>
          <tr><td colspan="2"><p style="text-align: justify"><br>
          Hoy_____ de _________________________ de 20_____, el (la) estudiante: <strong>'.$data['primer_nombre'].' '.$data['segundo_nombre'].' '.$data['primer_apellido'].' '.$data['segundo_apellido'].'</strong> 
          portador (a) del Documento de Identidad Nº <strong>'.$data['tipo_identificacion'].'-'.$data['identificacion'].'</strong>, hace entrega del  Documento de Verificación Académica ante la Secretaria Docente,  
          para que el Comité de Verificación Académica de la '.$cohorte.', procedan a la revisión de las notas obtenidas en cada una de las unidades curriculares que contempla el Plan de Estudios del PNFMIC.
     
</p></td></tr>
          </table></font><br>
          <font size="8">
          <table border="1">
          <tr><td width="3%" align="center" rowspan="2">N</td><td width="12%" align="center" rowspan="2">CÓDIGO</td><td width="40%" align="center" rowspan="2">UNIDAD CURRÍCULAR</td><td width="10%" align="center" rowspan="2">PERÍODO<br>LECTIVO</td><td width="6%" align="center" rowspan="2">NOTA</td><td width="15%" colspan="2">Observacion</td><td width="20%" rowspan="2">Correccion</td></tr>
          <tr><td>SI</td><td>No</td></tr>';
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
          <td></td>
          <td></td>
          <td></td>
          </tr>';
          $sum_notas=$sum_notas+$data['nota'];
      endforeach;
      $promedio=$sum_notas/$nro;
      $promedio2=number_format((float)$promedio, 2, '.', '');
      $html2.='
      <tr><td align="center"></td><td align="center"></td> <td></td><td align="center"></td><td align="center"></td><td></td><td></td><td></td>
          </tr>
          <tr><td align="center"></td><td align="center"></td> <td></td><td align="center"></td><td align="center"></td><td></td><td></td><td></td>
          </tr>
          <tr><td align="center"></td><td align="center"></td> <td></td><td align="center"></td><td align="center"></td><td></td><td></td><td></td>
          </tr>
          <tr><td align="center"></td><td align="center"></td> <td></td><td align="center"></td><td align="center"></td><td></td><td></td><td></td>
          </tr>
      </table>
          </table> <br/><br/> 
        <table>
        <tr><td colspan="4" align="center">&nbsp;</td></tr>
        <tr><td>_____________________</td><td>_____________________</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>_____________________</td></tr>
        <tr><td>Sec Docente MMC</td><td>Director de Secretaria UCS</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Profesor(a)</td></tr>
        <tr><td colspan="4" align="center">&nbsp;</td></tr>
        <tr><td>_____________________</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>_____________________</td></tr>
        <tr><td>Profesor(a)</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Testigo Estudiantil</td></tr>
        <tr><td colspan="4" align="center">SELLO <br> DIRECCION DE CONTROL DE ESTUDIOS</td></tr>
        </table>';
      $pdf->writeHTML($html2, true, 0, true, true);
      $pdf->AddPage('P', 'F4');
  endforeach;
      //$pdf->writeHTML($html2, true, 0, true, true);
      $pdf->Output('notas.pdf', 'I');
      throw new sfStopException();
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function executeMostrarReporteEstadoRi(sfWebRequest $request){
      ini_set('max_execution_time', 300);
        $this->estado = $this->getRequestParameter('estado');
        $this->estudiantes = EstudianteTable::obtener_estudiante_estado_ri($this->estado);
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $pdf = new sfTCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGAE');
        $pdf->SetTitle('Notas');
        $pdf->SetSubject('SIGAE - Notas');
        $pdf->SetKeywords('SIGAE, PDF, Notas');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 20);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        //$pdf->AddPage('P', 'F4');
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
	$pdf->AddPage('P', 'F4');
$html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> Dirección General de Control de Estudios</font></td></tr>
            <tr><td colspan="2" align="center"><b>NOTAS CERTIFICADAS</b></td></tr>
            <tr><td colspan="2"><p style="text-align: justify"><br>
       Quien suscribe, la Secretaría General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”,
       certifica que el ciudadano(a):  <strong>'.$data['primer_nombre'].' '.$data['segundo_nombre'].' '.$data['primer_apellido'].' '.$data['segundo_apellido'].'</strong>, titular del Documento de Identidad 
       N° <strong>'.$data['tipo_identificacion'].'-'.$data['identificacion'].'</strong>, quien cursó y aprobó las unidades curriculares del Plan de Estudio del  
       <strong>Programa Nacional de Formación en Radioimageneología</strong>, para optar al título de: 
       <strong>Técnico(a) Superior Universitario(a) en Radioimageneología</strong>, obtuvo las siguientes calificaciones: 
       
</p></td></tr>
            </table></font>';

$html2.='<font size="8">
            <table border="1">
            <tr><td width="3%" align="center">N</td><td width="15%" align="center">CÓDIGO</td><td width="66%" align="center">UNIDAD CURRÍCULAR</td>
            <td width="10%" align="center">PERÍODO <br>LECTIVO</td><td width="6%" align="center">NOTA</td></tr>';
        $notas = NotasTable::getNotasGrado2($data['id']);

        $nro = 0;
        $sum_notas=0;
        foreach ($notas as $data):
            $nro++;
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['cod_ubv'] . '</td>
            <td>' . $data['descripcion'] . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
            </tr>';
            $sum_notas=$sum_notas+$data['nota'];
        endforeach;
        $promedio=$sum_notas/$nro;
        $promedio2=number_format((float)$promedio, 2, '.', '');
        $html2.='</table>
            </table>';
$html2.='<br/><br/>
<table><tr><td>
<p align="justify">
La escala de calificaciones es del 1 al 20, siendo la mínima aprobatoria de 12 puntos.
Certificación que se expide al solicitante por parte de la Secretaría General de la Universidad de la Ciencias de la Salud “Hugo Chávez Frías”, a los Ocho (8) días del mes de octubre del año Dos Mil Veinte (2020).
</p>
Indice Académico: <strong>'.$promedio2.'</strong>. El total de unidades curriculares requeridas para egresar como Técnico Superior Universitario en Radioimageneología es de 27.
</td></tr></table><br/>
<table><tr><td><font size="8"><i>mi/MA</i>
<p align="right"><i><strong>Sin sello no tiene validez</strong></i>
</p></font>
</td></tr>
<tr><td align="center"><strong>Prof. Ana Y. Montenegro N.<br/>Secretaria General UCS</strong>
</td></tr>
</table>
        </font>';

	
	$pdf->writeHTML($html2, true, 0, true, true);
	endforeach;
	$pdf->Output('notas.pdf', 'I');
        throw new sfStopException();

           }

  function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
    {
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
