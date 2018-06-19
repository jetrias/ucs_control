<?php

/**
 * Notas form base class.
 *
 * @method Notas getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periodo'              => new sfWidgetFormTextarea(),
      'pasaporte'            => new sfWidgetFormTextarea(),
      'codigo_carrera'       => new sfWidgetFormTextarea(),
      'unidad_curricular'    => new sfWidgetFormTextarea(),
      'seccion'              => new sfWidgetFormTextarea(),
      'nota'                 => new sfWidgetFormTextarea(),
      'cedula'               => new sfWidgetFormTextarea(),
      'pnf_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'add_empty' => true)),
      'estudiante_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'codigo2'              => new sfWidgetFormTextarea(),
      'unidad_curricular_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadCurricular'), 'add_empty' => true)),
      'id'                   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'periodo'              => new sfValidatorString(array('required' => false)),
      'pasaporte'            => new sfValidatorString(array('required' => false)),
      'codigo_carrera'       => new sfValidatorString(array('required' => false)),
      'unidad_curricular'    => new sfValidatorString(array('required' => false)),
      'seccion'              => new sfValidatorString(array('required' => false)),
      'nota'                 => new sfValidatorString(array('required' => false)),
      'cedula'               => new sfValidatorString(array('required' => false)),
      'pnf_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'required' => false)),
      'estudiante_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'required' => false)),
      'codigo2'              => new sfValidatorString(array('required' => false)),
      'unidad_curricular_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadCurricular'), 'required' => false)),
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notas';
  }

}
