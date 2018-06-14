<?php

/**
 * Preinscripcion filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePreinscripcionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nacionalidad'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'identificacion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pnombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'snombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'papellido'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sapellido'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'genero'               => new sfWidgetFormFilterInput(),
      'fnac'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pais_origen_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'add_empty' => true)),
      'estado_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'municipio_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'parroquia_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
      'direccion'            => new sfWidgetFormFilterInput(),
      'telefono'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'               => new sfWidgetFormFilterInput(),
      'twitter'              => new sfWidgetFormFilterInput(),
      'titulo_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => true)),
      'uni_pre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mgi'                  => new sfWidgetFormFilterInput(),
      'uni_mgi'              => new sfWidgetFormFilterInput(),
      'otra'                 => new sfWidgetFormFilterInput(),
      'uni_otra'             => new sfWidgetFormFilterInput(),
      'art_8'                => new sfWidgetFormFilterInput(),
      'pnfa_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnfa'), 'add_empty' => true)),
      'otra_especializacion' => new sfWidgetFormFilterInput(),
      'ano_pre'              => new sfWidgetFormFilterInput(),
      'ano_mgi'              => new sfWidgetFormFilterInput(),
      'ano_otra'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nacionalidad'         => new sfValidatorPass(array('required' => false)),
      'identificacion'       => new sfValidatorPass(array('required' => false)),
      'pnombre'              => new sfValidatorPass(array('required' => false)),
      'snombre'              => new sfValidatorPass(array('required' => false)),
      'papellido'            => new sfValidatorPass(array('required' => false)),
      'sapellido'            => new sfValidatorPass(array('required' => false)),
      'genero'               => new sfValidatorPass(array('required' => false)),
      'fnac'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'pais_origen_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaisOrigen'), 'column' => 'id')),
      'estado_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
      'municipio_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio'), 'column' => 'id')),
      'parroquia_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parroquia'), 'column' => 'id')),
      'direccion'            => new sfValidatorPass(array('required' => false)),
      'telefono'             => new sfValidatorPass(array('required' => false)),
      'correo'               => new sfValidatorPass(array('required' => false)),
      'twitter'              => new sfValidatorPass(array('required' => false)),
      'titulo_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Titulo'), 'column' => 'id')),
      'uni_pre'              => new sfValidatorPass(array('required' => false)),
      'mgi'                  => new sfValidatorPass(array('required' => false)),
      'uni_mgi'              => new sfValidatorPass(array('required' => false)),
      'otra'                 => new sfValidatorPass(array('required' => false)),
      'uni_otra'             => new sfValidatorPass(array('required' => false)),
      'art_8'                => new sfValidatorPass(array('required' => false)),
      'pnfa_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pnfa'), 'column' => 'id')),
      'otra_especializacion' => new sfValidatorPass(array('required' => false)),
      'ano_pre'              => new sfValidatorPass(array('required' => false)),
      'ano_mgi'              => new sfValidatorPass(array('required' => false)),
      'ano_otra'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preinscripcion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preinscripcion';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'nacionalidad'         => 'Text',
      'identificacion'       => 'Text',
      'pnombre'              => 'Text',
      'snombre'              => 'Text',
      'papellido'            => 'Text',
      'sapellido'            => 'Text',
      'genero'               => 'Text',
      'fnac'                 => 'Date',
      'pais_origen_id'       => 'ForeignKey',
      'estado_id'            => 'ForeignKey',
      'municipio_id'         => 'ForeignKey',
      'parroquia_id'         => 'ForeignKey',
      'direccion'            => 'Text',
      'telefono'             => 'Text',
      'correo'               => 'Text',
      'twitter'              => 'Text',
      'titulo_id'            => 'ForeignKey',
      'uni_pre'              => 'Text',
      'mgi'                  => 'Text',
      'uni_mgi'              => 'Text',
      'otra'                 => 'Text',
      'uni_otra'             => 'Text',
      'art_8'                => 'Text',
      'pnfa_id'              => 'ForeignKey',
      'otra_especializacion' => 'Text',
      'ano_pre'              => 'Text',
      'ano_mgi'              => 'Text',
      'ano_otra'             => 'Text',
    );
  }
}
