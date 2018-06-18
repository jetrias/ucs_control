<?php

/**
 * Asic form base class.
 *
 * @method Asic getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAsicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'descripcion'  => new sfWidgetFormTextarea(),
      'municipio_id' => new sfWidgetFormInputText(),
      'estado_id'    => new sfWidgetFormInputText(),
      'parroquia_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'  => new sfValidatorString(array('required' => false)),
      'municipio_id' => new sfValidatorInteger(array('required' => false)),
      'estado_id'    => new sfValidatorInteger(array('required' => false)),
      'parroquia_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asic';
  }

}
