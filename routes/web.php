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
    Route::get('/piece/{pieceType}', 'App\Http\Controllers\PieceController@addPieceToCartView')->name('piece.addToCartView');
    Route::get('{user}/pieces', 'App\Http\Controllers\PieceController@myOrderedPieces')->name('piece.myOrderedPieces');
    Route::get('/piece/show/{id}', 'App\Http\Controllers\PieceController@showPiece')->name('piece.show');
    Route::post('/piece/store', 'App\Http\Controllers\PieceController@storePieceToCart')->name('piece.storeToCart');
    Route::patch('/piece/updateState', 'App\Http\Controllers\PieceController@updatePieceState')->name('piece.updateState');

    

    Route::get('/cartItems', 'App\Http\Controllers\CartController@getCartItemsCount')->name('cart.getItems');
    Route::get('/myCart', 'App\Http\Controllers\CartController@show')->name('cart.show');
    Route::get('/myCart/{item}', 'App\Http\Controllers\CartController@cartItemView')->name('cart.showItem');
    Route::post('/myCart/addNote', 'App\Http\Controllers\CartController@createNote')->name('cart.createNote');
    Route::patch('/myCart', 'App\Http\Controllers\CartController@updateItems')->name('cart.updateItems');
    Route::delete('/myCart', 'App\Http\Controllers\CartController@destroyCartItems')->name('cart.destroyItems');
    //Route::delete('/myCart', 'App\Http\Controllers\CartController@cleanCartItems')->name('cart.clean');



    Route::get('/myOrders', 'App\Http\Controllers\OrderController@getMyOrders')->name('order.getMyOrders');
    Route::get('/order/{order_id}', 'App\Http\Controllers\OrderController@showSummary')->name('order.showSummary');
    Route::get('/order/manufacture/i', 'App\Http\Controllers\OrderController@getOrders')->name('order.getOrders');
    Route::post('/order/store', 'App\Http\Controllers\OrderController@store')->name('order.store');
    Route::patch('/order/updateState', 'App\Http\Controllers\OrderController@updateOrderState')->name('order.updateState');
    
    Route::get('/projects/{client}', 'App\Http\Controllers\ProjectController@getProjectsByClient')->name('projects.getByClient');


    Route::get('/preferences', 'App\Http\Controllers\UserController@showPreferencesView')->name('preferences.show');
    Route::post('/preferences', 'App\Http\Controllers\UserController@updatePreferences')->name('preferences.store');


    Route::get('/cms', 'App\Http\Controllers\CMSController@index')->name('cms.index');
});

