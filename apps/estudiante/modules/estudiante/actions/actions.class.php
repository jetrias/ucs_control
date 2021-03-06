<?php

require_once dirname(__FILE__).'/../lib/estudianteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/estudianteGeneratorHelper.class.php';

/**
 * estudiante actions.
 *
 * @package    ucs_control
 * @subpackage estudiante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estudianteActions extends autoEstudianteActions
{
    public function executeIndex(sfWebRequest $request)
  {
        $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->redirect("/control/estudiante.php/estudiante/".$estudiante."/edit");
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $estudiante = $form->save();
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $estudiante)));
      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');
        $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->redirect("/control/estudiante.php/estudiante/".$estudiante."/edit");
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'estudiante_edit', 'sf_subject' => $estudiante));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
