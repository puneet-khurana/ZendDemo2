<?php

namespace Album;

use Zend\Router\Http\Segment;
use Album\Controller\AlbumController;

return [
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'home' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => AlbumController::class, // <-- change here
                        'action'     => 'index',
                    ],
                ],
            ],
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];