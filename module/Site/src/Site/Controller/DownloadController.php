<?php
namespace Site\Controller;

use Zend\View\Model\ViewModel;

class DownloadController extends \Application\Controller\AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());
        return $view;
    }
}
