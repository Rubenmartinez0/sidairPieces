<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/piece', 'App\Http\Controllers\PieceController@choosePiece')->name('piece.index');
    Route::get('/piece/{pieceType}', 'App\Http\Controllers\PieceController@create')->name('piece.create');
    Route::post('/piece/store', 'App\Http\Controllers\PieceController@store')->name('piece.store');
    Route::get('{user}/pieces', 'App\Http\Controllers\PieceController@getMyOrders')->name('piece.getMyOrders');


    Route::get('/preferences', 'App\Http\Controllers\UserController@showPreferences')->name('preferences.show');
    Route::post('/preferences', 'App\Http\Controllers\UserController@updatePreferences')->name('preferences.store');
});

Route::get('/projects/{client}', 'App\Http\Controllers\ProjectController@getProjectsByClient')->name('projects.getByClient');