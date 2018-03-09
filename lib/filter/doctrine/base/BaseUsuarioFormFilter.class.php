<?php

/**
 * Usuario filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'  => new sfWidgetFormFilterInput(),
      'usuario_nom' => new sfWidgetFormFilterInput(),
      'usuario_cla' => new sfWidgetFormFilterInput(),
      'usutip_id'   => new sfWidgetFormFilterInput(),
      'usuper_id'   => new sfWidgetFormFilterInput(),
      'usuario_pr1' => new sfWidgetFormFilterInput(),
      'usuario_re1' => new sfWidgetFormFilterInput(),
      'usuario_pr2' => new sfWidgetFormFilterInput(),
      'usuario_re2' => new sfWidgetFormFilterInput(),
      'usuario_fre' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'usuario_fbl' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'usuario_fde' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'usuario_obs' => new sfWidgetFormFilterInput(),
      'ususes_id'   => new sfWidgetFormFilterInput(),
      'usuest_id'   => new sfWidgetFormFilterInput(),
      'usurdi_id'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'persona_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuario_nom' => new sfValidatorPass(array('required' => false)),
      'usuario_cla' => new sfValidatorPass(array('required' => false)),
      'usutip_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuper_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuario_pr1' => new sfValidatorPass(array('required' => false)),
      'usuario_re1' => new sfValidatorPass(array('required' => false)),
      'usuario_pr2' => new sfValidatorPass(array('required' => false)),
      'usuario_re2' => new sfValidatorPass(array('required' => false)),
      'usuario_fre' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'usuario_fbl' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'usuario_fde' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'usuario_obs' => new sfValidatorPass(array('required' => false)),
      'ususes_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuest_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usurdi_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'persona_id'  => 'Number',
      'usuario_nom' => 'Text',
      'usuario_cla' => 'Text',
      'usutip_id'   => 'Number',
      'usuper_id'   => 'Number',
      'usuario_pr1' => 'Text',
      'usuario_re1' => 'Text',
      'usuario_pr2' => 'Text',
      'usuario_re2' => 'Text',
      'usuario_fre' => 'Date',
      'usuario_fbl' => 'Date',
      'usuario_fde' => 'Date',
      'usuario_obs' => 'Text',
      'ususes_id'   => 'Number',
      'usuest_id'   => 'Number',
      'usurdi_id'   => 'Number',
    );
  }
}
