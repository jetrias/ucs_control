<?php

/**
 * Reclamo form base class.
 *
 * @method Reclamo getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReclamoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'tipo_reclamo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoReclamo'), 'add_empty' => false)),
      'descripcion'     => new sfWidgetFormTextarea(),
      'estatus'         => new sfWidgetFormTextarea(),
      'estudiante_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipo_reclamo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoReclamo'))),
      'descripcion'     => new sfValidatorString(),
      'estatus'         => new sfValidatorString(array('required' => false)),
      'estudiante_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reclamo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reclamo';
  }

}
