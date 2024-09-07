<?php

$routes->group(
    'blogs', ['namespace' => 'App\Modules\Blogs\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);