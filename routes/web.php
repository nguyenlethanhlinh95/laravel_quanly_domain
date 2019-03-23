<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'UserController@loginAdmin')->name('login_get');
Route::post('/dashboard', 'UserController@checkLoginAdmin')->name('login_post');
Route::get('logout','UserController@getLogout');

Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'], function() {
    Route::group(['prefix'=>'domain'], function (){
        Route::get('list','DomainController@index')->name('admin_domain_list');

        Route::get('detail','DomainController@show')->name('admin_domain_detail');

        Route::get('create','DomainController@create')->name('admin_domain_create');
        Route::post('create','DomainController@store')->name('admin_domain_create_p');

        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//        Route::get('edit/{id}','DomainController@edit')->name('admin_domain_edit');
//        Route::get('edit','DomainController@update')->name('admin_domain_edit_p');



    });

    Route::group(['prefix'=>'user'],function (){
        Route::get('list','UserController@index')->name('admin_user_list');

        Route::get('create','UserController@create')->name('admin_user_create');
        Route::post('create','UserController@store')->name('admin_user_create_p');

        Route::get('edit/{id}','UserController@edit')->name('admin_user_edit');
        Route::post('edit/{id}','UserController@update')->name('admin_user_update_p');

        Route::DELETE('delete/{id}','UserController@destroy')->name('admin_user_destroy_p');
    });
});
