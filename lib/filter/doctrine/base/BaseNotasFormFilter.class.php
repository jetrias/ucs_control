<?php

/**
 * Notas filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periodo'              => new sfWidgetFormFilterInput(),
      'pasaporte'            => new sfWidgetFormFilterInput(),
      'codigo_carrera'       => new sfWidgetFormFilterInput(),
      'unidad_curricular'    => new sfWidgetFormFilterInput(),
      'seccion'              => new sfWidgetFormFilterInput(),
      'nota'                 => new sfWidgetFormFilterInput(),
      'cedula'               => new sfWidgetFormFilterInput(),
      'pnf_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'add_empty' => true)),
      'estudiante_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'codigo2'              => new sfWidgetFormFilterInput(),
      'unidad_curricular_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadCurricular'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'periodo'              => new sfValidatorPass(array('required' => false)),
      'pasaporte'            => new sfValidatorPass(array('required' => false)),
      'codigo_carrera'       => new sfValidatorPass(array('required' => false)),
      'unidad_curricular'    => new sfValidatorPass(array('required' => false)),
      'seccion'              => new sfValidatorPass(array('required' => false)),
      'nota'                 => new sfValidatorPass(array('required' => false)),
      'cedula'               => new sfValidatorPass(array('required' => false)),
      'pnf_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pnf'), 'column' => 'id')),
      'estudiante_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudiante'), 'column' => 'id')),
      'codigo2'              => new sfValidatorPass(array('required' => false)),
      'unidad_curricular_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UnidadCurricular'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('notas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notas';
  }

  public function getFields()
  {
    return array(
      'periodo'              => 'Text',
      'pasaporte'            => 'Text',
      'codigo_carrera'       => 'Text',
      'unidad_curricular'    => 'Text',
      'seccion'              => 'Text',
      'nota'                 => 'Text',
      'cedula'               => 'Text',
      'pnf_id'               => 'ForeignKey',
      'estudiante_id'        => 'ForeignKey',
      'codigo2'              => 'Text',
      'unidad_curricular_id' => 'ForeignKey',
      'id'                   => 'Number',
    );
  }
}
