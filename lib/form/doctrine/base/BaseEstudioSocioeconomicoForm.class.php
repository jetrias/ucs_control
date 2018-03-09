<?php

/**
 * EstudioSocioeconomico form base class.
 *
 * @method EstudioSocioeconomico getObject() Returns the current form's model object
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstudioSocioeconomicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'estudiante_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => false)),
      'grupo_familiar_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoFamiliar'), 'add_empty' => false)),
      'profesion_jefe_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionJefe'), 'add_empty' => false)),
      'instruccion_madre_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InstruccionMadre'), 'add_empty' => false)),
      'ingreso_familiar_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IngresoFamiliar'), 'add_empty' => false)),
      'condicion_vivienda_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CondicionVivienda'), 'add_empty' => false)),
      'tenencia_vivienda_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TenenciaVivienda'), 'add_empty' => false)),
      'material_paredes_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialParedes'), 'add_empty' => false)),
      'material_techo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialTecho'), 'add_empty' => false)),
      'material_piso_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialPiso'), 'add_empty' => false)),
      'numero_ambientes_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NumeroAmbientes'), 'add_empty' => false)),
      'electricidad'          => new sfWidgetFormInputCheckbox(),
      'agua'                  => new sfWidgetFormInputCheckbox(),
      'red_de_cloacas'        => new sfWidgetFormInputCheckbox(),
      'telefono_fijo_linea'   => new sfWidgetFormInputCheckbox(),
      'telefono_fijo_enchufe' => new sfWidgetFormInputCheckbox(),
      'gas_directo'           => new sfWidgetFormInputCheckbox(),
      'gas_bombona'           => new sfWidgetFormInputCheckbox(),
      'aseo_urbano'           => new sfWidgetFormInputCheckbox(),
      'internet'              => new sfWidgetFormInputCheckbox(),
      'tv'                    => new sfWidgetFormInputCheckbox(),
      'mental_intelectual'    => new sfWidgetFormInputCheckbox(),
      'mental_psicosocial'    => new sfWidgetFormInputCheckbox(),
      'visual'                => new sfWidgetFormInputCheckbox(),
      'auditiva'              => new sfWidgetFormInputCheckbox(),
      'voz_y_habla'           => new sfWidgetFormInputCheckbox(),
      'cardiovascular'        => new sfWidgetFormInputCheckbox(),
      'respiratoria'          => new sfWidgetFormInputCheckbox(),
      'metabolica'            => new sfWidgetFormInputCheckbox(),
      'neurologica'           => new sfWidgetFormInputCheckbox(),
      'musculo_esqueletico'   => new sfWidgetFormInputCheckbox(),
      'sensitiva'             => new sfWidgetFormInputCheckbox(),
      'genitourinaria'        => new sfWidgetFormInputCheckbox(),
      'otra_discapacidad'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'estudiante_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'))),
      'grupo_familiar_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoFamiliar'))),
      'profesion_jefe_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionJefe'))),
      'instruccion_madre_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InstruccionMadre'))),
      'ingreso_familiar_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IngresoFamiliar'))),
      'condicion_vivienda_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CondicionVivienda'))),
      'tenencia_vivienda_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TenenciaVivienda'))),
      'material_paredes_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialParedes'))),
      'material_techo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialTecho'))),
      'material_piso_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MaterialPiso'))),
      'numero_ambientes_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('NumeroAmbientes'))),
      'electricidad'          => new sfValidatorBoolean(array('required' => false)),
      'agua'                  => new sfValidatorBoolean(array('required' => false)),
      'red_de_cloacas'        => new sfValidatorBoolean(array('required' => false)),
      'telefono_fijo_linea'   => new sfValidatorBoolean(array('required' => false)),
      'telefono_fijo_enchufe' => new sfValidatorBoolean(array('required' => false)),
      'gas_directo'           => new sfValidatorBoolean(array('required' => false)),
      'gas_bombona'           => new sfValidatorBoolean(array('required' => false)),
      'aseo_urbano'           => new sfValidatorBoolean(array('required' => false)),
      'internet'              => new sfValidatorBoolean(array('required' => false)),
      'tv'                    => new sfValidatorBoolean(array('required' => false)),
      'mental_intelectual'    => new sfValidatorBoolean(array('required' => false)),
      'mental_psicosocial'    => new sfValidatorBoolean(array('required' => false)),
      'visual'                => new sfValidatorBoolean(array('required' => false)),
      'auditiva'              => new sfValidatorBoolean(array('required' => false)),
      'voz_y_habla'           => new sfValidatorBoolean(array('required' => false)),
      'cardiovascular'        => new sfValidatorBoolean(array('required' => false)),
      'respiratoria'          => new sfValidatorBoolean(array('required' => false)),
      'metabolica'            => new sfValidatorBoolean(array('required' => false)),
      'neurologica'           => new sfValidatorBoolean(array('required' => false)),
      'musculo_esqueletico'   => new sfValidatorBoolean(array('required' => false)),
      'sensitiva'             => new sfValidatorBoolean(array('required' => false)),
      'genitourinaria'        => new sfValidatorBoolean(array('required' => false)),
      'otra_discapacidad'     => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('estudio_socioeconomico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstudioSocioeconomico';
  }

}
