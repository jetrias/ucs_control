<?php

/**
 * CentroPoblado form base class.
 *
 * @method CentroPoblado getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCentroPobladoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'      => new sfWidgetFormTextarea(),
      'estado_codigo'    => new sfWidgetFormInputText(),
      'municipio_codigo' => new sfWidgetFormInputText(),
      'parroquia_codigo' => new sfWidgetFormInputText(),
      'parroquia_id'     => new sfWidgetFormInputText(),
      'id'               => new sfWidgetFormInputHidden(),
      'centro_codigo'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'descripcion'      => new sfValidatorString(array('required' => false)),
      'estado_codigo'    => new sfValidatorInteger(array('required' => false)),
      'municipio_codigo' => new sfValidatorInteger(array('required' => false)),
      'parroquia_codigo' => new sfValidatorInteger(array('required' => false)),
      'parroquia_id'     => new sfValidatorInteger(array('required' => false)),
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'centro_codigo'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('centro_poblado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CentroPoblado';
  }

}
