<?php

/**
 * Estudiante filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstudianteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_identificacion'  => new sfWidgetFormFilterInput(),
      'identificacion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'primer_nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_nombre'       => new sfWidgetFormFilterInput(),
      'primer_apellido'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_apellido'     => new sfWidgetFormFilterInput(),
      'sexo_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sexo'), 'add_empty' => true)),
      'fecha_nacimiento'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pais_origen_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisOrigen'), 'add_empty' => true)),
      'estado_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado_5'), 'add_empty' => true)),
      'municipio_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio_7'), 'add_empty' => true)),
      'parroquia_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
      'direccion'            => new sfWidgetFormFilterInput(),
      'punto_referencia'     => new sfWidgetFormFilterInput(),
      'asic_estado_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'asic_municipio_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'asic_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic'), 'add_empty' => true)),
      'telefono'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_casa'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo_electronico'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'persona_contacto'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_civil_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCivil'), 'add_empty' => true)),
      'n_hijos'              => new sfWidgetFormFilterInput(),
      'ano_curso'            => new sfWidgetFormFilterInput(),
      'cohorte'              => new sfWidgetFormFilterInput(),
      'etnia_indigena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EtniaIndigena'), 'add_empty' => true)),
      'elam'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'idmatricula'          => new sfWidgetFormFilterInput(),
      'trabaja'              => new sfWidgetFormFilterInput(),
      'lugar'                => new sfWidgetFormFilterInput(),
      'horario'              => new sfWidgetFormFilterInput(),
      'ingresos'             => new sfWidgetFormFilterInput(),
      'telefono_trabajo'     => new sfWidgetFormFilterInput(),
      'centro_poblado_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CentroPoblado'), 'add_empty' => true)),
      'foto'                 => new sfWidgetFormFilterInput(),
      'tipo_empresa'         => new sfWidgetFormFilterInput(),
      'estatus'              => new sfWidgetFormFilterInput(),
      'banco'                => new sfWidgetFormFilterInput(),
      'tipo_cuenta'          => new sfWidgetFormFilterInput(),
      'cuenta'               => new sfWidgetFormFilterInput(),
      'cta_social'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cta_personal'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'no_cta'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'n_ingreso'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'opsu'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'postulado'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'registro'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'verificado'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_verificacion'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'notas'                => new sfWidgetFormFilterInput(),
      'pnf'                  => new sfWidgetFormFilterInput(),
      'codigo_tlf_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf'), 'add_empty' => true)),
      'codigo_tlf_casa_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_13'), 'add_empty' => true)),
      'parentesco'           => new sfWidgetFormFilterInput(),
      'codigo_tlf_contacto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CodigoTlf_14'), 'add_empty' => true)),
      'telefono_contacto'    => new sfWidgetFormFilterInput(),
      'situacion_academica'  => new sfWidgetFormFilterInput(),
      'carnet_patria'        => new sfWidgetFormFilterInput(),
      'serial_carnet_patria' => new sfWidgetFormFilterInput(),
      'afrodescendiente'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'lgbt'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dedicacion_laboral'   => new sfWidgetFormFilterInput(),
      'asic_parroquia_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia_15'), 'add_empty' => true)),
      'asic_hab_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asic_16'), 'add_empty' => true)),
      'mod_ingreso_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ModalidadIngreso'), 'add_empty' => true)),
      'convocatoria'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'tipo_identificacion'  => new sfValidatorPass(array('required' => false)),
      'identificacion'       => new sfValidatorPass(array('required' => false)),
      'primer_nombre'        => new sfValidatorPass(array('required' => false)),
      'segundo_nombre'       => new sfValidatorPass(array('required' => false)),
      'primer_apellido'      => new sfValidatorPass(array('required' => false)),
      'segundo_apellido'     => new sfValidatorPass(array('required' => false)),
      'sexo_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sexo'), 'column' => 'id')),
      'fecha_nacimiento'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'pais_origen_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaisOrigen'), 'column' => 'id')),
      'estado_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado_5'), 'column' => 'id')),
      'municipio_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio_7'), 'column' => 'id')),
      'parroquia_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parroquia'), 'column' => 'id')),
      'direccion'            => new sfValidatorPass(array('required' => false)),
      'punto_referencia'     => new sfValidatorPass(array('required' => false)),
      'asic_estado_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
      'asic_municipio_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio'), 'column' => 'id')),
      'asic_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Asic'), 'column' => 'id')),
      'telefono'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'telefono_casa'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'correo_electronico'   => new sfValidatorPass(array('required' => false)),
      'persona_contacto'     => new sfValidatorPass(array('required' => false)),
      'estado_civil_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoCivil'), 'column' => 'id')),
      'n_hijos'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ano_curso'            => new sfValidatorPass(array('required' => false)),
      'cohorte'              => new sfValidatorPass(array('required' => false)),
      'etnia_indigena_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EtniaIndigena'), 'column' => 'id')),
      'elam'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'idmatricula'          => new sfValidatorPass(array('required' => false)),
      'trabaja'              => new sfValidatorPass(array('required' => false)),
      'lugar'                => new sfValidatorPass(array('required' => false)),
      'horario'              => new sfValidatorPass(array('required' => false)),
      'ingresos'             => new sfValidatorPass(array('required' => false)),
      'telefono_trabajo'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'centro_poblado_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CentroPoblado'), 'column' => 'id')),
      'foto'                 => new sfValidatorPass(array('required' => false)),
      'tipo_empresa'         => new sfValidatorPass(array('required' => false)),
      'estatus'              => new sfValidatorPass(array('required' => false)),
      'banco'                => new sfValidatorPass(array('required' => false)),
      'tipo_cuenta'          => new sfValidatorPass(array('required' => false)),
      'cuenta'               => new sfValidatorPass(array('required' => false)),
      'cta_social'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cta_personal'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'no_cta'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'n_ingreso'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'opsu'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'postulado'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'registro'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'verificado'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_verificacion'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'notas'                => new sfValidatorPass(array('required' => false)),
      'pnf'                  => new sfValidatorPass(array('required' => false)),
      'codigo_tlf_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CodigoTlf'), 'column' => 'id')),
      'codigo_tlf_casa_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CodigoTlf_13'), 'column' => 'id')),
      'parentesco'           => new sfValidatorPass(array('required' => false)),
      'codigo_tlf_contacto'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CodigoTlf_14'), 'column' => 'id')),
      'telefono_contacto'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'situacion_academica'  => new sfValidatorPass(array('required' => false)),
      'carnet_patria'        => new sfValidatorPass(array('required' => false)),
      'serial_carnet_patria' => new sfValidatorPass(array('required' => false)),
      'afrodescendiente'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'lgbt'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dedicacion_laboral'   => new sfValidatorPass(array('required' => false)),
      'asic_parroquia_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parroquia_15'), 'column' => 'id')),
      'asic_hab_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Asic_16'), 'column' => 'id')),
      'mod_ingreso_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ModalidadIngreso'), 'column' => 'id')),
      'convocatoria'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('estudiante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estudiante';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'tipo_identificacion'  => 'Text',
      'identificacion'       => 'Text',
      'primer_nombre'        => 'Text',
      'segundo_nombre'       => 'Text',
      'primer_apellido'      => 'Text',
      'segundo_apellido'     => 'Text',
      'sexo_id'              => 'ForeignKey',
      'fecha_nacimiento'     => 'Date',
      'pais_origen_id'       => 'ForeignKey',
      'estado_id'            => 'ForeignKey',
      'municipio_id'         => 'ForeignKey',
      'parroquia_id'         => 'ForeignKey',
      'direccion'            => 'Text',
      'punto_referencia'     => 'Text',
      'asic_estado_id'       => 'ForeignKey',
      'asic_municipio_id'    => 'ForeignKey',
      'asic_id'              => 'ForeignKey',
      'telefono'             => 'Number',
      'telefono_casa'        => 'Number',
      'correo_electronico'   => 'Text',
      'persona_contacto'     => 'Text',
      'estado_civil_id'      => 'ForeignKey',
      'n_hijos'              => 'Number',
      'ano_curso'            => 'Text',
      'cohorte'              => 'Text',
      'etnia_indigena_id'    => 'ForeignKey',
      'elam'                 => 'Boolean',
      'idmatricula'          => 'Text',
      'trabaja'              => 'Text',
      'lugar'                => 'Text',
      'horario'              => 'Text',
      'ingresos'             => 'Text',
      'telefono_trabajo'     => 'Number',
      'centro_poblado_id'    => 'ForeignKey',
      'foto'                 => 'Text',
      'tipo_empresa'         => 'Text',
      'estatus'              => 'Text',
      'banco'                => 'Text',
      'tipo_cuenta'          => 'Text',
      'cuenta'               => 'Text',
      'cta_social'           => 'Boolean',
      'cta_personal'         => 'Boolean',
      'no_cta'               => 'Boolean',
      'n_ingreso'            => 'Boolean',
      'opsu'                 => 'Boolean',
      'postulado'            => 'Boolean',
      'registro'             => 'Date',
      'verificado'           => 'Boolean',
      'fecha_verificacion'   => 'Date',
      'notas'                => 'Text',
      'pnf'                  => 'Text',
      'codigo_tlf_id'        => 'ForeignKey',
      'codigo_tlf_casa_id'   => 'ForeignKey',
      'parentesco'           => 'Text',
      'codigo_tlf_contacto'  => 'ForeignKey',
      'telefono_contacto'    => 'Number',
      'situacion_academica'  => 'Text',
      'carnet_patria'        => 'Text',
      'serial_carnet_patria' => 'Text',
      'afrodescendiente'     => 'Boolean',
      'lgbt'                 => 'Boolean',
      'dedicacion_laboral'   => 'Text',
      'asic_parroquia_id'    => 'ForeignKey',
      'asic_hab_id'          => 'ForeignKey',
      'mod_ingreso_id'       => 'ForeignKey',
      'convocatoria'         => 'Boolean',
    );
  }
}
