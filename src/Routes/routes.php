<?php

Route::group(['prefix' => 'api/pos', 'namespace' => 'Ordent\RamenInventory\Controllers'], function()
{
    Route::group(['prefix' => 'inventory'], function () {
        Route::get('/', 'InventoryController@getCollection');
        Route::get('/{id}', 'InventoryController@getItem');
        Route::get('/{id}/stock', 'InventoryController@getStock');
        Route::post('/', 'InventoryController@postItem');
        Route::post('/{id}/update', 'InventoryController@putItem');
        Route::post('/{id}/stock/update', 'InventoryController@updateStock');
        Route::delete('/{id}', 'InventoryController@deleteItem');
    });
    
    Route::group(['prefix' => 'inventoryhistories'], function()
    {
        Route::get('/', 'InventoryHistoryController@getCollection');
        Route::get('/{id}', 'InventoryHistoryController@getItem');
        Route::post('/', 'InventoryHistoryController@postItem');
        Route::post('/{id}/update', 'InventoryHistoryController@putItem');
        Route::delete('/{id}', 'InventoryHistoryController@deleteItem');
    });
});
