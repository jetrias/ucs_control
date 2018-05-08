<?php

require_once dirname(__FILE__) . '/../lib/usuarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/usuarioGeneratorHelper.class.php';
include_once dirname(__FILE__) . '/../lib/captcha/simple-php-captcha.php';

/**
 * usuario actions.
 *
 * @package    ucs_control
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends autoUsuarioActions {

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $usuario = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $usuario)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');
                $this->redirect('/control/index.php/login');
                //$this->redirect('@usuario_new');
            } else {
                
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect('/control/index.php/login');
                //$this->redirect(array('sf_route' => 'usuario_edit', 'sf_subject' => $usuario));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeBuscarUsuario(sfWebRequest $request) {
        session_start();
        $this->getUser()->getAttributeHolder()->clear();
        $this->buscar = $this->getRequestParameter('buscar');
        if ($this->buscar == 'BUSCAR') {
            $sess_code = $_SESSION['captcha']['code'];
            $this->codigo = $this->getRequestParameter('codigo');
            $this->personati_id = $this->getRequestParameter('personati_id');
            $this->persona_ide = $this->getRequestParameter('persona_ide');
            if (trim($this->personati_id) != '' && trim($this->persona_ide) != '') {
                if (strtoupper($sess_code) == strtoupper($this->codigo)) {
                    $this->persona = EstudianteTable::buscaPersona($this->personati_id, $this->persona_ide);
                    if ($this->persona[0]['id'] != '') {
                        $this->usuario = UsuarioTable::buscaRegistro($this->persona[0]['id']);
                        if ($this->usuario[0]['id'] != '') {
/*------------------------- EXPORTO VARIABLES  -------------------------*/
                            $this->getUser()->setAttribute('persona_nom1', $this->persona[0]['primer_nombre']);
                            $this->getUser()->setAttribute('persona_ape1', $this->persona[0]['primer_apellido']);
                            $this->getUser()->setAttribute('personati_id', $this->persona[0]['tipo_identificacion']);
                            $this->getUser()->setAttribute('persona_ide', $this->persona[0]['identificacion']);
                            $this->getUser()->setAttribute('usuario_id', $this->usuario[0]['id']);
                            $this->getUser()->setAttribute('usuario_nom', $this->usuario[0]['usuario_nom']);
                            $this->getUser()->setAttribute('usuario_pr1', $this->usuario[0]['usuario_pr1']);
                            $this->getUser()->setAttribute('usuario_re1', $this->usuario[0]['usuario_re1']);
                            $this->getUser()->setAttribute('usuario_pr2', $this->usuario[0]['usuario_pr2']);
                            $this->getUser()->setAttribute('usuario_re2', $this->usuario[0]['usuario_re2']);
/*------------------------- FIN EXPORTO VARIABLES  -------------------------*/
                            $this->redirect('/control/index.php/usuario/recupera');
                        } else {
                            $this->getUser()->setFlash('error', sprintf('¡Debes crear tu usuario en el SIGE!'));
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
                $this->getUser()->setFlash('error', sprintf('!Debe llenar todos los campos!'));
                $_SESSION['captcha'] = simple_php_captcha();
            }
        } else {
            $_SESSION['captcha'] = simple_php_captcha();
        }
    }

    public function executeRecupera(sfWebRequest $request) {
        $this->buscar = $this->getRequestParameter('enviar');
        if ($this->buscar == 'ENVIAR') {
            $this->usuario_re1 = $this->getRequestParameter('usuario_re1');
            $this->usuario_re2 = $this->getRequestParameter('usuario_re2');
            $this->bd_usuario_re1 = $this->getUser()->getAttribute('usuario_re1');
            $this->bd_usuario_re2 = $this->getUser()->getAttribute('usuario_re2');
            if ($this->usuario_re1 == $this->bd_usuario_re1 && $this->usuario_re2 == $this->bd_usuario_re2) {
                $this->usuario_rcl = UsuarioTable::actualizaClave($this->getUser()->getAttribute('usuario_id'), $this->getRequestParameter('clave'));
                //$this->getUser()->setFlash('error', sprintf('La clave ha sido actualizada con exito!'));
                //$this->getUser()->setFlash('error', 'La clave ha sido actualizada con exito!', false);
                    $this->getUser()->setFlash(
                        'notice',
                        'Tus cambios se han guardado!'
                    );
                $this->redirect('/control/index.php/login?id=123&page=home');
            } else {
                $this->getUser()->setFlash('error', sprintf('¡Respuestas incorrectas!'));
            }
        }
    }

    
}
