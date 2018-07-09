<?php

/**
 * Estudiante form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstudianteForm extends BaseEstudianteForm {

    public function configure() {
//        $this->widgetSchema['codigo_tlf_id'] = new sfWidgetFormDoctrineChoice(array(
//                'model'     => 'codigoTlf',
//                'add_empty' => false,
//                'query'=>"tipo='C'"
//        ));
         $this->widgetSchema['tipo_identificacion'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "V" => "V", "E" => "E", "P" => "P")));
        $this->widgetSchema['identificacion'] = new sfWidgetFormInput();
        $this->widgetSchema['primer_nombre'] = new sfWidgetFormInput();
        $this->widgetSchema['segundo_nombre'] = new sfWidgetFormInput();
        $this->widgetSchema['primer_apellido'] = new sfWidgetFormInput();
        $this->widgetSchema['segundo_apellido'] = new sfWidgetFormInput();
        $this->widgetSchema['punto_referencia'] = new sfWidgetFormInput();
        $this->widgetSchema['correo_electronico'] = new sfWidgetFormInput();
        $this->widgetSchema['persona_contacto'] = new sfWidgetFormInput();
        $this->widgetSchema['ano_curso'] = new sfWidgetFormInput();
        $this->widgetSchema['cohorte'] = new sfWidgetFormInput();
        $this->widgetSchema['notas'] = new sfWidgetFormInput();
        $this->widgetSchema['direccion'] = new sfWidgetFormInput();
        $this->widgetSchema['parentesco'] = new sfWidgetFormInput();
        $this->widgetSchema['carnet_patria'] = new sfWidgetFormInput();
        $this->widgetSchema['serial_carnet_patria'] = new sfWidgetFormInput();
        $this->widgetSchema['trabaja'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "SI" => "SI", "NO" => "NO")));
        $this->widgetSchema['dedicacion_laboral'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "TIEMPO COMPLETO" => "TIEMPO COMPLETO", 
                "MEDIO TIEMPO" => "MEDIO TIEMPO",
                "MIXTO" => "MIXTO",
                "INDEPENDIENTE" => "INDEPENDIENTE")));
        $this->widgetSchema['horario'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "MATUTINO" => "MATUTINO", "VERPERTINO" => "VERPERTINO",
                "NOCTRUNO" => "NOCTURNO", "MIXTO" => "MIXTO")));
        $this->widgetSchema['lugar'] = new sfWidgetFormInput();
        $this->widgetSchema['cuenta'] = new sfWidgetFormInput(array(), array('class' => 'solo-numero'));
        //$this->widgetSchema['horario'] = new sfWidgetFormInput();
        $this->widgetSchema['tipo_empresa'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "PRIVADA" => "PRIVADA", "PUBLICA" => "PUBLICA",
                "INDEPENDIENTE" => "INDEPENDIENTE")));
        $this->widgetSchema['ingresos'] = new sfWidgetFormInput();
        $years = range(date('Y') - 80, date('Y') - 15);
        $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormJQueryDate(array(
            'culture' => 'es',
            'config' => '{changeMonth: true,changeYear: true}',
            'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month% %year%',
                'years' => array_combine($years, $years),))));
        $this->validatorSchema['direccion']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['n_hijos']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['trabaja']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['telefono']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['telefono_casa']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['correo_electronico']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['persona_contacto']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['identificacion']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['primer_nombre']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->validatorSchema['primer_apellido']->setOption('required', true)->setMessages(array('required' => 'Este valor es obligatorio.'));
        $this->widgetSchema['pais_origen_id'] = new sfWidgetFormDoctrineChoice(array(
            /* 'multiple' => true, */
            'model' => 'paisOrigen',
            'order_by' => '2',
            'add_empty' => true));
        $this->widgetSchema['estado_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'Estado',
            'add_empty' => 'Seleccione estado'));
        $this->widgetSchema['municipio_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Municipio',
            'depends' => 'Estado',
            'add_empty' => 'Seleccione municipio',
            'ajax' => true,
        ));
        $this->widgetSchema['parroquia_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Parroquia',
            'depends' => 'Municipio',
            'add_empty' => 'Seleccione parroquia',
            'ajax' => true,));
        $this->widgetSchema['centro_poblado_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'CentroPoblado',
            'depends' => 'Parroquia',
            'add_empty' => 'Seleccione Centro Poblado',
            'ajax' => true,));
        if ($this->getObject()->getFoto() == '') {
            $foto = 'persona.jpg';
        } else {
            $foto = $this->getObject()->getFoto();
        }
        $this->widgetSchema['estatus'] = new sfWidgetFormChoice(array(
                'choices' => array('' => 'Seleccione',
                    "ACTIVO" => "ACTIVO", "PASIVO" => "PASIVO", "REGULAR" => "REGULAR",'CONTINUANTE CON ARRASTRE' => 'CONTINUANTE CON ARRASTRE', 'NUEVO INGRESO' => 'NUEVO INGRESO',  'REINGRESO' => 'REINGRESO', 'REPITENTE' => 'REPITENTE', 'DESERTOR' => 'DESERTOR')));
        $this->widgetSchema['ano_curso'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "1" => "1", "2" => "2", "3" => "3",  "4" => "4", "5" => "5", "6" => "6")));
                $this->widgetSchema['pnf'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "MIC" => "MIC", 
                "ODONTOLOGIA" => "ODONTOLOGIA", 
                "FISIOTERAPIA" => "FISIOTERAPIA",  
                "ENFERMERIA INTEGRAL COMUNITARIA" => "ENFERMERIA INTEGRAL COMUNITARIA", 
                "TERAPIA OCUPACIONAL" => "TERAPIA OCUPACIONAL", 
                "RADIOIMAGENOLOGÍA" => "RADIOIMAGENOLOGÍA",
                "FONOAUDIOLOGÍA" => "FONOAUDIOLOGÍA")));
        $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
            'label' => 'Foto',
            'file_src' => '/control/uploads/fotos/original/s_' . $foto,
            'is_image' => true,
            'edit_mode' => !$this->isNew(),
            'template' => '<div>%file%<br /><label></label>%input%<br /><br/>La foto debe ser de frente, con el fondo blanco y debe medir 4x3 cm</div>',));
        $this->validatorSchema['foto'] = new sfValidatorFile(array(
            'required' => false,
            'mime_types' => 'web_images',
            'path' => sfConfig::get('sf_upload_dir') . '/fotos/original',
            'validated_file_class'=>'sfResizedFile',));
        $this->widgetSchema['banco'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "0102 Banco de Venezuela S.A.C.A. Banco Universal" => "0102 Banco de Venezuela S.A.C.A. Banco Universal",
                "0104 Venezolano de Crédito, S.A. Banco Universal" => "0104 Venezolano de Crédito, S.A. Banco Universal",
                "0105 Banco Mercantil, C.A S.A.C.A. Banco Universal" => "0105 Banco Mercantil, C.A S.A.C.A. Banco Universal",
                "0108 Banco Provincial, S.A. Banco Universal" => "0108 Banco Provincial, S.A. Banco Universal",
                "0114 Bancaribe C.A. Banco Universal" => "0114 Bancaribe C.A. Banco Universal",
                "0115 Banco Exterior C.A. Banco Universal" => "0115 Banco Exterior C.A. Banco Universal",
                "0116 Banco Occidental de Descuento, Banco Universal C.A." => "0116 Banco Occidental de Descuento, Banco Universal C.A.",
                "0128 Banco Caroní C.A. Banco Universal" => "0128 Banco Caroní C.A. Banco Universal",
                "0134 Banesco Banco Universal S.A.C.A." => "0134 Banesco Banco Universal S.A.C.A.",
                "0137 Banco Sofitasa Banco Universal" => "0137 Banco Sofitasa Banco Universal",
                "0138 Banco Plaza Banco Universal" => "0138 Banco Plaza Banco Universal",
                "0146 Banco de la Gente Emprendedora C.A." => "0146 Banco de la Gente Emprendedora C.A.",
                "0149 Banco del Pueblo Soberano, C.A. Banco de Desarrollo" => "0149 Banco del Pueblo Soberano, C.A. Banco de Desarrollo",
                "0151 BFC Banco Fondo Común C.A Banco Universal" => "0151 BFC Banco Fondo Común C.A Banco Universal",
                "0156 100% Banco, Banco Universal C.A." => "0156 100% Banco, Banco Universal C.A.",
                "0157 DelSur Banco Universal, C.A." => "0157 DelSur Banco Universal, C.A.",
                "0163 Banco del Tesoro, C.A. Banco Universal" => "0163 Banco del Tesoro, C.A. Banco Universal",
                "0166 Banco Agrícola de Venezuela, C.A. Banco Universal" => "0166 Banco Agrícola de Venezuela, C.A. Banco Universal",
                "0168 Bancrecer, S.A. Banco Microfinanciero" => "0168 Bancrecer, S.A. Banco Microfinanciero",
                "0169 Mi Banco Banco Microfinanciero C.A." => "0169 Mi Banco Banco Microfinanciero C.A.",
                "0171 Banco Activo, C.A. Banco Universal" => "0171 Banco Activo, C.A. Banco Universal",
                "0172 Bancamiga Banco Microfinanciero C.A." => "0172 Bancamiga Banco Microfinanciero C.A.",
                "0173 Banco Internacional de Desarrollo, C.A. Banco Universal" => "0173 Banco Internacional de Desarrollo, C.A. Banco Universal",
                "0174 Banplus Banco Universal, C.A." => "0174 Banplus Banco Universal, C.A.",
                "0175 Banco Bicentenario Banco Universal C.A." => "0175 Banco Bicentenario Banco Universal C.A.",
                "0176 Banco Espirito Santo, S.A. Sucursal Venezuela B.U." => "0176 Banco Espirito Santo, S.A. Sucursal Venezuela B.U.",
                "0177 Banco de la Fuerza Armada Nacional Bolivariana, B.U." => "0177 Banco de la Fuerza Armada Nacional Bolivariana, B.U.",
                "0190 Citibank N.A." => "0190 Citibank N.A.",
                "0191 Banco Nacional de Crédito, C.A. Banco Universal" => "0191 Banco Nacional de Crédito, C.A. Banco Universal",
                "0601 Instituto Municipal de Crédito Popular" => "0601 Instituto Municipal de Crédito Popular",)));
        $this->widgetSchema['tipo_cuenta'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "AHORROS" => "AHORROS", "CORRIENTE" => "CORRIENTE")));
        if (sfConfig::get("sf_app") == 'estudiante') {
            unset($this['idmatricula'],$this['cta_social'], $this['cta_personal'], $this['n_ingreso'], $this['opsu'], $this['postulado'], $this['registro'], $this['verificado'], $this['fecha_verificacion'],$this['notas']);
            $this->widgetSchema['asic_estado_id']->setAttribute('readonly','readonly');
            $this->widgetSchema['asic_municipio_id']->setAttribute('readonly','readonly');
            $this->widgetSchema['asic_id']->setAttribute('readonly','readonly');
            $this->widgetSchema['ano_curso']->setAttribute('readonly','readonly');
            $this->widgetSchema['pnf']->setAttribute('readonly','readonly');
            $this->widgetSchema['elam']->setAttribute('readonly','readonly');
            $this->widgetSchema['estatus']->setAttribute('readonly','readonly');
            $this->widgetSchema['identificacion']->setAttribute('readonly', 'readonly');
            $this->widgetSchema['tipo_identificacion']->setAttribute('readonly', 'readonly');
            $this->validatorSchema['primer_nombre'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 2, 'max_length' => 25), array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 26 caracteres.')
                ),
                new sfValidatorRegex(
                  array('pattern' => '/^[A-ZÑÁÉÍÓÚ]+$/'), array('invalid' => 'Solo debe colocar letras')
                ),), array(), array('required' => 'Por favor coloque su 1er Nombre.'));
            $this->validatorSchema['primer_apellido'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 2, 'max_length' => 25), array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 26 caracteres.')
                ),new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ]+$/'), array('invalid' => 'Solo debe colocar letras')
                ),), array(), array('required' => 'Por favor coloque su 1er apellido.'));
            $this->validatorSchema['correo_electronico'] = new sfValidatorEmail(array(
                    ), array('required' => 'Por favor coloque su Correo Electronico.'));
            $this->widgetSchema['asic_estado_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'Estado',
                'add_empty' => 'Seleccione estado'));
            $this->widgetSchema['asic_municipio_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Municipio',
                'depends' => 'Estado',
                'widget' => 'estudiante_asic_estado_id',
                'add_empty' => 'Seleccione municipio',
                'ajax' => true,));
            $this->widgetSchema['asic_parroquia_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Parroquia',
                'depends' => 'Municipio',
                'widget' => 'estudiante_asic_municipio_id',
                'add_empty' => 'Seleccione parroquia',
                'ajax' => true,));
            $this->widgetSchema['asic_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Asic',
                'depends' => 'Municipio',
                'widget' => 'estudiante_asic_municipio_id',
                'add_empty' => 'Seleccione Asic',
                'ajax' => true,));
        } else {
        $this->widgetSchema['ano_curso'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "1" => "1", "2" => "2", "3" => "3",  "4" => "4", "5" => "5", "6" => "6")));
                $this->widgetSchema['pnf'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "MIC" => "MIC", 
                "ODONTOLOGIA" => "ODONTOLOGIA", 
                "FISIOTERAPIA" => "FISIOTERAPIA",  
                "ENFERMERIA INTEGRAL COMUNITARIA" => "ENFERMERIA INTEGRAL COMUNITARIA", 
                "TERAPIA OCUPACIONAL" => "TERAPIA OCUPACIONAL", 
                "RADIOIMAGENOLOGÍA" => "RADIOIMAGENOLOGÍA",
                "FONOAUDIOLOGÍA" => "FONOAUDIOLOGÍA")));
             $this->widgetSchema['cohorte'] = new sfWidgetFormChoice(array(
            'choices' => array('' => 'Seleccione',
                "I" => "I", 
                "II" => "II",
                "III" => "III",
                "IV" => "IV",
                "V" => "V",
                "VI" => "VI",
                "VII" => "VII",
                "VIII" => "VIII",
                "IX" => "IX",
                "X" => "X",)));
            $this->widgetSchema['asic_estado_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'Estado',
                'add_empty' => 'Seleccione estado'));
            $this->widgetSchema['asic_municipio_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Municipio',
                'depends' => 'Estado',
                'widget' => 'estudiante_asic_estado_id',
                'add_empty' => 'Seleccione municipio',
                'ajax' => true,));
            $this->widgetSchema['asic_parroquia_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Parroquia',
                'depends' => 'Municipio',
                'widget' => 'estudiante_asic_municipio_id',
                'add_empty' => 'Seleccione parroquia',
                'ajax' => true,));
            $this->widgetSchema['asic_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                'model' => 'Asic',
                'depends' => 'Municipio',
                'widget' => 'estudiante_asic_municipio_id',
                'add_empty' => 'Seleccione Asic',
                'ajax' => true,));
            $this->widgetSchema['registro'] = new sfWidgetFormJQueryDate(array(
                'culture' => 'es',
                'config' => '{changeMonth: true,changeYear: true}',
                'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month% %year%',))));
            $this->widgetSchema['fecha_verificacion'] = new sfWidgetFormJQueryDate(array(
                'culture' => 'es',
                'config' => '{changeMonth: true,changeYear: true}',
                'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month% %year%',))));
            $this->widgetSchema['estatus'] = new sfWidgetFormChoice(array(
                'choices' => array('' => 'Seleccione',
                    "ACTIVO" => "ACTIVO", "PASIVO" => "PASIVO", "REGULAR" => "REGULAR",'CONTINUANTE CON ARRASTRE' => 'CONTINUANTE CON ARRASTRE', 'NUEVO INGRESO' => 'NUEVO INGRESO',  'REINGRESO' => 'REINGRESO', 'REPITENTE' => 'REPITENTE')));
        }
        if (sfConfig::get("sf_app") == 'frontend') {
            unset($this['idmatricula'], $this['estatus'], $this['cta_social'], $this['cta_personal'],$this['notas']);
            $this->widgetSchema['identificacion']->setAttribute('readonly', 'readonly');
        }
       


            /*             * ********         VALIDO CAMPOS          ********* */
        $this->validatorSchema['cuenta'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 0, 'max_length' => 20), array('min_length' => 'Debe ser mayor a 4 caracteres.', 'max_length' => 'Debe ser menor a 13 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[0-9]+$/'), array('invalid' => 'Solo debe colocar Letras y Numeros')
                ),
                    ), array());
            /*             * ********         FIN VALIDO CAMPOS          ********* */
        

