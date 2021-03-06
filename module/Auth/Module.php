<?php
namespace Auth;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
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

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function ($sm) {
                    return $sm->get('doctrine.authenticationservice.orm_default');
                },
                'Auth\Form\LoginForm' => function ($sm) {
					return new \Auth\Form\LoginForm($sm->get('EntityManager'));
                },
            )
        );
    }

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(
                'Auth\Controller\Login' => 'Auth\Controller\LoginController'
            )
        );
    }
}
