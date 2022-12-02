<?php

use Pterodactyl\Http\Middleware\RequireTwoFactorAuthentication;
use Illuminate\Support\Facades\Route;

Route::get('/server/{server}/plugins', 'Plugins\PluginsController@index')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugin');

Route::get('/server/{server}/plugins/{p}', 'Plugins\PluginsController@index')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugins');

Route::get('/server/{server}/plugins/category/{id}/{p}', 'Plugins\PluginsController@category')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugins.category');


Route::get('/server/{server}/plugins/search/{find}/{p}', 'Plugins\PluginsController@search')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugins.search');

Route::get('/server/{server}/plugins/upload/{pl_id}/{pl_name}', 'Plugins\PluginsController@upload')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugins.upload');

Route::get('/server/{server}/pluginsurl/get', 'Plugins\PluginsController@getUpURL')
  ->withoutMiddleware(RequireTwoFactorAuthentication::class)
  ->name('plugins.getupurl');
