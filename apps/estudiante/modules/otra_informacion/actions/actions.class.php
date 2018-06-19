<?php

require_once dirname(__FILE__).'/../lib/otra_informacionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/otra_informacionGeneratorHelper.class.php';

/**
 * otra_informacion actions.
 *
 * @package    ucs_control
 * @subpackage otra_informacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class otra_informacionActions extends autoOtra_informacionActions
{
    public function executeIndex(sfWebRequest $request)
  {
     $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->data = OtraInformacionTable::buscarOtra($estudiante);
        if($this->data[0]['id']!=''){
            $this->redirect('/control/estudiante.php/otra_informacion/' . $this->data[0]['id'] . '/edit');
        }else{
            $this->redirect('/control/estudiante.php/otra_informacion/new');
        }
  }
}
