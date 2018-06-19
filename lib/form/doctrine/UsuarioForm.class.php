<?php

/**
 * Usuario form.
 *
 * @package    ucs_control
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioForm extends BaseUsuarioForm {

    public function configure() {
        /*         * ********         OCULTO CAMPOS            ********* */
        if (sfConfig::get("sf_app") == 'frontend') {
            unset($this['persona_id'], $this['usutip_id'], $this['usutip_id'], $this['usuper_id'], $this['usuario_fre'], $this['usuario_fbl'], $this['usuario_fde'], $this['usuario_obs'], $this['ususes_id'], $this['usuest_id'], $this['usurdi_id']);

            /*             * ********         FIN OCULTO CAMPOS            ********* */

            /*             * ********         DEFINO CAMPOS            ********* */

            $this->widgetSchema['primer_nombre'] = new sfWidgetFormInput();
            $this->widgetSchema['primer_apellido'] = new sfWidgetFormInput();
            $this->widgetSchema['tipo_identificacion'] = new sfWidgetFormInput();
            $this->widgetSchema['identificacion'] = new sfWidgetFormInput();
            $this->widgetSchema['correo_electronico'] = new sfWidgetFormInput();
            $this->widgetSchema['correo_electronico2'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_nom'] = new sfWidgetFormInput();
            $this->widgetSchema['usutip_nom'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_pr1'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_re1'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_pr2'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_re2'] = new sfWidgetFormInput();
            $this->widgetSchema['usuario_cla'] = new sfWidgetFormInputPassword();

            $this->widgetSchema['usuario_cl2'] = new sfWidgetFormInputPassword();
            /*             * ********         FIN DEFINO CAMPOS            ********* */

            /*             * ********         ORDENO CAMPOS            ********* */
            $this->widgetSchema->moveField('usuario_nom', 'after', 'correo_electronico2');
            $this->widgetSchema->moveField('usuario_pr1', 'after', 'usutip_nom');
            $this->widgetSchema->moveField('usuario_re1', 'after', 'usuario_pr1');
            $this->widgetSchema->moveField('usuario_pr2', 'after', 'usuario_re1');
            $this->widgetSchema->moveField('usuario_re2', 'after', 'usuario_pr2');
            $this->widgetSchema->moveField('usuario_cla', 'after', 'usuario_re2');
            /*             * ********         FIN ORDENO CAMPOS            ********* */

            /*             * ********         DECLARO VARIABLES            ********* */

            $nombre = sfContext::getInstance()->getUser()->getAttribute('estudiante_nombre');
            $apellido = sfContext::getInstance()->getUser()->getAttribute('estudiante_apellido');
            $t_identificacion = sfContext::getInstance()->getUser()->getAttribute('estudiante_tidentificacion');
            $cedula = sfContext::getInstance()->getUser()->getAttribute('estudiante_cedula');
            $correo = sfContext::getInstance()->getUser()->getAttribute('estudiante_correo');
            $usuario = sfContext::getInstance()->getUser()->getAttribute('usuario');

            /*             * ********         FIN DECLARO VARIABLES            ********* */

            /*             * ********         IMPRIMO VARIABLES            ********* */

            $this->widgetSchema['primer_nombre']->setAttribute('value', $nombre);
            $this->widgetSchema['primer_apellido']->setAttribute('value', $apellido);
            $this->widgetSchema['tipo_identificacion']->setAttribute('value', $t_identificacion);
            $this->widgetSchema['identificacion']->setAttribute('value', $cedula);
            $this->widgetSchema['correo_electronico']->setAttribute('value', $correo);
            $this->widgetSchema['usuario_nom']->setAttribute('value', $usuario);
            $this->widgetSchema['usutip_nom']->setAttribute('value', 'ALUMNO');

            /*             * ********         FIN IMPRIMO VARIABLES            ********* */

            /*             * ********         CAMPOS INHABILITADOS            ********* */

            /* $this->widgetSchema['primer_nombre']->setAttribute('readonly', 'readonly');
              $this->widgetSchema['primer_apellido']->setAttribute('readonly', 'readonly'); */
            $this->widgetSchema['tipo_identificacion']->setAttribute('readonly', 'readonly');
            $this->widgetSchema['identificacion']->setAttribute('readonly', 'readonly');
            $this->widgetSchema['usuario_nom']->setAttribute('readonly', 'readonly');
            $this->widgetSchema['usutip_nom']->setAttribute('readonly', 'readonly');

            /*             * ********         FIN CAMPOS INHABILITADOS            ********* */

            /*             * ********         VALIDO CAMPOS          ********* */
            $this->validatorSchema['primer_nombre'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 2, 'max_length' => 25), array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 26 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ ]+$/'), array('invalid' => 'Solo debe colocar letras')
                ),
                    ), array(), array('required' => 'Por favor coloque su 1er Nombre.'));

            $this->validatorSchema['primer_apellido'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 2, 'max_length' => 25), array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 26 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ ]+$/'), array('invalid' => 'Solo debe colocar letras')
                ),
                    ), array(), array('required' => 'Por favor coloque su 1er Apellido.'));

            $this->validatorSchema['tipo_identificacion'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 1, 'max_length' => 1), array('min_length' => 'Debe ser igual a 1 caracter.', 'max_length' => 'Debe ser igual a 1 caracter.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-Z]+$/'), array('invalid' => 'Solo debe colocar letras')
                ),
                    ), array(), array('required' => 'Por favor coloque el Tipo de Identificación.'));

            $this->validatorSchema['identificacion'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 5, 'max_length' => 12), array('min_length' => 'Debe ser mayor a 4 caracteres.', 'max_length' => 'Debe ser menor a 13 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-Z0-9]+$/'), array('invalid' => 'Solo debe colocar Letras y Numeros')
                ),
                    ), array(), array('required' => 'Por favor coloque su Identificación.'));

            $this->validatorSchema['correo_electronico'] = new sfValidatorEmail(array(
                    ), array('required' => 'Por favor coloque su Correo Electronico.'));


            $this->validatorSchema['correo_electronico2'] = new sfValidatorEmail(array(
                    ), array('required' => 'Por favor repita su Correo Electronico.'));

            $this->validatorSchema['usuario_nom'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 9, 'max_length' => 9), array('min_length' => 'Debe ser igual a 9 caracteres.', 'max_length' => 'Debe ser igual a 9 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-Z]{2}\.[A-Z]{2}\.[0-9]{3}$/'), array('invalid' => 'Solo debe introducir formato predefinido')
                ),
                    ), array(), array('required' => 'Por favor coloque su Nombre de Usuario.'));

            $this->validatorSchema['usutip_nom'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 2, 'max_length' => 10), array('min_length' => 'Debe ser mayor a 1 caracter.', 'max_length' => 'Debe ser menor de 10 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-Z]{2,10}+$/'), array('invalid' => 'Solo debe introducir letras')
                ),
                    ), array(), array('required' => 'Por favor coloque su Tipo de Usuario.'));

            $this->validatorSchema['usuario_cla'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 6, 'max_length' => 15), array('min_length' => 'Debe al menos constar de 6 a 15 caracteres (Maximo).', 'max_length' => 'Debe al menos constar de 6 a 15 caracteres (Maximo).')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$¡%?&])[A-Z\d$@$¡%?&]{6,20}$/'), array('invalid' => 'Debe al menos constar de 1 letra. 1 número y 1 de estos ¡@$%&? caracteres especiles.')
                ),
                    ), array(), array('required' => 'Por favor coloque su Contraseña.'));

            $this->validatorSchema['usuario_cl2'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 6, 'max_length' => 20), array('min_length' => 'Debe ser mayor a 5 caracter.', 'max_length' => 'Debe ser menor de 21 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$¡%?&])[A-Z\d$@$¡%?&]{6,20}$/'), array('invalid' => 'Debe al menos constar de 1 letra. 1 número y 1 de estos ¡@$%&? caracteres especiles.')
                ),
                    ), array(), array('required' => 'Por favor repita su Contraseña.'));

            $this->validatorSchema['usuario_pr1'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 3, 'max_length' => 50), array('min_length' => 'Debe ser mayor a 2 caracter.', 'max_length' => 'Debe ser menor de 50 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ 0-9]{3,50}+$/'), array('invalid' => 'Solo debe introducir letras y números')
                ),
                    ), array(), array('required' => 'Por favor coloque su 1ª Pregunta de Seguridad.'));

            $this->validatorSchema['usuario_re1'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 3, 'max_length' => 50), array('min_length' => 'Debe ser mayor a 2 caracter.', 'max_length' => 'Debe ser menor de 50 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ 0-9]{3,50}+$/'), array('invalid' => 'Solo debe introducir letras y números')
                ),
                    ), array(), array('required' => 'Por favor coloque su Respuesta de la 1ª Pregunta de Seguridad.'));

            $this->validatorSchema['usuario_pr2'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 3, 'max_length' => 50), array('min_length' => 'Debe ser mayor a 2 caracter.', 'max_length' => 'Debe ser menor de 50 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ 0-9]{3,50}+$/'), array('invalid' => 'Solo debe introducir letras y números')
                ),
                    ), array(), array('required' => 'Por favor coloque su 2ª Pregunta de Seguridad.'));

            $this->validatorSchema['usuario_re2'] = new sfValidatorAnd(array(
                new sfValidatorString(
                        array('min_length' => 3, 'max_length' => 50), array('min_length' => 'Debe ser mayor a 2 caracter.', 'max_length' => 'Debe ser menor de 50 caracteres.')
                ),
                new sfValidatorRegex(
                        array('pattern' => '/^[A-ZÑÁÉÍÓÚ 0-9]{3,50}+$/'), array('invalid' => 'Solo debe introducir letras y números')
                ),
                    ), array(), array('required' => 'Por favor coloque su Respuesta de la 2ª Pregunta de Seguridad.'));
            /*             * ********         FIN VALIDO CAMPOS          ********* */

            /*             * ********         VERIFICO CAMPOS          ********* */

            $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
                new sfValidatorDoctrineUnique(array('model' => 'usuario', 'column' => array('usuario_nom')), array('invalid' => "Este Usuario ya está Registrado")),
                new sfValidatorDoctrineUnique(array('model' => 'usuario', 'column' => array('persona_id')), array('invalid' => "Esta Persona ya está Registrada")),
                /*        new sfValidatorDoctrineUnique(array('model' => 'estudiante', 'column' => array('correo_electronico')), 
                  array('invalid'=> "Este Correo ya está Registrado")), */
                new sfValidatorSchemaCompare('contrasena', '==', 'contrasena2', array(), array('invalid' => 'Las dos Contraseñas no coinciden')),
                new sfValidatorSchemaCompare('correo_electronico', '==', 'correo_electronico2', array(), array('invalid' => 'Los dos Correos no coinciden'))
            )));                                                     /*             * ********         FIN VERIFICO CAMPOS          ********* */
        }

        if (sfConfig::get("sf_app") == 'backend') {
            if (sfContext::getInstance()->getUser()->getAttribute('usuario_edit') == '1') {
                unset($this['persona_id'], $this['usutip_id'], $this['usuper_id'], $this['ususes_id'], $this['usuest_id'], 
                        $this['usurdi_id'], $this['usuario_obs'], $this['usuario_fre'], $this['usuario_fbl'], $this['usuario_fde']);
            } else {
                $this->widgetSchema['ususes_id']->setAttribute('value', '2');
                $this->widgetSchema['usuest_id']->setAttribute('value', '2');
                $this->widgetSchema['usurdi_id']->setAttribute('value', '1');
                $this->widgetSchema['usutip_id']->setAttribute('value', '4');
                $this->widgetSchema['usuario_obs'] = new sfWidgetFormInput();
                }
                $this->widgetSchema['usuario_cla'] = new sfWidgetFormInput();
                $this->widgetSchema['usuario_pr1'] = new sfWidgetFormInput();
                $this->widgetSchema['usuario_re1'] = new sfWidgetFormInput();
                $this->widgetSchema['usuario_pr2'] = new sfWidgetFormInput();
                $this->widgetSchema['usuario_re2'] = new sfWidgetFormInput();
                
            
        }
    }

}
