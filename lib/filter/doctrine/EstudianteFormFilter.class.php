<?php

/**
 * Estudiante filter form.
 *
 * @package    ucs_control
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstudianteFormFilter extends BaseEstudianteFormFilter
{
  public function configure()
  {
      $this->widgetSchema['asic_estado_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'   => 'Estado',
            'add_empty'=>'Seleccione estado'
    ));
  $this->widgetSchema['asic_municipio_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                    'model'        => 'Municipio', 
                    'depends'      => 'Estado',
                    'widget'       => 'estudiante_asic_estado_id',
                    'add_empty'    => 'Seleccione municipio',
                    'ajax'         => true,
                ));
  $this->widgetSchema['asic_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                    'model'        => 'Asic', 
                    'depends'      => 'Municipio',
                    'widget'       => 'estudiante_asic_municipio_id',
                    'add_empty'    => 'Seleccione Asic',
                    'ajax'         => true,
                ));
  }
}
