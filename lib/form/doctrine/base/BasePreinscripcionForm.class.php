<?php

/**
 * Preinscripcion form base class.
 *
 * @method Preinscripcion getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePreinscripcionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nacionalidad'         => new sfWidgetFormTextarea(),
      'identificacion'       => new sfWidgetFormTextarea(),
      'pnombre'              => new sfWidgetFormTextarea(),
      'snombre'              => new sfWidgetFormTextarea(),
      'papellido'            => new sfWidgetFormTextarea(),
      'sapellido'            => new sfWidgetFormTextarea(),
      'genero'               => new sfWidgetFormTextarea(),
      'fnac'                 => new sfWidgetFormDate(),
      'pais_origen_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'add_empty' => true)),
      'estado_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => false)),
      'municipio_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'parroquia_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
      'direccion'            => new sfWidgetFormTextarea(),
      'telefono'             => new sfWidgetFormTextarea(),
      'correo'               => new sfWidgetFormTextarea(),
      'twitter'              => new sfWidgetFormTextarea(),
      'titulo_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => false)),
      'uni_pre'              => new sfWidgetFormTextarea(),
      'mgi'                  => new sfWidgetFormTextarea(),
      'uni_mgi'              => new sfWidgetFormTextarea(),
      'otra'                 => new sfWidgetFormTextarea(),
      'uni_otra'             => new sfWidgetFormTextarea(),
      'art_8'                => new sfWidgetFormTextarea(),
      'pnfa_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pnfa'), 'add_empty' => false)),
      'otra_especializacion' => new sfWidgetFormTextarea(),
      'ano_pre'              => new sfWidgetFormTextarea(),
      'ano_mgi'              => new sfWidgetFormTextarea(),
      'ano_otra'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nacionalidad'         => new sfValidatorString(),
      'identificacion'       => new sfValidatorString(),
      'pnombre'              => new sfValidatorString(),
      'snombre'              => new sfValidatorString(),
      'papellido'            => new sfValidatorString(),
      'sapellido'            => new sfValidatorString(),
      'genero'               => new sfValidatorString(array('required' => false)),
      'fnac'                 => new sfValidatorDate(array('required' => false)),
      'pais_origen_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'required' => false)),
      'estado_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'))),
      'municipio_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'required' => false)),
      'parroquia_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'required' => false)),
      'direccion'            => new sfValidatorString(array('required' => false)),
      'telefono'             => new sfValidatorString(),
      'correo'               => new sfValidatorString(array('required' => false)),
      'twitter'              => new sfValidatorString(array('required' => false)),
      'titulo_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'))),
      'uni_pre'              => new sfValidatorString(),
      'mgi'                  => new sfValidatorString(array('required' => false)),
      'uni_mgi'              => new sfValidatorString(array('required' => false)),
      'otra'                 => new sfValidatorString(array('required' => false)),
      'uni_otra'             => new sfValidatorString(array('required' => false)),
      'art_8'                => new sfValidatorString(array('required' => false)),
      'pnfa_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pnfa'))),
      'otra_especializacion' => new sfValidatorString(array('required' => false)),
      'ano_pre'              => new sfValidatorString(array('required' => false)),
      'ano_mgi'              => new sfValidatorString(array('required' => false)),
      'ano_otra'             => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preinscripcion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preinscripcion';
  }

}
