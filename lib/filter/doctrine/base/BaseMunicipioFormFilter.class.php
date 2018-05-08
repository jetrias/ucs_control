<?php

/**
 * Municipio filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMunicipioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'      => new sfWidgetFormFilterInput(),
      'estado_id'        => new sfWidgetFormFilterInput(),
      'municipio_codigo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion'      => new sfValidatorPass(array('required' => false)),
      'estado_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'municipio_codigo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('municipio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipio';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'descripcion'      => 'Text',
      'estado_id'        => 'Number',
      'municipio_codigo' => 'Number',
    );
  }
}
