<?php

/**
 * EstudioSocioeconomico filter form base class.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstudioSocioeconomicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'estudiante_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'grupo_familiar_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoFamiliar'), 'add_empty' => true)),
      'profesion_jefe_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionJefe'), 'add_empty' => true)),
      'instruccion_madre_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InstruccionMadre'), 'add_empty' => true)),
      'ingreso_familiar_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IngresoFamiliar'), 'add_empty' => true)),
      'condicion_vivienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CondicionVivienda'), 'add_empty' => true)),
      'tenencia_vivienda_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TenenciaVivienda'), 'add_empty' => true)),
      'material_paredes_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialParedes'), 'add_empty' => true)),
      'material_techo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialTecho'), 'add_empty' => true)),
      'material_piso_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialPiso'), 'add_empty' => true)),
      'numero_ambientes_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NumeroAmbientes'), 'add_empty' => true)),
      'electricidad'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'agua'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'red_de_cloacas'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'telefono_fijo_linea'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'telefono_fijo_enchufe' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gas_directo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gas_bombona'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'aseo_urbano'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'internet'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tv'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mental_intelectual'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mental_psicosocial'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'visual'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'auditiva'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'voz_y_habla'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cardiovascular'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'respiratoria'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'metabolica'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'neurologica'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'musculo_esqueletico'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sensitiva'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'genitourinaria'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'otra_discapacidad'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'estudiante_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudiante'), 'column' => 'id')),
      'grupo_familiar_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GrupoFamiliar'), 'column' => 'id')),
      'profesion_jefe_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProfesionJefe'), 'column' => 'id')),
      'instruccion_madre_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InstruccionMadre'), 'column' => 'id')),
      'ingreso_familiar_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('IngresoFamiliar'), 'column' => 'id')),
      'condicion_vivienda_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CondicionVivienda'), 'column' => 'id')),
      'tenencia_vivienda_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TenenciaVivienda'), 'column' => 'id')),
      'material_paredes_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MaterialParedes'), 'column' => 'id')),
      'material_techo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MaterialTecho'), 'column' => 'id')),
      'material_piso_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MaterialPiso'), 'column' => 'id')),
      'numero_ambientes_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('NumeroAmbientes'), 'column' => 'id')),
      'electricidad'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'agua'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'red_de_cloacas'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'telefono_fijo_linea'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'telefono_fijo_enchufe' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gas_directo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gas_bombona'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'aseo_urbano'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'internet'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tv'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mental_intelectual'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mental_psicosocial'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'visual'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'auditiva'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'voz_y_habla'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cardiovascular'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'respiratoria'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'metabolica'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'neurologica'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'musculo_esqueletico'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sensitiva'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'genitourinaria'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'otra_discapacidad'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estudio_socioeconomico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstudioSocioeconomico';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'estudiante_id'         => 'ForeignKey',
      'grupo_familiar_id'     => 'ForeignKey',
      'profesion_jefe_id'     => 'ForeignKey',
      'instruccion_madre_id'  => 'ForeignKey',
      'ingreso_familiar_id'   => 'ForeignKey',
      'condicion_vivienda_id' => 'ForeignKey',
      'tenencia_vivienda_id'  => 'ForeignKey',
      'material_paredes_id'   => 'ForeignKey',
      'material_techo_id'     => 'ForeignKey',
      'material_piso_id'      => 'ForeignKey',
      'numero_ambientes_id'   => 'ForeignKey',
      'electricidad'          => 'Boolean',
      'agua'                  => 'Boolean',
      'red_de_cloacas'        => 'Boolean',
      'telefono_fijo_linea'   => 'Boolean',
      'telefono_fijo_enchufe' => 'Boolean',
      'gas_directo'           => 'Boolean',
      'gas_bombona'           => 'Boolean',
      'aseo_urbano'           => 'Boolean',
      'internet'              => 'Boolean',
      'tv'                    => 'Boolean',
      'mental_intelectual'    => 'Boolean',
      'mental_psicosocial'    => 'Boolean',
      'visual'                => 'Boolean',
      'auditiva'              => 'Boolean',
      'voz_y_habla'           => 'Boolean',
      'cardiovascular'        => 'Boolean',
      'respiratoria'          => 'Boolean',
      'metabolica'            => 'Boolean',
      'neurologica'           => 'Boolean',
      'musculo_esqueletico'   => 'Boolean',
      'sensitiva'             => 'Boolean',
      'genitourinaria'        => 'Boolean',
      'otra_discapacidad'     => 'Text',
    );
  }
}
