<?php

/**
 * Rezagados2 form base class.
 *
 * @method Rezagados2 getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRezagados2Form extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'periodo'              => new sfWidgetFormTextarea(),
      'pasaporte'            => new sfWidgetFormTextarea(),
      'codigo_carrera'       => new sfWidgetFormInputText(),
      'unidad_curricular'    => new sfWidgetFormTextarea(),
      'seccion'              => new sfWidgetFormTextarea(),
      'nota'                 => new sfWidgetFormTextarea(),
      'cedula'               => new sfWidgetFormTextarea(),
      'pnf_id'               => new sfWidgetFormInputText(),
      'estudiante_id'        => new sfWidgetFormInputText(),
      'codigo2'              => new sfWidgetFormInputText(),
      'unidad_curricular_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'periodo'              => new sfValidatorString(array('required' => false)),
      'pasaporte'            => new sfValidatorString(array('required' => false)),
      'codigo_carrera'       => new sfValidatorInteger(array('required' => false)),
      'unidad_curricular'    => new sfValidatorString(array('required' => false)),
      'seccion'              => new sfValidatorString(array('required' => false)),
      'nota'                 => new sfValidatorString(array('required' => false)),
      'cedula'               => new sfValidatorString(array('required' => false)),
      'pnf_id'               => new sfValidatorInteger(array('required' => false)),
      'estudiante_id'        => new sfValidatorInteger(array('required' => false)),
      'codigo2'              => new sfValidatorInteger(array('required' => false)),
      'unidad_curricular_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rezagados2[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rezagados2';
  }

}
