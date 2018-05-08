<?php

/**
 * UnidadCurricular filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUnidadCurricularFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mmc_id'      => new sfWidgetFormFilterInput(),
      'descripcion' => new sfWidgetFormFilterInput(),
      'pnf_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'add_empty' => true)),
      'cod_unerg'   => new sfWidgetFormFilterInput(),
      'ano_acad'    => new sfWidgetFormFilterInput(),
      'cod_sec_nac' => new sfWidgetFormFilterInput(),
      'cod_ubv'     => new sfWidgetFormFilterInput(),
      'asig_ig'     => new sfWidgetFormFilterInput(),
      'periodo_old' => new sfWidgetFormFilterInput(),
      'periodo_sec' => new sfWidgetFormFilterInput(),
      'periodo_un'  => new sfWidgetFormFilterInput(),
      'prelacion'   => new sfWidgetFormFilterInput(),
      'periodo_id'  => new sfWidgetFormFilterInput(),
      'trayecto_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mmc_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'pnf_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pnf'), 'column' => 'id')),
      'cod_unerg'   => new sfValidatorPass(array('required' => false)),
      'ano_acad'    => new sfValidatorPass(array('required' => false)),
      'cod_sec_nac' => new sfValidatorPass(array('required' => false)),
      'cod_ubv'     => new sfValidatorPass(array('required' => false)),
      'asig_ig'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'periodo_old' => new sfValidatorPass(array('required' => false)),
      'periodo_sec' => new sfValidatorPass(array('required' => false)),
      'periodo_un'  => new sfValidatorPass(array('required' => false)),
      'prelacion'   => new sfValidatorPass(array('required' => false)),
      'periodo_id'  => new sfValidatorPass(array('required' => false)),
      'trayecto_id' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('unidad_curricular_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UnidadCurricular';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'mmc_id'      => 'Number',
      'descripcion' => 'Text',
      'pnf_id'      => 'ForeignKey',
      'cod_unerg'   => 'Text',
      'ano_acad'    => 'Text',
      'cod_sec_nac' => 'Text',
      'cod_ubv'     => 'Text',
      'asig_ig'     => 'Number',
      'periodo_old' => 'Text',
      'periodo_sec' => 'Text',
      'periodo_un'  => 'Text',
      'prelacion'   => 'Text',
      'periodo_id'  => 'Text',
      'trayecto_id' => 'Text',
    );
  }
}
