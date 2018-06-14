<?php

/**
 * PeriodoLectivo form base class.
 *
 * @method PeriodoLectivo getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePeriodoLectivoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormTextarea(),
      'fecha_desde' => new sfWidgetFormDate(),
      'fecha_hasta' => new sfWidgetFormDate(),
      'activo'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'fecha_desde' => new sfValidatorDate(array('required' => false)),
      'fecha_hasta' => new sfValidatorDate(array('required' => false)),
      'activo'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('periodo_lectivo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PeriodoLectivo';
  }

}
