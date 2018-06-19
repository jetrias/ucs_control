<?php

/**
 * Reclamo form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReclamoForm extends BaseReclamoForm
{
  public function configure()
  {
      unset($this['estudiante_id']);
     $this->widgetSchema['estatus'] = new sfWidgetFormInput();
      if (sfConfig::get("sf_app") == 'estudiante') {
          $this->widgetSchema['estatus']->setAttribute('readonly', 'readonly');
          
      }else{
           $this->widgetSchema['estatus'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "REGISTRADO" => "REGISTRADO", "REVISADO" => "REVISADO", "RESUELTO" => "RESUELTO")));
      }
      
  }
}
