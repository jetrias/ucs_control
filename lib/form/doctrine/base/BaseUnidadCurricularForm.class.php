<?php

/**
 * UnidadCurricular form base class.
 *
 * @method UnidadCurricular getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUnidadCurricularForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'mmc_id'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormTextarea(),
      'pnf_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'add_empty' => true)),
      'cod_unerg'   => new sfWidgetFormTextarea(),
      'ano_acad'    => new sfWidgetFormTextarea(),
      'cod_sec_nac' => new sfWidgetFormTextarea(),
      'cod_ubv'     => new sfWidgetFormTextarea(),
      'asig_ig'     => new sfWidgetFormInputText(),
      'periodo_old' => new sfWidgetFormTextarea(),
      'periodo_sec' => new sfWidgetFormTextarea(),
      'periodo_un'  => new sfWidgetFormTextarea(),
      'prelacion'   => new sfWidgetFormTextarea(),
      'periodo_id'  => new sfWidgetFormTextarea(),
      'trayecto_id' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mmc_id'      => new sfValidatorInteger(array('required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'pnf_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pnf'), 'required' => false)),
      'cod_unerg'   => new sfValidatorString(array('required' => false)),
      'ano_acad'    => new sfValidatorString(array('required' => false)),
      'cod_sec_nac' => new sfValidatorString(array('required' => false)),
      'cod_ubv'     => new sfValidatorString(array('required' => false)),
      'asig_ig'     => new sfValidatorInteger(array('required' => false)),
      'periodo_old' => new sfValidatorString(array('required' => false)),
      'periodo_sec' => new sfValidatorString(array('required' => false)),
      'periodo_un'  => new sfValidatorString(array('required' => false)),
      'prelacion'   => new sfValidatorString(array('required' => false)),
      'periodo_id'  => new sfValidatorString(array('required' => false)),
      'trayecto_id' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('unidad_curricular[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UnidadCurricular';
  }

}
