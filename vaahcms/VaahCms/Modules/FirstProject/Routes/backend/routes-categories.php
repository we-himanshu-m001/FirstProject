<?php

Route::group(
    [
        'prefix' => 'backend/firstproject/categories',
        
        'middleware' => ['web', 'has.backend.access'],
        
        'namespace' => 'Backend',
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', 'CategoriesController@getAssets')
        ->name('vh.backend.firstproject.categories.assets');
    /**
     * Get List
     */
    Route::get('/', 'CategoriesController@getList')
        ->name('vh.backend.firstproject.categories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CategoriesController@updateList')
        ->name('vh.backend.firstproject.categories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CategoriesController@deleteList')
        ->name('vh.backend.firstproject.categories.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', 'CategoriesController@fillItem')
        ->name('vh.backend.firstproject.categories.fill');

    /**
     * Create Item
     */
    Route::post('/', 'CategoriesController@createItem')
        ->name('vh.backend.firstproject.categories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CategoriesController@getItem')
        ->name('vh.backend.firstproject.categories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CategoriesController@updateItem')
        ->name('vh.backend.firstproject.categories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CategoriesController@deleteItem')
        ->name('vh.backend.firstproject.categories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CategoriesController@listAction')
        ->name('vh.backend.firstproject.categories.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CategoriesController@itemAction')
        ->name('vh.backend.firstproject.categories.item.action');

    //---------------------------------------------------------

});
