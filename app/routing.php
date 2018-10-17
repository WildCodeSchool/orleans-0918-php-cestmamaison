<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [

    'Admin' => [ // Controller
        ['index', '/admin', 'GET'], // action, url, method
    ],
    'Category' => [ // Controller
        ['add', '/admin/category/add', ['GET', 'POST']], // action, url, method
    ],
    'Item' => [ // Controller
        ['index', '/item', 'GET'], // action, url, method
        ['add', '/item/add', ['GET', 'POST']], // action, url, method
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/item/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/item/delete/{id:\d+}', 'GET'], // action, url, method
    ],

    'Brand' => [ // Controller

        ['add', '/admin/brand/add', ['GET', 'POST']], // action, url, method
        ],

    'Presentation' => [//Controller
        ['index', '/presentation', 'GET'],
        ],
];