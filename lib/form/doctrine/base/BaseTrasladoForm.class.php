<?php

/**
 * Traslado form base class.
 *
 * @method Traslado getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrasladoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'estudiante_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'estado_emisor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'municipio_emisor_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'asic_emisor_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'add_empty' => true)),
      'estado_receptor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_3'), 'add_empty' => true)),
      'municipio_receptor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_5'), 'add_empty' => true)),
      'asic_receptor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_7'), 'add_empty' => true)),
      'fecha_emision'         => new sfWidgetFormDate(),
      'fecha_recepcion'       => new sfWidgetFormDate(),
      'tipo_traslado'         => new sfWidgetFormTextarea(),
      'estatus_expediente'    => new sfWidgetFormTextarea(),
      'observacion'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'estudiante_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'required' => false)),
      'estado_emisor_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'required' => false)),
      'municipio_emisor_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'required' => false)),
      'asic_emisor_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'required' => false)),
      'estado_receptor_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_3'), 'required' => false)),
      'municipio_receptor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_5'), 'required' => false)),
      'asic_receptor_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_7'), 'required' => false)),
      'fecha_emision'         => new sfValidatorDate(array('required' => false)),
      'fecha_recepcion'       => new sfValidatorDate(array('required' => false)),
      'tipo_traslado'         => new sfValidatorString(array('required' => false)),
      'estatus_expediente'    => new sfValidatorString(array('required' => false)),
      'observacion'           => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('traslado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Traslado';
  }

}
