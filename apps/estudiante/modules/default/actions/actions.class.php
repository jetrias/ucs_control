<?php

/**
 * default actions.
 *
 * @package    ucs_control
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
//    $this->forward('default', 'module');
  }
  public function executeError404(sfWebRequest $request)
  {   
  }
    public function executeLogin(sfWebRequest $request)
  {
  }
  
}