<script>
window.print();
</script>
<style>
body{
	media:"print";
}
.letra16{
            font-size:16;
            }
     .letra12{
            font-size:12;
            }
        .letra10{
            font-size:10;
            }
        .letra9{
            font-size:9;
            }
.letra8{
            font-size:8;
            }
.letra6{
            font-size:6;
            }
.letra5{
            font-size:5;
            }
.letra4{
            font-size:4;
            }
.letra3{
            font-size:3;
            }
.letra2{
            font-size:2;
            }
        .letra1{
            font-size:1;
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
        border: 1px solid #000;
        }
        table.bordesExternos > td {
        vertical-align: middle;
        border: 1px solid #000;
        border-spacing: 0;
        }
        </style>  
<?echo $foto?>
<center>
<table width="650px;"><tr><td>      
<table border="1" cellspacing="0px" cellpadding="0px" width="650px;">
            <tr><td colspan="2">
                    <img src="/control/images/cintillo.jpg" width='650' height='50' /></td></tr>
<tr>
    <td align="center" width="400px">
            <font size="1"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD <br/>"HUGO CHAVEZ FRÍAS"<br>
            PROGRAMA NACIONAL DE FORMACIÓN EN <br/>MEDICINA INTEGRAL COMUNITARIA</b></font>
            <p><font size="2"><b>PLANILLA DE MATRÍCULA EN EL PNFMIC</b></font></p>
    </td>
    <td align="center" width="2">
            <img src="/control/uploads/fotos/original/s_<?php echo $foto?>" height="120" width="90" alt="foto"/>
   </td>
</tr>
<tr> 
   <td colspan="2" align="center">DATOS PERSONALES Y ACADÉMICOS</td>
</tr>
</table>
<font size="1">       
<table border='1' cellspacing="0px" cellpadding="0px" width='650px' class="letra10">
            <tr>
                <td colspan="5">1er: APELLIDO<br/><?php echo $data[0]['primer_apellido']?></td>
                <td colspan="5">2do: APELLIDO<br/><?php echo$data[0]['segundo_apellido']?></td>
                <td colspan="6">NOMBRES<br/><?php echo $data[0]['primer_nombre'].' '.$data[0]['segundo_nombre']?></td>
                <td colspan="2" align="center">SEXO:<br/><?php echo$data[0]['sexo']?></td>
                
                <td colspan="2" align="center">
                   EDAD<br/><?php echo $edad?>
                </td>
                <td colspan="5" align="center">
                    FECHA NACIMIENTO<br>
                <?php echo $fecha2?>
                </td>
            </tr>
            
            <tr>
                <td colspan="7">DOCUMENTO DE IDENTIDAD</td>
                <td colspan="8">NRO DE DOCUMENTO DE IDENTIDAD</td>
                
                <td colspan="10">PAÍS DE ORIGEN:</td>
            </tr>
            <tr> 
                <td colspan="7"><?php echo $tipo_identificacion?></td>
                <td colspan="8"><?php echo $data[0]['identificacion']?></td>
                
                <td colspan="10"><?php echo $data[0]['pais']?></td>
            </tr>
            <tr> 
                <td colspan="25" align="left">DIRECCIÓN PARTICULAR: <?php echo $data[0]['direccion']?><br/><br/></td>
            </tr>
            <tr> 
                <td colspan="8" align="left">ESTADO:<br/><?php echo $data[0]['estado']?></td>
                <td colspan="8" align="left">MUNICIPIO<br/><?php echo $data[0]['municipio']?></td>
                <td colspan="9" align="left">PARROQUIA<br/><?php echo $data[0]['parroquia']?></td>
            </tr>
            <tr> 
                <td colspan="10" align="left">TELÉFONO: <?php echo $data[0]['telefono']?> </td>
                <td colspan="15" align="left">CORREO ELECTRÓNICO: <?php echo $data[0]['correo_electronico']?></td>
            </tr>
            <tr> 
                <td colspan="25" align="left">SITUACIÓN ACADÉMICA: </td>
         
            </tr>
        </table>
</font>
           
<table border="1" cellspacing="0px" cellpadding="0px" width='650px;'>
 <tr> 
 <td width="100%" align="center" valing="middle"><p><font size="2">DECLARO BAJO JURAMENTO, Y EN CONOCIMIENTO DE LAS IMPLICACIONES SI ASÍ NO FUERA, QUE LOS DATOS REFLEJADOS SE CORRESPONDEN CON LA REALIDAD</font></p></td>
   </tr>
</table>          
<table class="letra2" width="650px;">
<tr> 
       <td width="30%" align="center"><br><br><br><br><br><br><div><font size="2">____________________________________</font></div></td>
       <td width="45%" align="center"><font size="2"></font></td>
       <td width="25%" align="center"><br><br><br><br><br><br><div><font size="2">____________________________________</font></div></td>
    <tr> 

       <td width="30%" align="center"><div><font size="2">DIRECCIÓN DE CONTROL DE ESTUDIOS</font></div></td>
       <td width="45%" align="center"><font size="2">FECHA DE MATRÍCULA: <?php echo $dia.'/'.$mes.'/'.$year?> </font></td>
       <td width="25%" align="center"><div><font size="2">ESTUDIANTE</font></div></td>

    </tr>
    <tr><td colspan="3"><?php echo $qr;?></td></tr>
</table>    
 
<table width="650px;">
 <tr><td align="center">
<font size="2">===================DESPRENDER POR ESTA LINEA==================</font>         
</td></tr>
</table>
       <br/>
