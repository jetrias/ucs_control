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
    public function executeBuscarOtra(sfWebRequest $request){
        $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->data = OtraInformacionTable::buscarOtra($estudiante);
        if($this->data[0]['id']!=''){
            $this->redirect('/control/index.php/otra_informacion/' . $this->data[0]['id'] . '/edit');
        }else{
            $this->redirect('/control/index.php/otra_informacion/new');
        }
        
    }
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $otra_informacion = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $otra_informacion)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@otra_informacion_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        $this->redirect('/control/index.php/estudio_socioeconomico/buscarEse');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
