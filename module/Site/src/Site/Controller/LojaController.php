<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;

class LojaController extends \Application\Controller\AbstractActionController
{
    public function indexAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $table = $this->getServiceLocator()->get('Site\ZfTable\PersonagemTable');
            return $this->getResponse()->setContent($table->render('custom', 'loja'));
        }

        $em = $this->getServiceLocator()->get('EntityManager');
        $categoriaRepo = $em->getRepository('Gunz\Entity\ShopCategory');

        $categorias = $categoriaRepo->findAll();

        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());

        $view->setVariable('categorias', $categorias);

        return $view;
    }

    public function carrinhoAction()
    {
        $view = new ViewModel();
        $view->setTerminal($this->getRequest()->isXmlHttpRequest());

        return $view;
    }
}
