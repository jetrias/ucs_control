<?php

require_once dirname(__FILE__) . '/../lib/estudianteGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/estudianteGeneratorHelper.class.php';

/**
 * estudiante actions.
 *
 * @package    ucs_control
 * @subpackage estudiante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estudianteActions extends autoEstudianteActions {

    public function executeNew() {
        $this->getUser()->setFlash('error', sprintf('Se ha detectado una acción inválida en el sistema!'));
        $this->redirect("/control/index.php/buscar/buscar");
    }
    public function executeIndex() {
        $this->getUser()->setFlash('error', sprintf('Se ha detectado una acción inválida en el sistema!'));
        $this->redirect("/control/index.php/buscar/buscar");
    }
    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $estudiante = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $estudiante)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@estudiante_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect('/control/index.php/otra_informacion/buscarOtra');
                //$this->redirect(array('sf_route' => 'estudiante_edit', 'sf_subject' => $estudiante));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
