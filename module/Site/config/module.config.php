<?php
namespace Site;

return array(
    'router' => array(
        'routes' => array(
            'site' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9_-]*'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                '__NAMESPACE__' => 'Site\Controller'
                            )
                        )
                    )
                )
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Site\Controller\Index' => 'Site\Controller\IndexController',
            'Site\Controller\Cadastro' => 'Site\Controller\CadastroController',
            'Site\Controller\Ranking' => 'Site\Controller\RankingController',
            'Site\Controller\Download' => 'Site\Controller\DownloadController',
            'Site\Controller\Loja' => 'Site\Controller\LojaController',
            'Site\Controller\Doacao' => 'Site\Controller\DoacaoController',
            'Site\Controller\MinhaConta' => 'Site\Controller\MinhaContaController',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);
