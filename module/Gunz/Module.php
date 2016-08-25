<?php

namespace Gunz;

class Module
{

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
                 * Model Factories
                 */
                'Gunz\Model\AccountModel' => function ($sm) {
                    return new \Gunz\Model\AccountModel($sm->get('EntityManager'));
                },
                'Gunz\Model\LoginModel' => function ($sm) {
                    return new \Gunz\Model\LoginModel($sm->get('EntityManager'));
                },
                'Gunz\Model\CharacterModel' => function ($sm) {
                    return new \Gunz\Model\CharacterModel($sm->get('EntityManager'));
                },
                'Gunz\Model\ClanModel' => function ($sm) {
                    return new \Gunz\Model\ClanModel($sm->get('EntityManager'));
                },
				'Gunz\Model\ServerStatusModel' => function ($sm) {
                    return new \Gunz\Model\ServerStatusModel($sm->get('EntityManager'));
                },
				'Gunz\Model\ShopCategoryModel' => function ($sm) {
                    return new \Gunz\Model\ShopCategoryModel($sm->get('EntityManager'));
                },
            )
        );
    }
}
