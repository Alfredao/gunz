<?php
namespace Auth\Controller;

use Application\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Acl\Permissions\Acl;
use Acl\Entity\Usuario;

class LoginController extends AbstractActionController
{
    /**
     * Objeto serviço de autenticação
     *
     * @var AuthenticationService
     */
    protected $authservice;

    /**
     * Objeto serviço de autenticação
     *
     * @var AclService
     */
    protected $aclService;

    /**
     * Retorna objeto serviço de autenticação
     *
     * @return \Zend\Authentication\AuthenticationService
     */
    protected function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        }
        return $this->authservice;
    }

    /**
     * Retorna objeto serviço de autenticação
     *
     * @return \Acl\Event\AclEvent
     */
    protected function getAclService()
    {
        if (! $this->aclService) {
            $this->aclService = $this->getServiceLocator()->get('Acl\Event\AclEvent');
        }
        return $this->aclService;
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function autenticarAction()
    {
        if (! $this->isAjax()) {
            return $this->redirect()->toRoute('site/default');
        }

        $url = '';
        $erro = 0;
        $mensagem = '';

        $form = $this->getServiceLocator()->get('Auth\Form\LoginForm');
        $form->setData($this->getPost());

        if ($form->isValid()) {

            // check authentication...
            $this->getAuthService()->getAdapter()->setIdentityValue($this->getPost()->get('login'))->setCredentialValue($this->getPost()->get('password'));
            $result = $this->getAuthService()->authenticate();

            if ($result->isValid()) {
                $identity = $result->getIdentity();
                $this->getAuthService()->getStorage()->write($identity);
                $url = $this->url()->fromRoute('site/default');
            } else {
                $mensagem = 'Usuário ou senha incorretos';
                $erro = 1;
            }
        } else {
            $mensagem = 'Por favor, preencha seu usuário e senha';
            $erro = 1;
        }

        $content = array(
            'mensagem' => $mensagem,
            'erro' => $erro,
            'url' => $url
        );

        return $this->getResponse()->setContent(json_encode($content));
    }

    public function logoutAction()
    {
        $this->getAuthService()->clearIdentity()
        // $this->getAclService()->clearAcl();
        return $this->redirect()->toRoute('site/default');
    }
}
