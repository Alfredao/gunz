<?php
namespace Site\Controller;

use Zend\View\Model\ViewModel;

class DoacaoController extends \Application\Controller\AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        return $view;
    }
}
