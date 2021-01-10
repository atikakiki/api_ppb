<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LariController;


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
    Route::post('/updateprofil', 'UserController@updateProfil');
    Route::get('/getriwayatlari', 'LariController@getRiwayatLari');
    Route::post('/createtrack', 'LariController@createLari');
    Route::post('/updatestep/{id_exercise}', 'LariController@updateStep');
    Route::post('/finishtrack/{id_exercise}', 'LariController@finishTrack');
    Route::post('/deletetrack/{id_exercise}', 'LariController@deleteTrack');
    Route::post('/uploadfoto','UserController@upload');
    Route::get('/getfotoprofil','UserController@getFotoProfil');
    });