<?php

/**
 * CodigoTlf filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCodigoTlfFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo' => new sfWidgetFormFilterInput(),
      'tipo'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo' => new sfValidatorPass(array('required' => false)),
      'tipo'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('codigo_tlf_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CodigoTlf';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'codigo' => 'Text',
      'tipo'   => 'Text',
    );
  }
}
