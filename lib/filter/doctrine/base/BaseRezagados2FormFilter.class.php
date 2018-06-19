<?php

/**
 * Rezagados2 filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRezagados2FormFilter extends BaseFormFilterDoctrine
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
      'pnf_id'               => new sfWidgetFormFilterInput(),
      'estudiante_id'        => new sfWidgetFormFilterInput(),
      'codigo2'              => new sfWidgetFormFilterInput(),
      'unidad_curricular_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'periodo'              => new sfValidatorPass(array('required' => false)),
      'pasaporte'            => new sfValidatorPass(array('required' => false)),
      'codigo_carrera'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unidad_curricular'    => new sfValidatorPass(array('required' => false)),
      'seccion'              => new sfValidatorPass(array('required' => false)),
      'nota'                 => new sfValidatorPass(array('required' => false)),
      'cedula'               => new sfValidatorPass(array('required' => false)),
      'pnf_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estudiante_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo2'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unidad_curricular_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rezagados2_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rezagados2';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'periodo'              => 'Text',
      'pasaporte'            => 'Text',
      'codigo_carrera'       => 'Number',
      'unidad_curricular'    => 'Text',
      'seccion'              => 'Text',
      'nota'                 => 'Text',
      'cedula'               => 'Text',
      'pnf_id'               => 'Number',
      'estudiante_id'        => 'Number',
      'codigo2'              => 'Number',
      'unidad_curricular_id' => 'Number',
    );
  }
}
