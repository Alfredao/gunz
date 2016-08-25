<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;

class RankingController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        return $view;
    }

    public function personagemAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $table = $this->getServiceLocator()->get('Site\ZfTable\PersonagemTable');
            return $this->getResponse()->setContent($table->render('html'));
        }

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        return $view;
    }

    public function claAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $table = $this->getServiceLocator()->get('Site\ZfTable\ClaTable');
            return $this->getResponse()->setContent($table->render('html'));
        }

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        return $view;
    }
}