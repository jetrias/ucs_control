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

class buscarActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeBuscar(sfWebRequest $request) {
        session_start();
        $this->getUser()->getAttributeHolder()->clear();
        $this->buscar = $this->getRequestParameter('buscar');
        if ($this->buscar == 'BUSCAR') {
            $sess_code = $_SESSION['captcha']['code'];
            $this->codigo = $this->getRequestParameter('codigo');
            $this->personati_id = $this->getRequestParameter('personati_id');
            $this->persona_ide = $this->getRequestParameter('persona_ide');
            if ($this->personati_id != '' && $this->persona_ide != '') {
                if (strtoupper($sess_code) == strtoupper($this->codigo)) {
                    $this->persona = EstudianteTable::buscaPersona($this->personati_id, $this->persona_ide);
                    if ($this->persona[0]['id'] != '') {
                        if ($this->persona[0]['estatus'] == 'ACTIVO' || $this->persona[0]['estatus'] == 'CONTINUANTE' || $this->persona[0]['estatus'] == 'CONTINUANTE CON ARRASTRE' ||
                            $this->persona[0]['estatus'] == 'NUEVO INGRESO' || $this->persona[0]['estatus'] == 'PENDIENTE EVAF' || $this->persona[0]['estatus'] == 'REINGRESO' ||
                            $this->persona[0]['estatus'] == 'REPITENTE') {
                            $this->usuario_reg = UsuarioTable::buscaRegistro($this->persona[0]['id']);
                            if ($this->usuario_reg[0]['id'] == '') {
/*------------------------- CREO/VERIFICO USUARIO  -------------------------*/
                                $sub_usuario = substr($this->persona[0]['primer_nombre'], 0, 2) .'.'. substr($this->persona[0]['primer_apellido'], 0, 2).'.'.str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);
                                $existe = true;
                                while ($existe == true) {
                                    $this->usuario = UsuarioTable::buscaUsuario($sub_usuario);
                                    if ($this->usuario[0]['id'] == null) {
                                        $existe = false;
                                    } else {
                                        $sub_usuario = substr($this->persona[0]['primer_nombre'], 0, 2) .'.'. substr($this->persona[0]['primer_apellido'], 0, 2).'.'.str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);
                                    }
                                }
/*------------------------- FIN CREO/VERIFICO USUARIO  -------------------------*/
/*------------------------- EXPORTO VARIABLES  -------------------------*/
                                $this->getUser()->setAttribute('estudiante_id', $this->persona[0]['id']);
                                $this->getUser()->setAttribute('estudiante_nombre', $this->persona[0]['primer_nombre']);
                                $this->getUser()->setAttribute('estudiante_apellido', $this->persona[0]['primer_apellido']);
                                $this->getUser()->setAttribute('estudiante_tidentificacion', $this->persona[0]['tipo_identificacion']);
                                $this->getUser()->setAttribute('estudiante_cedula', $this->persona[0]['identificacion']);
                                $this->getUser()->setAttribute('estudiante_correo', $this->persona[0]['correo_electronico']);
                                $this->getUser()->setAttribute('usuario', $sub_usuario);
/*------------------------- FIN EXPORTO VARIABLES  -------------------------*/
                                $this->redirect('/control/index.php/usuario/new');
                            } else {
                                $this->getUser()->setFlash('error', sprintf('¡Ya posees un usuario en el SIGE!'));
                                $_SESSION['captcha'] = simple_php_captcha();
                            }
                        } else {
                         $this->getUser()->setFlash('error', sprintf('Debes acudir a la Secretaría Docente mas cercana!'));
                            $_SESSION['captcha'] = simple_php_captcha();
                        }
                    } else {
                        $this->getUser()->setFlash('error', sprintf('¡Esta Persona no está Registrado en el SIGE!'));
                        $_SESSION['captcha'] = simple_php_captcha();
                    }
                } else {
                    $this->getUser()->setFlash('error', sprintf('¡Código de verificacion Invalido!'));
                    $_SESSION['captcha'] = simple_php_captcha('login/');
                }
            } else {
                $this->getUser()->setFlash('error', sprintf('¡Debe llenar todos los campos!'));
                $_SESSION['captcha'] = simple_php_captcha();
            }
        } else {
            $_SESSION['captcha'] = simple_php_captcha();
        }
    }
}
