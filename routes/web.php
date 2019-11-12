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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth','checkAccountStatus','admin'],
              'prefix' => 'admin' ],
               function () {
                    Route::get('/', 'AdminControllers\HomeController@index');
                    Route::get('home', 'AdminControllers\HomeController@index')->name('admin.home');
                    Route::resource('clients','AdminControllers\ClientController');
                    Route::resource('admins','AdminControllers\AdminController');
                    Route::resource('conversations','AdminControllers\ConversationController');
                    Route::post('clients/{id}/lock','AdminControllers\ClientController@lock');
                    Route::post('clients/{id}/unlock','AdminControllers\ClientController@unlock');
                    Route::post('admins/{id}/lock','AdminControllers\AdminController@lock');
                    Route::post('admins/{id}/unlock','AdminControllers\AdminController@unlock');
               });

Route::group(['middleware' => ['auth','checkAccountStatus','client']], 
               function () {
                    Route::get('/', 'ClientControllers\HomeController@index');
                    Route::get('home', 'ClientControllers\HomeController@index')->name('client.home');
               });


/*
Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin', function () {
        return view('user.indexadmin', compact('users'));
    })->name('admin');

    Route::get('dashbord', function () {
      return view('dashbord');
    })->name('dashbord');
});
Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});
*/