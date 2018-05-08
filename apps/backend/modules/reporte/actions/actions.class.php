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
        foreach($this->estudiantes as $data):
         $html2 = '<br><br><font size="8"><table>
            <tr><td align="left"><img src="images/logo_ucs.jpg" width="300" /></td><td align="right" ><font size="8">República Bolivariana de Venezuela<br> 
            Universidad de las Ciencias de la Salud <br><b>"HUGO CHÁVEZ FRÍAS"</b><br> SECRETARÍA GENERAL <br> CONTROL DE ESTUDIOS</font></td></tr>
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
            <tr><td width="3%" align="center">N</td><td width="15%" align="center">CÓDIGO</td><td width="61%" align="center">UNIDAD CURRÍCULAR</td><td width="15%" align="center">PERÍODO<br>LECTIVO</td><td width="6%" align="center">NOTA</td></tr>';
        $notas = NotasTable::getNotasGrado2($data['id']);
        $nro = 0;
        foreach ($notas as $data):
            $nro++;
            $html2.='<tr><td align="center">' . $nro . '</td>
            <td align="center">' . $data['unidad_curricular'] . '</td>
            <td align="center">' . $data['descripcion'] . '</td>
            <td align="center">' . $data['periodo'] . '</td>
            <td align="center">' . $data['nota'] . '</td>
            </tr>';
        endforeach;
        $html2.='</table>
            </table>
<br/><br/>
<table><tr><td>
<p align="justify">
La escala de calificaciones es del 1 al 20, siendo la mínima aprobatoria de 12 puntos.

Certificación que se expide al solicitante por parte de la Secretaría General de la Universidad de la Ciencias de la Salud “Hugo Chávez Frías”, a los Ocho (8) días del mes de mayo del año Dos Mil Dieciocho (2018).
</p>
</td></tr></table><br/>
<table><tr><td><font size="8"><i>IM/AM</i>
<p align="right"><i><strong>sin sello no tiene válidez</strong></i>
</p></font>
</td></tr>
<tr><td align="center"><br/><br/><strong>Prof. Ana Y. Montenegro N.<br/>Secretaria General UCS</strong>
</td></tr>
</table>
        </font>';
        $pdf->writeHTML($html2, true, 0, true, true);
        $pdf->AddPage();
    endforeach;
        //$pdf->writeHTML($html2, true, 0, true, true);
        $pdf->Output('notas.pdf', 'I');
        throw new sfStopException();
     // echo $this->estado;
     // print_r($this->estudiantes);
      exit();
  }
}
