<?php

/**
 * Traslado filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrasladoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'estudiante_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'estado_emisor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'municipio_emisor_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'asic_emisor_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'add_empty' => true)),
      'estado_receptor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_3'), 'add_empty' => true)),
      'municipio_receptor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_5'), 'add_empty' => true)),
      'asic_receptor_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_7'), 'add_empty' => true)),
      'fecha_emision'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_recepcion'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tipo_traslado'         => new sfWidgetFormFilterInput(),
      'estatus_expediente'    => new sfWidgetFormFilterInput(),
      'observacion'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'estudiante_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudiante'), 'column' => 'id')),
      'estado_emisor_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
      'municipio_emisor_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio'), 'column' => 'id')),
      'asic_emisor_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Asic'), 'column' => 'id')),
      'estado_receptor_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado_3'), 'column' => 'id')),
      'municipio_receptor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio_5'), 'column' => 'id')),
      'asic_receptor_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Asic_7'), 'column' => 'id')),
      'fecha_emision'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_recepcion'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'tipo_traslado'         => new sfValidatorPass(array('required' => false)),
      'estatus_expediente'    => new sfValidatorPass(array('required' => false)),
      'observacion'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('traslado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Traslado';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'estudiante_id'         => 'ForeignKey',
      'estado_emisor_id'      => 'ForeignKey',
      'municipio_emisor_id'   => 'ForeignKey',
      'asic_emisor_id'        => 'ForeignKey',
      'estado_receptor_id'    => 'ForeignKey',
      'municipio_receptor_id' => 'ForeignKey',
      'asic_receptor_id'      => 'ForeignKey',
      'fecha_emision'         => 'Date',
      'fecha_recepcion'       => 'Date',
      'tipo_traslado'         => 'Text',
      'estatus_expediente'    => 'Text',
      'observacion'           => 'Text',
    );
  }
}
