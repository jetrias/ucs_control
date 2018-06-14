<?php

/**
 * Rezagados filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRezagadosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_alumno'            => new sfWidgetFormFilterInput(),
      'id_malla'             => new sfWidgetFormFilterInput(),
      'id_uc'                => new sfWidgetFormFilterInput(),
      'seccion'              => new sfWidgetFormFilterInput(),
      'periodo'              => new sfWidgetFormFilterInput(),
      'nota'                 => new sfWidgetFormFilterInput(),
      'id_estado'            => new sfWidgetFormFilterInput(),
      'id_tipo_aldea'        => new sfWidgetFormFilterInput(),
      'certificaci�n'      => new sfWidgetFormFilterInput(),
      'idestado'             => new sfWidgetFormFilterInput(),
      'fecha'                => new sfWidgetFormFilterInput(),
      'asignatura'           => new sfWidgetFormFilterInput(),
      'estudiante_id'        => new sfWidgetFormFilterInput(),
      'unidad_curricular_id' => new sfWidgetFormFilterInput(),
      'pnf_id'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_alumno'            => new sfValidatorPass(array('required' => false)),
      'id_malla'             => new sfValidatorPass(array('required' => false)),
      'id_uc'                => new sfValidatorPass(array('required' => false)),
      'seccion'              => new sfValidatorPass(array('required' => false)),
      'periodo'              => new sfValidatorPass(array('required' => false)),
      'nota'                 => new sfValidatorPass(array('required' => false)),
      'id_estado'            => new sfValidatorPass(array('required' => false)),
      'id_tipo_aldea'        => new sfValidatorPass(array('required' => false)),
      'certificaci�n'      => new sfValidatorPass(array('required' => false)),
      'idestado'             => new sfValidatorPass(array('required' => false)),
      'fecha'                => new sfValidatorPass(array('required' => false)),
      'asignatura'           => new sfValidatorPass(array('required' => false)),
      'estudiante_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unidad_curricular_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pnf_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rezagados_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rezagados';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'id_alumno'            => 'Text',
      'id_malla'             => 'Text',
      'id_uc'                => 'Text',
      'seccion'              => 'Text',
      'periodo'              => 'Text',
      'nota'                 => 'Text',
      'id_estado'            => 'Text',
      'id_tipo_aldea'        => 'Text',
      'certificaci�n'      => 'Text',
      'idestado'             => 'Text',
      'fecha'                => 'Text',
      'asignatura'           => 'Text',
      'estudiante_id'        => 'Number',
      'unidad_curricular_id' => 'Number',
      'pnf_id'               => 'Number',
    );
  }
}
