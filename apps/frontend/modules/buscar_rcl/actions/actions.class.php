<?php

/**
 * buscar actions.
 *
 * @package    ucs_control
 * @subpackage buscar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
include_once dirname(__FILE__) . '/../lib/captcha/simple-php-captcha.php';

class buscar_rclActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeBuscar_rcl(sfWebRequest $request) {
        session_start();
        $this->getUser()->getAttributeHolder()->clear();
        $this->buscar = $this->getRequestParameter('buscar');
        if ($this->buscar == 'Buscar') {
            $sess_code = $_SESSION['captcha']['code'];
            $this->codigo = $this->getRequestParameter('codigo');
            $this->doc = $this->getRequestParameter('tipo_doc');
            $this->identificacion = $this->getRequestParameter('identificacion');
            if (strtoupper($sess_code) == strtoupper($this->codigo) && $this->doc != '' && $this->identificacion != '') {
                $this->data = EstudianteTable::buscarPersona($this->doc, $this->identificacion);
                $this->data2 = UsuarioTable::buscarRegistro($this->doc, $this->identificacion);
/**********         CREO/VERIFICO USUARIO          **********/
                /*$usuario = substr($this->data[0]['primer_nombre'], 0, 2) . substr($this->data[0]['primer_apellido'], 0, 2) . str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);
                $existe = true;
                while ($existe == true) {
                    $this->data3 = UsuarioTable::verificaUsuario($sub_usuario);
                    if ($this->data3[0]['id'] == null) {
                        $existe = false;
                    } else {
                        $usuario = substr($this->data[0]['primer_nombre'], 0, 2) . substr($this->data[0]['primer_apellido'], 0, 2) . str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);
                    }
                }*/
/**********         FIN CREO/VERIFICO USUARIO          **********/
                if ($this->data[0]['id'] == '') {
                    $this->getUser()->setFlash('error', sprintf(' Debes acudir con el responsable de tu estado!'));
                    //echo 'usted no esta registrado';
                    $_SESSION['captcha'] = simple_php_captcha();
                } else {
                    if ($this->data2[0]['tipo_identificacion'] != '' && $this->data2[0]['cedula_identidad'] != '') {
                        if ($this->data[0]['estatus'] == 'ACTIVO' || $this->data[0]['estatus'] == 'CONTINUANTE' || $this->data[0]['estatus'] == 'CONTINUANTE CON ARRASTRE' ||
                            $this->data[0]['estatus'] == 'NUEVO INGRESO' || $this->$data[0]['estatus'] == 'PENDIENTE EVAF' || $this->$data[0]['estatus'] == 'REINGRESO' ||
                            $this->$data[0]['estatus'] == 'REPITENTE') {
/**********         EXPORTO VARIABLES          **********/
                            $this->getUser()->setAttribute('estudiante_nombre', $this->data3[0]['nombre']);
                            $this->getUser()->setAttribute('estudiante_apellido', $this->data3[0]['apellido']);
                            $this->getUser()->setAttribute('estudiante_tidentificacion', $this->data3[0]['tipo_identificacion']);
                            $this->getUser()->setAttribute('estudiante_cedula', $this->data3[0]['cedula_identidad']);
                            $this->getUser()->setAttribute('estudiante_usuario', $this->data3[0]['nombre_usuario']);
                            $this->getUser()->setAttribute('estudiante_tusuario', $this->data3[0]['id_persona']);
                            $this->getUser()->setAttribute('estudiante_ppregunta', $this->data3[0]['p_pregunta']);
                            $this->getUser()->setAttribute('estudiante_spregunta', $this->data3[0]['s_pregunta']);
/**********         FIN EXPORTO VARIABLES          **********/
                            $this->redirect('/control/index.php/usuario_rcl/new');
                        } else {
                            $this->getUser()->setFlash('error', sprintf('Debes acudir a la Secretaría Docente mas cercana!'));
                            $_SESSION['captcha'] = simple_php_captcha();
                        }
                    } else {
                        $this->getUser()->setFlash('error', sprintf('Esta Persona ya no Registrado en el SIGE.'));
                        $_SESSION['captcha'] = simple_php_captcha();
                    }
                }
            } else {
                $this->getUser()->setFlash('error', sprintf('debe llenar todos los campos!'));
                $_SESSION['captcha'] = simple_php_captcha();
            }
        } else {
            $_SESSION['captcha'] = simple_php_captcha();
        }
    }

}
