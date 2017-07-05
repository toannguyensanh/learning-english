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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Admin Route
 */
Route::get('admin', 'Admin\AdminController@index');

//User Route
Route::get('admin/user', 'Admin\UserController@index');
Route::get('admin/user/create', 'Admin\UserController@create');
Route::get('admin/user/edit', 'Admin\UserController@edit');
Route::get('admin/user/delete', 'Admin\UserController@delete');

//Role Route
Route::get('admin/role','Admin\RoleController@index');
Route::get('admin/role/create','Admin\RoleController@create');
Route::get('admin/role/edit','Admin\RoleController@edit');
Route::get('admin/role/delete','Admin\RoleController@delete');

//Permission Route
Route::get('admin/permission','Admin\PermissionController@index');
Route::get('admin/permission/create','Admin\PermissionController@create');
Route::get('admin/permission/edit','Admin\PermissionController@edit');
Route::get('admin/permission/delete','Admin\PermissionController@delete');

/*
 * Admin Menu
 */
Menu::make('admin_menu', function($menu){
  
	$menu->add('View site')->attr(array('it-icon' => 'home'));
	$menu->add('Dashboard', 'admin')->attr(array('it-icon' => 'dashboard'))->link->active();

	//User
	$menu->add('User Manager', '#')->attr(array('it-icon' => 'user-md'));
	$menu->userManager->add('Users',    'admin/user')->attr(array('it-icon' => 'user'))->active('admin/user/*');
	$menu->userManager->add('Permissions', 'admin/permission')->attr(array('it-icon' => 'user-plus'))->active('admin/permission/*');
	$menu->userManager->add('Roles', 'admin/role')->attr(array('it-icon' => 'user-times'))->active('admin/role/*');
  
});
