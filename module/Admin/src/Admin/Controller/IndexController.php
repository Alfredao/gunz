<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use ZfTable\Params\AdapterNewDatatables;

class IndexController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
		$serverStatusTotal = $this->getRepository('Gunz\Entity\ServerStatus')->getTotal();
		$accountTotal = $this->getRepository('Gunz\Entity\Account')->getTotal();
		$characterTotal = $this->getRepository('Gunz\Entity\Character')->getTotal();
		$clanTotal = $this->getRepository('Gunz\Entity\Clan')->getTotal();

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());

		$view->setVariable('serverStatusTotal', $serverStatusTotal);
		$view->setVariable('accountTotal', $accountTotal);
		$view->setVariable('characterTotal', $characterTotal);
		$view->setVariable('clanTotal', $clanTotal);

        return $view;
    }
}