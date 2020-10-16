<?php

require_once dirname(__FILE__).'/../lib/notasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/notasGeneratorHelper.class.php';

/**
 * notas actions.
 *
 * @package    ucs_control
 * @subpackage notas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notasActions extends autoNotasActions
{
public function executeBatch(sfWebRequest $request)
  {
   // $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@notas');
    }


    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@notas');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }
$this->$method($request);
    $validator = new sfValidatorDoctrineChoice(array('model' => 'notas'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@notas');
  }
 protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
//	print_r($ids);
//	exit();
    $count = Doctrine_Query::create()
      ->delete()
      ->from('notas')
      ->whereIn('id', $ids)
      ->execute();

   /* if ($count >= count($ids))
    {
      $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    }
    else
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
    }*/

    $this->redirect('@notas');
  }


}
