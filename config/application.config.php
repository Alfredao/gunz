<?php

$appenv = strtolower(getenv('APP_ENV'));

return array(
    'modules' => array(
        'Application',
        'DoctrineModule',
        'DoctrineORMModule',
        'TwbBundle',
        'ZfTable',
        'Site',
        'Gunz',
        'Admin',
        'Auth',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
			'config/autoload/' . $appenv . '.php',
        )
    )
);