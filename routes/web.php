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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin|owner|employee']], function() {
	/*
	 * Admin Route
	 */
	Route::get('admin', 'Admin\AdminController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
	//User Route
	Route::get('/user', 'Admin\UserController@index');
	Route::get('/user/create', 'Admin\UserController@create');
	Route::get('/user/edit/{id}', 'Admin\UserController@edit');
	Route::post('/user/update', 'Admin\UserController@update');
	Route::get('/user/delete/{id}', 'Admin\UserController@delete');

	//Role Route
	Route::get('/role','Admin\RoleController@index');
	Route::get('/role/create','Admin\RoleController@create');
	Route::get('/role/edit/{id}','Admin\RoleController@edit');
	Route::post('/role/update','Admin\RoleController@update');
	Route::get('/role/delete/{id}','Admin\RoleController@delete');

	//Permission Route
	Route::get('/permission','Admin\PermissionController@index');
	Route::get('/permission/create','Admin\PermissionController@create');
	Route::get('/permission/edit/{id}','Admin\PermissionController@edit');
	Route::post('/permission/update','Admin\PermissionController@update');
	Route::get('/permission/delete/{id}','Admin\PermissionController@delete');
});

/*
 * Admin Menu
 */
Menu::make('admin_menu', function($menu){
  
	$menu->add('View site')->attr(array('it-icon' => 'home'));
	$menu->add('Dashboard', 'admin')->attr(array('it-icon' => 'dashboard'))->link->active();

	//User
	$menu->add('User Manager', '#')->attr(array('it-icon' => 'user-md'));
	$menu->userManager->add('Users',    'admin/user')->attr(array('it-icon' => 'user'))->active('admin/user/*');
	$menu->userManager->add('Roles', 'admin/role')->attr(array('it-icon' => 'user-times'))->active('admin/role/*');
	$menu->userManager->add('Permissions', 'admin/permission')->attr(array('it-icon' => 'user-plus'))->active('admin/permission/*');
  
});
