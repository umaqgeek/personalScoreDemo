<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/users/{id}', 'UserController@listAll'); // list all users (admin, staff, agent, vendor).
    Route::get('/user/{id}', 'UserController@list'); // list one user.
    Route::delete('/user/{id}', 'UserController@remove'); // remove one user and logouting them.
    Route::put('/user/{id}', 'UserController@edit'); // update one user and logouting them.
    // change password one user and logouting them.
});

Route::post('/user', 'UserController@store'); // register users (admin, staff, agent, vendor).
Route::post('/users', 'UserController@stores'); // register multiple users at once.
Route::post('/login', 'UserController@login'); // login api for users (admin, staff, agent, vendor).
Route::post('/logout', 'UserController@logout'); // logout api for all user's type.
