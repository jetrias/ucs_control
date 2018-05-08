<?php

/**
 * Asic filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAsicFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'  => new sfWidgetFormFilterInput(),
      'municipio_id' => new sfWidgetFormFilterInput(),
      'estado_id'    => new sfWidgetFormFilterInput(),
      'parroquia_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'municipio_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parroquia_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('asic_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asic';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'descripcion'  => 'Text',
      'municipio_id' => 'Number',
      'estado_id'    => 'Number',
      'parroquia_id' => 'Number',
    );
  }
}