//
//$this->widgetSchema['nombre']->setAttribute('readonly', 'readonly');
//
//$this->validatorSchema['nombre'] =  new sfValidatorAnd(array(
//        new sfValidatorString(
//            array('min_length' => 2,                              'max_length' => 25),
//            array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 26 caracteres.')
//                
//        ),
//        new sfValidatorRegex(
//            array('pattern' => '/^[A-ZÑÁÉÍÓÚ]+$/'),
//            array('invalid' => 'Solo debe colocar letras')
//        ),
//    ), array(), array('required' => 'Por favor coloque su 1er Nombre.'));
//
//$this->validatorSchema['cedula_identidad'] = new sfValidatorAnd(array(
//        new sfValidatorInteger(
//            array('min'=> 99999,                         'max' => 999999999),
//            array('min' => 'Debe ser mayor a 5 numeros', 'max' => 'Debe ser menor de 10 numeros')
//        ),
///*        new sfValidatorRegex(
//            array('pattern' => '[0-9]'),
//            array('invalid' => 'Solo debe colocar Numeros')
//        ),*/
//    ), array(), array('required' => 'Por favor coloque su Cedula.'));
//
//    $this->validatorSchema['correo_electronico'] = new sfValidatorEmail(array(
//    ), array('required' => 'Por favor coloque su Correo Electronico.'));
    }

}
