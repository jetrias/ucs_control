<?php

/**
 * Traslado form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrasladoForm extends BaseTrasladoForm
{
  public function configure()
  {
      unset($this['estudiante_id']);
      
        $this->widgetSchema['estado_emisor_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'Estado',
            'add_empty' => 'Seleccione estado'));
        $this->widgetSchema['municipio_emisor_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Municipio',
            'depends' => 'Estado',
            'widget' => 'traslado_estado_emisor_id',
            'add_empty' => 'Seleccione municipio',
            'ajax' => true,
        ));
        $this->widgetSchema['asic_emisor_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Asic',
            'depends' => 'Municipio',
            'widget' => 'traslado_municipio_emisor_id',
            'add_empty' => 'Seleccione ASIC',
            'ajax' => true,
        ));
        
        $this->widgetSchema['estado_receptor_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'Estado',
            'add_empty' => 'Seleccione estado'));
        $this->widgetSchema['municipio_receptor_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Municipio',
            'depends' => 'Estado',
            'widget' => 'traslado_estado_receptor_id',
            'add_empty' => 'Seleccione municipio',
            'ajax' => true,
        ));
        $this->widgetSchema['asic_receptor_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Asic',
            'depends' => 'Municipio',
            'widget' => 'traslado_municipio_receptor_id',
            'add_empty' => 'Seleccione ASIC',
            'ajax' => true,
        ));
        $years = range(date('Y')-1, date('Y'));
        $this->widgetSchema['fecha_emision'] = new sfWidgetFormJQueryDate(array(
            'culture' => 'es',
            'config' => '{changeMonth: true,changeYear: true}',
            'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month% %year%',
                'years' => array_combine($years, $years),))));
         $this->widgetSchema['fecha_recepcion'] = new sfWidgetFormJQueryDate(array(
            'culture' => 'es',
            'config' => '{changeMonth: true,changeYear: true}',
            'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month% %year%',
                'years' => array_combine($years, $years),))));
          $this->widgetSchema['tipo_traslado'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "MISMO ESTADO" => "MISMO ESTADO", "OTRO ESTADO" => "OTRO ESTADO")));
          $this->widgetSchema['estatus_expediente'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "TRAMITE POR ESTADO EMISOR" => "TRAMITE POR ESTADO EMISOR", 
                "RECIBIDO POR ESTADO RECEPTOR" => "RECIBIDO POR ESTADO RECEPTOR")));
  }
}
