<?php




$api = app('Dingo\Api\Routing\Router');
Route::get('admin-home','HomeController@index');

// Agency routes


$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\Admin\Controllers',
        'middleware' => ['jwt.auth'],
        'prefix'=>'admin'
    ];


    $api->group($groupOptions, function ($api) {    
        
                
        // Agency Routes
        $api->get('/agencies', 'AgencyController@getAgencies')->name('superadmin-agency-list');          
        $api->post('/agency', 'AgencyController@createAgency')->name('superadmin-agency-create');
        $api->get('/agency/{id}', 'AgencyController@getAgency');
        $api->post('/agency/{id}/edit', 'AgencyController@editAgency')->name('agency-edit');
        $api->post('/agency/{id}/activate', 'AgencyController@activateAgency')->name('agency-activate');
        $api->post('/agency/{id}/deactivate', 'AgencyController@deactivateAgency')->name('agency-deactivate');
        $api->post('/agency/{id}/remove', 'AgencyController@deleteAgency')->name('agency-delete');


         //Theaters Routes
         // Super admin list theaters
         $api->get('theaters', 'TheaterController@getTheaters')->name('admin-theater-list');

         $api->get('/theater/list', 'TheaterController@getAgencyTheaters')->name('theater-list')->middleware('ability:theater-list');
         $api->post('/theater/create', 'TheaterController@createTheater')->name('theater-create')->middleware('ability:theater-create');
         $api->post('/theater/{id}/edit', 'TheaterController@editTheater')->name('theater-edit')->middleware('ability:theater-edit');
         $api->post('/theater/{id}/activate', 'TheaterController@activateTheater')->name('theater-activate')->middleware('ability:theater-activate');
         $api->post('/theater/{id}/deactivate', 'TheaterController@deactivateTheater')->name('theater-deactivate')->middleware('ability:theater-deactivate');
         $api->post('/theater/{id}/remove', 'TheaterController@deleteTheater')->name('theater-delete')->middleware('ability:theater-delete');


         // User routes
        $api->get('users', 'UserController@getUsers')->name('admin-users');
        $api->post('users/search', 'UserController@searchUsers')->name('admin-search-users');
        $api->get('user/{id}', 'UserController@getSingleUser')->name('admin-single-user');
        $api->post('/user/{id}/edit', 'UserController@editUser')->name('user-edit')->middleware('ability:user-edit');
        $api->get('/user/{id}', 'UserController@getUser');
        $api->post('/user/add', 'UserController@createUser')->name('user-create')->middleware('ability:user-create');
        $api->post('/user/{id}/remove', 'UserController@deleteUser')->name('user-delete')->middleware('ability:user-delete');

        // Theater users
        $api->get('/theater/{theater_id}/users', 'UserController@getUsersByTheater')->name('theater-user-list');
        $api->get('/agency/{agency_id}/users', 'UserController@getUsersByAgency')->name('user-list')->middleware('ability:user-list');
               

        //Genre Routing
        $api->get('genres/list', 'GenreController@getGenres');
        $api->post('genre/create', 'GenreController@createGenre')->name('genre-create');
        $api->post('genre/{id}/remove', 'GenreController@removeGenre')->name('genre-remove');
            
  
    });
  

});