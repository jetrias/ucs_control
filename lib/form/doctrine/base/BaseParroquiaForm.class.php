<?php

/**
 * Parroquia form base class.
 *
 * @method Parroquia getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParroquiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'descripcion'      => new sfWidgetFormTextarea(),
      'municipio_id'     => new sfWidgetFormInputText(),
      'estado_codigo'    => new sfWidgetFormInputText(),
      'municipio_codigo' => new sfWidgetFormInputText(),
      'parroquia_codigo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'      => new sfValidatorString(array('required' => false)),
      'municipio_id'     => new sfValidatorInteger(array('required' => false)),
      'estado_codigo'    => new sfValidatorInteger(array('required' => false)),
      'municipio_codigo' => new sfValidatorInteger(array('required' => false)),
      'parroquia_codigo' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parroquia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parroquia';
  }

}
