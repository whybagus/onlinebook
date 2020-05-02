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
Route::post('file-upload', 'FileUploadController@store');
//Admin
Route::post('login', 'Admin\AdminController@login');
Route::middleware('auth:admin')->group(function () {
    Route::get('logout', 'Admin\AdminController@logout');
    Route::get('me', 'Admin\AdminController@me');
    Route::prefix('get')->group(function () {
        Route::get('/admin', 'Admin\AdminController@get')->name('get.admin');
        Route::get('/buku', 'Admin\BukuController@get');
        Route::get('/penulis', 'Admin\PenulisController@get');
        Route::get('/genre', 'Admin\GenreController@get');
        Route::get('/diskon', 'Admin\DiskonController@get');
    });
    Route::prefix('store')->group(function () {
        Route::post('/add-admin', 'Admin\AdminController@addAdmin');
        Route::post('/add-buku', 'Admin\BukuController@store');
        Route::post('/add-penulis', 'Admin\PenulisController@store');
        Route::post('/add-genre', 'Admin\GenreController@store');
        Route::post('/add-diskon', 'Admin\DiskonController@store');
    });
    Route::prefix('find')->group(function () {
        Route::put('/admin/{id}', 'Admin\AdminController@find');
        Route::put('/buku/{id}', 'Admin\BukuController@find');
        Route::put('/penulis/{id}', 'Admin\PenulisController@find');
        Route::put('/genre/{id}', 'Admin\GenreController@find');
        Route::put('/diskon/{id}', 'Admin\DiskonController@find');
    });
    Route::prefix('update')->group(function () {
        Route::post('/admin/{id}', 'Admin\AdminController@update');
        Route::post('/buku/{id}', 'Admin\BukuController@update');
        Route::post('/penulis/{id}', 'Admin\PenulisController@update');
        Route::post('/genre/{id}', 'Admin\GenreController@update');
        Route::post('/diskon/{id}', 'Admin\DiskonController@update');
    });
    Route::prefix('delete')->group(function () {
        Route::delete('/admin/{id}', 'Admin\AdminController@delete');
        Route::delete('/buku/{id}', 'Admin\BukuController@delete');
        Route::delete('/penulis/{id}', 'Admin\PenulisController@delete');
        Route::delete('/genre/{id}', 'Admin\GenreController@delete');
        Route::delete('/diskon/{id}', 'Admin\DiskonController@delete');
    });
});
//User
Route::post('/user/register', 'User\AuthController@register');
Route::post('/user/login', 'User\AuthController@login');
Route::get('/user/logout', 'User\AuthController@logout');

Route::prefix('user')->group(function(){
    //get
    Route::get('/index', 'User\GetController@index');
});
