<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\Event\Controllers',
        'middleware' => ['jwt.auth'],
        'prefix'=>'event'
    ];

    $groupOptionsWithGuest = [
        'namespace' => 'Modules\Event\Controllers',
        'prefix'=>'event'
    ];


    $api->group($groupOptions, function ($api) {   
          //Event Routing
          $api->post('event/create', 'EventController@createEvent')->name('event-create')->middleware('ability:event-create');
          $api->get('search', 'EventController@findEvent')->name('event-search');
          //Ticket Routing

          //Show Routing
          $api->get('theater/shows', 'ShowController@getTheaterShows')->name('show-list')->middleware('ability:show-list');
          $api->get('theater/active/shows', 'ShowController@getTheaterActiveShows')->name('show-list')->middleware('ability:show-list');
          $api->get('theater/archived/shows', 'ShowController@getTheaterArchivedShows')->name('show-list')->middleware('ability:show-list');
         
          $api->get('shows/{id}/view', 'ShowController@getShow')->name('show-view');
          $api->post('show/create', 'ShowController@createShow')->name('show-create');
          $api->post('show/{id}/update', 'ShowController@updateShow')->name('show-update');
          $api->post('show/{id}/remove', 'ShowController@removeShow')->name('show-remove');       
          

          // Super admin route
          $api->get('/superadmin/shows', 'ShowController@getSuperadminShows')->name('superadmin-show-list');
          $api->get('/agency/shows', 'ShowController@getAgencyShows')->name('agency-show-list');
       
    });

           


    
});