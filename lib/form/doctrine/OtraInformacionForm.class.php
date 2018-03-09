<?php

/**
 * OtraInformacion form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OtraInformacionForm extends BaseOtraInformacionForm
{
  public function configure()
  {
      unset($this['estudiante_id']);
      $this->widgetSchema['base_mision'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['org_dep'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['org_cultural'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['org_ecologista'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['org_productiva'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['mil_bolivariana'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
      $this->widgetSchema['org_politica_estudiantil'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")
        ));
  }
}
