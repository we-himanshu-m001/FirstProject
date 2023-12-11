<?php

Route::group(
    [
        'prefix' => 'backend/firstproject/blogs',

        'middleware' => ['web', 'has.backend.access'],

        'namespace' => 'Backend',
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', 'BlogsController@getAssets')
        ->name('vh.backend.firstproject.blogs.assets');
    /**
     * Get List
     */
    Route::get('/', 'BlogsController@getList')
        ->name('vh.backend.firstproject.blogs.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'BlogsController@updateList')
        ->name('vh.backend.firstproject.blogs.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'BlogsController@deleteList')
        ->name('vh.backend.firstproject.blogs.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', 'BlogsController@fillItem')
        ->name('vh.backend.firstproject.blogs.fill');

    /**
     * Create Item
     */
    Route::post('/', 'BlogsController@createItem')
        ->name('vh.backend.firstproject.blogs.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'BlogsController@getItem')
        ->name('vh.backend.firstproject.blogs.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'BlogsController@updateItem')
        ->name('vh.backend.firstproject.blogs.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'BlogsController@deleteItem')
        ->name('vh.backend.firstproject.blogs.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'BlogsController@listAction')
        ->name('vh.backend.firstproject.blogs.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'BlogsController@itemAction')
        ->name('vh.backend.firstproject.blogs.item.action');

//    Image Upload
    Route::post('/upload', 'BlogsController@imageUploads')
        ->name('vh.backend.firstproject.blogs.image.upload');

    //---------------------------------------------------------

});
