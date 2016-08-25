<?php
namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Application\Controller\AbstractActionController;
use Application\Common\Message;

class AccountController extends AbstractActionController
{

    /**
     * Index
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
        	$table = $this->getServiceLocator()->get('Admin\ZfTable\AccountTable');
        	return $this->getResponse()->setContent($table->render('html'));
        }          
        
        $view = new ViewModel(array());
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        
        return $view;
    }
    
    /**
     * Inserir
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function newAction()
    {
        $this->model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $this->form = $this->getServiceLocator()->get('Admin\Form\AccountForm');
        
        try {
            $this->salvar(self::SAVE, Message::CREATE_SUCCESS, 'admin/default', array('controller' => 'account'));
        } catch (\Exception $e) {
            $this->flashmessenger()->addErrorMessage($e->getMessage());
        }
        
        $view = new ViewModel(array(
            'form' => $this->form
        ));
        
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        $view->setTemplate('admin/account/form');
        
        return $view;
    }
    
    /**
     * Visualizar
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function viewAction()
    {
        $this->model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $this->form = $this->getServiceLocator()->get('Admin\Form\AccountForm');
        $this->formView();
        
        $id = $this->params('id', null);
        
        $this->object = $this->model->getRepository()->find($id);
        $this->form->bind($this->object);
        
        $view = new ViewModel(array(
            'form' => $this->form
        ));
        
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        $view->setTemplate('admin/account/form');
        
        return $view;
    }
    
    /**
     * Atualizar
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function editAction()
    {
        $this->model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $this->form = $this->getServiceLocator()->get('Admin\Form\AccountForm');
        
        $id = $this->params('id', null);
        
        $this->object = $this->model->getRepository()->find($id);
        $this->form->bind($this->object);
        
        try {
            $this->salvar(self::SAVE, Message::UPDATE_SUCCESS, 'admin/default', array('controller' => 'account'));
        } catch (\Exception $e) {
            $this->flashmessenger()->addErrorMessage($e->getMessage());
        }
        
        $view = new ViewModel(array(
            'form' => $this->form
        ));
        
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        $view->setTemplate('admin/account/form');
        
        return $view;
    }
    
    /**
     * Remover
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        $this->model = $this->getServiceLocator()->get('Gunz\Model\AccountModel');
        $this->form = $this->getServiceLocator()->get('Admin\Form\AccountForm');
        $this->formRemove();
        
        $id = $this->params('id', null);
        
        $this->object = $this->model->getRepository()->find($id);
        $this->form->bind($this->object);
        
        try {
            $this->salvar(self::REMOVE, Message::DELETE_SUCCESS, 'admin/default', array('controller' => 'account'));
        } catch (\Exception $e) {
            $this->flashmessenger()->addErrorMessage($e->getMessage());
        }
        
        $view = new ViewModel(array(
            'form' => $this->form
        ));
        
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        $view->setTemplate('admin/account/form');
        
        return $view;
    }
}
