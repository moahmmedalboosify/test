<?php

use Illuminate\Support\Facades\Route;

/*
|
|
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
 */
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Auth::routes();


Route::resource('invoices', 'invoices\invoicesController');
Route::resource('addinvoices', 'invoices\add_invoicesController');
Route::get('invoice/update/{id}', 'invoices\invoicesController@update_show_invoices');
Route::post('invoice/update/data', 'invoices\invoicesController@update_data_invoices');
Route::post('invoice/update/data', 'invoices\invoicesController@update_data_invoices');
Route::get('invoice/execl', 'invoices\invoicesController@export');

Route::get('invoices/details/{id}', 'invoices\detailsController@show');
Route::get('show/{id}','invoices\detailsController@show_image')->name('show');
Route::get('download/{id}','invoices\detailsController@download_image');
Route::post('delete/image','invoices\detailsController@delete_image')->name('delete_image');



//route for ajax just  return data
Route::get('section/{id}', 'invoices\add_invoicesController@get_section');

Route::resource('sections', 'settings\sectionController');

Route::resource('products', 'settings\productsController');

Route::get('/{page}', 'AdminController@index');


Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles','UserManagement\RoleController');
  Route::resource('users','UserManagement\UserController');
  

});
