<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/home' => [[['_route' => 'app_api_home_index', '_controller' => 'App\\Controller\\Api\\HomeController::index'], null, null, null, true, false, null]],
        '/api/login_check' => [[['_route' => 'app_api_login_checklogin', '_controller' => 'App\\Controller\\Api\\LoginController::checkLogin'], null, null, null, false, false, null]],
        '/api/user/register' => [[['_route' => 'app_api_user_register', '_controller' => 'App\\Controller\\Api\\UserController::register'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
