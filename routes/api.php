<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\User;
use App\Http\Controllers\UserController;


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
// Route::post('/register',[App\Http\Controllers\UserController::class, 'register']);
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@authenticate');
// Route::get('/open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::get('user', 'UserController@getAuthenticatedUser');
    // Route::get('closed', 'DataController@closed');
    Route::get('/getprofil', 'UserController@getProfil');
    Route::put('/updateprofil', 'UserController@updateProfil');
    });