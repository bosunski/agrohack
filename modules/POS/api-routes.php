<?php


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\POS\Controllers',
        'middleware' => ['jwt.auth'],
        'prefix'=>'pos'
    ];

    $api->group($groupOptions, function ($api) {  

    });
});