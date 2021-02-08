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

Auth::routes([
    'register' => false
]);
Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['user.active']], function () {
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

        Route::group(['middleware' => ['cms.permissions']], function () {

            Route::get('/cms', 'App\Http\Controllers\CMSController@index')->name('cms.index');


            Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
            Route::get('/user/create', 'App\Http\Controllers\UserController@createView')->name('user.create');
            Route::get('/user/edit/{userId}', 'App\Http\Controllers\UserController@editView')->name('user.editView');
            Route::post('/user', 'App\Http\Controllers\UserController@store')->name('user.store');
            Route::patch('/user/{userId}', 'App\Http\Controllers\UserController@update')->name('user.update');
            Route::delete('/user/{userId}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');


            Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('client.index');
            Route::get('/client/{clientId}/projects', 'App\Http\Controllers\ClientController@ProjectsView')->name('client.projectsView');
            Route::get('/client/create', 'App\Http\Controllers\ClientController@createView')->name('client.create');
            Route::get('/client/edit/{clientId}', 'App\Http\Controllers\ClientController@editView')->name('client.editView');
            Route::post('/client', 'App\Http\Controllers\ClientController@store')->name('client.store');
            Route::patch('/client/{clientId}', 'App\Http\Controllers\ClientController@update')->name('client.update');
            Route::delete('/client/{clientId}', 'App\Http\Controllers\ClientController@destroy')->name('client.destroy');



            Route::get('/projects', 'App\Http\Controllers\ProjectController@index')->name('project.index');
            Route::get('/project/create', 'App\Http\Controllers\ProjectController@createView')->name('project.create');
            Route::get('/project/edit/{projectId}', 'App\Http\Controllers\ProjectController@editView')->name('project.editView');
            Route::post('/project', 'App\Http\Controllers\ProjectController@store')->name('project.store');
            Route::patch('/project/{projectId}', 'App\Http\Controllers\ProjectController@update')->name('project.update');
            Route::delete('/project/{projectId}', 'App\Http\Controllers\ProjectController@destroy')->name('project.destroy');
        });
    });
});

