<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
        $serverStatusTotal = $this->getRepository('Gunz\Entity\ServerStatus')->getTotal();
        $accountTotal      = $this->getRepository('Gunz\Entity\Account')->getTotal();
        $characterTotal    = $this->getRepository('Gunz\Entity\Character')->getTotal();
        $clanTotal         = $this->getRepository('Gunz\Entity\Clan')->getTotal();
        $recordeOnline     = $this->getRepository('Gunz\Entity\ServerLog')->getRecorde();

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());

        $view->setVariable('serverStatusTotal', $serverStatusTotal);
        $view->setVariable('accountTotal', $accountTotal);
        $view->setVariable('characterTotal', $characterTotal);
        $view->setVariable('clanTotal', $clanTotal);
        $view->setVariable('recordeOnline', $recordeOnline);

        return $view;
    }
}