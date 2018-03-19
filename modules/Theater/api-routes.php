<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\Theater\Controllers',
        'middleware' => ['jwt.auth'],
        'prefix'=>'theater'
    ];

    $api->group($groupOptions, function ($api) {  
        
        // Locaton routes
        $api->get('location/list', 'LocationController@getTheaterLocations')->name('location-list')->middleware('ability:location-list');
        $api->get('location/{id}/get', 'LocationController@getSingleLocation')->name('location-get-single')->middleware('ability:location-get-single');
        $api->post('location/create', 'LocationController@createLocation')->name('location-create')->middleware('ability:location-create');
        $api->post('location/{id}/edit', 'LocationController@editLocation')->name('location-edit')->middleware('ability:location-edit');
        $api->post('location/{id}/remove', 'LocationController@removeLocation')->name('location-remove')->middleware('ability:location-remove');


       $api->get('agency/location/list', 'LocationController@getAgencyLocations')->name('location-list')->middleware('ability:location-list');
      

       // Stage routes
         //Halls Routing
         $api->post('stages/create', 'StagesController@createStages')->name('stages-create')->middleware('ability:stages-create');
         $api->get('stages/list/location', 'StagesController@getLocationStages')->name('stages-list')->middleware('ability:stages-list');
         $api->get('stages/{id}', 'StagesController@getStage')->name('stages-view')->middleware('ability:stages-view');
         $api->get('stages/list/theater', 'StagesController@getTheaterStages')->name('stages-list')->middleware('ability:stages-list');
         $api->post('stages/{id}/edit', 'StagesController@editStage')->name('stages-edit')->middleware('ability:stages-edit');
         $api->post('stages/{id}/save/layout', 'StagesController@saveStage')->name('stages-save-layout')->middleware('ability:stages-edit');

         $api->post('stages/remove', 'StagesController@removeStages')->name('stages-remove')->middleware('ability:stages-remove');

         // Stages areas 
         $api->get('stages/{stage_id}/area/list', 'AreaController@getAreaList');
         $api->get('stages/area/{id}', 'AreaController@getArea');

      
        //Area Routing
        $api->post('area/create', 'AreaController@createArea');
        $api->get('area/list', 'AreaController@getAreaList');
        $api->get('area/{id}', 'AreaController@editArea');
        $api->post('area/{id}/save/layout', 'AreaController@saveLayout');
        
        //Seat Routing
        $api->post('seat/create', 'SeatController@createSeat');
        $api->get('seat/list', 'SeatController@getSeatList');
        $api->get('seat/{id}', 'SeatController@getSeat'); 
        

        // Superadmin routes
        $api->get('/superadmin/stages', 'StagesController@getSuperadminStagesInList')->name('superadmin-stage-list');
        $api->get('/agency/stages', 'StagesController@getAgencyStagesInList')->name('agency-stage-list');
         

    });


    $api->group(['namespace' => 'Modules\Theater\Controllers'], function ($api) {  
        $api->get('event/area/{id}', 'AreaController@getArea'); 
    });

});