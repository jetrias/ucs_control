<?php

/**
 * Reclamo filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReclamoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_reclamo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoReclamo'), 'add_empty' => true)),
      'descripcion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estatus'         => new sfWidgetFormFilterInput(),
      'estudiante_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tipo_reclamo_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoReclamo'), 'column' => 'id')),
      'descripcion'     => new sfValidatorPass(array('required' => false)),
      'estatus'         => new sfValidatorPass(array('required' => false)),
      'estudiante_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudiante'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('reclamo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reclamo';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'tipo_reclamo_id' => 'ForeignKey',
      'descripcion'     => 'Text',
      'estatus'         => 'Text',
      'estudiante_id'   => 'ForeignKey',
    );
  }
}
