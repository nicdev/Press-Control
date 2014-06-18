<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');

	//dd(App::make('PressControl'));
	
});

// Main dashboard
Route::get('dashboard', 'DashboardController@index');

// Setup Wizard
Route::get('wizard', 'DashboardController@install');

// API controllers
Route::controller('plugins', 'PluginController');
Route::controller('themes', 'ThemeController');
Route::controller('sites', 'SiteController');
