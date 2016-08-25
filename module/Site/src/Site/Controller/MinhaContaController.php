<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;

class MinhaContaController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
        $model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $form = $this->getServiceLocator()->get('Site\Form\MinhaContaForm');

        try {
            if ($this->isPost()) {
                $form->setData($this->getPost());
                if ($form->isValid()) {
                    $model->save($form->getData());
                    $this->flashmessenger()->addSuccessMessage('Dados alterados com sucesso.');
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