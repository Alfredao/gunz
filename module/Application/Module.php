<?php

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Doctrine\ORM\Events;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $serviceManager = $e->getApplication()->getServiceManager();

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // evento do botao cancelar
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array(
            new \Application\Event\RedirectEvent(),
            'cancelar'
        ), 10);

        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e) {
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config          = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 100);

        $viewModel = $e->getApplication()->getMvcEvent()->getViewModel();

        $autuService = $serviceManager->get('Zend\Authentication\AuthenticationService');
        $viewModel->identity = $autuService->getIdentity();
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(),
            'invokables' => array()
        );
    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'EntityManager' => 'Doctrine\ORM\EntityManager'
            ),
            'factories' => array(

            )
        );
    }
}
