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
    public function executeBuscarEse(sfWebRequest $request){
        $estudiante = $this->getUser()->getAttribute('estudiante_id');
        $this->data = EstudianteTable::buscarEse($estudiante);
        if($this->data[0]['id']!=''){
            $this->redirect('/control/index.php/estudio_socioeconomico/' . $this->data[0]['id'] . '/edit');
        }else{
            $this->redirect('/control/index.php/estudio_socioeconomico/new');
        }
    }
    
     protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $estudio_socioeconomico = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $estudio_socioeconomico)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@estudio_socioeconomico_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        //$this->redirect('/control/index.php/reporte/CP02a');
        $this->estudiante = $this->getUser()->getAttribute('estudiante_id');
        $actualizar= UsuarioTable::usuario1Vez($this->estudiante);
        $this->redirect('/control/estudiante.php/inicio');
//        $this->data =  EstudianteTable::buscarTipo($this->estudiante);
//        if($this->data[0]['n_ingreso']==true){
//            $this->redirect('/control/index.php/reporte/CICS');
//        }else{
//            $this->redirect('/control/index.php/reporte/planilla');
//        }
          
        //  $this->redirect('/control/index.php/reporte/CrearImg');
//        $this->redirect(array('sf_route' => 'estudio_socioeconomico_edit', 'sf_subject' => $estudio_socioeconomico));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
