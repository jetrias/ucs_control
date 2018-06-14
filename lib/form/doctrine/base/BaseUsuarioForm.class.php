<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'persona_id'  => new sfWidgetFormInputText(),
      'usuario_nom' => new sfWidgetFormInputText(),
      'usuario_cla' => new sfWidgetFormTextarea(),
      'usutip_id'   => new sfWidgetFormInputText(),
      'usuper_id'   => new sfWidgetFormInputText(),
      'usuario_pr1' => new sfWidgetFormTextarea(),
      'usuario_re1' => new sfWidgetFormTextarea(),
      'usuario_pr2' => new sfWidgetFormTextarea(),
      'usuario_re2' => new sfWidgetFormTextarea(),
      'usuario_fre' => new sfWidgetFormDate(),
      'usuario_fbl' => new sfWidgetFormDate(),
      'usuario_fde' => new sfWidgetFormDate(),
      'usuario_obs' => new sfWidgetFormTextarea(),
      'ususes_id'   => new sfWidgetFormInputText(),
      'usuest_id'   => new sfWidgetFormInputText(),
      'usurdi_id'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_id'  => new sfValidatorInteger(array('required' => false)),
      'usuario_nom' => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'usuario_cla' => new sfValidatorString(array('required' => false)),
      'usutip_id'   => new sfValidatorInteger(array('required' => false)),
      'usuper_id'   => new sfValidatorInteger(array('required' => false)),
      'usuario_pr1' => new sfValidatorString(array('required' => false)),
      'usuario_re1' => new sfValidatorString(array('required' => false)),
      'usuario_pr2' => new sfValidatorString(array('required' => false)),
      'usuario_re2' => new sfValidatorString(array('required' => false)),
      'usuario_fre' => new sfValidatorDate(array('required' => false)),
      'usuario_fbl' => new sfValidatorDate(array('required' => false)),
      'usuario_fde' => new sfValidatorDate(array('required' => false)),
      'usuario_obs' => new sfValidatorString(array('required' => false)),
      'ususes_id'   => new sfValidatorInteger(array('required' => false)),
      'usuest_id'   => new sfValidatorInteger(array('required' => false)),
      'usurdi_id'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
