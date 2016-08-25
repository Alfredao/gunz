<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;

class CadastroController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
        if ($this->getIdentity()) {
            $this->flashmessenger()->addErrorMessage('Você não pode cadastrar outra conta');
            return $this->redirect()->toRoute('site/default');
        }

        $model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $form = $this->getServiceLocator()->get('Site\Form\CadastroForm');

        try {
            if ($this->isPost()) {
                $form->setData($this->getPost());
                if ($form->isValid()) {
                    $model->novaConta($form->getData());
                    $this->flashmessenger()->addSuccessMessage('Registro efetuado com sucesso');
                    return $this->redirect()->toRoute('site/default');
                } else {
                    throw new \Exception('Verifique os dados fornecidos');
                }
            }
        } catch (\Exception $e) {
            $this->flashmessenger()->addErrorMessage($e->getMessage());
        }

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());

        $view->setVariable('form', $form);

        return $view;
    }
}