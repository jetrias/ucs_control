<?php

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
  public function executeReporteEstado(sfWebRequest $request){
      //select estados
      $this->estado=  EstadoTable::getEstado();
      //<option value="audi" selected>Audi</option>
      
  }
  public function executeMostrarReporteEstado(sfWebRequest $request){
      $this->estado = $this->getRequestParameter('estado');
      echo $this->estado;
      exit();
  }
}
