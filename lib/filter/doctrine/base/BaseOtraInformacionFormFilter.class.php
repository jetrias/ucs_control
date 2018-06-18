<?php

/**
 * OtraInformacion filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOtraInformacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'estudiante_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'base_mision'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'det_base_mision'              => new sfWidgetFormFilterInput(),
      'org_dep'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'det_org_deportiva'            => new sfWidgetFormFilterInput(),
      'org_cultural'                 => new sfWidgetFormFilterInput(),
      'det_org_cultural'             => new sfWidgetFormFilterInput(),
      'org_ecologista'               => new sfWidgetFormFilterInput(),
      'det_org_ecologista'           => new sfWidgetFormFilterInput(),
      'org_productiva'               => new sfWidgetFormFilterInput(),
      'det_org_productiva'           => new sfWidgetFormFilterInput(),
      'mil_bolivariana'              => new sfWidgetFormFilterInput(),
      'det_mil_bolivariana'          => new sfWidgetFormFilterInput(),
      'iniciativa_productiva'        => new sfWidgetFormFilterInput(),
      'facebook'                     => new sfWidgetFormFilterInput(),
      'twitter'                      => new sfWidgetFormFilterInput(),
      'instagram'                    => new sfWidgetFormFilterInput(),
      'org_politica_estudiantil'     => new sfWidgetFormFilterInput(),
      'det_org_politica_estudiantil' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'estudiante_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudiante'), 'column' => 'id')),
      'base_mision'                  => new sfValidatorPass(array('required' => false)),
      'det_base_mision'              => new sfValidatorPass(array('required' => false)),
      'org_dep'                      => new sfValidatorPass(array('required' => false)),
      'det_org_deportiva'            => new sfValidatorPass(array('required' => false)),
      'org_cultural'                 => new sfValidatorPass(array('required' => false)),
      'det_org_cultural'             => new sfValidatorPass(array('required' => false)),
      'org_ecologista'               => new sfValidatorPass(array('required' => false)),
      'det_org_ecologista'           => new sfValidatorPass(array('required' => false)),
      'org_productiva'               => new sfValidatorPass(array('required' => false)),
      'det_org_productiva'           => new sfValidatorPass(array('required' => false)),
      'mil_bolivariana'              => new sfValidatorPass(array('required' => false)),
      'det_mil_bolivariana'          => new sfValidatorPass(array('required' => false)),
      'iniciativa_productiva'        => new sfValidatorPass(array('required' => false)),
      'facebook'                     => new sfValidatorPass(array('required' => false)),
      'twitter'                      => new sfValidatorPass(array('required' => false)),
      'instagram'                    => new sfValidatorPass(array('required' => false)),
      'org_politica_estudiantil'     => new sfValidatorPass(array('required' => false)),
      'det_org_politica_estudiantil' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('otra_informacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OtraInformacion';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'estudiante_id'                => 'ForeignKey',
      'base_mision'                  => 'Text',
      'det_base_mision'              => 'Text',
      'org_dep'                      => 'Text',
      'det_org_deportiva'            => 'Text',
      'org_cultural'                 => 'Text',
      'det_org_cultural'             => 'Text',
      'org_ecologista'               => 'Text',
      'det_org_ecologista'           => 'Text',
      'org_productiva'               => 'Text',
      'det_org_productiva'           => 'Text',
      'mil_bolivariana'              => 'Text',
      'det_mil_bolivariana'          => 'Text',
      'iniciativa_productiva'        => 'Text',
      'facebook'                     => 'Text',
      'twitter'                      => 'Text',
      'instagram'                    => 'Text',
      'org_politica_estudiantil'     => 'Text',
      'det_org_politica_estudiantil' => 'Text',
    );
  }
}
