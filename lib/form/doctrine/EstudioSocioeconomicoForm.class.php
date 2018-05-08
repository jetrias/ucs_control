<?php

/**
 * EstudioSocioeconomico form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstudioSocioeconomicoForm extends BaseEstudioSocioeconomicoForm {

    public function configure() {
        $this->widgetSchema['grupo_familiar_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoFamiliar'), 'expanded' => true,));
        $this->widgetSchema['profesion_jefe_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionJefe'), 'expanded' => true,));
        $this->widgetSchema['instruccion_madre_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InstruccionMadre'), 'expanded' => true,));
        $this->widgetSchema['ingreso_familiar_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IngresoFamiliar'), 'expanded' => true,));
        $this->widgetSchema['condicion_vivienda_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CondicionVivienda'), 'expanded' => true,));


        $this->widgetSchema['numero_ambientes_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'numeroAmbientes',
            'order_by' => '1',
            'add_empty'=> true
        ));
        
          $this->widgetSchema['tenencia_vivienda_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'tenenciaVivienda',
            'order_by' => '1',
            'add_empty'=> true
        ));
          
           $this->widgetSchema['material_paredes_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'materialParedes',
            'order_by' => '1',
            'add_empty'=> true
        ));
           
            $this->widgetSchema['material_techo_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'materialTecho',
            'order_by' => '1',
            'add_empty'=> true
        ));
            
                $this->widgetSchema['material_piso_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'materialPiso',
            'order_by' => '1',
            'add_empty'=> true
        ));
                
        $this->validatorSchema['profesion_jefe_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['grupo_familiar_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['instruccion_madre_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['ingreso_familiar_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['condicion_vivienda_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['tenencia_vivienda_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['material_paredes_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['material_techo_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['material_piso_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['numero_ambientes_id']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['otra_discapacidad']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
                           

        unset($this['estudiante_id']);
        //$this->widgetSchema->moveField('grupo_familiar_id', 'after', 'condicion_vivienda_id');
        $this->widgetSchema->moveField('condicion_vivienda_id', 'after','profesion_jefe_id' );
    }

}
