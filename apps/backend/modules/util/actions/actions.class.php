<?php

/**
 * util actions.
 *
 * @package    ucs_control
 * @subpackage util
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class utilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  public function executeIncluirNotasSenamef(sfWebRequest $request) {
       // $this->setLayout(false);
//        if ($request->getParameter('eliminar') == 'eliminar') {
//            $this->ieu = IeuTable::getIeuDesc($request->getParameter('ieu'));
//            $this->ieu2 = IeuTable::getIeu_by_Desc($this->ieu[0]['descripcion']);
//            IeuTable::delete_becarios($this->ieu[0]['descripcion']);
//            $total_eliminar=0;
//            $id_ieu=null;
//            foreach($this->ieu2 as $data):
//                $id_ieu.=$data['id'].',';   
//            endforeach;
//            $id_ieu=substr($id_ieu, 0, -1);
//            $personas=  PersonaTable::getPersonaByIeu($id_ieu);
//               foreach($personas as $data_persona):
//                    if($data_persona['id']!=''){
//                        $id_eliminar.=($personas[0]['id']).',';
//                        $total_eliminar++;
//                    }
//                endforeach;
//            $id_eliminar=substr($id_eliminar, 0, -1);
////            $eliminar=  IeuTable::delete_becarios($personas[0]['id']);
//            $eliminar=  IeuTable::delete_becarios($id_eliminar);
//        }
//        $this->file = html_entity_decode($request->getParameter('archivo'), ENT_NOQUOTES);
//        $excel = new Spreadsheet_Excel_Reader($this->file);
//        $data = $excel->dumptoarray();
//        $ieu_estado = $request->getParameter('estado');
//        $ieu = $request->getParameter('ieu');
      if ($request->getParameter('Subir') == 'Subir') {
            if ($_FILES['archivo']["error"] > 0) {
                echo "Error: " . $_FILES['archivo']['error'] . "";
            } else {
                $this->archivo = $request->getFiles('archivo');
                $this->archivoPath = sfConfig::get('sf_upload_dir') . '/incluir/' . $this->archivo['name'];
                if ($this->archivo['type'] == 'application/vnd.ms-excel') {
                    if (move_uploaded_file($this->archivo['tmp_name'], $this->archivoPath)) {
                        $excel = new Spreadsheet_Excel_Reader($this->archivoPath);
                        $data = $excel->dumptoarray();
                        $x = 0;
                        $y = null;

                        foreach ($data as $result):
                            $x++;
                              $estudiante=EstudianteTable::buscaPersona('V', $result[3]);
                              if($estudiante[0]['id']==''){
                                  //inserta estudiante
                                  $insert= EstudianteTable::insertaEstudiante('V',$result[2],$result[3]);
                              }
                              $estudiante=EstudianteTable::buscaPersona('V', $result[3]);
                              $insert_scbvi=NotasTable::insertSCBVI($estudiante[0]['id'], $result[4]);
                              $insert_pfi=NotasTable::insertPFI($estudiante[0]['id'], $result[5]);
                              $insert_ib=NotasTable::insertIB($estudiante[0]['id'], $result[6]);
                              $insert_scbviI=NotasTable::insertSCBVII($estudiante[0]['id'], $result[7]);
                              $insert_pfii=NotasTable::insertPFII($estudiante[0]['id'], $result[8]);
                              $insert_pei=NotasTable::insertPEI($estudiante[0]['id'], $result[9]);
                              $insert_ibii=NotasTable::insertIBII($estudiante[0]['id'], $result[10]);
                              $insert_sii=NotasTable::insertSII($estudiante[0]['id'], $result[11]);
                              $insert_peiI=NotasTable::insertPEII($estudiante[0]['id'], $result[12]);
                              $insert_pfiii=NotasTable::insertPFIII($estudiante[0]['id'], $result[13]);
                              $insert_ca=NotasTable::insertCA($estudiante[0]['id'], $result[14]);
                              $insert_ibiii=NotasTable::insertIBIII($estudiante[0]['id'], $result[15]);
                        endforeach;
                        $this->mensaje .="Fueron procesados un total de $x estudiantes.";
                    }
                } else {
                    $this->mensaje .= 'El archivo que subio no es de excel por favor suba otro archivo con la extension .xls';
                }
            }
        }
    }

}
