<?php


include_once dirname(__FILE__).'/../files/barcode/Barcode.php';
include_once dirname(__FILE__). "/../phpqrcode/qrlib.php"; 
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
  public function executeCarnet(sfWebRequest $request)
  {
      /*parametros*/
//            $pnf='MEDICINA INTEGRAL COMUNITARIA';
            $pnf=$request->getParameter('pnf');
            $NOM=$request->getParameter('nombre');
            $ape=$request->getParameter('apellido');
            $identificacion=$request->getParameter('identificacion');
            $documento=$request->getParameter('documento');
            $estado=$request->getParameter('estado');
            $municipio=$request->getParameter('municipio');
            $vence=$request->getParameter('vence');
            $imagen_foto_carnet=$request->getParameter('foto');
            $foto='uploads/fotos/original/s_'.$imagen_foto_carnet;
               //         echo $foto;
                 //       exit();
       /*fin parametros*/
      
            header('Content-Type: image/jpeg');
            header("Cache-Control: no-cache, must-revalidate");       
            $pathImg='images/';
            $pathFiles=dirname(__FILE__).'/../files/';
            //include($pathFiles . 'include.php');
            //$cedula='11282749';
            $width=669;
            $height=408;
            $base=imagecreatetruecolor($width, $height);
            $black = ImageColorAllocate($base, 0, 0, 0);
            $white = ImageColorAllocate($base, 255, 255, 255);
            imagefill($base,0,0,$white);
      
            $fondo=imagecreatefromjpeg($pathImg.'base_carnet.jpg');
            imagecopyresampled( $base,$fondo,0,0, 0, 0,$width,$height, imagesx($fondo), imagesy($fondo));
            $normal = $pathFiles.'LiberationMono-Regular.ttf';
            $bold = $pathFiles.'LiberationMono-Bold.ttf';
            $pnf_font = $pathFiles.'arialbd.ttf';
//            echo $normal;
            /*PNF*/
            
            $largo_pnf=strlen($pnf);
            $font_length_pnf=10;
            $x_str_pnf=669/2-($largo_pnf*$font_length_pnf)/2;
            $y_str_pnf=122;
            imagettftext($base,12,0,$x_str_pnf,$y_str_pnf, $black, $pnf_font,$pnf);
            /*NOMBRE APELLIDO*/
            
            $largo_nom=  strlen($NOM);
            $largo_ape=strlen($ape);
            $font_length=11;
            $x_str_nombre=460-($largo_nom*$font_length);
            $x_str_ape=460-($largo_ape*$font_length);
            $y_str_nombre=180;
            $interLine=22;
            imagettftext($base,12,0,$x_str_nombre,$y_str_nombre, $black, $bold,$NOM);
            imagettftext($base,12,0,$x_str_ape,$y_str_nombre+$interLine, $black,$bold,$ape);
           /*IDENTIFICACION*/
            
            $largo_identificacion=strlen($documento.'-'.$identificacion);
            $font_length_identificacion=11;
            $x_str_identificacion=460-($largo_identificacion*$font_length_identificacion);
            $y_str_identificacion=246;
            imagettftext($base,12,0,$x_str_identificacion,$y_str_identificacion, $black, $bold,$documento.'-'.$identificacion);
            /*ESTADO*/
            
            $largo_estado=strlen('Estado:'.$estado);
            $font_length_estado=11;
            $x_str_estado=460-($largo_estado*$font_length_estado);
            $y_str_estado=290;
            imagettftext($base,12,0,$x_str_estado,$y_str_estado, $black, $bold,'Estado:'.$estado);
            /*MUNICIPIO*/
            
            $largo_municipio=strlen('Municipio:'.$municipio);
            $font_length_municipio=10.7;
            $x_str_municipio=460-($largo_municipio*$font_length_municipio);
            $y_str_municipio=312;
            imagettftext($base,12,0,$x_str_municipio,$y_str_municipio, $black, $bold,'Municipio:'.$municipio);
            /*VENCE*/
            
            $largo_vence=strlen('Vence:'.$vence);
            $font_length_vence=8.5;
            $x_str_vence=460-($largo_vence*$font_length_vence);
            $y_str_vence=356;
            imagettftext($base,10,0,$x_str_vence,$y_str_vence, $black, $normal,'Vence:'.$vence);            
            /*FOTO*/
            
            $image_foto =imagecreatefromjpeg ($foto);
            $x_foto=470;
            $y_foto=165;
            imagecopyresampled($base, $image_foto, $x_foto, $y_foto, 0, 0, 159,174, imagesx($image_foto), imagesy($image_foto));
            /*CODIGO DE BARRAS*/
            $x_barcode = 500;
            $y_barcode = 370;
            $barcode = $this->executeCreateBarcode($documento.'-'.$identificacion);
            imagecopyresampled($base, $barcode, $x_barcode, $y_barcode, 0, 0, 120, 30, imagesx($barcode), imagesy($barcode));

            
            imagejpeg($base);
            //$this->redirect('/control/index.php/reporte/CP02a');    
            throw new sfStopException();
  }
  function executeCreateBarcode($cedula) {
    $fontSize = 10;
    $marge = 0;
    $x = 150;
    $y = 20;
    $height = 30;
    $width = 4;
    $angle = 0;
    $code = $cedula; // barcode, of course ;)
    $type = 'std25';

    function drawCross($im, $color, $x, $y) {
        imageline($im, $x - 10, $y, $x + 10, $y, $color);
        imageline($im, $x, $y - 10, $x, $y + 10, $color);
    }

    $im = imagecreatetruecolor(300, 50);
    $black = ImageColorAllocate($im, 0x00, 0x00, 0x00);
    $white = ImageColorAllocate($im, 0xff, 0xff, 0xff);
    imagefilledrectangle($im, 0, 0, 300, 300, $white);
    $data = Barcode::gd($im, $black, $x, $y, $angle, $type, array('code' => $code), $width, $height);
    return $im;
}
  
    public function executeTest()
  {
    $config = sfTCPDFPluginConfigHandler::loadConfig();
    
    // pdf object
    $pdf = new sfTCPDF();

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // Set some content to print
    $html = <<<EOD
    <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a> and the <a href="http://www.symfony-project.org/plugins/sfTCPDFPlugin" style="text-decoration:none;background-color:#CC0000;color:black;">sfTC<span style="color:white;">PDF</span></span> symfony1 plugin</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>I can handle UTF8:  €àèéìòù</p>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');

    // Stop symfony process
    throw new sfStopException();
  }

  /**
   * Full test.
   */
  public function executeTest2()
  {
    $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";
    $htmlcontent  = "&lt; &euro; €àèéìòù &copy; &gt;<br /><h1>heading 1</h1><h2>heading 2</h2><h3>heading 3</h3><h4>heading 4</h4><h5>heading 5</h5><h6>heading 6</h6>ordered list:<br /><ol><li><b>bold text</b></li><li><i>italic text</i></li><li><u>underlined text</u></li><li><a href=\"http://www.tecnick.com\">link to http://www.tecnick.com</a></li><li>test break<br />second line<br />third line</li><li><font size=\"+3\">font + 3</font></li><li><small>small text</small></li><li>normal <sub>subscript</sub> <sup>superscript</sup></li></ul><hr />table:<br /><table border=\"1\" cellspacing=\"1\" cellpadding=\"1\"><tr><th>#</th><th>A</th><th>B</th></tr><tr><th>1</th><td bgcolor=\"#cccccc\">A1</td><td>B1</td></tr><tr><th>2</th><td>A2 â‚¬ &euro; &#8364; &amp; Ã¨ &egrave; </td><td>B2</td></tr><tr><th>3</th><td>A3</td><td><font color=\"#FF0000\">B3</font></td></tr></table><hr />image:<br /><img src=\"sfTCPDFPlugin/images/logo_example.png\" alt=\"test alt attribute\" width=\"100\" height=\"100\" border=\"0\" />";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //initialize document
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // set barcode
    $pdf->SetBarcode(date("Y-m-d H:i:s", time()));

    // output some HTML code
    $pdf->writeHTML($htmlcontent , true, 0);

    // output two html columns
    $first_column_width = 80;
    $current_y_position = $pdf->getY();
    $pdf->writeHTMLCell($first_column_width, 0, 0, $current_y_position, "<b>hello</b>", 0, 0, 0);
    $pdf->writeHTMLCell(0, 0, $first_column_width, $current_y_position, "<i>world</i>", 0, 1, 0);

    // output some content
    $pdf->Cell(0,10,"TEST Bold-Italic Cell",1,1,'C');

    // output some UTF-8 test content
    $pdf->AddPage();
    $pdf->SetFont("FreeSerif", "", 12);

    $utf8text = file_get_contents(K_PATH_CACHE. "utf8test.txt", false); // get utf-8 text form file
    $pdf->SetFillColor(230, 240, 255, true);
    $pdf->Write(5,$utf8text, '', 1);

    // remove page header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Two HTML columns test
    $pdf->AddPage();
    $right_column = "<b>right column</b> right column right column right column right column
    right column right column right column right column right column right column
    right column right column right column right column right column right column";
    $left_column = "<b>left column</b> left column left column left column left column left
    column left column left column left column left column left column left column
    left column left column left column left column left column left column left
    column";
    $first_column_width = 80;
    $second_column_width = 80;
    $column_space = 20;
    $current_y_position = $pdf->getY();
    $pdf->writeHTMLCell($first_column_width, 0, 0, 0, $left_column, 1, 0, 0);
    $pdf->Cell(0);
    $pdf->writeHTMLCell($second_column_width, 0, $first_column_width+$column_space, $current_y_position, $right_column, 0, 0, 0);

    // add page header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();

    // Multicell test
    $pdf->MultiCell(40, 5, "A test multicell line 1\ntest multicell line 2\ntest multicell line 3", 1, 'J', 0, 0);
    $pdf->MultiCell(40, 5, "B test multicell line 1\ntest multicell line 2\ntest multicell line 3", 1, 'J', 0);
    $pdf->MultiCell(40, 5, "C test multicell line 1\ntest multicell line 2\ntest multicell line 3", 1, 'J', 0, 0);
    $pdf->MultiCell(40, 5, "D test multicell line 1\ntest multicell line 2\ntest multicell line 3", 1, 'J', 0, 2);
    $pdf->MultiCell(40, 5, "F test multicell line 1\ntest multicell line 2\ntest multicell line 3", 1, 'J', 0);

    // Close and output PDF document
    $pdf->Output('sfTCPDF_test2.pdf', 'I');

    // Stop symfony process
    throw new sfStopException();
  }
  public function edad($fecha){

    $fecha = str_replace("/","-",$fecha);

    $fecha = date('Y/m/d',strtotime($fecha));

    $hoy = date('Y/m/d');

    $edad = $hoy - $fecha;
//    echo $edad;
//    exit();

    return $edad;

}
public function executeCrearImg(){
 $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
    $data=  EstudianteTable::buscarEstudiante($this->estudiante);
    $edad=$this->edad($data[0]['fecha_nacimiento']);
    $fecha2=date("d-m-Y",strtotime($data[0]['fecha_nacimiento']));
     if($data[0]['foto']==''){
        $foto='persona.jpg';
    }else{
        $foto=$data[0]['foto'];
    }
    if($data[0]['tipo_identificacion']=='V'){
        $tipo_identificacion='CÉDULA';
    }
    if($data[0]['tipo_identificacion']=='P'){
        $tipo_identificacion='PASAPORTE';
    }

    $this->redirect("http://109.9.132.215/control/index.php/reporte/carnet?pnf=MEDICINA%20INTEGRAL%20COMUNITARIA&nombre={$data[0]['primer_nombre']}%20{$data[0]['segundo_nombre']}&apellido={$data[0]['primer_apellido']}%20{$data[0]['segundo_apellido']}&identificacion={$data[0]['identificacion']}&documento={$data[0]['tipo_identificacion']}&estado={$data[0]['estado']}&municipio={$data[0]['estado']}&vence={$vence}&foto={$foto}");
}
  public function executeCP02a()
  {
    $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
    $data=  EstudianteTable::buscarEstudiante($this->estudiante);
    $edad=$this->edad($data[0]['fecha_nacimiento']);
    $fecha2=date("d-m-Y",strtotime($data[0]['fecha_nacimiento']));
    

      $encript= new crypt();
      $encriptado=$encript->encriptar($data[0]['id'].'-'.$data[0]['tipo_identificacion'].'-'.$data[0]['identificacion']);
      
    
    if($data[0]['foto']==''){
        $foto='persona.jpg';
    }else{
        $foto=$data[0]['foto'];
    }
    if($data[0]['tipo_identificacion']=='V'){
        $tipo_identificacion='CÉDULA';
    }
    if($data[0]['tipo_identificacion']=='P'){
        $tipo_identificacion='PASAPORTE';
    }

    $config = sfTCPDFPluginConfigHandler::loadConfig();
//    print_r($data);exit();
    // pdf object
    $pdf = new sfTCPDF();

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIGE');
    $pdf->SetTitle('Matrícula Premédico');
    $pdf->SetSubject('SIGE - Matrícula Premédico');
    $pdf->SetKeywords('SIGE, PDF, Matrícula, Premédico, Planilla,Inscripción');
    
    
    //set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

    // set header and footer fonts
    //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

     // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    
// set style for barcode
$style = array(
	'border' => 2,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);




$dia=date('d');
$mes=date('m');
$year=date('Y');
$vence='04-04-2017';
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado,'EAN13', '', '', '', 18, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 50, 50, $style, 'N');
$params2=$pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L','', '', 20, 20, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
$params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
$code= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
$code2= '<tcpdf method="write2DBarcode" params="'.$params2.'" />';

    // Set some content to print
    $html = <<<EOD
        <style>
        .letra8{
            font-size:8;
            }
        
      .firma {
            border-style: solid; 
            border-width: 4px;
            border-color: #000000;
            
             }
            
     .tablaSinEspacio{
         border-collapse: collapse;
         margin-left: 0;
         border-padding: 0px;
        padding-left:0;    
        }
            
      .bordesExternos {
        width: 100%;
        border: 5px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border: 1px solid #000;
        border-spacing: 0;
        }
        </style>   
         
