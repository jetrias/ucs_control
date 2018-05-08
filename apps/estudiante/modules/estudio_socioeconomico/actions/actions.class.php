<?php

require_once dirname(__FILE__).'/../lib/estudio_socioeconomicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/estudio_socioeconomicoGeneratorHelper.class.php';

/**
 * estudio_socioeconomico actions.
 *
 * @package    ucs_control
 * @subpackage estudio_socioeconomico
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estudio_socioeconomicoActions extends autoEstudio_socioeconomicoActions
{
    public function executeIndex(sfWebRequest $request)
  {
        $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->data = EstudianteTable::buscarEse($estudiante);
        if($this->data[0]['id']!=''){
            $this->redirect('/control/estudiante.php/estudio_socioeconomico/' . $this->data[0]['id'] . '/edit');
        }else{
            $this->redirect('/control/estudiante.php/estudio_socioeconomico/new');
        }
    // sorting
//    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
//    {
//      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
//    }
//
//    // pager
//    if ($request->getParameter('page'))
//    {
//      $this->setPage($request->getParameter('page'));
//    }
//
//    $this->pager = $this->getPager();
//    $this->sort = $this->getSort();
  }
}
