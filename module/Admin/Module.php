<?php
namespace Admin;

use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $autuService = $serviceManager->get('Zend\Authentication\AuthenticationService');

        if (! $autuService->getIdentity()) {

        }
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
                /**
                 * Form Factories
                 */
                'Admin\Form\AccountForm' => function ($sm) {
                    return new \Admin\Form\AccountForm($sm->get('EntityManager'));
                },
                'Admin\Form\CharacterForm' => function ($sm) {
                    return new \Admin\Form\CharacterForm($sm->get('EntityManager'));
                },
                'Admin\Form\ServerStatusForm' => function ($sm) {
                    return new \Admin\Form\ServerStatusForm($sm->get('EntityManager'));
                },
                'Admin\Form\ShopCategoryForm' => function ($sm) {
                    return new \Admin\Form\ShopCategoryForm($sm->get('EntityManager'));
                },
                /**
                 * DataTable Factories
                 */
                'Admin\ZfTable\AccountTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\Account');
                    return new \Admin\ZfTable\AccountTable($repo, $sm->get('Request')->getPost());
                },
                'Admin\ZfTable\CharacterTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\Character');
                    return new \Admin\ZfTable\CharacterTable($repo, $sm->get('Request')->getPost());
                },
                'Admin\ZfTable\ServerStatusTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\ServerStatus');
                    return new \Admin\ZfTable\ServerStatusTable($repo, $sm->get('Request')->getPost());
                },
                'Admin\ZfTable\ShopCategoryTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\ShopCategory');
                    return new \Admin\ZfTable\ShopCategoryTable($repo, $sm->get('Request')->getPost());
                }
            )
        );
    }
}
