<?php

/**
 * CentroPoblado filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCentroPobladoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'      => new sfWidgetFormFilterInput(),
      'estado_codigo'    => new sfWidgetFormFilterInput(),
      'municipio_codigo' => new sfWidgetFormFilterInput(),
      'parroquia_codigo' => new sfWidgetFormFilterInput(),
      'parroquia_id'     => new sfWidgetFormFilterInput(),
      'centro_codigo'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion'      => new sfValidatorPass(array('required' => false)),
      'estado_codigo'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'municipio_codigo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parroquia_codigo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parroquia_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'centro_codigo'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('centro_poblado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CentroPoblado';
  }

  public function getFields()
  {
    return array(
      'descripcion'      => 'Text',
      'estado_codigo'    => 'Number',
      'municipio_codigo' => 'Number',
      'parroquia_codigo' => 'Number',
      'parroquia_id'     => 'Number',
      'id'               => 'Text',
      'centro_codigo'    => 'Text',
    );
  }
}
