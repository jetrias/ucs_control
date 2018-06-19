<?php

/**
 * Notas form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotasForm extends BaseNotasForm
{
  public function configure()
  {
      unset($this['estudiante_id']);
       $this->widgetSchema['unidad_curricular_id'] = new sfWidgetFormDoctrineChoice(array(
                 'model'     => 'UnidadCurricular',
                 //'table_method'=>'getUi',
                 'add_empty' => false,
));
       $this->widgetSchema['periodo'] = new sfWidgetFormInput();
       $this->widgetSchema['nota'] = new sfWidgetFormInput();
       $this->widgetSchema['seccion'] = new sfWidgetFormInput();
  }
}
