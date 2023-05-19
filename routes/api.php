<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API_CHANGES
Route::post('register', 'API\APIAuthController@register');
Route::post('login', 'API\APIAuthController@login');
Route::get('user', 'API\APIAuthController@user');
// Route::post('logout', 'API\APIAuthController@logout')->middleware('auth:api'); 
Route::middleware('auth')->group( function () {
    Route::resource('projects', 'API\APIProjectController');
});