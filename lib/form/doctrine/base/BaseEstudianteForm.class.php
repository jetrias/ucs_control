<?php

/**
 * Estudiante form base class.
 *
 * @method Estudiante getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstudianteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'tipo_identificacion'  => new sfWidgetFormTextarea(),
      'identificacion'       => new sfWidgetFormTextarea(),
      'primer_nombre'        => new sfWidgetFormTextarea(),
      'segundo_nombre'       => new sfWidgetFormTextarea(),
      'primer_apellido'      => new sfWidgetFormTextarea(),
      'segundo_apellido'     => new sfWidgetFormTextarea(),
      'sexo_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sexo'), 'add_empty' => true)),
      'fecha_nacimiento'     => new sfWidgetFormDate(),
      'pais_origen_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'add_empty' => true)),
      'estado_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_5'), 'add_empty' => true)),
      'municipio_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_7'), 'add_empty' => true)),
      'parroquia_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
      'direccion'            => new sfWidgetFormTextarea(),
      'punto_referencia'     => new sfWidgetFormTextarea(),
      'asic_estado_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'asic_municipio_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'asic_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'add_empty' => true)),
      'telefono'             => new sfWidgetFormInputText(),
      'telefono_casa'        => new sfWidgetFormInputText(),
      'correo_electronico'   => new sfWidgetFormTextarea(),
      'persona_contacto'     => new sfWidgetFormTextarea(),
      'estado_civil_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCivil'), 'add_empty' => false)),
      'n_hijos'              => new sfWidgetFormInputText(),
      'ano_curso'            => new sfWidgetFormTextarea(),
      'cohorte'              => new sfWidgetFormTextarea(),
      'etnia_indigena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EtniaIndigena'), 'add_empty' => true)),
      'elam'                 => new sfWidgetFormInputCheckbox(),
      'idmatricula'          => new sfWidgetFormTextarea(),
      'trabaja'              => new sfWidgetFormTextarea(),
      'lugar'                => new sfWidgetFormTextarea(),
      'horario'              => new sfWidgetFormTextarea(),
      'ingresos'             => new sfWidgetFormTextarea(),
      'telefono_trabajo'     => new sfWidgetFormInputText(),
      'centro_poblado_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CentroPoblado'), 'add_empty' => true)),
      'foto'                 => new sfWidgetFormTextarea(),
      'tipo_empresa'         => new sfWidgetFormTextarea(),
      'estatus'              => new sfWidgetFormTextarea(),
      'banco'                => new sfWidgetFormTextarea(),
      'tipo_cuenta'          => new sfWidgetFormTextarea(),
      'cuenta'               => new sfWidgetFormTextarea(),
      'cta_social'           => new sfWidgetFormInputCheckbox(),
      'cta_personal'         => new sfWidgetFormInputCheckbox(),
      'no_cta'               => new sfWidgetFormInputCheckbox(),
      'n_ingreso'            => new sfWidgetFormInputCheckbox(),
      'opsu'                 => new sfWidgetFormInputCheckbox(),
      'postulado'            => new sfWidgetFormInputCheckbox(),
      'registro'             => new sfWidgetFormDate(),
      'verificado'           => new sfWidgetFormInputCheckbox(),
      'fecha_verificacion'   => new sfWidgetFormDate(),
      'notas'                => new sfWidgetFormTextarea(),
      'pnf'                  => new sfWidgetFormTextarea(),
      'codigo_tlf_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf'), 'add_empty' => true)),
      'codigo_tlf_casa_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_13'), 'add_empty' => true)),
      'parentesco'           => new sfWidgetFormTextarea(),
      'codigo_tlf_contacto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_14'), 'add_empty' => true)),
      'telefono_contacto'    => new sfWidgetFormInputText(),
      'situacion_academica'  => new sfWidgetFormTextarea(),
      'carnet_patria'        => new sfWidgetFormTextarea(),
      'serial_carnet_patria' => new sfWidgetFormTextarea(),
      'afrodescendiente'     => new sfWidgetFormInputCheckbox(),
      'lgbt'                 => new sfWidgetFormInputCheckbox(),
      'dedicacion_laboral'   => new sfWidgetFormTextarea(),
      'asic_parroquia_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia_15'), 'add_empty' => true)),
      'asic_hab_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_16'), 'add_empty' => true)),
      'mod_ingreso_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ModalidadIngreso'), 'add_empty' => true)),
      'convocatoria'         => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipo_identificacion'  => new sfValidatorString(array('required' => false)),
      'identificacion'       => new sfValidatorString(),
      'primer_nombre'        => new sfValidatorString(),
      'segundo_nombre'       => new sfValidatorString(array('required' => false)),
      'primer_apellido'      => new sfValidatorString(),
      'segundo_apellido'     => new sfValidatorString(array('required' => false)),
      'sexo_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sexo'), 'required' => false)),
      'fecha_nacimiento'     => new sfValidatorDate(array('required' => false)),
      'pais_origen_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'required' => false)),
      'estado_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_5'), 'required' => false)),
      'municipio_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_7'), 'required' => false)),
      'parroquia_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'required' => false)),
      'direccion'            => new sfValidatorString(array('required' => false)),
      'punto_referencia'     => new sfValidatorString(array('required' => false)),
      'asic_estado_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'required' => false)),
      'asic_municipio_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'required' => false)),
      'asic_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'required' => false)),
      'telefono'             => new sfValidatorNumber(),
      'telefono_casa'        => new sfValidatorNumber(),
      'correo_electronico'   => new sfValidatorString(),
      'persona_contacto'     => new sfValidatorString(),
      'estado_civil_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCivil'))),
      'n_hijos'              => new sfValidatorNumber(array('required' => false)),
      'ano_curso'            => new sfValidatorString(array('required' => false)),
      'cohorte'              => new sfValidatorString(array('required' => false)),
      'etnia_indigena_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EtniaIndigena'), 'required' => false)),
      'elam'                 => new sfValidatorBoolean(array('required' => false)),
      'idmatricula'          => new sfValidatorString(array('required' => false)),
      'trabaja'              => new sfValidatorString(array('required' => false)),
      'lugar'                => new sfValidatorString(array('required' => false)),
      'horario'              => new sfValidatorString(array('required' => false)),
      'ingresos'             => new sfValidatorString(array('required' => false)),
      'telefono_trabajo'     => new sfValidatorNumber(array('required' => false)),
      'centro_poblado_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CentroPoblado'), 'required' => false)),
      'foto'                 => new sfValidatorString(array('required' => false)),
      'tipo_empresa'         => new sfValidatorString(array('required' => false)),
      'estatus'              => new sfValidatorString(array('required' => false)),
      'banco'                => new sfValidatorString(array('required' => false)),
      'tipo_cuenta'          => new sfValidatorString(array('required' => false)),
      'cuenta'               => new sfValidatorString(array('required' => false)),
      'cta_social'           => new sfValidatorBoolean(array('required' => false)),
      'cta_personal'         => new sfValidatorBoolean(array('required' => false)),
      'no_cta'               => new sfValidatorBoolean(array('required' => false)),
      'n_ingreso'            => new sfValidatorBoolean(array('required' => false)),
      'opsu'                 => new sfValidatorBoolean(array('required' => false)),
      'postulado'            => new sfValidatorBoolean(array('required' => false)),
      'registro'             => new sfValidatorDate(array('required' => false)),
      'verificado'           => new sfValidatorBoolean(array('required' => false)),
      'fecha_verificacion'   => new sfValidatorDate(array('required' => false)),
      'notas'                => new sfValidatorString(array('required' => false)),
      'pnf'                  => new sfValidatorString(array('required' => false)),
      'codigo_tlf_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf'), 'required' => false)),
      'codigo_tlf_casa_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_13'), 'required' => false)),
      'parentesco'           => new sfValidatorString(array('required' => false)),
      'codigo_tlf_contacto'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_14'), 'required' => false)),
      'telefono_contacto'    => new sfValidatorNumber(array('required' => false)),
      'situacion_academica'  => new sfValidatorString(array('required' => false)),
      'carnet_patria'        => new sfValidatorString(array('required' => false)),
      'serial_carnet_patria' => new sfValidatorString(array('required' => false)),
      'afrodescendiente'     => new sfValidatorBoolean(array('required' => false)),
      'lgbt'                 => new sfValidatorBoolean(array('required' => false)),
      'dedicacion_laboral'   => new sfValidatorString(array('required' => false)),
      'asic_parroquia_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia_15'), 'required' => false)),
      'asic_hab_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_16'), 'required' => false)),
      'mod_ingreso_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ModalidadIngreso'), 'required' => false)),
      'convocatoria'         => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estudiante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estudiante';
  }

}
