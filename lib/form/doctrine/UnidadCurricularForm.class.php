<?php

/**
 * UnidadCurricular form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UnidadCurricularForm extends BaseUnidadCurricularForm
{
  public function configure()
  {
      $this->widgetSchema['trimestre'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "PRIMER TRIMESTRE" => "PRIMER TRIMESTRE", 
                "SEGUNDO TRIMESTRE" => "SEGUNDO TRIMESTRE",
                "TERCER TRIMESTRE" => "TERCER TRIMESTRE",
                "CUARTO TRIMESTRE" => "CUARTO TRIMESTRE",)
        ));
      $this->widgetSchema['anio'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "1" => "1", 
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6")
        ));
      $this->widgetSchema->moveField('anio', 'after','pnf_id' );
      $this->widgetSchema->moveField('trimestre', 'after','anio' );
  }
}
