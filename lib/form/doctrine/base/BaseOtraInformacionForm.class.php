<?php

/**
 * OtraInformacion form base class.
 *
 * @method OtraInformacion getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOtraInformacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'estudiante_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => false)),
      'base_mision'                  => new sfWidgetFormTextarea(),
      'det_base_mision'              => new sfWidgetFormTextarea(),
      'org_dep'                      => new sfWidgetFormTextarea(),
      'det_org_deportiva'            => new sfWidgetFormTextarea(),
      'org_cultural'                 => new sfWidgetFormTextarea(),
      'det_org_cultural'             => new sfWidgetFormTextarea(),
      'org_ecologista'               => new sfWidgetFormTextarea(),
      'det_org_ecologista'           => new sfWidgetFormTextarea(),
      'org_productiva'               => new sfWidgetFormTextarea(),
      'det_org_productiva'           => new sfWidgetFormTextarea(),
      'mil_bolivariana'              => new sfWidgetFormTextarea(),
      'det_mil_bolivariana'          => new sfWidgetFormTextarea(),
      'iniciativa_productiva'        => new sfWidgetFormTextarea(),
      'facebook'                     => new sfWidgetFormTextarea(),
      'twitter'                      => new sfWidgetFormTextarea(),
      'instagram'                    => new sfWidgetFormTextarea(),
      'org_politica_estudiantil'     => new sfWidgetFormTextarea(),
      'det_org_politica_estudiantil' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'estudiante_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'))),
      'base_mision'                  => new sfValidatorString(),
      'det_base_mision'              => new sfValidatorString(array('required' => false)),
      'org_dep'                      => new sfValidatorString(),
      'det_org_deportiva'            => new sfValidatorString(array('required' => false)),
      'org_cultural'                 => new sfValidatorString(array('required' => false)),
      'det_org_cultural'             => new sfValidatorString(array('required' => false)),
      'org_ecologista'               => new sfValidatorString(array('required' => false)),
      'det_org_ecologista'           => new sfValidatorString(array('required' => false)),
      'org_productiva'               => new sfValidatorString(array('required' => false)),
      'det_org_productiva'           => new sfValidatorString(array('required' => false)),
      'mil_bolivariana'              => new sfValidatorString(array('required' => false)),
      'det_mil_bolivariana'          => new sfValidatorString(array('required' => false)),
      'iniciativa_productiva'        => new sfValidatorString(array('required' => false)),
      'facebook'                     => new sfValidatorString(array('required' => false)),
      'twitter'                      => new sfValidatorString(array('required' => false)),
      'instagram'                    => new sfValidatorString(array('required' => false)),
      'org_politica_estudiantil'     => new sfValidatorString(array('required' => false)),
      'det_org_politica_estudiantil' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('otra_informacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OtraInformacion';
  }

}
