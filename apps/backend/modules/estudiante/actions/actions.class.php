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
        $this->getUser()->getAttributeHolder()->remove('estudiante_id');
        $this->getUser()->getAttributeHolder()->remove('usuario_edit');
    // sorting
    if ($request->getParameter('sort'))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    // has filters? (usefull for activate reset button)
    $this->hasFilters = $this->getUser()->getAttribute('estudiante.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }
    public function executeList_traslado(sfWebRequest $request){
        $id=$request->getParameter('id');
        $this->getUser()->setAttribute('estudiante_id',$id);
        $this->redirect('/control/backend.php/traslado');
    }
    public function executeList_notas(sfWebRequest $request){
        $id=$request->getParameter('id');
        $this->getUser()->setAttribute('estudiante_id',$id);
        $this->redirect('/control/backend.php/notas');
    }
    public function executeList_activo(sfWebRequest $request){
        $id=$request->getParameter('id');
        EstudianteTable::activarEstudiante($id);
        $this->getUser()->setFlash('notice', 'Se modificó el estatus del estudiante a ACTIVO y se marcó verificado!');
        $this->redirect('/control/backend.php/estudiante');
    }
    public function executeList_baja(sfWebRequest $request){
        $id=$request->getParameter('id');
        EstudianteTable::bajaEstudiante($id);
        $this->getUser()->setFlash('notice', 'Se modificó el estatus del estudiante a LICENCIA y se marcó verificado!');
        $this->redirect('/control/backend.php/estudiante');
    }
    public function executeList_licencia(sfWebRequest $request){
        $id=$request->getParameter('id');
        EstudianteTable::licenciaEstudiante($id);
        $this->getUser()->setFlash('notice', 'Se modificó el estatus del estudiante a BAJA y se marcó verificado!');
        $this->redirect('/control/backend.php/estudiante');
    }
    public function executeList_usuario(sfWebRequest $request){
        $id=$request->getParameter('id');
        $this->getUser()->setAttribute('estudiante_id', $id);
        $this->getUser()->setAttribute('usuario_edit','1');
        $this->redirect('/control/backend.php/usuario');
    }
}