<table border="5" cellspacing="0px" cellpadding="0px">
            <tr><td><img src="images/cintillo.jpg" width="10000"/></td></tr>
<tr>
    <td align="center" width="80%">
            <font size="8"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD "HUGO CHÁVEZ FRÍAS"<br>
            PROGRAMA NACIONAL DE FORMACIÓN EN MEDICINA INTEGRAL COMUNITARIA</b></font>
            
            <p><font size="14"><b>PLANILLA DE MATRÍCULA EN EL PNFMIC</b></font></p>
            
            <br/>
            <br/>
    </td>
    <td align="center" width="20%">
            <img src="uploads/fotos/original/s_{$foto}" height="452" width="350" alt="foto"/>
   </td>
</tr>
<tr> 
   <td colspan="2" align="center">DATOS PERSONALES Y ACADÉMICOS</td>
</tr>
</table>
            
<table class="letra8 bordesExternos">
            <tr>
                <td colspan="5">1er: APELLIDO<br/>{$data[0]['primer_apellido']}</td>
                <td colspan="5">2do: APELLIDO<br/>{$data[0]['segundo_apellido']}</td>
                <td colspan="6">NOMBRES<br/>{$data[0]['primer_nombre']} {$data[0]['segundo_nombre']}</td>
                <td colspan="2" align="center">GÉNERO:<br/>{$data[0]['sexo']}</td>
                
                <td colspan="2" align="center">
                   EDAD<br/>{$edad}
                </td>
                <td colspan="5" align="center">
                    FECHA NACIMIENTO<br>
                {$fecha2}
                </td>
            </tr>
            
            <tr>
                <td colspan="7">DOCUMENTO DE IDENTIDAD</td>
                <td colspan="8">NRO DE CÉDULA DE IDENTIDAD</td>
                
                <td colspan="10">PAÍS DE ORIGEN:</td>
            </tr>
            <tr> 
                <td colspan="7">{$tipo_identificacion}</td>
                <td colspan="8">{$data[0]['identificacion']}</td>
                
                <td colspan="10">{$data[0]['pais']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">DIRECCIÓN PARTICULAR: {$data[0]['direccion']}<br/><br/></td>
            </tr>
            <tr> 
                <td colspan="8" align="left">ESTADO:<br/>{$data[0]['estado']}</td>
                <td colspan="8" align="left">MUNICIPIO<br/>{$data[0]['municipio']}</td>
                <td colspan="9" align="left">PARROQUIA<br/>{$data[0]['parroquia']}</td>
            </tr>
            <tr> 
                <td colspan="10" align="left">TELÉFONO: {$data[0]['telefono']} </td>
                <td colspan="15" align="left">CORREO ELECTRÓNICO: {$data[0]['correo_electronico']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">SITUACIÓN ACADÉMICA: </td>
         
            </tr>
        </table>
 <br/>
 <br/>
            
<table border="5">
 <tr> 
 <td width="100%" align="center" valing="middle">{$code}</td>
   </tr>
</table>
            
<p><font size="10">DECLARO BAJO JURAMENTO, Y EN CONOCIMIENTO DE LAS IMPLICACIONES SI ASÍ NO FUERA, QUE LOS DATOS REFLEJADOS SE CORRESPONDEN CON LA REALIDAD</font></p>
            
<table>
    <tr> 
       <td width="30%" align="center"><div class="firma"><font size="10">DIRECCIÓN DE CONTROL DE ESTUDIOS</font></div></td>
       <td width="45%" align="center"><font size="10">FECHA DE MATRÍCULA: {$dia}/{$mes}/{$year} </font></td>
       <td width="25%" align="center"><div class="firma"><font size="10">ESTUDIANTE</font></div></td>
    </tr>
</table>    
 
<table>
 <tr><td align="center">
<font size="6">========================DESPRENDER POR ESTA LINEA========================</font>         
</td></tr>
       
</table>
       
<table width='100%' border="2" align="center">

<tr><td width="50%"></td>
    <td width="50%">
   <font size="8">
        <p align="center">  <b>El presente carné acredita a su titular como estudiante del Programa Nacional de
             Formación Medicina Integral Comunitaria.</b></p>
            <br>
            &nbsp;
            <br>
            <table>
            <tr>
                <td colspan="1"align="center" ><br><br><font size="6"><b>Dirección de Control de Estudios</b></font></td>
                <td></td>
            </tr>    
            <tr> 
            <td colspan="1" align="center">
            D&iacute;a:<u>{$dia}</u> Mes:<u>{$mes}</u> A&ntilde;o:<u>{$year}</u><br>
                Vence: {$vence}<br/>
                Nota: Este carné de no contar con la firma y sello de la Direción de Control de Estudios del estado pierde su validez
              </td><td rowspan="2">{$code2}</td>
            </tr>
            </table>
    </font>     
   </td>
   </tr>
   </table>      
EOD;
/*crnet
<img src="http://109.9.132.215/control/index.php/reporte/carnet?pnf=MEDICINA%20INTEGRAL%20COMUNITARIA&nombre={$data[0]['primer_nombre']}%20{$data[0]['segundo_nombre']}&apellido={$data[0]['primer_apellido']}%20{$data[0]['segundo_apellido']}&identificacion={$data[0]['identificacion']}&documento={$data[0]['tipo_identificacion']}&estado={$data[0]['estado']}&municipio={$data[0]['estado']}&vence={$vence}&foto={$foto}" width="1100"/>
*/
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

    // ---------------------------------------------------------
    $pdf->AddPage();
    $html = '<div style="text-align:center"><img src="images/logo_ucs.jpg" width="300" /><br></div>
             <div style="text-align:center">REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br>
SECRETARIA GENERAL <br>
DIRECCIÓN GENERAL DE ADMISIÓN, CONTROL DE ESTUDIOS Y REGISTROS ACADEMICOS<br>
<b>DIRECCIÓN DE CONTROL DE ESTUDIOS</b><br><br><br>


<b>CONSTANCIA DE ESTUDIO</b><br><br>
</div>
        <span style="text-align:justify;">
            Quien suscribe <b>Ana Y. Montenegro N.</b>, Secretaria General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”, 
            por medio de la presente hace constar que el(la) ciudadano(a) '.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' 
            '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].', de Nacionalidad __________________ titular del Documento de 
                Identidad CI/PP N° '.$data[0]['identificacion'].', es estudiante activo (a)  del Programa Nacional de Formación en 
                Medicina Integral Comunitaria (PNFMIC). Actualmente, cursa el Período Académico 2017-I, comprendido entre el 09-01-2017 
                al 31-06-2017, en el siguiente horario: lunes a sábado de 8:00 a.m. a 12:00 a.m., y de 1:00 p.m., a 5:00 p.m., en el Área 
                de Salud Integral Comunitaria__________________, ubicada en la Parroquia '.$data[0]['parroquia'].', Municipio '.$data[0]['municipio'].' 
                    del  Estado '.$data[0]['estado'].'.  <br>

Constancia que se emite  a los '.$dia.' días del mes de '.$mes.' de '.$year.'.
<br><br>
</span>
<div style="text-align:center">Atentamente,<br><br><br><br><br>

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
<td width="10%">'.$code2.'</td></tr></table>
<div style="text-align:center"><img src="images/footer.jpg" height="100" width="1000"/></div>
';
    $pdf->SetFont('dejavusans', '', 11, '', true);
$pdf->writeHTML($html, true, 0, true, true);


    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('matricula.pdf', 'I');

    // Stop symfony process
    throw new sfStopException();
    
      
  }
 public function executePlanilla(){
    $this->setLayout(false);
    
    $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
    $this->data =  EstudianteTable::buscarEstudiante($this->estudiante);
    $this->edad = $this->edad($this->data[0]['fecha_nacimiento']);
    $this->fecha2 = date("d-m-Y",strtotime($this->data[0]['fecha_nacimiento']));
    

      $encript= new crypt();
      $this->encriptado=$encript->encriptar($this->data[0]['id'].'-'.$this->data[0]['tipo_identificacion'].'-'.$this->data[0]['identificacion']);
      //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).'/../../../../../web/temp/';
          // $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
   
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR.$this->data[0]['id'].'-'.$this->data[0]['tipo_identificacion'].'-'.$this->data[0]['identificacion'].'.png';
//error correction level  L M Q H
    $errorCorrectionLevel = 'Q';
//TAMAÑO 1-10
    $matrixPointSize = 2; 
    QRcode::png($this->data[0]['id'].'-'.$this->data[0]['tipo_identificacion'].'-'.$this->data[0]['identificacion'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    $this->qr= '<img src="/control/'.$PNG_WEB_DIR.basename($filename).'" />';  
    
                      
    
    if($this->data[0]['foto']==''){
        $this->foto='persona.jpg';
    }else{
        $this->foto=$this->data[0]['foto'];
    }
    if($this->data[0]['tipo_identificacion']=='V'){
        $this->tipo_identificacion='CÉDULA';
    }
    if($this->data[0]['tipo_identificacion']=='P'){
        $this->tipo_identificacion='PASAPORTE';
    }

 
$this->dia=date('d');
$this->mes=date('m');
$this->year=date('Y');
$this->vence='31-05-2017';
if($this->mes==1){
$this->mes_letras='enero';
}
if($this->mes==2){
$this->mes_letras='febrero';
}
if($this->mes==3){
$this->mes_letras='marzo';
}
if($this->mes==4){
$this->mes_letras='abril';
}
if($this->mes==5){
$this->mes_letras='mayo';
}
if($this->mes==6){
$this->mes_letras='junio';
}
if($this->mes==7){
$this->mes_letras='julio';
}
if($this->mes==8){
$this->mes_letras='agosto';
}
if($this->mes==9){
$this->mes_letras='septiembre';
}
if($this->mes==10){
$this->mes_letras='octubre';
}
if($this->mes==11){
$this->mes_letras='noviembre';
}
if($this->mes==12){
$this->mes_letras='diciembre';
}
//$params2=$pdf->serializeTCPDFtagParameters(array($encriptado, 'QRCODE,L','', '', 20, 20, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$params = $pdf->serializeTCPDFtagParameters(array($encriptado, 'C128', '', '', 80, 20, 0.4, array('position'=>'C', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
//$code= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
//$code2= '<tcpdf method="write2DBarcode" params="'.$params2.'" />';

    // Set some content to print
    


    // Stop symfony process
//    throw new sfStopException();
}
public function executeCICS()
  {
    $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
    $data=  EstudianteTable::buscarEstudiante($this->estudiante);
    $edad=$this->edad($data[0]['fecha_nacimiento']);
    $fecha2=date("d-m-Y",strtotime($data[0]['fecha_nacimiento']));
      $encript= new crypt();
      $encriptado=$encript->encriptar($data[0]['id'].'-'.$data[0]['tipo_identificacion'].'-'.$data[0]['identificacion']);
    if($data[0]['foto']==''){
        $foto='persona.jpg';
    }else{
        $foto=$data[0]['foto'];
    }
    if($data[0]['tipo_identificacion']=='V'){
        $tipo_identificacion='V';
    }
    if($data[0]['tipo_identificacion']=='P'){
        $tipo_identificacion='P';
    }
    if($data[0]['tipo_identificacion']=='E'){
        $tipo_identificacion='E';
    }

    $config = sfTCPDFPluginConfigHandler::loadConfig();
//    print_r($data);exit();
    // pdf object
    $pdf = new sfTCPDF();

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIGE');
    $pdf->SetTitle('Matrícula Premédico');
    $pdf->SetSubject('SIGE - Matrícula Premédico');
    $pdf->SetKeywords('SIGE, PDF, Matrícula, Premédico, Planilla,Inscripción');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->setFontSubsetting(true);
    $pdf->SetFont('dejavusans', '', 14, '', true);
    $pdf->AddPage();
$style = array(
	'border' => 2,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);
$dia=date('d');
$mes=date('m');
$year=date('Y');
$vence='04-04-2017';
    $html = <<<EOD
        <style>
        .letra8{
            font-size:8;
            }
        
      .firma {
            border-style: solid; 
            border-width: 4px;
            border-color: #000000;
            
             }
            
     .tablaSinEspacio{
         border-collapse: collapse;
         margin-left: 0;
         border-padding: 0px;
        padding-left:0;    
        }
            
      .bordesExternos {
        width: 100%;
        border: 5px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border: 1px solid #000;
        border-spacing: 0;
        }
        </style>   
         
<table border="5" cellspacing="0px" cellpadding="0px">
            <tr><td><img src="images/cintillo.jpg" width="10000"/></td></tr>
<tr>
    <td align="center" width="80%">
            <font size="8"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD "HUGO CHÁVEZ FRÍAS"<br>
            </b></font>
            <p><font size="14"><b>PLANILLA DE MATRÍCULA EN EL <br> CURSO INTRODUCTORIO A LAS CIENCIAS DE LA SALUD {$year}</b></font></p>
    </td>
    <td align="center" width="20%">
            <img src="uploads/fotos/original/s_{$foto}" height="452" width="350" alt="foto"/>
   </td>
</tr>
<tr> 
   <td colspan="2" align="center">DATOS PERSONALES Y ACADÉMICOS</td>
</tr>
</table>
            
<table class="letra8 bordesExternos">
            <tr>
                <td colspan="5">PRIMER APELLIDO<br/>{$data[0]['primer_apellido']}</td>
                <td colspan="5">SEGUNDO APELLIDO<br/>{$data[0]['segundo_apellido']}</td>
                <td colspan="6">NOMBRES<br/>{$data[0]['primer_nombre']} {$data[0]['segundo_nombre']}</td>
                <td colspan="2" align="center">GÉNERO:<br/>{$data[0]['sexo']}</td>
                
                <td colspan="2" align="center">
                   EDAD<br/>{$edad}
                </td>
                <td colspan="5" align="center">
                    FECHA NACIMIENTO<br>
                {$fecha2}
                </td>
            </tr>
            
            <tr>
                <td colspan="7">NACIONALIDAD</td>
                <td colspan="8">CÉDULA DE IDENTIDAD</td>
                
                <td colspan="10">PAÍS DE ORIGEN:</td>
            </tr>
            <tr> 
                <td colspan="7">{$tipo_identificacion}</td>
                <td colspan="8">{$data[0]['identificacion']}</td>
                
                <td colspan="10">{$data[0]['pais']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">DIRECCIÓN: {$data[0]['direccion']}<br/><br/></td>
            </tr>
            <tr> 
                <td colspan="8" align="left">ESTADO:<br/>{$data[0]['estado']}</td>
                <td colspan="8" align="left">MUNICIPIO<br/>{$data[0]['municipio']}</td>
                <td colspan="9" align="left">PARROQUIA<br/>{$data[0]['parroquia']}</td>
            </tr>
            <tr> 
                <td colspan="10" align="left">TELÉFONO: {$data[0]['telefono']} </td>
                <td colspan="15" align="left">CORREO ELECTRÓNICO: {$data[0]['correo_electronico']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">PROGRAMA NACIONAL DE FORMACIÓN: </td>
            </tr>
        </table>
<p><font size="10">DECLARO BAJO JURAMENTO, Y EN CONOCIMIENTO DE LAS IMPLICACIONES SI ASÍ NO FUERA, QUE LOS DATOS REFLEJADOS SE CORRESPONDEN CON LA REALIDAD</font></p>
<table>
    <tr> 
       <td width="30%" align="center"><div class="firma"><font size="10">FIRMA Y SELLO <br>DIRECCIÓN DE CONTROL DE ESTUDIOS</font></div></td>
       <td width="45%" align="center"><font size="10">FECHA: {$dia}/{$mes}/{$year} </font></td>
       <td width="25%" align="center"><div class="firma"><font size="10">ESTUDIANTE</font></div></td>
    </tr>
</table>
<table>
 <tr><td align="center">
<font size="6">========================CORTAR POR ESTA LINEA========================</font>         
</td></tr>
</table>
       <table border="5" cellspacing="0px" cellpadding="0px">
            
<tr>
    <td align="center" width="80%">
            <font size="8"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD "HUGO CHÁVEZ FRÍAS"<br>
            </b></font>
            
            <p><font size="14"><b>PLANILLA DE MATRÍCULA EN EL <br> CURSO INTRODUCTORIO A LAS CIENCIAS DE LA SALUD {$year}</b></font></p>
    </td>
    <td align="center" width="20%" valign="middle"><br>
            <img src="uploads/fotos/original/s_{$foto}" height="452" width="350" alt="foto"/>
   </td>
</tr>
<tr> 
   <td colspan="2" align="center">DATOS PERSONALES Y ACADÉMICOS</td>
</tr>
</table>
            
<table class="letra8 bordesExternos">
            <tr>
                <td colspan="5">PRIMER APELLIDO<br/>{$data[0]['primer_apellido']}</td>
                <td colspan="5">SEGUNDO APELLIDO<br/>{$data[0]['segundo_apellido']}</td>
                <td colspan="6">NOMBRES<br/>{$data[0]['primer_nombre']} {$data[0]['segundo_nombre']}</td>
                <td colspan="2" align="center">GÉNERO:<br/>{$data[0]['sexo']}</td>
                
                <td colspan="2" align="center">
                   EDAD<br/>{$edad}
                </td>
                <td colspan="5" align="center">
                    FECHA NACIMIENTO<br>
                {$fecha2}
                </td>
            </tr>
            
            <tr>
                <td colspan="7">NACIONALIDAD</td>
                <td colspan="8">CÉDULA DE IDENTIDAD</td>
                
                <td colspan="10">PAÍS DE ORIGEN:</td>
            </tr>
            <tr> 
                <td colspan="7">{$tipo_identificacion}</td>
                <td colspan="8">{$data[0]['identificacion']}</td>
                
                <td colspan="10">{$data[0]['pais']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">DIRECCIÓN: {$data[0]['direccion']}<br/><br/></td>
            </tr>
            <tr> 
                <td colspan="8" align="left">ESTADO:<br/>{$data[0]['estado']}</td>
                <td colspan="8" align="left">MUNICIPIO<br/>{$data[0]['municipio']}</td>
                <td colspan="9" align="left">PARROQUIA<br/>{$data[0]['parroquia']}</td>
            </tr>
            <tr> 
                <td colspan="10" align="left">TELÉFONO: {$data[0]['telefono']} </td>
                <td colspan="15" align="left">CORREO ELECTRÓNICO: {$data[0]['correo_electronico']}</td>
            </tr>
            <tr> 
                <td colspan="25" align="left">PROGRAMA NACIONAL DE FORMACIÓN: </td>
         
            </tr>
        </table>
<p><font size="10">DECLARO BAJO JURAMENTO, Y EN CONOCIMIENTO DE LAS IMPLICACIONES SI ASÍ NO FUERA, QUE LOS DATOS REFLEJADOS SE CORRESPONDEN CON LA REALIDAD</font></p>
            
<table>
    <tr> 
       <td width="30%" align="center"><div class="firma"><font size="10">FIRMA Y SELLO<br> DIRECCIÓN DE CONTROL DE ESTUDIOS</font></div></td>
       <td width="45%" align="center"><font size="10">FECHA: {$dia}/{$mes}/{$year} </font></td>
       <td width="25%" align="center"><div class="firma"><font size="10">ESTUDIANTE</font></div></td>
    </tr>
</table>   

EOD;
    $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
    $pdf->AddPage();
    $html = '
<style>
        .letra8{
            font-size:8;
            }
        
      .firma {
            border-style: solid; 
            border-width: 4px;
            border-color: #000000;
             }
     .tablaSinEspacio{
         border-collapse: collapse;
         margin-left: 0;
         border-padding: 0px;
        padding-left:0;    
        }
      .bordesExternos {
        width: 100%;
        border: 5px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border: 1px solid #000;
        border-spacing: 0;
        }
        </style>           
<div style="text-align:center"><img src="images/logo_ucs.jpg" width="300" /><br></div>
             <div style="text-align:center">REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br>
<b>CARTA DE COMPROMISO SOCIAL</b><br>

</div>
<table width="100%" border="1" class="letra8">
    <tr><td>NOMBRES Y APELLIDOS: '.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</td></tr>
    <tr><td>CÉDULA DE IDENTIDAD:'.$tipo_identificacion.'-'.$data[0]['identificacion'].'</td></tr>
    <tr><td>LUGAR DE NACIMIENTO:</td></tr>
    <tr><td>EDAD: '.$edad.'</td></tr>
    <tr><td>ESTADO CIVIL:</td></tr>
    <tr><td>CONDICIÓN ACTUAL: ASPIRANTE A CURSAR ESTUDIOS EN EL CURSO INTRODUCTORIO A LAS CIENCIAS DE LA SALUD</td></tr>
</table>
        <span style="text-align:justify;">
        <br><b>Declaración del firmante:</b> <br> 
    Yo, <b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b>, debidamente identificada(o) en el recuadro superior, por medio del presente documento convengo en celebrar el presente compromiso social con la nación venezolana, cuyos efectos legales y morales declaro conocer, el cual suscribo en los siguientes términos:<br>
<b>PRIMERO:</b> Me comprometo a cumplir con lo establecido en la Constitución de la República Bolivariana de Venezuela y el ordenamiento jurídico venezolano vigente.<br>
<b>SEGUNDO:</b> Me comprometo a cumplir y a hacer cumplir los reglamentos de la Universidad de las Ciencias de la Salud "Hugo Chávez Frías" y todos los demás reglamentos establecidos en las diferentes instituciones y/o espacios docentes en los que me corresponda participar como estudiante.<br>
<b>TERCERO:</b> Me comprometo a cumplir cabalmente mis obligaciones y deberes  como estudiante y consagrarme a mi formación como profesional de la salud, mostrando en todo momento respeto a la vida, a los pacientes, a la comunidad, a los directivos, profesores, trabajadores y compañeros estudiantes en los diferentes escenarios docentes de formación donde me encuentre participando.<br>
<b>CUARTO:</b> Me comprometo a cumplir, una vez graduada o graduado, con la responsabilidad social de prestar mis servicios profesionales en cualquier parte del territorio nacional donde sea requerida mi presencia por parte de las autoridades del Ministerio del Poder Popular para la Salud, a fin de participar en la construcción y fortalecimiento del Sistema Público Nacional de Salud de la República Bolivariana de Venezuela y así contribuir a garantizar el derecho a la salud y a la vida de la población venezolana de conformidad con lo previsto en la Constitución de la República Bolivariana de Venezuela y en los objetivos del Plan de la Patria, y de esta forma, resarcir parcialmente la inversión social de la nación en la formación de sus profesionales de la salud.<br>
<b>QUINTO:</b> Me comprometo a aceptar, durante mi período de formación, todos los requerimientos de re-ubicación que me sean indicados, después de haber sido debidamente informado, por parte de las autoridades de la Universidad de las Ciencias de la Salud en cualquier Área de Salud Integral Comunitaria (ASIC) y espacios de formación ubicados en el territorio nacional, de acuerdo con las políticas de salud y educación universitaria en Venezuela.<br>
    El compromiso que aquí adquiero es de cumplimiento incondicional. Es todo.<br>
    Dado en '.$data[0]['estado'].', a los '.$dia.' días del mes de '.$mes.' de '.$year.'.
<br><br>
<table width="100%" border="1" class="letra8">
<tr><td>Firma<br><br><br>Nombre y Apellido:<b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b><br>Cédula de Identidad:'.$data[0]['identificacion'].'</td><td>Huella Dactilar</td></tr>
</table>
<br>
<div style="text-align:center"><img src="images/footer.jpg" height="100" width="1000"/></div>
';
    $pdf->SetFont('dejavusans', '', 11, '', true);
$pdf->writeHTML($html, true, 0, true, true);
$pdf->AddPage();
$html4='
    <style>
        .letra8{
            font-size:8;
            }
        
      .firma {
            border-style: solid; 
            border-width: 4px;
            border-color: #000000;
            
             }
            
     .tablaSinEspacio{
         border-collapse: collapse;
         margin-left: 0;
         border-padding: 0px;
        padding-left:0;    
        }
            
      .bordesExternos {
        width: 100%;
        border: 5px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border:hidden;
        }
        </style>   
<table>
    <tr><td colspan="2"><img src="images/cintillo.jpg" width="10000"/></td></tr>
    <tr><td width="20%"><img src="uploads/fotos/original/s_'.$foto.'" height="352" width="250" alt="foto"/></td>
        <td width="80%" align="center"><br><br><br><br><b>RECAUDOS CONSIGNADOS</b></td></tr>    
</table>
    <table class="letra8 bordesExternos" cellspacing="5px">
    <tr><td colspan="3" align="center"><b>DATOS PERSONALES</b></td></tr>
    <tr><td bgcolor="#cccccc">Nombres: <b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].'</b></td><td bgcolor="#cccccc">Apellidos: <b> '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b></td><td bgcolor="#cccccc">Cédula de Identidad: <b>'.$data[0]['identificacion'].'</b></td></tr>
    <tr><td>Género: '.$data[0]['sexo'].'</td><td>Edad: '.$edad.'</td><td></td></tr>  
    <tr bgcolor="#cccccc"><td>Teléfono: '.$data[0]['telefono'].'</td><td>Correo: '.$data[0]['correo_electronico'].'</td><td></td></tr> 
    <tr><td>Estado: '.$data[0]['estado'].'</td><td>Municipio: '.$data[0]['municipio'].'</td><td>Parroquia: '.$data[0]['parroquia'].'</td></tr> 
</table><br><br>
<table class="letra8 bordesExternos" cellspacing="5px" >
        <tr><td align="center"><b>DOCUMENTOS CONSIGNADOS</b></td></tr>'.
        '
<tr bgcolor="#cccccc"><td>&#9634; Una carpeta marrón tipo oficio con gancho.</td></tr>
<tr ><td>&#9634; Una (1) fotocopia de la cédula de identidad (ampliada 300 x 300).</td></tr>
<tr bgcolor="#cccccc"><td>&#9634; Copia de la Partida de nacimiento con vista al original con sus timbres fiscales.</td></tr>
<tr ><td>&#9634; Una (1) fotocopia simple del título de bachiller con sus respectivos timbres fiscales. (con vista al
original)</td></tr>
<tr bgcolor="#cccccc"><td>&#9634; Una (1) copia simple de notas de 1ero a 5to año, respectivamente certificadas por el plantel
donde cursó los estudios o por la Zona Educativa del Estado donde los culminó, en los casos que lo
ameriten, con sus respectivos timbres fiscales. (con vista al original)</td></tr>
<tr ><td>&#9634; Registro en el Sistema Nacional de Ingreso a la Educación Universitaria.</td></tr>
<tr ><td bgcolor="#cccccc">&#9634; Dos (2) fotos recientes tipo carné en fondo blanco.</td></tr>
<tr><td>&#9634; En el caso de aspirantes de otras nacionalidades: Presentar la cédula de identidad que los
acredite como Residentes en Venezuela (original y fotocopia ampliada).</td></tr>
<tr bgcolor="#cccccc"><td>&#9634; Los aspirantes nacionalizados deben presentar copia de la Gaceta Oficial con la Resolución de
Nacionalización.</td></tr>
<tr ><td>&#9634; Los aspirantes, ciudadanos venezolanos o de otras nacionalidades, que hayan realizado estudios
de bachillerato fuera del territorio venezolano, deberán realizar previamente la legalización de los
mismos ante las autoridades correspondientes, de acuerdo a los tratados y convenios firmados por
el Estado venezolano.
Para más información, dirígete a los Consultorios Populares, y Centros de Diagnóstico Integral (CDI)
de Barrio Adentro ó Coordinaciones de los CABES.</td></tr></table><br><br>
<table class="letra8"><tr><td  colspan="2"><span style="text-align:justify;">Yo, <b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b> me compromento a entregar todos los recaudos exigidos por la Universidad de las Ciencias de la Salud "Hugo Chávez Frías" antes de la fecha de culminación del Curso Introductorio a las Ciencias de la Salud '.$year.', firmo conforme a los '.$dia.' días del mes '.$mes.' de '.$year.'.</span></td></tr>
<tr><td width="80%"><br><br><br><br><br>_____________________________<br>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].' <br> '.$data[0]['identificacion'].'   
</td><td width="20%"><br><br><br><br><br>___________________<br>Firma y sello por Control de Estudios</td></tr></table>
<br><br><br><br>
<div class="letra8">
 NOTA: Imprimir dos ejemplares de esta planilla.
</div>
';
$pdf->writeHTML($html4, true, 0, true, true);
$pdf->AddPage();
$html5='
<style>
        .letra8{
            font-size:8;
            }
      .firma {
            border-style: solid; 
            border-width: 4px;
            border-color: #000000;
             }
     .tablaSinEspacio{
         border-collapse: collapse;
         margin-left: 0;
         border-padding: 0px;
        padding-left:0;    
        }
      .bordesExternos {
        width: 100%;
        border: 5px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border:hidden;
        }
        </style>      
<div style="text-align: center;">Etiquetas Para Identificar la Carpeta</div><br><br><br>
<center><table class="bordesExternos" cellspacing="5px" width="50%"><tr><td align="center"><br><br><img src="images/logo_ucs.jpg" width="300" /><br>
        <b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b><br>
            CI: '.$data[0]['identificacion'].'
<br><br><br><br></td></tr></table><br><br>
<table class="bordesExternos" cellspacing="5px" width="50%"><tr><td align="center">
        <b>'.$data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'].'</b><br>
            CI:  '.$data[0]['identificacion'].'</td></tr></table></center>';
//$pdf->writeHTML($html5, true, 0, true, true);
//$pdf->AddPage();
$html2 = '<div style="text-align:center"><img src="images/logo_ucs.jpg" width="300" /><br></div>
             <div style="text-align:center">REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br><br>
<b>REQUISITOS</b><br><br>
</div>
1.	Ser bachiller en cualquiera de sus modalidades.<br>
2.	Vocación para el ejercicio de profesiones vinculadas al ámbito de la salud.<br>
3.	Dedicación exclusiva al estudio (solo para el PNF-MIC).<br>
4.	Disposición para ser ubicado durante su formación en las Áreas de Salud Integral Comunitaria (ASIC)  priorizadas por municipio o estado.<br>
5.	Edad no mayor de 35 años (preferiblemente).<br>
6.	Postulación del Comité de Salud o Consejo Comunal de su lugar de residencia.  <br>
<div style="text-align:center">
<b>RECAUDOS</b><br><br>
</div>
1. Una carpeta marrón tipo oficio con gancho. <br>
2. Una  (1) fotocopia de la cédula de identidad (ampliada 300 x 300).<br>
3. Copia de la Partida de nacimiento con vista al original con sus timbres fiscales.<br>
4. Una (1) fotocopia simple del título de bachiller con sus respectivos timbres fiscales. (con vista al original)<br>
5. Una (1) Copia simple de notas de 1ero a 5to año, respectivamente certificadas por  el plantel donde cursó los estudios o por la Zona Educativa del Estado donde los culminó, en los casos que lo ameriten, con sus respectivos timbres fiscales. (con vista al original)<br>
6. Registro en el Sistema Nacional de Ingreso a la Educación Universitaria. <br>
7. Dos (2) fotos recientes tipo carné en fondo blanco.<br>
8. En el caso de aspirantes de otras nacionalidades: Presentar la cédula de identidad que los acredite como Residentes en Venezuela (original y fotocopia ampliada).<br>
9. Los aspirantes nacionalizados deben presentar copia de la Gaceta Oficial con la Resolución de Nacionalización.<br>
10. Los aspirantes, ciudadanos venezolanos o de otras nacionalidades, que hayan realizado estudios de bachillerato fuera del territorio venezolano, deberán realizar previamente la legalización de los mismos ante las autoridades correspondientes, de acuerdo a los tratados y convenios firmados por el Estado venezolano.<br>

Para más información, dirígete a los  Consultorios Populares, y Centros de Diagnóstico Integral (CDI) de Barrio Adentro ó Coordinaciones de los CABES.
';
$pdf->writeHTML($html2, true, 0, true, true);
//$pdf->AddPage();
//$html3= '<div style="text-align:center"><img src="images/orden_documentos.jpg" width="1800"/><br></div>';
//$pdf->writeHTML($html3, true, 0, true, true);

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('matricula.pdf', 'I');

    // Stop symfony process
    throw new sfStopException();
    
      
  }
}
