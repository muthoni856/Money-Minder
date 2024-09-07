<?php

$routes->group(
    'Items', ['namespace' => 'App\Modules\Items\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);