<table width='650px;' border="1" >
<tr><td width="325px;" >
<div style='float:left; position:absolute;'>
<table border="0" cellspacing="0px" cellpadding="0px" width='325px;' class='letra9'>
<tr><td height='18px;' width='25'></td><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'><td height='18px;' width='23'></tr>
<tr><td height='18px;' width='30'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td height='18px;' width='23'></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td colspan='8' align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEDICINA INTEGRAL COMUNITARIA</td><td></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td></td><td></td><td></td><td></td><td colspan='3' rowspan='6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/control/uploads/fotos/original/s_<?php echo $foto?>" height="88" width="80" alt="foto"/></td></tr>
<tr><td height='18px;' width='30'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td height='18px;' width='23'></td><td></td><td colspan='4'> <div style="text-align: right; width: 100%"><?php echo $data[0]['primer_nombre'].' '.$data[0]['segundo_nombre']?></div></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td colspan='4'> <div style="text-align: right;  width: 100%"><?php echo $data[0]['primer_apellido'].' '.$data[0]['segundo_apellido']?></div></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td colspan='4'> <div style="text-align: right;  width: 100%"><?php echo $data[0]['tipo_identificacion'].'-'.$data[0]['identificacion']?></div></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td colspan='5'> <div style="text-align: right;  width: 100%">ESTADO:<?php echo strtoupper($data[0]['estado']);?></div></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td colspan='5'> <div style="text-align: right; width: 100%">MUNICIPIO:<?php echo $data[0]['municipio']?></div></td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td></td><td></td><td></td><td></td><td colspan='3' rowspan='2'>VENCE:31-12-2017</td></tr>
<tr><td height='18px;' width='30'>&nbsp;</td><td height='18px;' width='23'></td><td></td><td></td><td></td><td></td><td></td></tr>
</table>
</div>
<img src='/control/images/base_carnet.jpg' width="325px"/> 

</td>
    <td width="50%">
   
        <p align="center" class='letra8'>  <b>El presente carné acredita a su titular como estudiante del Programa Nacional de
             Formación Medicina Integral Comunitaria.</b></p>
            <br>
            &nbsp;
            <br>
            <table class='letra8'>
            <tr>
                <td colspan="1"align="center" ><br><br><b>Dirección de Control de Estudios</b></font></td>
                <td rowspan="2"><?php echo $qr;?></td>
            </tr>    
            <tr> 
            <td colspan="1" align="center">
            D&iacute;a:<u><?php echo $dia?></u> Mes:<u><?php echo $mes?></u> A&ntilde;o:<u><?php echo $year?></u><br>
                Vence: 31-12-2017<br/>
                
              </td>
            </tr>
<tr><td colspan='2' align="center">Nota: Este carné de no contar con la firma y sello de la Dirección de Control de Estudios del estado pierde su validez</td></tr>
            </table>
    
   </td>
   </tr>
   </table>  
   <br><br><br><br><br>
<table width='650px' class='letra12'><tr><td>
    <center><img src="/control/images/logo_ucs.jpg" width="200" height='150'/><br>
             REPÚBLICA  BOLIVARIANA  DE VENEZUELA <br>
UNIVERSIDAD DE LAS CIENCIAS DE LA SALUD “HUGO CHÁVEZ FRÍAS”<br>
SECRETARIA GENERAL <br>
DIRECCIÓN GENERAL DE ADMISIÓN, CONTROL DE ESTUDIOS Y REGISTROS ACADEMICOS<br>
<b>DIRECCIÓN DE CONTROL DE ESTUDIOS</b><br><br><br>


<b>CONSTANCIA DE ESTUDIO</b><br><br></center>
        <p align="justify">
            Quien suscribe <b>Ana Y. Montenegro N.</b>, Secretaria General de la Universidad de las Ciencias de la Salud “Hugo Chávez Frías”, 
            por medio de la presente hace constar que el(la) ciudadano(a) <b><?php echo $data[0]['primer_nombre'].' '.$data[0]['segundo_nombre'].' 
            '.$data[0]['primer_apellido'].' '.$data[0]['segundo_apellido'];?></b>, titular del Documento de 
                Identidad CI/PP N°<b> <?php echo $data[0]['identificacion']?></b>, es estudiante activo (a)  del Programa Nacional de Formación en 
                Medicina Integral Comunitaria (PNFMIC). Actualmente, cursa el Período Académico 2017-III, comprendido entre el 01-06-2017
                al 30-09-2017, en el siguiente horario: lunes a sábado de 8:00 a.m. a 12:00 a.m., y de 1:00 p.m., a 5:00 p.m.,  en la Parroquia <?php echo $data[0]['parroquia'].', del Municipio '.$data[0]['municipio'].' del  Estado '.strtoupper($data[0]['estado']);?>. Constancia que se emite  a los <?php echo $dia.' días del mes de '.$mes_letras.' de '.$year;?>.
<br><br>
</p>
<div style="text-align:center">Atentamente,<br><br><br>
<img src='/control/images/sello.jpg' width='120' style='media: print; float: right;'/>
<img src='/control/images/firma_ana.jpg' width='150'/><br>
   <b>Prof. Ana Y. Montenegro N. <br>
Secretaria General <br>
Universidad de las Ciencias de la Salud “Hugo Chávez Frías”<br></b>
Según Resolución N°201 de fecha 29 de Julio de 2016<br>
Publicada en Gaceta Oficial N°40.956 de fecha 01 de Agosto de 2016<br>
<br><br>
Validado por: __________________________________<br>
Direcci&oacute;n de Control de Estudios. 
<br><br>
</div>
<table class='letra10'><tr><td>
<p>Nota: Esta constancia de no contar con la firma y sello de la Direción de Control de Estudios del estado pierde su validez.</p></td>
<td><?php echo $qr;?></td></tr></table>
<div style="text-align:center"><img src="/control/images/footer.jpg" height="50" width="650"/></div></td></tr></table>
</td></tr></table>
</center>
