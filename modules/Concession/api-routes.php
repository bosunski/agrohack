<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\Concession\Controllers',
        //'middleware' => ['jwt.auth'],
        'prefix'=>'concession'
    ];

    $api->group($groupOptions, function ($api) {
        // Product Routes
        $api->get('product/list', 'ProductController@list')->name('product-list');
        $api->post('product/create', 'ProductController@create')->name('create-product');
        $api->put('product/update/{product_id}', 'ProductController@update')->name('update-product');
        $api->get('product/{product_id}', 'ProductController@getProduct')->name('product');
        $api->delete('product/delete/{product_id}', 'ProductController@delete')->name('delete-product');

        // Category Routes
        $api->get('category/list', 'CategoryController@list')->name('category-list');
        $api->get('category/all', 'CategoryController@all')->name('category-all');
        $api->post('category/create', 'CategoryController@create')->name('create-category');
        $api->put('category/update/{category_id}', 'CategoryController@update')->name('update-category');
        $api->get('category/{category_id}', 'CategoryController@getCategory')->name('category');
        $api->delete('category/delete/{category_id}', 'CategoryController@delete')->name('delete-category');
    });


    $api->group(['namespace' => 'Modules\Concession\Controllers'], function ($api) {
        $api->get('event/area/{id}', 'AreaController@getArea');
    });

});
