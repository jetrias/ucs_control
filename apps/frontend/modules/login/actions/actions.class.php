<?php
include_once dirname(__FILE__) . '/../lib/captcha/simple-php-captcha.php';

/**
 * login actions.
 *
 * @package    ucs_control
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        session_start();
        $this->getUser()->getAttributeHolder()->clear();
        $this->acceder = $this->getRequestParameter('acceder');
        if ($this->acceder == 'ACCEDER') {
            $sess_code = $_SESSION['captcha']['code'];
            $this->codigo = $this->getRequestParameter('codigo');
            $this->usuario_nom = $this->getRequestParameter('usuario_nom');
            $this->usuario_cla = $this->getRequestParameter('usuario_cla');
            if (trim($this->usuario_nom) != '' && trim($this->usuario_cla) != '' && trim($this->codigo) != '') {
                if (strtoupper($sess_code) == strtoupper($this->codigo)) {
                    $this->usuario = UsuarioTable::buscaUsuario($this->usuario_nom);
                    if ($this->usuario[0]['id'] != '') {
                        if (password_verify($this->usuario_cla, $this->usuario[0]['usuario_cla'])) {
                            $this->getUser()->setAuthenticated(true);
                            switch ($this->usuario[0]['usutip_id']) {  //Verifica usuario tipo
                                case '1':
                                    $this->alumno = EstudianteTable::buscarEstudiante($this->usuario[0]['persona_id']);
                                    $this->getUser()->setAttribute('tipo_identificacion', $this->alumno[0]['tipo_identificacion']);
                                    $this->getUser()->setAttribute('identificacion', $this->alumno[0]['identificacion']);
                                    $this->getUser()->setAttribute('nombre', $this->alumno[0]['primer_nombre']);
                                    $this->getUser()->setAttribute('apellido', $this->alumno[0]['primer_apellido']);
                                    $this->getUser()->setAttribute('estatus', $this->alumno[0]['estatus']);
                                    $this->getUser()->setAttribute('estudiante_id', $this->usuario[0]['persona_id']); 
                                    $this->getUser()->setAttribute('foto', $this->alumno[0]['foto']);
                                    $this->getUser()->setAttribute('notas', $this->alumno[0]['notas']);
                                    $this->getUser()->setAttribute('n_ingreso', $this->alumno[0]['n_ingreso']);
// Estudiante
                                    if ($this->usuario[0]['usurdi_id'] == '1') {
                                        $this->redirect('/control/estudiante.php/inicio');
                                    } else {
                                        $this->redirect('/control/index.php/estudiante/' . $this->usuario[0]['persona_id'] . '/edit');
                                    }
                                    break;
                                case '2':                               // Docente
                                    ?><SCRIPT LANGUAGE="javascript">
                                        location.href = "../vista/docente.php";
                                    </SCRIPT><?php
                                    break;
                                case '3':                               // Personal
                                    ?><SCRIPT LANGUAGE="javascript">
                                        location.href = "../vista/docente.php";
                                    </SCRIPT><?php
                                    break;
                                default:                                // Administrador
                                    $this->redirect('/control/backend.php/estudiante');
                                    break;
                            }
                        } else {
                            $this->getUser()->setFlash('error', sprintf('¡Contraseña invalida!'));
                            $_SESSION['captcha'] = simple_php_captcha('login/');
                        }
                    } else {
                        $this->getUser()->setFlash('error', sprintf('¡Usuario no registrado en el SIGE!'));
                        $_SESSION['captcha'] = simple_php_captcha('login/');
                    }
                } else {
                    $this->getUser()->setFlash('error', sprintf('¡Código de verificacion Invalido!'));
                    $_SESSION['captcha'] = simple_php_captcha('login/');
                }
            } else {
                $this->getUser()->setFlash('error', sprintf('¡Debe llenar todos los campos!'));
                $_SESSION['captcha'] = simple_php_captcha('login/');
            }
        } else {
            $_SESSION['captcha'] = simple_php_captcha('login/');
        }
    }

    public function executeSalir(sfWebRequest $request) {
        //limpiando las credenciales
        $this->getUser()->clearCredentials();
        //eliminando las sessiones
        $this->getUser()->getAttributeHolder()->clear();
        $this->getUser()->setAuthenticated(false);
        $this->redirect('/control/index.php/login');
    }

}
