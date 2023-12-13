<?php

/*
 * API url will be: <base-url>/public/api/firstproject/categories
 */
Route::group(
    [
        'prefix' => 'firstproject/categories',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', 'CategoriesController@getAssets')
        ->name('vh.backend.firstproject.api.categories.assets');
    /**
     * Get List
     */
    Route::get('/', 'CategoriesController@getList')
        ->name('vh.backend.firstproject.api.categories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CategoriesController@updateList')
        ->name('vh.backend.firstproject.api.categories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CategoriesController@deleteList')
        ->name('vh.backend.firstproject.api.categories.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'CategoriesController@createItem')
        ->name('vh.backend.firstproject.api.categories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CategoriesController@getItem')
        ->name('vh.backend.firstproject.api.categories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CategoriesController@updateItem')
        ->name('vh.backend.firstproject.api.categories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CategoriesController@deleteItem')
        ->name('vh.backend.firstproject.api.categories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CategoriesController@listAction')
        ->name('vh.backend.firstproject.api.categories.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CategoriesController@itemAction')
        ->name('vh.backend.firstproject.api.categories.item.action');



});
