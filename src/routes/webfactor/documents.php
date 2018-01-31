<?php

// setup the backend CRUD routes
Route::group([
    'prefix'     => config('webfactor.documents.backend.route_prefix'),
    'middleware' => config('webfactor.documents.backend.middleware'),
], function () {
    CRUD::resource(config('webfactor.documents.backend.route'), config('webfactor.documents.backend.controller'));
});

// setup the api GET route
Route::group([
    'prefix' => config('webfactor.documents.api.route_prefix'),
    'middleware' => config('webfactor.documents.api.middleware')
], function() {
    Route::get(config('webfactor.documents.api.route'), config('webfactor.documents.api.controller').'@index');
});