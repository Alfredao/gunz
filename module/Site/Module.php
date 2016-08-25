<?php

namespace Site;

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
                 * Form Factories
                 */
               'Site\Form\CadastroForm' => function ($sm) {
                   return new \Site\Form\CadastroForm($sm->get('EntityManager'));
               },
                /**
                 * DataTable Factories
                 */
                'Site\ZfTable\PersonagemTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\Character');
                    return new \Site\ZfTable\PersonagemTable($repo, $sm->get('Request')->getPost());
                },
                'Site\ZfTable\ClaTable' => function ($sm) {
                    $repo = $sm->get('EntityManager')->getRepository('Gunz\Entity\Clan');
                    return new \Site\ZfTable\ClaTable($repo, $sm->get('Request')->getPost());
                },
            )
        );
    }
}
