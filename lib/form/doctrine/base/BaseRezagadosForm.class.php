<?php

/**
 * Rezagados form base class.
 *
 * @method Rezagados getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRezagadosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'id_alumno'            => new sfWidgetFormTextarea(),
      'id_malla'             => new sfWidgetFormTextarea(),
      'id_uc'                => new sfWidgetFormTextarea(),
      'seccion'              => new sfWidgetFormTextarea(),
      'periodo'              => new sfWidgetFormTextarea(),
      'nota'                 => new sfWidgetFormTextarea(),
      'id_estado'            => new sfWidgetFormTextarea(),
      'id_tipo_aldea'        => new sfWidgetFormTextarea(),
      'certificaci�n'      => new sfWidgetFormTextarea(),
      'idestado'             => new sfWidgetFormTextarea(),
      'fecha'                => new sfWidgetFormTextarea(),
      'asignatura'           => new sfWidgetFormTextarea(),
      'estudiante_id'        => new sfWidgetFormInputText(),
      'unidad_curricular_id' => new sfWidgetFormInputText(),
      'pnf_id'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_alumno'            => new sfValidatorString(array('required' => false)),
      'id_malla'             => new sfValidatorString(array('required' => false)),
      'id_uc'                => new sfValidatorString(array('required' => false)),
      'seccion'              => new sfValidatorString(array('required' => false)),
      'periodo'              => new sfValidatorString(array('required' => false)),
      'nota'                 => new sfValidatorString(array('required' => false)),
      'id_estado'            => new sfValidatorString(array('required' => false)),
      'id_tipo_aldea'        => new sfValidatorString(array('required' => false)),
      'certificaci�n'      => new sfValidatorString(array('required' => false)),
      'idestado'             => new sfValidatorString(array('required' => false)),
      'fecha'                => new sfValidatorString(array('required' => false)),
      'asignatura'           => new sfValidatorString(array('required' => false)),
      'estudiante_id'        => new sfValidatorInteger(array('required' => false)),
      'unidad_curricular_id' => new sfValidatorInteger(array('required' => false)),
      'pnf_id'               => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rezagados[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rezagados';
  }

}
